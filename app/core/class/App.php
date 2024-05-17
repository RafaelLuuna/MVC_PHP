<?php
defined("ROOTPATH") OR exit("Acces denied.");
class App
{
    private $controller = "Home";
    private $method     = "index";

    public function __construct()
    {
        $this->loadController();
    }

    private function splitCurrentURL()
    {

        $URL = $_GET["url"] ?? 'app';

        $URL = explode("/", rtrim($URL,'/'));


        return $URL;

    }

    private function loadController()
    {
        $URL = $this->splitCurrentURL();        
        
        $filename = "../app/controllers/";

        
        $DEFAULT_CONTROLLERS = [
            'app'=> 'Home',
            'admin'=> 'Usuario',
            'api'=> '_404'
        ];
        
        // Pasta padrão para redirecionar urls vazias
        $folders = scandir($filename);
        array_splice($folders,0,2);
        
        if(!in_array(lcfirst($URL[0]), $folders)){
            $URL = array_merge(['app'],$URL);
        }
        //
        
        $folder = lcfirst($URL[0]);
        $filename .= lcfirst($URL[0]).'/';
        array_splice($URL,0,1);
        
        // Arquivo padrão para redirecionar urls vazias
        if(empty($URL[0])){
            $URL = array_merge([$DEFAULT_CONTROLLERS[$folder]],$URL);
        }
        //

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







        // // Caso tente acessar o admin, os controllers serão procurados em outra pasta.
        // if(ucfirst($URL[0]) == 'Admin'){
        //     $filename = "../app/controllers/admin/";
        //     empty($URL[1]) ? array_splice($URL,0,1, ['Usuarios']) : array_splice($URL,0,1);
            
        // }else{
        //     $filename = "../app/controllers/app/";
        // }