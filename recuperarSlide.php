<?php 

	include 'conex.php';
	$consulta = mysql_query('SELECT * FROM slide');

	while ($registroSlide = mysql_fetch_array($consulta)) {

		include 'formatoSlide.php';		
	}

 ?>