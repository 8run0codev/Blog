<?php 

					include 'conex.php';

					$id = $_GET["id"];

					$consulta = mysql_query("SELECT * FROM entrada WHERE idEntrada = '$id'");

					while ($registro = mysql_fetch_array($consulta)) {
						
						echo "<div id='titulo' class='col s12 animated fadeIn'><h4 class='left'>" . $registro["tituloEntrada"] . "</h4><br></div>";
						echo "<div id='img' ><img src='img/entradas/" . $registro["imgEntrada"] . "' class='col s12 animated fadeIn'><br></div>";
						echo "<div class='col s12'><hr></div>";
						echo "<div id='contenido' class='animated fadeIn'>" . $registro["contenidoEntrada"] . "</div>";
					}


 ?>