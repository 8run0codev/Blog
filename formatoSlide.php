<?php 

	echo		"<li>";
	echo			"<img src='img/slides/" . $registroSlide["imagen"] . "'>";
	echo			"<div class='caption center-align'>";
	echo				"<h3>" . $registroSlide["titulo"] . "</h3>";
	echo				"<h5 class='light grey-text text-lighten-3'>" . $registroSlide["slogan"] ."</h5>";
	echo			"</div>";
	echo		"</li>";

 ?>