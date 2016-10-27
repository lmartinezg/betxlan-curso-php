<?php

// Datos fijados para pruebas
$nombre = "admin";
$password = "1234";

// Validación mediante GET
if (isset ( $_GET ["enviar_hdn"] )) {
	if ($nombre == $_GET ["nombre_txt"] && $password == $_GET ["password_txt"]) {
		echo "El nombre introducido por GET es " . $_GET ["nombre_txt"] . ".<br />" . "La password introducida por GET es " . $_GET ["password_txt"] . ".<br />" . "El sexo introducido es " . $_GET ["sexo_rdo"] . ".";
	} else {
		// Reenvía al formulario mediante GET
		header ( "Location: formulario.php?error=si" );
	}
}

// Validación mediante POST
if (isset ( $_POST ["enviar_hdn"] )) {
	if ($nombre == $_POST ["nombre_txt"] && $password == $_POST ["password_txt"]) {
		echo "El nombre introducido por POST es " . $_POST ["nombre_txt"] . ".<br />" . "La password introducida por POST es " . $_POST ["password_txt"] . ".<br />" . "El sexo introducido es " . $_POST ["sexo_rdo"] . ".";
	} else {
		// Reenvía al formulario mediante GET, aunque estemos validando mediante POST
		header ( "Location: formulario.php?error=si" );
	}
}

?>