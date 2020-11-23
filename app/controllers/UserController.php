<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class UserController extends ControllerBase
{
    public function indexAction(){
        
    }

    public function mynetworkAction()
    {

    }

    public function viewAction($id){
        $identityUser = IdentityUser::findFirst($id);

        $person = Person::findFirst('PersonId = "' . $identityUser->ExternalUserProfileId . '"');

        $this->view->user = json_decode(json_encode([
            'IdentityUser' => $identityUser,
            'Person' => $person
        ], FALSE));

        $this->view->identityUser = $identityUser;
        $this->view->personSchoolProgram = PersonSchoolProgram::findFirst('PersonId = ' . $person->Id);
        
    }

    public function getUserDataAction(){        
        $this->_userService = new UserService();
        $this->_internacionalizacionAppService = new InternacionalizacionAppService();

        $result = $this->_internacionalizacionAppService->getUserProfile('P5ebeaaa3ad8c35ebeaaa3ad8c5');
        return $this->Ok( $result['data']);
    }

}

?>