<?php
defined("ROOTPATH") OR exit("Acces denied.");
class Controller
{
    public static function loadTable($table, $columns, $altColumName=[]){
        $table = new Table($table);
        $data = $table->tableData([],$columns);
        $tableElement = '';
        $tableElement .= '<table>';
            $tableElement .= '<thead>';
                $tableElement .= '<tr>';
                    foreach($columns as $key=>$column){
                        if(empty($columnName)){
                            $tableElement .= '<th>'.$column.'</th>';
                            
                        }else{
                            $tableElement .= '<th>'.$altColumName[$key].'</th>';
                            
                        }
                    }
                $tableElement .= '</tr>';
            $tableElement .= '</thead>';
            $tableElement .= '<tbody>';
                foreach($data as $row){
                    $tableElement .= '<tr>';
                    foreach($row as $value){
                        $tableElement .= '<td>'.$value.'</td>';
                    }
                    $tableElement .= '</tr>';
                }
            $tableElement .= '</tbody>';
                    
        $tableElement .= '</table>';

        echo $tableElement;
    }


    public function view($name){
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


        $popup = $_COOKIE['popup'];
        $popupElements = explode('|',$popup);
        foreach($popupElements as $popupElement){
            [$key, $value] = explode(':',$popupElement);
            $popupElements[$key] = $value;
        }

        if(isset($popupElements['title'])){
            $_POST['popup-title'] = $popupElements['title'];
        }
        if(isset($popupElements['content'])){
            $_POST['popup-content'] = $popupElements['content'];
        }



        if(isset($popupElements['img-path'])){
            $_POST['popup-img-path'] = ROOT.$popupElements['img-path'];
            $_POST['popup-img-style'] = '';
        }else{
            $_POST['popup-img-style'] = 'display:none;';
        }

        if(isset($popupElements['buttons'])){
            $_POST['popup-buttons'] = $popupElements['buttons'];
            $_POST['popup-button-style'] = '';
        }else{
            $_POST['popup-button-style'] = 'display:none;';
        }
        
        setcookie('popup', '', ['expires'=>time()+1, 'path'=>'/']);
        
        $this->view('popup');

    }

    public function blocker($default='login'){
        $user = new User;
        $check = $user->validateLogin(Session::get('userData'));

        if($check == false || session_status() == PHP_SESSION_NONE){
            redirect($default);
        }
    }
}