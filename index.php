<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$starttime = microtime(true);
session_start();
include 'vendor/autoload.php';

$di = new DI();
$router = new Router($di);
$page = $router->controller->getTemplate();
$page->executiontime = (round((microtime(true) - $starttime) * 100000) / 100).' ms';
echo $page;