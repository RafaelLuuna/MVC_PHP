<?php
defined("ROOTPATH") OR exit("Acces denied.");
Class User{
    
    use Model;

    public function validateLogin($data){
        if(empty($data["email"]) || empty($data["senha"])){
            return false;
        }
        $searchUser = $this->first(['email'=>$data['email']]);
        $data['senha'] = hash('sha256', $data['senha']);
        if($searchUser == false || $data['senha'] != $searchUser['senha']){
            return false;
        }else{
            $sessionId = rand(0, 9999);
            $id = $this->first(['email'=> $data['email'],'senha'=> $searchUser['senha']])['id'];
            $this->update($id, ['id_session'=>$sessionId]);
            
            $_SESSION['email'] = $data['email'];
            $_SESSION['senha'] = $data['senha'];
            $_SESSION['hash'] = hash('sha256',$data['email'].$data['senha'].$sessionId);

            return true;
        }
    }

    public function validateHash(){
        if(empty($_SESSION["email"]) || empty($_SESSION["senha"]) || empty($_SESSION["hash"])){
            return false;
        }

        $userData = $this->first(["email"=>$_SESSION["email"],"senha"=>$_SESSION["senha"]]);
        if($userData == false){
            return false;
        }else{
            $trueHash = hash('sha256',$userData['email'].$userData['senha'].$userData['id_session']);
            if($_SESSION['hash'] == $trueHash){
                return true;
            }else{
                return false;
            }
        }
    }
}