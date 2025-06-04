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
    
    public function cadastro(){
        $this->view('admin/header');
        $this->view('admin/usuario/cadastro');
    }
    
    public function cadastrar(){
        $User = new User();
        $User->insert($_POST);
        setcookie('popup', 'title::Atenção!|content::Usuário registrado com sucesso!. <br>Caso deseje entender como a inserção é feita, você pode consultar o código fonte <a href="https://github.com/RafaelLuuna/MVC_PHP">clicando aqui</a> ', ['path'=>'/']);

        header("Location: ".ROOT."admin/usuario");
    }
    
    
}