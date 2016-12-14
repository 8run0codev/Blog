<?php 

		echo       "<div class='col s12 m6 l6'>";
		echo         "<div class='card hoverable animated zoomIn'>";
		echo           "<div class='card-image'>";
		echo             "<img src='img/entradas/" . $registro["imgEntrada"] . "' height = '250px'>";
		echo             "<span class='card-title'>" . $registro["tituloEntrada"] . "</span>";
		echo           "</div>";
		echo           "<div class='card-content'>";
		echo 		   "<h6 class='left'><b>" . $registro["autorEntrada"] . " | " . $registro["fechaEntrada"] . "</b>" . " | " . $registro["categoriaEntrada"] . ":" ."</h6></br></br>";
		echo             "<p id='descripcionEntrada'>" . $registro["descripcionEntrada"] . "</p>";
		echo           "</div>";
		echo           "<div class='card-action'>";
		echo             "<a href='entrada.php?id=" . $registro["idEntrada"] . "' class='red-text'>Leer más...</a>";
		echo           "</div>";
		echo         "</div>";
		echo       "</div>";

 ?>