<?php
defined('ROOTPATH') OR exit("Access denied.");
class Login extends Controller
{
    use Model;

    public function __construct(){
        $this->view('master');
    }

    public function index(){
        
        $this->showPopup();
        $this->view('login/admin');

    }

    public function logar(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(empty($_POST["email"]) || empty($_POST["senha"])){
                redirect("Location: ".ROOT."admin/login");
            }
            $user = new User;
            $check = $user->validateLogin(['email'=>$_POST["email"], 'senha'=>$_POST["senha"]]);
            if($check){
                redirect('admin/usuarios');
            }else{
                setcookie('popup', 'title:Erro ao fazer login, content:Usuário ou senha inválidos', ['expires'=>time()+2,'path'=>'/']);
                redirect('admin/login');    
            }
        }
    }
    
    
}