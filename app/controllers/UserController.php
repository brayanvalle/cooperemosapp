<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class UserController extends ControllerBase
{
    private $_userService = null;   
    private $_internacionalizacionAppService = null;   

    public function initialize(){
        $this->_userService = new UserService();
        $this->_internacionalizacionAppService = new InternacionalizacionAppService();
    }

    public function indexAction()
    {
        
    }

    public function getUserDataAction(){
        $result = $this->_internacionalizacionAppService->getUserProfile('P5ebeaaa3ad8c35ebeaaa3ad8c5');
        return $this->Ok( $result['data']);
    }

}

?>