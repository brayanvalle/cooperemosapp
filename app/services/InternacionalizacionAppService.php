<?php

class InternacionalizacionAppService{
    
    private $service = null;

    private $_methods = [
        'getUserInfo' => '/getUserInfo/'
    ];

    private function getMethod($method){
        return $this->_request['url'] . '' . $this->_methods[$method];
    }

    public function getUserProfile($externalUserProfileId){        
        $person = Person::findFirst('PersonId = "' . $externalUserProfileId . '"');
        return $person;
    }
}


?>