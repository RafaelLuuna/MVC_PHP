<?php

class Consulta extends Controller
{
    use Model;

    public function __construct(){
        $this->view('master');
    }

    public function index(){
        $this->view('app/header');
        $this->view('app/consulta/consulta');
    }
    
    
}