<?php
defined('ROOTPATH') OR exit("Access denied.");
class Produtos extends Controller
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