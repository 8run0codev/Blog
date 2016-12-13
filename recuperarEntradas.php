<?php 
	include 'conex.php';
	$consulta = mysql_query('SELECT * FROM entrada ORDER BY idEntrada DESC LIMIT 8');

	while ($registro = mysql_fetch_array($consulta)) {

		include 'formatoPrevio.php';		
	}

 ?>
