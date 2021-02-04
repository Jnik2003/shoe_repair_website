<?php

// Запись в БД о спаме и ip адрес спамера
//var_dump ($_POST['spam']);
$ip = $_SERVER['REMOTE_ADDR'];
if(!isset($ip)){
	$ip = "spam";
}

define('SERVER', 'localhost');
define('USER', 'root');
define('PASSWORD', 'root');
define('DB', 'gutalinas');
 $conn = mysqli_connect(SERVER, USER, PASSWORD, DB);
 $query = "INSERT INTO `spam`(`ip`) VALUES ('".$ip."')";
 mysqli_query($conn, $query);

?>