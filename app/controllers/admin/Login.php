<?php

class Login extends Controller
{
    use Model;

    public function __construct(){
        $this->view('master');
    }

    public function index(){
        $this->view('login/admin');

    }
    
    
}