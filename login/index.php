


<?php

require dirname(__FILE__,2).'/assets/validateUser.php';
require dirname(__FILE__,2).'/assets/sql/connection.php';

session_start();
$_SESSION['hash'] = 0;


//Verifica se há cookies de pop-ups gerados------------
setcookie('haspopup', 'false', 0,'/');
$_SESSION['popupCount'] = 0;


foreach($_COOKIE as $k => $v){
    if(substr($k,0,5) == 'popup'){
        setcookie('haspopup', 'true', 0,'/');
        $_SESSION['popupCount'] += 1;
    } 
}
setcookie('count-popup', $_SESSION['popupCount'], 0,'/');
//-----------------------------------------------------

require 'master.php';


?>




