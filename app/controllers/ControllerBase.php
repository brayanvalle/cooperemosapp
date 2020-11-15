<?php

use Phalcon\Mvc\Controller;

$APP_URL = "http://$_SERVER[HTTP_HOST]";

define('_APP_URL',$APP_URL . '/cooperemosapp/');

class ControllerBase extends Controller
{
    public function initialize()
    {      
        $this->tag->setDefault("APP_URL", _APP_URL);
        $this->handleSession();
        $this->loadAssets();
    }

    private function handleSession()
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


    private function loadAssets()
    {
        $this->assets
            ->collection('headercss')
            ->addCss('css/app.css')
            ->addCss('css/main.css')
            ->addCss('css/session/login.css');

        // $this->assets
        //     ->collection('headerjs')
        //     ->addJs('assets/plugins/jquery/jquery.js')
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
