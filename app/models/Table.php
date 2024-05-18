<?php
defined("ROOTPATH") OR exit("Acces denied.");
Class Table{
    
    use Model;

    protected $table = "";

    public function __construct($table){
        if(isset($_GET['page']) && is_numeric($_GET['page']) && intval($_GET['page']) > 0){
            $page = intval($_GET['page'])-1;
        }else{
            $page = 0;
        }

        $this->offset = $page*$this->limit;
        $this->table = $table;
    }

    public function tableData($data=[], $columns=['*'], $specific_data=[], $operator='='){
        return $this->find($data, $columns, $specific_data, $operator);
    }

}