<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use Phalcon\Http\Request;

$APP_URL = "http://$_SERVER[HTTP_HOST]";

define('_APP_URL',$APP_URL . '/cooperemosapp/');

class ControllerBase extends Controller
{


    public function initialize()
    {      
        $this->view->sessionUser = $this->session->get('cooperemosapp');
        $this->tag->setDefault("APP_URL", _APP_URL);
        $this->handleSession();
        $this->loadAssets();
    }

    public function getSession()
    {
        return $this->session->get('cooperemosapp');
    }

    public function GetSessionUser()
    {
        return $this->getSession();
    }

    protected function Response($status , $header , $body){
        $response=new Response();
        $response->setStatusCode($status, $header);
        $response->setJsonContent($body);
        return $response;
    }

    protected function Ok($message){
        return $this->Response(200 , 'Ok' , $message);
        
    }

    protected function Error($message){
        return $this->Response(400 , 'Error' , $message);
    }


    private function handleSession()
    {         
       
        header('Content-Type: text/html; charset=utf-8');        
        $SESSION = "cooperemosapp";     
        
        
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


    private function loadAssets()
    {
        $this->assets
            ->collection('headercss')
            ->addCss('css/app.css')
            ->addCss('css/main.css')
            ->addCss('css/post/main.css')
            ->addCss('css/session/login.css');

        $this->assets
            ->collection('headerjs')
            ->addJs('js/app.js')
            ->addJs('js/utils.js')
            ->addJs('js/tooltip.js');
        //     ->addJs('assets/plugins/jquery/formatNumber.js')
        //     ->addJs('assets/plugins/bootstrap/js/tether.min.js')
        //     ->addJs('assets/plugins/bootstrap/js/bootstrap.min.js')
        //     ->addJs('assets/js/jquery.slimscroll.js')
        //     ->addJs('assets/js/waves.js')
        //     ->addJs('assets/js/sidebarmenu.js')
        //     ->addJs('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')
        //     ->addJs('assets/js/custom.min.js')  
        //     ->addJs('assets/plugins/d3/d3.min.js')  
        //     ->addJs('assets/plugins/c3-master/c3.min.js')
        //     ->addJs('assets/plugins/jquery/jquery-ui.js')
        //     ->addJs('assets/plugins/notify/bootstrap-notify.js')
        //     ->addJs('assets/js/poli.js');

    }

}
