<?php  
	$server = 'localhost';
	$user = 'root';
	$pass = 'n0m3l0';
	$db = 'blog';

	$con = mysql_connect($server, $user , $pass ) or die("No se ha podido establecer la conexion");
	$sdb = mysql_select_db($db, $con)or die("La base de datos no existe");
	

?>