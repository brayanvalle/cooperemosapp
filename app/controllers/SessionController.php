<?php

use Phalcon\Translate\Adapter\NativeArray;
class SessionController extends ControllerBase
{
    private $SESSION_NAME = "cooperemosapp";

    private function _registerSession($identityUser)
	{		
        $_internacionalizacionAppService = new InternacionalizacionAppService();

        $externalUser = $_internacionalizacionAppService->getUserProfile($identityUser->ExternalUserProfileId);

		$this->session->set(
				$this->SESSION_NAME,
				[
					'UserId'   => $identityUser->Id,
                    'Name'	   => $identityUser->DisplayName,
                    'RoleKey'  => $identityUser->IdentityRole->KeyName,
                    'RoleName' => $identityUser->IdentityRole->Name,
                    'AvatarImageUrl' => $identityUser->AvatarImageUrl,
                    'ExternalUser' => $externalUser,
                    'FirstLogin' => $identityUser->FirstLogin == 1 ? 'TRUE' : 'FALSE'
                ]
        );	
        
        $this->session->set('FIRST_LOGIN', $identityUser->FirstLogin == 1 ? 'TRUE' : 'FALSE');
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

            //User credentials are correct
            $this->_registerSession($user);	            
            $this->UpdateUserSignIn($user);
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
        $this->session->remove($this->SESSION_NAME);
    	return $this->dispatcher->forward(
    			array(
    					'controller' => 'session',
    					'action'     => 'index'
    			)
    		);
    	
    }

    private function UpdateUserSignIn($user){
        $user->LastConnectionDate = Utils::Date()->getDate();
        $user->FirstLogin = 0;
        $user->save();
    }


    public function signupAction(){
        
    }
}

