<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/png" href="favicon.png"/>
	<title>Nueva entrada</title>
	<meta NAME="description" CONTENT="">
	<meta NAME="keywords" CONTENT=""/> 
	<meta NAME="copyright" CONTENT=""/> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<!--Icon-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

	<!--JS-->
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script src="dist/sweetalert-dev.js"></script>
	

	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.css"/>
	<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

	<!-- Editor -->
	<script type="text/javascript" src="tinymce/tinymce.min.js"></script>

	<script type="text/javascript">
		tinymce.init({
			selector: '#contenido',
			height: 500,
			theme: 'modern',
			plugins: [
			'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			'searchreplace wordcount visualblocks visualchars code fullscreen',
			'insertdatetime media nonbreaking save table contextmenu directionality',
			'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
			],
			toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
			toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
			image_advtab: true,
			templates: [
			{ title: 'Test template 1', content: 'Test 1' },
			{ title: 'Test template 2', content: 'Test 2' }
			],
			content_css: [
			'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
			'//www.tinymce.com/css/codepen.min.css'
			]
		});
	</script>
	<style type="text/css">
		.row .col {
			float: left;
			box-sizing: border-box;
			padding: 0;
			min-height: 1px;
		}
	</style>
</head>
<body class="row">

	<!-- Nav -->
	<header>
		<nav class="blue-grey lighten-1">
			<div class="nav-wrapper">
				<a href="index.php" class="brand-logo"><img src="img/logo.png" height="56px" style="margin-left: 20px"></a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="#">Ver entradas</a></li>
					<li><a href="#">Usuario</a></li>
					<li><a href="#">Cerrar sesión</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="#">Ver entradas</a></li>
					<li><a href="#">Usuario</a></li>
					<li><a href="#">Cerrar sesión</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<script type="text/javascript"> $(".button-collapse").sideNav();</script>
	<!-- Nav -->

	<!-- confirmacion de entrada creada -->	
	<?php 
	if (isset($_GET["created"])) {
		echo "<script type='text/javascript'>swal({
			title: '¡Entrada publicada!',
			text: 'Buen trabajo',
			type: 'success',
			confirmButtonText: 'Confirmar'
		});</script>";
	}

	?>
	<!-- confirmacion de entrada creada -->

	<!-- confirmacion de slide editado -->	
	<?php 
	if (isset($_GET["slideEdited"])) {
		echo "<script type='text/javascript'>swal({
			title: '¡Slide editado!',
			text: 'Buen trabajo',
			type: 'success',
			confirmButtonText: 'Confirmar'
		});</script>";
	}

	?>
	<!-- confirmacion de slide editado -->

	<!-- Erro imagen -->	
	<?php 
	if (isset($_GET["imgError"])) {
		echo "<script type='text/javascript'>swal({
			title: '¡Formato no soportado o archivo muy grande!',
			text: 'Intenta con otra imagen',
			type: 'error',
			confirmButtonText: 'Confirmar'
		});</script>";
	}

	?>
	<!-- Erro imagen -->

		<!-- Erro imagen -->	
	<?php 
	if (isset($_GET["errorPost"])) {
		echo "<script type='text/javascript'>swal({
			title: '¡Entrada no creada!',
			text: 'Intenta de nuevo',
			type: 'error',
			confirmButtonText: 'Confirmar'
		});</script>";
	}

	?>
	<!-- Error imagen -->
	
	<!-- editor -->
	<div id="editor" class="col s12 m12 l12">
		<form onsubmit="return validarEntrada()" action="agregarEntrada.php" method="POST" name="entradas" enctype="multipart/form-data" >

			<div class="col s12 blue-grey lighten-5">		
				<div class="col s0 m1 l1"></div>
				<div class="col s12 m7 l7">	
					<h5 class="black-text">Titulo de la entrada</h5>	
					<input type="text" name="titulo" id="titulo" placeholder="Titulo de la entrada" maxlength="80">
				</div>
				<div class="col s12 m4 l4 center">
					<br>
					<input type="submit" value="Publicar entrada" class="btn waves-effect waves-light  green darken-1 hoverable">
					<br>
				</div>
			</div>
			

			<div class="col s12  blue-grey lighten-5 ">
				<div class="col s0 m1 l1">
					
				</div>
				<div class="col s12 m7 l7">		
					<textarea name="contenido" id="contenido" placeholder="Escribe tu entrada completa" ></textarea>
				</div>

				<div class="col s12 m4 l4">
					<div class="container">
						<div class="input-field col s12 m12 l12">
							<select name="categoria" id="categoria">
								<option value="" disabled selected>Seleciona alguna categoria</option>
								<option value="Comunicado">Comunicados</option>
								<option value="Evento">Eventos</option>
								<option value="Noticias">Noticias</option>
							</select>
							<label>Categoria</label>
						</div> 
						<script>$(document).ready(function() {$('select').material_select(); }); </script>

						<div class="file-field input-field col s12 m12 l12">
							<div class="btn light-blue accent-4">
								<span>Subir imagen</span>
								<input type="file" name="imagen">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>

						<div class="input-field col s12">
							<textarea id="descripcion" name="descripcion" maxlength="150" class="materialize-textarea"></textarea>
							<label for="textarea1">Descripción de tu entrada</label>
						</div>

					</div>
				</div>	

			</div>	

		</form>
	</div>
	<!-- editor -->

	<!--Editar slide -->
	<div class="row">
		<div class="container">

			<div class="col s12"><br><h5 class="grey-text">Editar Slider</h5><br></div>

			<!--Slide 1 -->
			<form onsubmit="return validarSlide()" action="editarSlide.php" method="POST" enctype="multipart/form-data">
				<div class="col s12 panelSlider">
					<div class="input-field col s12 m12 l12">
						<select name="idSlide" id="idSlide">
							<option value="" disabled selected>Slide a editar</option>
							<option value="1">Slide 1</option>
							<option value="2">Slide 2</option>
							<option value="3">Slide 3</option>
						</select>
						<label>Slide a editar</label>
					</div> 
					<div class="col s6">
						<h5 class="black-text">Titulo Slide</h5>	
						<input type="text" name="titulo1" id="titulo1" placeholder="Titulo Slide" maxlength="80" class="col s11">
					</div>

					<div class="col s6">
						<h5 class="black-text">Subtitulo slide</h5>	
						<input type="text" name="slogan1" id="slogan1" placeholder="Slogan" maxlength="80" class="col s11">
					</div>

					<div class="file-field input-field col s11 m11 l11">
						<div class="btn indigo">
							<span>Imagen slide</span>
							<input type="file" name="imgslide">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>

					<input type="submit" class="btn waves-effect waves-light  green darken-1 hoverable right" value="Editar"><p></p>
				</div>
			</form>
			<div class="divider"></div>
			<br><br>
			<!--Slide 1 -->

			<div class="col s12" style="height: 30px"></div>

		</div>
	</div>
	<!--Editar slide -->

	<!-- Validaciones -->
	<script type="text/javascript" src="js/panel.js"></script>

</body>
</html>