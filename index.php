




<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];

	session_start();

	require dirname(__FILE__,1).'/assets/validateUser.php';
	require dirname(__FILE__,1).'/assets/sql/connection.php';


	if(!isset($_SESSION['hash']) or validarUsuario() == false){
		header('location: http://localhost/login');
	}else{
		header('location: http://localhost/home');
	}
	exit;
?>
Something is wrong with the XAMPP installation :-(
