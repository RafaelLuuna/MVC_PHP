<?php
defined("ROOTPATH") OR exit("Acces denied.");
class Home extends Controller
{
    use Model;

    public function __construct(){
        $this->blocker('login');
        $this->view('master');
    }

    public function index(){
        $this->view('app/header');
        $this->view('app/home/home');
    }
    
    
}