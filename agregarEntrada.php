<!DOCTYPE html>
<html style="width: 100%; height: 100%;">
<head>
	<meta charset="utf-8">
	<title>Agregando entrada</title>
	<link rel="shortcut icon" type="image/png" href="favicon.png"/>
	<meta NAME="description" CONTENT="">
	<meta NAME="keywords" CONTENT=""/> 
	<meta NAME="copyright" CONTENT=""/> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<!--Icon-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="css/materialize.css"/>

	<!--JS-->
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
</head>
<body style="width: 100%; height: 100%;" class="valign-wrapper">

		
		<?php  
include 'conex.php';
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$categoria = $_POST["categoria"];
$contenido = $_POST["contenido"];

$nombre_imagen = $_FILES["imagen"]["name"];
$nombre_temporal = $_FILES["imagen"]["tmp_name"];
$tipo_archivo = $_FILES["imagen"]["type"];
$destino_imagen = "img/entradas/" . $nombre_imagen;

$descripcion = $descripcion . "...";

if ($tipo_archivo == "image/jpeg" || $tipo_archivo == "image/jpg" || $tipo_archivo == "image/png" || $tipo_archivo == "image/gif") {
	move_uploaded_file($nombre_temporal, $destino_imagen);
}
else
{
	header("Location: panelEntradas.php?imgError");
	exit();

}

$enviarEntrada = mysql_query("INSERT INTO entrada (idEntrada, autorEntrada, fechaEntrada, categoriaEntrada, tituloEntrada, imgEntrada, descripcionEntrada, contenidoEntrada) VALUES (NULL,'Admin', NOW() , '$categoria', '$titulo', '$nombre_imagen', '$descripcion', '$contenido')");

if (!isset($enviarEntrada)) {
	header("Location: panelEntradas.php?errorPost");
	exit();
}
else
{
				echo		"<main class='row valign'>";
				echo			"<div>";
				echo				"<div class='preloader-wrapper big active row valign'>";
				echo					"<div class='spinner-layer spinner-green-only'>";
				echo						"<div class='circle-clipper left'>";
				echo							"<div class='circle'></div>";
				echo								"</div><div class='gap-patch'>";
				echo									"<div class='circle'></div>";
				echo								"</div><div class='circle-clipper right'>";
				echo							"<div class='circle'></div>";
				echo						"</div>";
				echo					"</div>";
				echo				"</div>";
				echo 				"<p class='center green-text'>Creando entrada...</p>";
				echo			"</div>";
				echo		"</main>";
				header("refresh:2; url=panelEntradas.php?created");
}


?>


</body>
</html>