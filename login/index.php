


<?php

// A página de login não possui nenhum bloqueio pois ainda não foi gerado o token de identificação
require dirname(__FILE__,2).'/assets/constants/dir.php';


if(session_status() === PHP_SESSION_NONE) session_start();

$_SESSION['hash'] = '';
$_SESSION['redirect'] = '';

require './views/master.php';
require './views/login.html';

?>




