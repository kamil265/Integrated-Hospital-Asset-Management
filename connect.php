<?php

// $db = "hms";
// $user = "root";  
// $pass = "";
// $host = "localhost"; 

// $connect = mysqli_connect($host,$user,$pass);
// mysqli_select_db($connect, $db);

// if($connect){
// 	echo ' '; 
// }
// else{
// 	echo'error connection';
// }
	// DB credentials.
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_NAME','hms_new');
// Establish database connection.
	try
	{
		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	}
	catch (PDOException $e)
	{
		exit("Error: " . $e->getMessage());
	}
?>