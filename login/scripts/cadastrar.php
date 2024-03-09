<?php

require dirname(__FILE__,3).'/assets/constants/dir.php';
require BASE.'/assets/sql/connection.php';
require BASE.'/assets/scripts/popups.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Verifica se o e-mail fornecido já está cadastrado
$sql = 'SELECT * FROM usuarios WHERE email = :email';
$sql = _PDO->prepare($sql);
$sql->bindValue(':email',$email);
$sql->execute();

if($sql->RowCount()>0){
    setPopupCookie('O e-mail informado já está cadastrado', 'red');
    header('location: http://localhost');
    exit;
}


$sql = 'INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `status`, `dt_cadastro`) VALUES (NULL, :nome, :email, :senha, "P", :dt)';
$sql = $pdo->prepare($sql);
$sql->bindValue(':nome',$nome);
$sql->bindValue(':email',$email);
$sql->bindValue(':senha',hash('sha256',$senha));
$sql->bindValue(':dt',time());
$sql->execute();

setPopupCookie('Cadastro efetuado com sucesso!', 'green');


header('location: http://localhost');


?>