<?php

class InternacionalizacionAppService{
    
    private $service = null;

    private $_methods = [
        'getUserInfo' => '/getUserInfo/'
    ];

    private function getMethod($method){
        return $this->_request['url'] . '' . $this->_methods[$method];
    }

    function __construct() {
        $this->service = ExternalServiceProvider::findFirst('KeyName = "InternacionalizacionAppService"');
        
        $this->_request = [
            'apiUrl' => $this->service->ApiUrl,
            'url' => $this->service->ApiUrl,
            'headers' => [
                'X-Api-Key' => $this->service->Token
            ],
            'body' =>[]
        ];
    
    }

    public function getUserProfile($externalUserProfileId){
        
        $this->_request['body'] = [
            'userId' => $externalUserProfileId
        ];

        $this->_request['url'] = $this->getMethod('getUserInfo');
        $response = Utils::Http()->post($this->_request);
        return $response;
    }
}


?>