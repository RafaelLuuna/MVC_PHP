<?php
defined("ROOTPATH") OR exit("Acces denied.");
class Home extends Controller
{
    use Model;

    public function __construct(){
        Session::start();
        $this->blocker('login');
        $this->view('master');
    }

    public function index(){
        $this->view('app/header');
        
    }
    
    
}