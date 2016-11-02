<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="utf-8" />

<title>Envío de correo con la función mail de PHP</title>

<link rel="stylesheet" href="formulario-mail.css">

<script src="formulario-mail.js"></script>

</head>

<body>
	<form name="mail_frm" action="enviar-mail.php" methop="post"
		enctype="application/x-www-form-urlencoded">
		De: <input type="email" name="de_txt" /><br /> <br /> Para: <input
			type="email" name="para_txt" /><br /> <br /> Asunto: <input
			type="text" name="asunto_txt" /><br /> <br /> Mensaje:<br />
		<textarea name="mensaje_txa"></textarea>
		<br /> <br /> <input type="button" name"enviar_btn" id="enviar_btn" value="Enviar" /><br />
		<?php
		error_reporting ( E_ALL ^ E_NOTICE ^ E_WARNING );
		if (isset ( $_GET ["respuesta"] )) {
			echo "<span>" . $_GET ["respuesta"] . "</span>";
		}
		?>
    
    </form>

</body>

</html>
