<?php

function setPDO($dbName){
    try{
        $localhost = "localhost";
        $user = "root";
        $password = "";
        $pdo = new PDO("mysql:dbname=".$dbName."; host".$localhost, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;

    }catch(PDOException $e){
        echo "ERRO: ". $e->GetMessage();
        return null;
        exit;
    }

}

function query($query, $data_list){

}

function loadTable($table, $columns = '*'){
    $pdo = setPDO('base');
    
    $sql = "SELECT $columns FROM $table;";
    $sql = $pdo->prepare($sql);
    $sql->execute();
    
    $data = $sql->fetchAll();
    
    return json_encode($data);
    
}



?>