<?php

class PostEntryService{

    public function createPostEntry(PostEntry $postEntry){       
        
        $postEntry->HashId = Utils::Hash()::uuid();
        $postEntry->LikesCount = 0;
        $postEntry->ShareCount = 0;
        $postEntry->CreationDate = Utils::Date()::getDate();
        $postEntry->CreatedByUserId = 1;

        if($postEntry->IsPublished === 1){
            $postEntry->PublicationDate = Utils::Date()::getDate();
        }

        if(!$postEntry->save()){
            throw new Error(Utils::Error()->getErrorMessage($postEntry));
        }
    }

    public function doPostUserInteraction(PostUserInteraction $postUserInteraction, $type){
        if($type === 'DISLIKE'){
            $postUserInteraction->PostEntry->LikesCount = $postUserInteraction->PostEntry->LikesCount - 1;
            $postUserInteraction->save();
            $postUserInteraction->delete();
            return;
        }

        switch($type){
            case 'LIKE' :
                $postUserInteraction->PostUserInteractionTypeId = 1;
                $postUserInteraction->PostEntry->LikesCount = $postUserInteraction->PostEntry->LikesCount + 1;
                break;
            case 'SHARE': 
                $postUserInteraction->PostUserInteractionTypeId = 2;
                $postUserInteraction->PostEntry->ShareCount = $postUserInteraction->PostEntry->ShareCount + 1;

                $postUserInteraction->PostEntry->save();            
                break;
        }

        $postUserInteraction->Date = Utils::Date()->getDate();

        
        if(!$postUserInteraction->save()){
            throw new Error(Utils::Error()->getErrorMessage($postUserInteraction));
        }

    }
}

?>