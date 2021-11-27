<?php
defined('env') OR exit('Akses langsung ke Skrip ini diblokir');

$setDb['db_host']=' ';
$setDb['db_name']=' ';
$setDb['db_user']=' ';
$setDb['db_password']='';

//folder templates
$template='templates/xhtml/';

//folder Image
$img='img/';

//session
$_SESSION['prefix']='RS';

//URI
$setUri['base']='http://localhost/RS/';
$setUri['assets']='assets/';

// $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
?>