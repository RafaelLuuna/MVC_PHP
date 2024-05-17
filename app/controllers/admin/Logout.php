<?php
defined('ROOTPATH') OR exit("Access denied.");
class Logout extends Controller
{
    use Model;

    public function __construct(){
        Session::start();
    }

    public function index(){
        Session::destroy();
        redirect('admin/login');
    }
    
    
}