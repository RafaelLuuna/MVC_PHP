<?php
header('Content-type: application/json');
$input = file_get_contents('php://input');
$input = json_decode($input, true);

require dirname(__FILE__,4).'/assets/constants/dir.php';
require BASE.'/assets/classes/UserClass.php';
require BASE.'/assets/sql/connection.php';

$sql = 'SELECT id_usuario, nome, email, status, dt_cadastro FROM usuarios';

if(isset($input['conditions']) && gettype($input['conditions']) == 'string'){
    $sql .= ' WHERE '.$input['conditions'];
}
$sql .= ';';

$sql = _PDO->prepare($sql);
$sql->execute();

$data = json_encode($sql->fetchAll(PDO::FETCH_ASSOC));


echo $data;


?>