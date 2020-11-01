<?php

use Phalcon\Mvc\Controller;
class ControllerBase extends Controller
{
    public function initialize()
    {      
        echo($_ENV['APP_MODE']);           
    }
}
