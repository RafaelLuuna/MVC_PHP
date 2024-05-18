<?php
defined("ROOTPATH") OR exit("Acces denied.");
Trait Model{
    
    use DataBase;

    protected $limit = 15;

    public function setLimit($limit){
        if(is_numeric($limit)){
            $this->limit = $limit;
        }
    }
    public function find($search=[], $config=[]){
        $defaultConfig=[
            'columns'=>['*'],
            'operator'=>'=',
            'second_search'=>[],
            'second_operator'=>'=',
            'pagination'=>true,
            'page'=>1
        ];
        
        foreach($defaultConfig as $k=>$v){
            if(!isset($config[$k])){
                $config[$k]=$v;
            }
        }

        if(!is_numeric($config['page']) || $config['page'] <= 0){
            $config['page'] = 1;
        }
        
        $query = "SELECT ";
        
        // Adiciona as colunas que vão ser retornadas
        $query .= concatParams($config['columns'],"value",", ", false);

        $query .= " FROM $this->table";

        // Adiciona os dados de busca
        if(!empty($search)){
            $query .= " WHERE ".concatParams($search,"key".$config['operator'].":key"," && ", false);
            
            // Adiciona os dados da segunda busca
            if(is_array($config['second_search']) && !empty($config['second_search'])){
                if(count($search)>0){
                    $query .= ' && ';
                }
                $query .= concatParams($config['second_search'],"key".$config['second_operator'].":key2"," && ", false);

                // Adiciona o número 2 na chave da segunda busca para não conflitar com a primeira
                foreach($config['second_search'] as $k=>$v){
                    $k .= '2';
                    $newArr[$k] = $v;
                }
                $config['second_search'] = $newArr;
            }

        }

        
        if($config['pagination'] == true){
            $offset = $this->limit*($config['page']-1);
            $query .= " LIMIT $this->limit OFFSET $offset;";
        }

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
        isset($config['pagination']) or $config['pagination'] = false;

        $data = $this->find($search, $config);
        
        if(!empty($data)){
            return count($data);
        }else{
            return 0;
        }

    }

    public function pageCount($search=[], $config=[]){
        return ceil($this->count($search, $config) / $this->limit);
    }

    public function columns(){
        $query = "SHOW COLUMNS FROM $this->table";
        $columns = $this->query($query);
        return $columns;
    }
}