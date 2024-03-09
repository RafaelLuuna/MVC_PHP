


<?php	
	// Define as constantes globais e importa as dependências para fazer a validação do usuário através do script "blocker"
	require dirname(__FILE__,2).'/assets/constants/dir.php';

	require BASE.'/assets/sql/connection.php';
	require BASE.'/assets/classes/UserClass.php';
	require BASE.'/assets/scripts/blocker.php';	

	blocker('http://localhost/admin/login', 'admin_users');

	//---------------------------------------------------------------------------------------------------------------------

	header('location: http://localhost/admin/cadastro');
	
	exit;

?>




