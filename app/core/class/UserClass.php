<?php

Class UserClass{

    private $data;

    public function validarLogin($login, $senha, $table = 'usuarios'){

        $sql = "SELECT id_usuario FROM $table WHERE email = '$login' AND senha = '$senha'";
        $sql = _PDO->prepare($sql);
        $sql->execute();
        
        if ($sql->RowCount()>0){
            $dados = $sql->fetch();

            $this->id = $dados['id_usuario'];

            return true;
            
        }else{
            return false;
        }
        
    }

    public function validarHash($sessionHash, $table = 'usuarios'){

        $id = $this->id;

        if(!isset($id)){
            return false;
        }else{
    
            $sql = 'SELECT email, senha, id_session FROM '.$table.' WHERE id_usuario = '.$id.';';
            $sql = _PDO->prepare($sql);
            $sql->execute();
    
            $dados = $sql->fetch();
    
            
            $login = addslashes($dados['email']);
            $senha = addslashes($dados['senha']);
            $id_session = $dados['id_session'];        
            
            $hash = hash('sha256',$login.$senha.$id_session);
    
            if($sessionHash == $hash){
                return true;
            }else{
                return false;
            }
    
    
        }
    
    }

}