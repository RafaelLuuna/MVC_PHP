<?php

require dirname(__FILE__,3).'/assets/sql/connection.php';

$pdo = setPDO('base');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmarSenha = $_POST['confirmarSenha'];


$sql = 'INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `status`) VALUES (NULL, :nome, :email, :senha, "A")';
$sql = $pdo->prepare($sql);
$sql->bindValue(':nome',$nome);
$sql->bindValue(':email',$email);
$sql->bindValue(':senha',hash('sha256',$senha));
$sql->execute();


header('location: http://localhost')


?>