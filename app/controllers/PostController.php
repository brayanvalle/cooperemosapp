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

        $user = $this->getSession();
    }

    public function doLikeAction($postId)
    {
        $postEntryService = new PostEntryService();

        try{
            $user = $this->getSession();

            if($postId == "")
                return;

            $postUserInteraction = new PostUserInteraction();

            $postUserInteraction->PostEntryId = $postId;
            $postUserInteraction->IdentityUserId = $user['UserId'];

            $this->postEntryService->doPostUserInteraction($postUserInteraction, 'LIKE');
            return $this->Ok("Created Ok");
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