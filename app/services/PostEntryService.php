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
}

?>