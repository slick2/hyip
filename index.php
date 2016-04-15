<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
//ini_set('display_startup_errors', 1);
//ini_set('display_errors', 1);
//error_reporting(-1);
//if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
//    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//    header('HTTP/1.1 301 Moved Permanently');
//    header('Location: ' . $redirect);
//}
if(isset($_COOKIE["_lang"])){
  $lang = $_COOKIE["_lang"];
  $lang = ($lang=='ru') ? 'russian' : $lang;
  $lang = ($lang=='en') ? 'english' : $lang;
  $lang = ($lang=='zh-hans') ? 'chinese' : $lang;
  $lang = ($lang=='vi') ? 'vietnamese' : $lang;
} else {
  $lang = 'russian';
}
session_start();
$_SESSION['lang']=$lang;
require_once 'include/connect.php';
require_once 'include/globals.php';
require_once 'include/kurs.php';
require_once 'application/bootstrap.php';
