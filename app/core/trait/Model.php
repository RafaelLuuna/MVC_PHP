<?php
defined("ROOTPATH") OR exit("Acces denied.");
Trait Model{
    
    use DataBase;

    protected $table = "usuarios";
    protected $limit = 15;
    protected $offset = 0;

    public function find($data, $specific_data=[], $operator='='){
        $query = "SELECT * FROM $this->table WHERE ";
        $query .= concatParams($data,"key=:key"," && ", false);


        if(is_array($specific_data) && !empty($specific_data)){
            if(count($data)>0){
                $query .= ' && ';
            }
            $query .= concatParams($specific_data,"key".$operator.":key"," && ", false);
        }
        $query .= " LIMIT $this->limit OFFSET $this->offset;";

        
        // executa a query
        $merged_data = array_merge($data,$specific_data);
        return $this->query($query,$merged_data);

    }
    
    public function insert($data, $no_dup=true){
        $query = "INSERT INTO $this->table";

        $query .= concatParams($data,"key"," , ", true);
        $query .= " VALUES ";
        $query .= concatParams($data, ":key", " , ", true).";";

        // executa a query
        if(count($this->find($data)) == 0 || $no_dup == false){
            $this->query($query, $data);
            return true;
        }else{
            echo '<br>Erro ao inserir dados: registro duplicado';
            return false;
        }
        
    }
    
    public function update($id, $data){
        // prepara os parametros
        $query = "UPDATE $this->table SET ";

        $query .= concatParams($data,"key=:key"," , ", false);
        $query .= " WHERE id=:id;";

        // executa a query
        if(count($this->find(['id'=>$id])) > 0){
            $data['id'] = $id;
            $this->query($query, $data);
            return true;
        }else{
            echo '<br>Erro ao atualizar dados: id não encontrado';
            return false;
        }
    }
    public function first($data, $specific_data=[], $operator='='){
        $result = $this->find($data, $specific_data, $operator);
        if(!empty($result)){
            return $result[0];
        }else{
            return false;
        }
    }

    public function delete($id){
        // prepara os parametros
        $query = "DELETE FROM $this->table WHERE id=:id;";

        // executa a query
        if(count($this->find(['id'=>$id])) > 0){
            $this->query($query, ['id'=>$id]);
            return true;
        }else{
            echo '<br>Erro ao atualizar dados: id não encontrado';
            return false;
        }
    }


}