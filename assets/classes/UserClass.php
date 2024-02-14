<?php

Class UserClass{

    public function validarLogin($login, $senha, $table = 'usuarios'){
        $pdo = setPDO('base');

        $sql = "SELECT id_usuario FROM $table WHERE email = '$login' AND senha = '$senha'";
        $sql = $pdo->prepare($sql);
        $sql->execute();
        
        if ($sql->RowCount()>0){
            $dados = $sql->fetch();
            return [true, $dados['id_usuario']];
            
        }else{
            return [false,0];
        }
        
    }

}

?>