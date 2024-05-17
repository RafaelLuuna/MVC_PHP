<?php
defined("ROOTPATH") OR exit("Acces denied.");
class Consulta extends Controller
{
    use Model;

    public function __construct(){
        Session::start();
        $this->blocker('login');
        $this->view('master');
    }

    public function index(){
        $this->view('app/header');
        $this->view('app/consulta/consulta');
    }
    
    
}