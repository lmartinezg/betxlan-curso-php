<?php
echo "File attributes<br />";
echo "<table border='1'><tr><th>Property</th><th>Value</th>";
foreach ( $_FILES ["archivo_fls"] as $key => $value ) {
	echo "<tr><td>$key</td><td>$value</td>";
}
echo "</table>";
echo "<hr>";
?>

<?php 
// foreach ($_POST as $key => $value) echo "Key: $key Val: $value<br>";
// echo "<hr>";
?>

<?php
echo "<table border='1'><tr><th>Key</th><th>Value</th>";
foreach ($_POST as $key => $value){
	if ($key=="gmailPassword_txt") {
		echo "<tr><td>$key</td><td>&nbsp</td>";
	} else {
		echo "<tr><td>$key</td><td>$value</td>";
		}
	}
echo "</table>";
echo "<hr>";
?>

<?php header("Content-type: text/html; charset=utf8");

$gmailUserId = $_POST ["gmailUserId_txt"];
$gmailPassword = $_POST ["gmailPassword_txt"];

$de = $_POST ["de_txt"];
$para = $_POST ["para_txt"];
$asunto = $_POST ["asunto_txt"];
$mensaje = $_POST ["mensaje_txa"];

$cabeceras = "MIME-Version: 1-0\r\n";
$cabeceras .= "Content-Type: text/html; charset=utf-8\r\n";
$cabeceras .= "From: $de \r\n";

$archivo = $_FILES ["archivo_fls"] ["tmp_name"];
$destino = $_FILES ["archivo_fls"] ["name"];

// mail() function requires a SMTP server running on the same host
if (move_uploaded_file ( $archivo, $destino )) {
	include_once ("class.phpmailer.php");
	include_once ("class.smtp.php");
	
	$mail = new PHPMailer ();
	$mail->IsSMTP (); // Utilizar SMTP
	$mail->SMTPAuth = true; // Autenticación en el SMTP
	$mail->SMTPSecure = "ssl"; // Utilizar SSL
	$mail->Host = "smtp.gmail.com"; // Servidor SMTP
	$mail->Port = 465; // Puerto SMTP seguro
	$mail->From = $de; // Remitente
	$mail->AddAddress ( $para ); // Destinatarios separados por comas
	$mail->Username = $gmailUserId; // ID usuario GMail
	$mail->Password = $gmailPassword; // Password GMail
	$mail->Subject = $asunto; // Asunto
	$mail->Body = $mensaje; // Cuerpo del mensaje
	$mail->WordWrap = 50; // Partir líneas en la columna 50
	$mail->MsgHTML ( $mensaje ); // Enviar como HTML
	$mail->AddAttachment ( $destino ); // Archivo adjunto
	
	if ($mail->Send ()) { // Correo enviado por phpmailer
		$respuesta = "El mensajes fue enviado con phpmailer.";
	} else {
		$respuesta = "Falló el envío con phpmailer.";
		$respuesta . " Error: " . $mail->ErrorInfo;
	}
} else {
	$respuesta = "Ocurrió un error al subir el archivo adjunto.";
}
unlink ( $destino ); // Borrar un archivo en el servidor
//header ( "Location: formulario-phpmailer.php?respuesta=$respuesta" );
?>