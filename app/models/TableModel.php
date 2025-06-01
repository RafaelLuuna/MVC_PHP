<?php
defined("ROOTPATH") OR exit("Acces denied.");
Class Table{
    
    use Model;

    protected $table = "";

    public function __construct($table){
        $this->table = $table;
    }

    public static function currentPage(){
        if(isset($_GET['page']) && is_numeric($_GET['page']) && intval($_GET['page']) > 0){
            $page = intval($_GET['page']);
        }else{
            $page = 1;
        }
        return $page;
    }

    public function tableData($search=[], $config=[]){
        $config['page'] = $this->currentPage();
        return $this->find($search, $config);
    }

}