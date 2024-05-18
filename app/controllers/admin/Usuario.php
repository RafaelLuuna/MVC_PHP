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
    }
    
    public function index(){
        $this->view('admin/header');
        
        // $this->view('admin/usuario/home');
        $table = new Table('usuarios');
        // show($table->count(['id'=>280],['operator'=>'>','second_search'=>['id'=>300],'second_operator'=>'<', 'pagination'=>false]));
        $page = 11;
        echo 'pages: '.$table->pages();
        show($table->count([],['pagination'=>true, 'page'=>$page]));
        show($table->find([],['page'=>$page]));

    }
    
    
}