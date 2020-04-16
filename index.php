<?php
// PHP configuration settings
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Measure execution time
$starttime = microtime(true);

// Enable session variables
session_start();

// Include configuration settings
include 'vendor/autoload.php';

echo $_GET['path'] ?? '';

$router = new Router();
var_dump($router->path);

echo '<br>';
echo (round((microtime(true) - $starttime) * 100000) / 100).' ms';