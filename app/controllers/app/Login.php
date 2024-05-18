<?php
defined('ROOTPATH') OR exit("Access denied.");
class Login extends Controller
{
    use Model;

    public function __construct(){
        Session::start();
        $this->view('master');
        $this->showPopup();
    }

    public function index(){

        $this->view('login/app');

    }

    public function logar(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(empty($_POST["email"]) || empty($_POST["senha"])){
                redirect("login");
            }
            $user = new User;
            $data = ['email'=>$_POST["email"], 'senha'=>$_POST["senha"]];
            $user->login($data);
        }else{
            redirect("login");
        }
    }
    
    
}