<?php
session_start ();

// Evaluar que la sesión continua verificando la variable de sesión creada en control.php
// Cuando no coincida con su valor inicial, se redirige a salir.php
echo "autentificado: " . $_SESSION ["autentificado"] . "<br />";
if (! $_SESSION ["autentificado"]) {
	header ( "Location: salir.php" );
}
?>