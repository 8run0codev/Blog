
function validarEntrada() 
{


 var titulo = document.getElementById("titulo").value;
 var contenido = document.getElementById("contenido").value;
 var descripcion =  document.getElementById("descripcion").value;
 var categoria = document.getElementById("categoria").selectedIndex;


	if(titulo == null || titulo.length == 0 || /^\s+$/.test(titulo)) 
	{
		sweetAlert("Titulo vacio", "Ingresa un titulo para la entrada", "error");
	  	return false;
	}

	if(contenido == null || contenido.length == 0 || /^\s+$/.test(contenido)) 
	{
		sweetAlert("La entrada no tiene contenido", "Ingresa algo interesante", "error");
	  	return false;
	}


	if(descripcion == null || descripcion.length == 0 || /^\s+$/.test(descripcion)) 
	{
		sweetAlert("La entrada no tiene descripcion", "Ingresa de que trata tu entrada", "error");
	  	return false;
	}

	if( categoria == null || categoria == 0 ) {
		sweetAlert("No hay categoria selecionada", "Seleciona alguna categoria", "error");
	  return false;
	}

}

function validarSlide() {

 var titulo = document.getElementById("titulo1").value;
 var slogan = document.getElementById("slogan1").value;
 var idSlide = document.getElementById("idSlide").selectedIndex;


 	if( idSlide == null || idSlide == 0 ) {
		sweetAlert("Ningun slide selecionado", "Seleciona algun slide para editar", "error");
	  return false;
	}


	if(titulo == null || titulo.length == 0 || /^\s+$/.test(titulo)) 
	{
		sweetAlert("Titulo vacio", "Ingresa un titulo para el slide", "error");
	  	return false;
	}

	if(slogan == null || slogan.length == 0 || /^\s+$/.test(slogan)) 
	{
		sweetAlert("Sin slogan", "Ingresa un Slogan para el Slide", "error");
	  	return false;
	}
	

}

