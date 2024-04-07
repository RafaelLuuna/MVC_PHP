<?php

try{
    if(!defined('DB_NAME')){
        define('DB_NAME', 'base');
    }
    $localhost = "localhost";
    $user = "root";
    $password = "";
    $pdo = new PDO("mysql:dbname=".DB_NAME."; host".$localhost, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    define('_PDO', $pdo);

}catch(PDOException $e){
    echo "ERRO: ". $e->GetMessage();
    exit;
}

?>