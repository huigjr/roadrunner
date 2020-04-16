<?php
// MySQL Database Credentials
define('DB_HOST', 'localhost'); // Server Location
define('DB_NAME', 'cms_data' ); // Database Name
define('DB_USER', 'root'     ); // Username
define('DB_PASS', ''         ); // Password

// Define root constant from directory above this one (or replace with absolute path)
define('ROOT', dirname(__DIR__));

// Define template
define('TEMPLATE', 'default');

// Define log file for Exception Handling
define('LOG_FILE', ROOT.'/log.txt');
?>