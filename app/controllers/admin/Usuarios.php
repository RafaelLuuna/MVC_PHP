<?php

class Usuarios extends Controller
{
    use Model;

    public function __construct(){
        $this->view('master');
    }

    public function index(){
        $this->view('admin/header');

    }
    
    
}