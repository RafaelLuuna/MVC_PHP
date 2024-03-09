<?php

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    require dirname(__FILE__,3).'/assets/constants/dir.php';
    require BASE.'/assets/sql/connection.php';
    require BASE.'/assets/classes/UserClass.php';
    $user = new UserClass();
    
    $login = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $senha = hash('sha256',$senha);
    $id_session = 0;
    $hash = 0;
    
    $v = $user->validarLogin($login, $senha);
    
    
    
    if($v == true){
        session_start();
        $id_session = rand(0,9999);
        
        $hash = hash('sha256',$login.$senha.$id_session);
        
        $_SESSION['id_usuario'] = $user->id;
        $_SESSION['id_session'] = $id_session;
        $_SESSION['hash'] = $hash;
        
        
        // ATUALIZA O ID DA SESSÃO ATUAL DIRETAMENTE NO BANCO DE DADOS
        $sql = "UPDATE usuarios SET id_session=:id_session WHERE id_usuario = :id_usuario";
        $sql = _PDO->prepare($sql);
        $sql->bindValue(':id_session',$id_session);
        $sql->bindValue(':id_usuario',$_SESSION['id_usuario']);
        $sql->execute();

    }else{
        require BASE.'/assets/scripts/popups.php';
        setPopupCookie('usuário ou senha inválidos.','red');
        
    }
    
}


header('location: http://localhost/');

?>
