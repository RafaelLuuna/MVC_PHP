<?php

trait DataBase
{
    private function connect()
    {
        try
        {
            $string = "mysql:dbname=".DB_NAME."; hostname=".DB_HOST;
            $con = new PDO($string , DB_USER, DB_PASSWORD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $con;
        
        }catch(PDOException $e)
        {
            echo "ERRO: ". $e->GetMessage();
            exit;
        }

    }

    public function query($query)
    {
        $con = $this->connect();

        $stm = $con->prepare($query);
        $response = $stm->execute();

        if($response == true)
        {
            $data = $response->fetchAll(PDO::FETCH_OBJ);
            if(is_array($data) && count($data) > 0)
            {
                return $data;
            }
        }

        return false;
        

    }

    public function getFirstRow($query)
    {
        $con = $this->connect();

        $stm = $con->prepare($query);
        $response = $stm->execute();

        if($response == true)
        {
            $data = $response->fetchAll(PDO::FETCH_OBJ);
            if(is_array($data) && count($data) > 0)
            {
                return $data;
            }
        }

        return false;
    }



}



