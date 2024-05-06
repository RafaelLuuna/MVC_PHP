<?php

define('ROOTPATH', __DIR__ .DIRECTORY_SEPARATOR);

$minPhpVersion = '8.0';
if (version_compare(phpversion() , $minPhpVersion, '<')){
    die("The version of php has to be at least $minPhpVersion; Your current version is ". PHP_VERSION);
}

require_once 'config.php';
require_once 'functions.php';

require_once BASE.'/core/trait/Database.php';
require_once BASE.'/core/trait/Model.php';

require_once BASE.'/core/class/Session.php';
require_once BASE.'/core/class/Controller.php';

require_once BASE.'/models/User.php';


require_once BASE.'/core/class/App.php';
