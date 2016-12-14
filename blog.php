	<?php
//Conectamos a la base de datos
	require('conex.php');

//Evitamos que salgan errores por variables vacías
	error_reporting(E_ALL ^ E_NOTICE);

//Cantidad de resultados por página (debe ser INT, no string/varchar)
	$cantidad_resultados_por_pagina = 6;

//Comprueba si está seteado el GET de HTTP
	if (isset($_GET["pagina"])) {

	//Si el GET de HTTP SÍ es una string / cadena, procede
		if (is_string($_GET["pagina"])) {

		//Si la string es numérica, define la variable 'pagina'
			if (is_numeric($_GET["pagina"])) {

			 //Si la petición desde la paginación es la página uno
			 //en lugar de ir a 'index.php?pagina=1' se iría directamente a 'index.php'
				if ($_GET["pagina"] == 1) {
					header("Location: blog.php");
					die();
			 } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
			 	$pagina = $_GET["pagina"];
			 };

		 } else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
		 	header("Location: blog.php");
		 	die();
		 };
		};

} else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
	$pagina = 1;
};

//Define el número 0 para empezar a paginar multiplicado por la cantidad de resultados por página
$empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Blog</title>
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
<body>
	<!-- Nav -->
	<header>
		<nav class="red darken-3">
			<div class="nav-wrapper">
				<a href="index.php" class="brand-logo"><img src="img/logo.png" height="56px" style="margin-left: 20px"></a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="blog.php">Blog</a></li>
					<li><a href="nosotros.html">Sobre nosotros</a></li>
					<li><a href="ubicacion.html">Localización</a></li>
					<li><a href="contacto.html">Contacto</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="blog.php">Blog</a></li>
					<li><a href="nosotros.html">Sobre nosotros</a></li>
					<li><a href="ubicacion.html">Localización</a></li>
					<li><a href="contacto.html">Contacto</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<script type="text/javascript"> $(".button-collapse").sideNav();</script>
	<!-- Nav -->

	<main>
		<div class="row">
				<div class="container">
				<div class="col s12"><h4 class="grey-text" style="margin-left: 10px">Ultimas entradas:</h4></div>
				<?php
				include 'conex.php';
//Obtiene TODO de la tabla
				$obtener_todo_BD = "SELECT * FROM entrada";

//Realiza la consulta
				$consulta_todo = mysql_query($obtener_todo_BD);

//Cuenta el número total de registros
				$total_registros = mysql_num_rows($consulta_todo);

//Obtiene el total de páginas existentes
				$total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina); 

//Realiza la consulta en el orden de ID ascendente (cambiar "id" por, por ejemplo, "nombre" o "edad", alfabéticamente, etc.)
//Limitada por la cantidad de cantidad por página
				$consulta_resultados = mysql_query("SELECT * FROM entrada ORDER BY idEntrada DESC LIMIT $empezar_desde,$cantidad_resultados_por_pagina");

//Crea un bluce 'while' y define a la variable 'datos' ($datos) como clave del array
//que mostrará los resultados por nombre
				while($registro = mysql_fetch_array($consulta_resultados)) {

					?>

					<span>
						<p><strong><?php include 'formatoPrevio.php'; ?></strong> <br></p>
					</span>

					<?php
				};
				?>

				<hr>
				<ul class="pagination">
					<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
					<li class="disabled"><a href="blog.php">Más entradas</a></li>

					<?php
//Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
//Nota: X = $total_paginas
					for ($i=1; $i<=$total_paginas; $i++) {
	//En el bucle, muestra la paginación
						echo "<li class='active red darken-3'><a href='?pagina=".$i."'>".$i."</a></li> ";

					}; ?>
					<li class="waves-effect"><a href="#"><i class="material-icons">chevron_right</i></a></li>
				</ul>
			</div>
		</div>
	</main>

	<!--Footer -->
	<footer class="page-footer red darken-3">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Footer</h5>
					<p class="grey-text text-lighten-4"></p>
				</div>
				<div class="col l4 offset-l2 s12">
					<h5 class="white-text">Más...</h5>
					<ul>
						<li><a class="grey-text text-lighten-3" href="blog.php">Blog</a></li>
						<li><a class="grey-text text-lighten-3" href="nosotros.html">Sobre nosotros</a></li>
						<li><a class="grey-text text-lighten-3" href="ubicacion.html">Localización</a></li>
						<li><a class="grey-text text-lighten-3" href="contacto.html">Contacto</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				© 2017 - Dirección.
				<a class="grey-text text-lighten-4 right" href="panelEntradas.php">Ingresar</a>
			</div>
		</div>
	</footer>
	<!--Footer-->

</body>
</html>