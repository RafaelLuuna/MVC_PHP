<?php
defined('ROOTPATH') OR exit("Access denied.");
class Login extends Controller
{
    use Model;


    public function __construct(){
        Session::start();
        Session::set('pagina', 'Login');
        $this->view('master');
    }

    public function index(){

        $this->showPopup();
        $this->view('login/admin');

    }

    public function logar(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(empty($_POST["email"]) || empty($_POST["senha"])){
                redirect("admin/login");
            }
            $user = new User;
            $data = ['email'=>$_POST["email"], 'senha'=>$_POST["senha"]];
            $user->login($data, 'admin/usuario', 'admin/login');
        }else{
            redirect("admin/login");
        }
    }
    
    
}