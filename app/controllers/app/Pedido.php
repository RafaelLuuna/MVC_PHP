<?php

defined("ROOTPATH") OR exit("Acces denied.");

class Pedido extends Controller
{
    use Model;

    public function __construct(){
        Session::start();
        $this->blocker('login');
        $this->view('master');
        $this->showPopup();
    }

    public function index(){
        $this->view('app/header');
        $this->view('app/pedido/pedido');
    }
    
    
}