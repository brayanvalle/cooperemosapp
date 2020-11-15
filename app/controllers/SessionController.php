<?php

use Phalcon\Translate\Adapter\NativeArray;
class SessionController extends ControllerBase
{
    private $SESSION_NAME = "cooperemosapp";

    private function _registerSession($identityUser)
	{		

        $user = new User();

        $user->IdentityUser = $identityUser;
        $user->Name = "Brayan";
        $user->Id = $identityUser->Id;

		$this->session->set(
				$this->SESSION_NAME,
				[
					'UserId'   => $user->Id,
                    'Name'	   => $user->Name,
                    'RoleKey'  => $user->IdentityUser->IdentityRole->KeyName,
					'RoleName' => $user->IdentityUser->IdentityRole->Name
                ]
        );		
	}
	private function _unregisterSession(){
		$this->session->remove($this->SESSION_NAME);
	}

	public function indexAction()
	{
        if ($this->request->isPost()) {	
			$email    = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $user = IdentityUser::findFirst(
                array(
                        "(Email = :email:) AND PasswordHash = :password:",
                        'bind' => array(
                                'email'    => $email,
                                'password' => Utils::Hash()->encrypt($password),
                    )
                )
            );
            if(!$user)
            {
                $this->flash->error('Email/Contraseña incorrectos');
                return $this->dispatcher->forward([ 'controller' => 'session', 'action' => 'login']);
            }

            if(!$user->IsActive){
                $this->flash->error('El usuario no se encuentra activo. Por favor contacte con el administrador.');
                return $this->dispatcher->forward([ 'controller' => 'session', 'action' => 'login']);
    
            }

            $this->UpdateUserSignIn($user);
            //User credentials are correct
            $this->_registerSession($user);	
            return $this->dispatcher->forward([ 'controller' => 'index', 'action' => 'index']);
			
        }


        else if ($this->session->get($this->SESSION_NAME)){
            return $this->dispatcher->forward(
                array(
                        'controller' => 'index',
                        'action'     => 'index'
                )
            );
        }
        else{
            return $this->dispatcher->forward(
                array(
                        'controller' => 'session',
                        'action'     => 'login'
                )
            );
        }
	}

    public function loginAction()
    {       

    }

    public function logoutAction(){
    	$this->_unregisterSession();
    	return $this->dispatcher->forward(
    			array(
    					'controller' => 'session',
    					'action'     => 'index'
    			)
    		);
    	
    }

    private function UpdateUserSignIn($user){
        $user->LastConnectionDate = Utils::Date()->getDate();
        $user->save();
    }

}

