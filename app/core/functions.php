<?php

defined("ROOTPATH") OR exit("Acces denied.");
function show($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

function checkExtentions(){

    $requiredExtentions = [
        'gd',
        'mysql'
    ];

    $not_loaded = [];

    foreach($requiredExtentions as $ext){
        if(in_array($ext, $requiredExtentions)){
            $not_loaded[] = $ext;
        }
    }

    if(!empty($not_loaded)){
        show("Por favor carregue as seguintes extensões: ".implode($not_loaded));
    }


}

function escape($value){
    return htmlspecialchars($value,ENT_QUOTES);
}

function redirect($path){
    try{
        header('Location: '.ROOT.$path);
        return true;
        
    }catch(Exception $e){
        echo 'Não foi possível carregar a página solicitada: '.$e;
        return false;
    }
}

function concatParams($data, $format=":key", $delimiter=" , ", $enclose=false, $encloseBrackets=["(",")"]){
    // Descrição:
    // Essa função retorna uma string que concatena todos os campos de dados separados por um delimitador. Também é possível colocá-los entre parênteses.

    $str = '';
    
    foreach($data as $key=>$value){
        $formatedStr = str_replace("key", $key, $format);
        $formatedStr = str_replace("value", $value, $formatedStr);
        $str .= $delimiter.$formatedStr;
    }

    $str = substr($str,mb_strlen($delimiter));

    if($enclose){
        $str = $encloseBrackets[0].$str.$encloseBrackets[1];
    }

    return $str;

}

function oldValue(string $key, $default = null, string $mode = 'POST'){

    $POST = $mode == 'POST' ? $_POST : $_GET;

    if(isset($_POST[$key])){
        return $_POST[$key];
    }

    return $default;


}
function oldCheck(string $key, $default = null, string $mode = 'POST'){

    $POST = $mode == 'POST' ? $_POST : $_GET;

    if(isset($_POST[$key])){
        return $_POST[$key];
    }

    return $default;


}
function oldSelected(string $key, $default = null, string $mode = 'POST'){

    $POST = $mode == 'POST' ? $_POST : $_GET;

    if(isset($_POST[$key])){
        return $_POST[$key];
    }

    return $default;


}

