<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class HelpController extends ControllerBase
{
    public function indexAction(){
        $this->session->set('FIRST_LOGIN', 'FALSE');
    }
}

?>