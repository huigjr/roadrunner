<?php
session_start();
include '../config/config.php';
//$seconds_to_cache = 1209600; // = 2 weeks (for google pagespeed)
$seconds_to_cache = 10;
$ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
$template = isset($_GET['admin']) ? 'admin' : TEMPLATE;
header("Expires: $ts");
header("Content-type: text/css");
include("../views/".$template."/css/style.css");
?>