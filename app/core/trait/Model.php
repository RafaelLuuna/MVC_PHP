<?php
defined("ROOTPATH") OR exit("Acces denied.");
Trait Model{
    
    use DataBase;

    protected $limit = 15;
    protected $offset = 0;

    public function find($search=[], $config=[]){
        $defaultConfig=[
            'columns'=>['*'],
            'operator'=>'=',
            'second_search'=>[],
            'second_operator'=>'=',
            'pagination'=>true,
        ];

        foreach($defaultConfig as $k=>$v){
            if(!isset($config[$k])){
                $config[$k]=$v;
            }
        }
        
        $query = "SELECT ";
        
        // Adiciona as colunas a serem retornadas
        $query .= concatParams($config['columns'],"value",", ", false);

        $query .= " FROM $this->table";

        if(!empty($search)){
            // Adiciona os dados de busca
            $query .= " WHERE ".concatParams($search,"key".$config['operator'].":key"," && ", false);
            
            // Adiciona quaisquer outros dados específicos de busca de acordo com o operador
            if(is_array($config['second_search']) && !empty($config['second_search'])){
                if(count($search)>0){
                    $query .= ' && ';
                }
                $query .= concatParams($config['second_search'],"key".$config['operator'].":key"," && ", false);
            }

        }


        if($config['pagination'] == true){$query .= " LIMIT $this->limit OFFSET $this->offset;";}

        
        $merged_data = array_merge($search,$config['second_search']);
        return $this->query($query,$merged_data);

    }
    
    public function insert($data, $no_dup=false){
        $query = "INSERT INTO $this->table";

        $query .= concatParams($data,"key"," , ", true);
        $query .= " VALUES ";
        $query .= concatParams($data, ":key", " , ", true).";";

        if($no_dup == false && $this->count($data)){
            echo '<br>Erro ao inserir dados: registro duplicado';
            return false;
        }

        $this->query($query, $data);
        return true;
        
    }
    
    public function update($id, $data){
        // prepara os parametros
        $query = "UPDATE $this->table SET ";

        $query .= concatParams($data,"key=:key"," , ", false);
        $query .= " WHERE id=:id;";

        if($this->count(['id'=>$id]) > 0){
            $data['id'] = $id;
            $this->query($query, $data);
            return true;
        }else{
            echo '<br>Erro ao atualizar dados: id não encontrado';
            return false;
        }
    }
    public function first($search=[], $config=[]){
        $data = $this->find($search, $config);
        if(!empty($data)){
            return $data[0];
        }else{
            return false;
        }
    }

    public function delete($id){
        // prepara os parametros
        $query = "DELETE FROM $this->table WHERE id=:id;";

        if(count($this->find(['id'=>$id])) > 0){
            $this->query($query, ['id'=>$id]);
            return true;
        }else{
            echo '<br>Erro ao atualizar dados: id não encontrado';
            return false;
        }
    }

    public function count($search=[], $config=[]){
        $data = $this->find($search, $config);
        if(!empty($data)){
            return $data[0];
        }else{
            return false;
        }

    }

    public function pages($search=[], $config=['columns'=>['*'], 'second_search'=>[], 'operator'=>'=', 'second_operator'=>'=']){
        return floor($this);
    }


}