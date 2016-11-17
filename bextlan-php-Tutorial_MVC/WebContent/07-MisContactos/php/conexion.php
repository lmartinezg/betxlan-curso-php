<?php
function conectarse() {
	$servidor = "localhost";
	$usuarioBD = "root";
	$password = "";
	$bd = "mis_contactos";
	
	$conectar = new mysqli ( $servidor, $usuarioBD, $password, $bd );
	if ($conectar->connect_error) {
		die ( "No se pudo conectar al servidor de Base de Datos MySQL.<br />" . $conectar->connect_error );
	}
	
	/* cambiar el conjunto de caracteres a utf8 */
	if (! $conectar->set_charset ( "utf8" )) {
		printf ( "Error cargando el conjunto de caracteres utf8: %s\n", $conectar->error );
		exit ();
	} else {
		printf ( "Conjunto de caracteres actual: %s\n", $conectar->character_set_name );
	}
	
	return $conectar;
}

$conexion = conectarse ();

?>
