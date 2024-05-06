<?php
defined('ROOTPATH') OR exit("Access denied.");
class Usuarios extends Controller
{
    use Model;

    public function __construct(){
        $this->blocker('admin/login');
        $this->view('master');
    }

    public function index(){
        $this->view('admin/header');

    }
    
    
}