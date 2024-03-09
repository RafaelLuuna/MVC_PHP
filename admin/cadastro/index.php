


<?php

if(!defined('BASE')){
    header('location: http://localhost/admin/');
}
blocker('http://localhost/admin/login', 'admin_users');

require 'master.php';
require BASE.'/assets/views/headerAdmin.php';

?>




