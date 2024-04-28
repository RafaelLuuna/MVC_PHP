<?php

class App
{
    private $controller = "Login";
    private $method     = "index";

    public function __construct()
    {
        $this->loadController();
    }

    private function splitCurrentURL()
    {

        $URL = $_GET["url"] ?? 'Login';

        $URL = explode("/", rtrim($URL,'/'));


        return $URL;

    }

    private function loadController()
    {
        $URL = $this->splitCurrentURL();
        if(ucfirst($URL[0]) == 'Admin'){
            $filename = "../app/controllers/admin/";
            empty($URL[1]) ? array_splice($URL,0,1, ['Login']) : array_splice($URL,0,1);
            
        }else{
            $filename = "../app/controllers/app/";
        }
        $filename .= ucfirst($URL[0]).".php";


        if(file_exists($filename)){
            require_once $filename;
            $this->controller = ucfirst($URL[0]);
            array_splice($URL,0,1);
        }else{
            require_once '../app/controllers/_404.php';
            $this->controller = '_404';
        }
        
        $controller = new $this->controller;

        if(!empty($URL) && method_exists($controller,lcfirst($URL[0]))){
            $this->method = $URL[0];
            array_splice($URL,0,1);
        }
        
        call_user_func_array([$controller,$this->method],$URL);

        

        
    }

}