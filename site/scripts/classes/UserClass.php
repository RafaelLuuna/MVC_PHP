<?php

Class UserClass{

    public function login($login, $senha){
        global $pdo;

        $sql = "SELECT * FROM usuarios WHERE email = :login AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":login", $login);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();

        if ($sql->RowCount()>0){
            $dados = $sql->fetch();
            
            $_SESSION['id_user'] = $dados['id_usuario'];
            
            return true;
        }else{
            return false;
        }
    }

}


?>