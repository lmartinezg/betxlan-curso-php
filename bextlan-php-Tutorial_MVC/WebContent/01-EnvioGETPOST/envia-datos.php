<?php
if (isset ( $_GET ["enviar_btn"] )) {
	echo "Los datos se enviaron por el método GET, los datos son:<br /><br />El nombre es: " . $_GET ["nombre_txt"] . "<br />El password es: " . $_GET ["password_txt"];
} else if (isset ( $_POST ["enviar_btn"] )) {
	echo "Los datos se enviaron por el método POST, los datos son:<br /><br />El nombre es: " . $_POST ["nombre_txt"] . "<br />El password es: " . $_POST ["password_txt"];
}

?>
