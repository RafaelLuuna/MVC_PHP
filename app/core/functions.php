<?php

function show($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}


function checkHash($idUser, $hash){

    // if(session_status() === PHP_SESSION_NONE) session_start();
    
    // if(!isset($_SESSION['hash']) or !isset($_SESSION['id_usuario'])){
    //     $_SESSION['redirect'] = '';
    //     header('location: '.$loginUrl);
    //     exit;
    // }
    
    // $u = new UserClass();
    // $u->id = $_SESSION['id_usuario'];
    
    // if(!$u->validarHash($_SESSION['hash'], $table)){
    //     $_SESSION['redirect'] = '';
    //     header('location: '.$loginUrl);
    //     exit;
    // }

}