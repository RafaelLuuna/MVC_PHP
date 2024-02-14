<?php

function validarUsuario($table = 'usuarios'){

    

    if(!isset($_SESSION['id_usuario'])){
        return false;
    }else{

        $pdo = setPDO('base');

        $sql = 'SELECT email, senha, id_session FROM '.$table.' WHERE id_usuario = '.$_SESSION['id_usuario'].';';
        $sql = $pdo->prepare($sql);
        $sql->execute();

        $dados = $sql->fetch();

        
        $login = addslashes($dados['email']);
        $senha = addslashes($dados['senha']);
        $id_session = $dados['id_session'];        
        
        $hash = hash('sha256',$login.$senha.$id_session);

        if($_SESSION['hash'] == $hash){
            return true;
        }else{
            return false;
        }


    }

}

?>