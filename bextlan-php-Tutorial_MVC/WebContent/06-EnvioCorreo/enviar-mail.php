<?php
$de = $_POST ["de_txt"];
$para = $_POST ["para_txt"];
$asunto = $_POST ["asunto_txt"];
$mensaje = $_POST ["mensaje_txa"];

$cabeceras = "MIME-Version: 1-0\r\n";
$cabeceras .= "Content-Type: text/html; charset=iso-8859-1\r\n";
$cabeceras .= "From: $de \r\n";

// mail() function requires a SMTP server running on the same host
if (mail ( $para, $asunto, $mensaje, $cabeceras )) {
	$respuesta = "El mensaje ha sido enviado.";
} else {
	$respuesta = "Ocurrió un error. No se envió el mensaje.";
}
header ( "Location: formulario-mail.php?respuesta=$respuesta" );
?>