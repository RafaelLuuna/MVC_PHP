<?php
defined("ROOTPATH") OR exit("Acces denied.");
Class User{
    
    use Model;

    protected $table = "usuarios";

    public function login($data, $homePage='home', $default='login'){
        $data['senha'] = hash('sha256', $data['senha']);
        $check = $this->validateLogin($data);
        if($check){
            $userData = $this->first($data, ['nome', 'email', 'senha']);
            Session::set('userData', $userData);
            redirect($homePage);
        }else{
            setcookie('popup', 'title::Erro ao fazer login|content::Usuário ou senha inválidos', ['path'=>'/']);
            redirect($default);    
        }
    }

    public function validateLogin($data){
        if(empty($data["email"]) || empty($data["senha"])){
            return false;
        }
        $searchUser = $this->first(['email'=>$data['email']]);
        if($searchUser == false || $data['senha'] != $searchUser['senha']){
            return false;
        }else{
            return true;
        }
    }

    public function validateHash(){
        // if(empty($_SESSION["email"]) || empty($_SESSION["senha"]) || empty($_SESSION["hash"])){
        //     return false;
        // }

        // $userData = $this->find(["email"=>$_SESSION["email"],"senha"=>$_SESSION["senha"]]);
        // if($userData == false){
        //     return false;
        // }else{
        //     $trueHash = hash('sha256',$userData['email'].$userData['senha']);
        //     if($_SESSION['hash'] == $trueHash){
        //         return true;
        //     }else{
        //         return false;
        //     }
        // }
    }
}