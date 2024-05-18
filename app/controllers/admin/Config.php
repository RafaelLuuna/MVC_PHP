<?php
defined('ROOTPATH') OR exit("Access denied.");
class Config extends Controller
{
    use Model;

    public function __construct(){
        Session::start();
        Session::set('pagina', 'Config');
        $this->blocker('admin/login');
        $this->view('master');
        $this->showPopup();
    }

    public function index(){
        $this->view('admin/header');
        $this->view('admin/config/home');

    }
    
    
}