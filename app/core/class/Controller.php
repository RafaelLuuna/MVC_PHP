<?php
defined("ROOTPATH") OR exit("Acces denied.");
class Controller
{
    public static function loadTable($tableName, $columns, $config=[]){

        $defaultConfig=[
            'altColumName'=>[],
            'querySearch'=>[],
            'queryConfig'=>[]
        ];

        foreach($defaultConfig as $k=>$v){
            if(!isset($config[$k])){
                $config[$k]=$v;
            }
        }
        
        empty($columns) or $config['queryConfig']['columns'] = $columns;
        
        $table = new Table($tableName);
        $tableData = $table->tableData($config['querySearch'],$config['queryConfig']);
        $pageCount = $table->pageCount($config['querySearch'],$config['queryConfig']);


        $_POST['config']=$config;
        $_POST['columns']=$columns;
        $_POST['tableData']=$tableData;
        $_POST['pageCount']=$pageCount;
        
        Controller::view('table');
    }


    public static function view($name){
        $filename = "../app/views/".$name.".view.php";

        if(!file_exists($filename))
        {
            $filename = '../app/views/_404.view.php';
        }

        require_once $filename;
    }
    public function showPopup(){
        if(!isset($_COOKIE['popup'])){
            return false;
        }
        $this->view('popup');
        setcookie('popup', '', ['expires'=>time()+1, 'path'=>'/']);
        

    }

    public function blocker($default='login'){
        $user = new User;
        $check = $user->validateLogin(Session::get('userData'));

        if($check == false || session_status() == PHP_SESSION_NONE){
            redirect($default);
        }
    }
}