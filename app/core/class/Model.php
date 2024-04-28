<?php

Trait Model
{
    use DataBase;

    protected $table = "usuarios";
    protected $limit = 15;
    protected $offset = 0;

    
    private function groupParams($data, $format=":key", $delimiter=" , ", $parentheses=false){
        // Descrição:
        // Essa função retorna uma string que concatena todos os campos de dados separados por um delimitador. Também é possível colocá-los entre parênteses.

        // Exemplo com o formato padrão:
        // ":key1 , :key2 , :key3 , ...";

        // Exemplo com as seguintes condições ($format="key=:key", $delimiter=" AND ", $parentheses=true):
        // "(key1=:key1 AND key2=:key2 AND key3=:key3 AND ...)";


        $str = '';
        $dataKeys = array_keys($data);

        foreach($dataKeys as $key){
            $formatKeys = str_replace("key", $key, $format);
            $str .= $delimiter.$formatKeys;
        }

        $str = substr($str,mb_strlen($delimiter));

        if($parentheses){
            $str = "(".$str.")";
        }

        return $str;

    }

    public function find($data, $specific_data=[], $operator='='){
        // prepara os parametros
        $query = "SELECT * FROM $this->table WHERE ";
        $query .= $this->groupParams($data,"key=:key"," && ", false);


        if(is_array($specific_data) && !empty($specific_data)){
            if(count($data)>0){
                $query .= ' && ';
            }
            // caso precise de uma operação específica, essa parte da função utiliza o $operator para determinar se quer usar >=, <=, !=, etc..
            $query .= $this->groupParams($specific_data,"key".$operator.":key"," && ", false);;
        }
        $query .= " LIMIT $this->limit OFFSET $this->offset;";

        
        // executa a query
        $merged_data = array_merge($data,$specific_data);
        return $this->query($query,$merged_data);

    }
    
    public function insert($data, $no_dup=true){
        // prepara os parametros
        $query = "INSERT INTO $this->table";

        $query .= $this->groupParams($data,"key"," , ", true);
        $query .= " VALUES ";
        $query .= $this->groupParams($data, ":key", " , ", true).";";

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

        $query .= $this->groupParams($data,"key=:key"," , ", false);
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
        $result = $this->find($data, $specific_data, $operator)[0];
        return $result;
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