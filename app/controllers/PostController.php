<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class PostController extends ControllerBase
{

    public function indexAction()
    {
        $numberPage = 1;
        $postEntries = PostEntry::find();
        $paginator = new Paginator([
            'data' => $postEntries,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

}

?>