<?php

defined("ROOTPATH") OR exit("Acces denied.");

define('BASE', dirname(__FILE__,2));

if ($_SERVER['SERVER_NAME'] == 'localhost')
{

    /* Database Config */
    define('DB_NAME', 'base');
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DRIVER', '');


    define('ROOT', 'http://localhost/promotendas/public/');
    
}else
{

    /* Database Config */
    define('DB_NAME', 'base');
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DRIVER', '');

    define('ROOT', 'http://www.dominio.com.br/');

}

define('DEBUG', true);




