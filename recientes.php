<?php 
include 'conex.php';
$id = $_GET["id"];
  $consulta =  mysql_query("SELECT * FROM entrada WHERE idEntrada !='$id' ORDER BY idEntrada DESC LIMIT 3");
	while ($registro = mysql_fetch_array($consulta)) {

	echo	"<div class='card horizontal hoverable'>";
	echo		"<div class='card-image'>";
	echo			"<img src='img/entradas/". $registro["imgEntrada"] . "'>";
	echo		"</div>";
	echo		"<div class='card-stacked'>";
	echo			"<div class='card-content'>";
	echo				"<p>" . $registro["descripcionEntrada"] . "...</p>";
	echo			"</div>";
	echo			"<div class='card-action'>";
	echo				"<a href='entrada.php?id=" . $registro["idEntrada"] . "' class='red-text'>Leer más...</a>";
	echo			"</div>";
	echo		"</div>";
	echo	"</div>";
	}

 ?>