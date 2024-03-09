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

function query($query, $data_list){

}

function loadTable($table, $columns = '*', $conditions=''){
    
    if($conditions !== ''){
        $conditions = " WHERE ".$conditions;
    }

    $sql = "SELECT $columns FROM $table;";
    $sql = $pdo->prepare($sql);
    $sql->execute();
    
    $data = $sql->fetch();
    
    return json_encode($data);
    
}



?>