<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8" />
<title>Cookies en PHP - grabar-cookie.php</title>
</head>

<body>

	<h1>Cookies en PHP - grabar-cookie.php</h1>


<?php

// Parámetros de setcookie():
// Nombre
// Valor
// Tiempo de validez, en segundos: 86400 seg = 1 hora.
// Ruta del directorio en el que se aplica la cookie: "/" = todo el directorio del sitio web.
// Dominio en el que se aplica
setcookie ( "idioma_solicitado", $_GET ["idioma"], time () + 86400, "/" );

// header() redirecciona a la página indicada.
header ( "Location: usar-cookie.php" );

?>