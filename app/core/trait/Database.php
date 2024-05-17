<?php
defined("ROOTPATH") OR exit("Acces denied.");
trait DataBase{

    protected $dbName = DB_NAME;
    private function connect(){
        try
        {
            $string = "mysql:dbname=". $this->dbName ."; hostname=".DB_HOST;
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
            $data = $stm->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($data))
            {
                return $data;
            }
        }

        return false;
        

    }




}



