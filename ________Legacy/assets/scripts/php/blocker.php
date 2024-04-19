<?php

function blocker($loginUrl = _MAIN_URL.'/login', $table = 'usuarios'){

    if(session_status() === PHP_SESSION_NONE) session_start();
    
    if(!isset($_SESSION['hash']) or !isset($_SESSION['id_usuario'])){
        $_SESSION['redirect'] = '';
        header('location: '.$loginUrl);
        exit;
    }
    
    $u = new UserClass();
    $u->id = $_SESSION['id_usuario'];
    
    if(!$u->validarHash($_SESSION['hash'], $table)){
        $_SESSION['redirect'] = '';
        header('location: '.$loginUrl);
        exit;
    }

}

?>