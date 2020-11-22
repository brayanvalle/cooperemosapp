<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class PostController extends ControllerBase
{
    public function onConstruct(){
        $this->postEntryService = new PostEntryService();
    }

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

        $user = $this->getSession();
    }

    public function viewAction($postId){
        $postEntry = PostEntry::findFirst($postId);

        $this->view->post = $postEntry;
    }

    public function doShareAction($postId){
        try{
            $user = $this->getSession();

            if($postId == "")
                return;

            $postUserInteraction = new PostUserInteraction();
            $postUserInteraction->PostEntryId = $postId;
            $postUserInteraction->IdentityUserId = $user['UserId'];
            $this->postEntryService->doPostUserInteraction($postUserInteraction, 'SHARE');
            return $this->Ok('Ok');
        }
        catch(Error $e){
            return $this->Error($e->getMessage());
        }        
    }
    public function doLikeAction($postId)
    {
        try{
            $user = $this->getSession();

            if($postId == "")
                return;

            // find if like action exists
            $puiExists = PostUserInteraction::findFirst([
                'conditions' => 'IdentityUserId = ' . $user['UserId'] . ' AND PostEntryId = ' . $postId 
            ]);          
            
            if(!$puiExists){
                $postUserInteraction = new PostUserInteraction();
                $postUserInteraction->PostEntryId = $postId;
                $postUserInteraction->IdentityUserId = $user['UserId'];
                $this->postEntryService->doPostUserInteraction($postUserInteraction, 'LIKE');
                return $this->Ok([
                    'action' => 'LIKE'
                ]);
            }else{
                $this->postEntryService->doPostUserInteraction($puiExists, 'DISLIKE');
                return $this->Ok([
                    'action' => 'DISLIKE'
                ]); 
            }
        }
        catch(PDOException $e){
            return $this->Error($e->getMessage());
        }
        catch(Error $e){
            return $this->Error($e->getMessage());
        }        
    }

}

?>