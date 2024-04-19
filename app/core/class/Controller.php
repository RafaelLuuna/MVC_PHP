<?php

class Controller
{
    public function view($name)
    {
        $filename = "../app/views/".$name.".view.php";

        if(!file_exists($filename))
        {
            $filename = '../app/views/_404.view.php';
        }

        require_once $filename;
    }
}