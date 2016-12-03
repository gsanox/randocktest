<?php

/* Config file with all defines and autoloader for classes */

// DB Configuration
// Modify as needed
define('_DBHOST_', 'localhost');
define('_DBUSR_', 'root');
define('_DBPWD_', 'root');
define('_DB_', 'randocktest');

// APP Configuration, we use app username and password defines, but should be improved for production purposes
// Modify as needed
define('_APPUSR_', 'admin');
define('_APPPWD_', '123456');

// Autoloader since PHP 5.3.0
spl_autoload_register(function ( $clase ) {
    include __DIR__ . '/../classes/' . strtolower($clase) . '.php';
});