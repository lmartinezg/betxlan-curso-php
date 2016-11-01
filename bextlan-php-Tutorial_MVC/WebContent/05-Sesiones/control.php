<?php
session_start ();
if ($_POST ["usuario_txt"] == "lmg" && $_POST ["password_txt"] == "1234") {
	
	// Declarar variables de sesión
	$_SESSION ["autentificado"] = true;
	$_SESSION ["usuario"] = $_POST ["usuario_txt"];
	
	header ( "Location: archivo-protegido.php" );
} else {
	header ( "Location: index.php?error=si" );
}
?>
