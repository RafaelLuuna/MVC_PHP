<?php

trait DataBase
{
    private function connect()
    {
        try
        {
            $string = "mysql:dbname=".DB_NAME."; hostname=".DB_HOST;
            $connection = new PDO($string , DB_USER, DB_PASSWORD);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $connection;
        
        }catch(PDOException $e)
        {
            echo "ERRO: ". $e->GetMessage();
            exit;
        }

    }

    public function query($query, $data=[])
    {
        $connection = $this->connect();

        $stm = $connection->prepare($query);

        
        foreach($data as $key => $value){
            
            if(substr($key,0,1) != ":"){$key = ":". $key;}
            $stm->bindValue($key, $value);  

        }
        
        
        $check = $stm->execute();
        
        if($check)
        {
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($data))
            {
                return $data;
            }
        }

        return false;
        

    }

    public function getFirstRow($query)
    {
        $connection = $this->connect();

        $query = $connection->prepare($query);
        $check = $query->execute();

        if($check == true)
        {
            $data = $query->fetchAll(PDO::FETCH_OBJ);
            if(is_array($data) && count($data) > 0)
            {
                return $data;
            }
        }

        return false;
    }



}



