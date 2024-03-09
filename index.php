<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];

	// Caso a var 'redirerct' da session seja 'admin', será redirecionado para o admin.
	if(session_status() === PHP_SESSION_NONE) session_start();
    if(isset($_SESSION['redirect']) && $_SESSION['redirect'] == 'admin'){
		header('location: http://localhost/admin');
		exit;
	}


	//Define as constantes globais e importa as dependências para fazer a validação do usuário através do script "blocker"
	require './assets/constants/dir.php';

	require './assets/sql/connection.php';
	require './assets/classes/UserClass.php';
	
	require './assets/scripts/blocker.php';	
	

	blocker();
	require './_Promotendas_ERP/index.php';
	exit;
?>
Something is wrong with the XAMPP installation :-(
