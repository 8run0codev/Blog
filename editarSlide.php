<!DOCTYPE html>
<html style="width: 100%; height: 100%;">
<head>
	<meta charset="utf-8">
	<title>Editando slide</title>
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
	//Varaibles
	include 'conex.php';
	$idSlide = $_POST["idSlide"];
	$tituloSlide = $_POST["titulo1"];
	$slogan = $_POST["slogan1"];
	$nombre_imagenSlide = $_FILES["imgslide"]["name"];
	$nombre_temporal = $_FILES["imgslide"]["tmp_name"];
	$tipo_archivo = $_FILES["imgslide"]["type"];
	$destino_imagen = "img/slides/" . $nombre_imagenSlide;


	//comprobar que es una imagen
	if ($tipo_archivo == "image/jpeg" || $tipo_archivo == "image/jpg" || $tipo_archivo == "image/png" || $tipo_archivo == "image/gif" || $tipo_archivo == "image/PNG") {	
		//subir nueva imagen	
		move_uploaded_file($nombre_temporal, $destino_imagen);

		//borrar imagen anterior		
		$sql =  "SELECT imagen FROM slide WHERE idSlide = $idSlide";
		$res = mysql_query($sql) or die('Error: ' . mysql_error());
		$ruta = "img/slides/" . mysql_result($res, 0);
		unlink($ruta);

        //Ingresamos nuevos datos
		$enviarSlide = mysql_query("UPDATE slide SET imagen = '$nombre_imagenSlide', titulo='$tituloSlide', slogan = '$slogan' WHERE idSlide = '$idSlide' ");
		//Mensaje de edicion 

		echo		"<main class='row valign'>";
		echo			"<div>";
		echo				"<div class='preloader-wrapper big active row valign'>";
		echo					"<div class='spinner-layer spinner-blue-only'>";
		echo						"<div class='circle-clipper left'>";
		echo							"<div class='circle'></div>";
		echo								"</div><div class='gap-patch'>";
		echo									"<div class='circle'></div>";
		echo								"</div><div class='circle-clipper right'>";
		echo							"<div class='circle'></div>";
		echo						"</div>";
		echo					"</div>";
		echo				"</div>";
		echo 				"<p class='center blue-text'>Editando...</p>";
		echo			"</div>";
		echo		"</main>";

	}
	else
	{
		header("Location: panelEntradas.php?imgError");
		exit();
	}	

	if (!isset($enviarSlide)) {
		
		echo		"<main class='row valign'>";
		echo			"<div>";
		echo				"<div class='preloader-wrapper big active row valign'>";
		echo					"<div class='spinner-layer spinner-blue-only'>";
		echo						"<div class='circle-clipper left'>";
		echo							"<div class='circle'></div>";
		echo								"</div><div class='gap-patch'>";
		echo									"<div class='circle'></div>";
		echo								"</div><div class='circle-clipper right'>";
		echo							"<div class='circle'></div>";
		echo						"</div>";
		echo					"</div>";
		echo				"</div>";
		echo 				"<p class='center red-text'>Error al editar, vuelve a intentar</p>";
		echo			"</div>";
		echo		"</main>";
		exit();
	}
	else
	{
		

		header("refresh:2; url=panelEntradas.php?slideEdited");
	}

	?>



</body>
</html>


