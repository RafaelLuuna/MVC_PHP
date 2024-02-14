<?php

session_start();
require dirname(__FILE__,2).'/assets/validateUser.php';
require dirname(__FILE__,2).'/assets/sql/connection.php';

if(!isset($_SESSION['hash']) or validarUsuario() == false){
    header('location: http://localhost');
}

require 'views/home.php';

?>