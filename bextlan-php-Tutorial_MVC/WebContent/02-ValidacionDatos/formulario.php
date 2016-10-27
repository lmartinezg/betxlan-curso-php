<!DOCTYPE html>
<html lang="es">
<head>
<title>Validación de datos con PHP</title>
<meta charset="utf-8" />

<script>
 
// Valida los datos del formulario

function validarDatosGET(){
		var verificar=true;
		if(!document.valida_datos_get_frm.nombre_txt.value){
			alert("El campo Nombre es requerido.");
			document.valida_datos_get_frm.nombre_txt.focus();
			verificar=false;
		} else 
		if(!document.valida_datos_get_frm.password_txt.value){
			alert("El campo Password es requerido.");
			document.valida_datos_get_frm.password_txt.focus();
			verificar=false;
		} else
		if(!document.valida_datos_get_frm.sexo_rdo[0].checked &&
				  !document.valida_datos_get_frm.sexo_rdo[1].checked){
			alert("El campo Sexo es requerido.");
			document.valida_datos_get_frm.seco_rdo[0].focus();
			verificar=false;
		}

		if(verificar){
			document.valida_datos_get_frm.submit();
		}
		
	}

function validarDatosPOST(){
	var verificar=true;
	if(!document.valida_datos_post_frm.nombre_txt.value){
		alert("El campo Nombre es requerido.");
		document.valida_datos_post_frm.nombre_txt.focus();
		verificar=false;
	} else 
	if(!document.valida_datos_post_frm.password_txt.value){
		alert("El campo Password es requerido.");
		document.valida_datos_post_frm.password_txt.focus();
		verificar=false;
	} else
	if(!document.valida_datos_post_frm.sexo_rdo[0].checked &&
			  !document.valida_datos_post_frm.sexo_rdo[1].checked){
		alert("El campo Sexo es requerido.");
		document.valida_datos_post_frm.seco_rdo[0].focus();
		verificar=false;
	}

	if(verificar){
		document.valida_datos_post_frm.submit();
	}
	
}


// 	Asocia el evento al botón de enviar el formulario

window.onload = function(){
// 	Evento para el primer formulario (GET)
	document.getElementById("enviar-get").onclick=validarDatosGET;
// 	Evento para el segundo formulario (POST)
	document.getElementById("enviar-post").onclick=validarDatosPOST;
	}

</script>
</head>

<body>

	<?php
		//Ocultamos el mensaje de error de variable $_GET no definida
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		if($_GET["error"]=="si")
		{
			echo "<span style='color: #F00; font-size:2em;'>VERIFICA TUS DATOS</span>";
		}
	?>

	<h1>Validación de datos en formularios</h1>

	<h2>Envío del formulario mediante GET</h2>
	<!-- Inicialmente se programó el evento onclick en el propio botón, pero posteriormente se trasladó al <head><script> -->
	<form name="valida_datos_get_frm" action="validar-datos.php"
		method="get" enctype="application/x-www-form-urlencoded">

		Introduce tu Nombre: <input type="text" name="nombre_txt" /> <br /> <br />
		Introduce tu Password: <input type="password" name="password_txt" /> <br />
		<br /> <input type="radio" name="sexo_rdo" value="M" />Masculino&nbsp;
		<input type="radio" name="sexo_rdo" value="F" />Femenino&nbsp; <br />
		<br /> <input type="hidden" name="enviar_hdn" value="get" /> <input
			type="button" id="enviar-get" name="enviar_btn"
			value="Enviar por GET" />

	</form>

	<h2>Envío del formulario mediante POST</h2>

	<form name="valida_datos_post_frm" action="validar-datos.php"
		method="get" enctype="application/x-www-form-urlencoded">

		Introduce tu Nombre: <input type="text" name="nombre_txt" /> <br /> <br />
		Introduce tu Password: <input type="password" name="password_txt" /> <br />
		<br /> <input type="radio" name="sexo_rdo" value="M" />Masculino&nbsp;
		<input type="radio" name="sexo_rdo" value="F" />Femenino&nbsp; <br />
		<br /> <input type="hidden" name="enviar_hdn" value="post" /> <input
			type="button" id="enviar-get" name="enviar_btn"
			value="Enviar por POST" />

	</form>

</body>

</html>