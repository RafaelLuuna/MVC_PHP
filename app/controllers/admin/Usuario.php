<?php
defined('ROOTPATH') OR exit("Access denied.");
class Usuario extends Controller
{
    use Model;

    public function __construct(){
        Session::start();
        Session::set('pagina', 'Usuarios');
        $this->blocker('admin/login');
        $this->view('master');
        $this->showPopup();
    }
    
    public function index(){
        $this->view('admin/header');
        $this->view('admin/usuario/home');


    }
    
    
}