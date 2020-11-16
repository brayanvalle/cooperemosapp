<?php

use GuzzleHttp\Client;

class Http{

    private $_client = null;

    function __construct() {
        $this->_client = new Client();
    }

    public function get($url){
        $response = $this->_client->get($url);
        
        return [
            'body' => json_decode($response->getBody()),
            'statusCode' => $response->getStatusCode()
        ];
    }

    public function post($request){
        $response = $this->_client->post($request['url'], [
            'headers' => $request['headers'],
            'json' => $request['body']
        ]);
      

        return [
            'data' => json_decode($response->getBody()),
            'statusCode' => $response->getStatusCode()
        ];

      
    }


}


?>