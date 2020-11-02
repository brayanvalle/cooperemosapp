<?php

use Phalcon\Mvc\Controller;

$APP_URL = "http://$_SERVER[HTTP_HOST]";

define('_APP_URL',$APP_URL . '/cooperemosapp/');

class ControllerBase extends Controller
{
    public function initialize()
    {      
        $this->tag->setDefault("APP_URL", _APP_URL);
        $this->handle_session();
    }

    private function handle_session()
    {         
        header('Content-Type: text/html; charset=utf-8');        
        $SESSION = "nicooperationapp";        
        if(!$this->session->get($SESSION)){            
            $actual_link = "$_SERVER[REQUEST_URI]";      

            $server = "http://$_SERVER[HTTP_HOST]/cooperemosapp/session/login";
                        
            if($actual_link == "" || $actual_link == "/cooperemosapp/session" || $actual_link == "/cooperemosapp/session/login"){
            }else{
                header("Location: ".$server);
				die();
            }    				
        }   
    }

}
