


<?php
require dirname(__FILE__,2).'/assets/constants/dir.php';

if(session_status() === PHP_SESSION_NONE) session_start();



$_SESSION['hash'] = '';
$_SESSION['redirect'] = '';

require 'master.html';

require BASE.'/assets/scripts/popups.php';
showPopups();

?>




