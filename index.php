<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bienvenido</title>
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

	<!-- FB ROOT -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=1685336578382700";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>


</head>
<body>


	<!-- Nav -->
	<header>
		<nav class="red darken-3">
			<div class="nav-wrapper">
				<a href="index.php" class="brand-logo"><img src="img/logo.png" height="56px" style="margin-left: 20px"></a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="#">Blog</a></li>
					<li><a href="nosotros.html">Sobre nosotros</a></li>
					<li><a href="ubicacion.html">Localización</a></li>
					<li><a href="contacto.html">Contacto</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="#">Blog</a></li>
					<li><a href="nosotros.html">Sobre nosotros</a></li>
					<li><a href="ubicacion.html">Localización</a></li>
					<li><a href="contacto.html">Contacto</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<script type="text/javascript"> $(".button-collapse").sideNav();</script>
	<!-- Nav -->

	<!-- Slider -->
	<div class="slider">
		<ul class="slides">

			<?php

				include 'recuperarSlide.php';

			  ?>

		</ul>
	</div>
	<script type="text/javascript"> $(document).ready(function(){ $('.slider').slider({full_width: true});});</script>
	<!-- Slider -->

	<!--Contenido-->
	<main>
		<div class="row">
			<div class="col s12"><h4 class="grey-text" style="margin-left: 10px">Ultimas entradas:</h4></div>

			<div class="col s12 m12 l8" id="entradas">
				<?php 

					include 'recuperarEntradas.php'
				?>
			</div>
			<div class="col s12 m12 l4">
				<h5 class="grey-text">Nosotros en Facebook:</h5>

				<div class="fb-page" data-href="https://www.facebook.com/theloremipsumstore/" data-tabs="timeline" data-height="600" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/theloremipsumstore/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/theloremipsumstore/">Lorem</a></blockquote></div>
			</div>
		</div>
	</main>
	<!--Contenido-->

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
				<a class="grey-text text-lighten-4 right" href="panelEntradas.php">Ingresa</a>
			</div>
		</div>
	</footer>
	<!--Footer-->
</body>
</html>