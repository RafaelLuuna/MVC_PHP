<?php
defined('ROOTPATH') OR exit("Access denied.");
class Logout extends Controller
{
    use Model;

    public function __construct(){
        session_unset();
        redirect('login');
    }
    
    
}