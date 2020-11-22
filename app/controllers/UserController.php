<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class UserController extends ControllerBase
{
    public function indexAction(){
        
    }

    public function viewAction($id){
        
    }

    public function getUserDataAction(){        
        $this->_userService = new UserService();
        $this->_internacionalizacionAppService = new InternacionalizacionAppService();

        $result = $this->_internacionalizacionAppService->getUserProfile('P5ebeaaa3ad8c35ebeaaa3ad8c5');
        return $this->Ok( $result['data']);
    }

}

?>