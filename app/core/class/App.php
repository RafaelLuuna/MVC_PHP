<?php

class App
{
    private $controller = "home";
    private $method     = "index";

    public function __construct()
    {
        $this->loadController();
    }

    private function splitCurrentURL()
    {

        $URL = $_GET["url"] ?? 'Home';

        $URL = explode("/", $URL);

        return $URL;

    }

    private function loadController()
    {

        $URL = $this->splitCurrentURL();
        $filename = "../app/controllers/".ucfirst($URL[0]).".php";


        if(file_exists($filename))
        {
            require_once $filename;
            $this->controller = ucfirst($URL[0]);

        }else
        {
            require_once '../app/controllers/_404.php';
            $this->controller = '_404';
        }

        $controller = new $this->controller;
        call_user_func_array([$controller,$this->method],[]);

        
    }

}