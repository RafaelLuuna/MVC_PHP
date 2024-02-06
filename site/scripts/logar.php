<?php

function escape($login_validation){
    if($login_validation == true){
        if(isset($_SESSION['id_user'])){
            $_SESSION['login_err'] = '';
            header("location: ../home_page.php");
        }else{
            header("location: ../login_page.php");
        }
    }else{
        header("location: ../login_page.php");
    }
}

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    require 'connection.php';
    require 'classes/UserClass.php';

    $u = new UserClass();
    
    $login = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    escape($u->login($login, $senha));
    

}else{

    escape(false);

}


?>