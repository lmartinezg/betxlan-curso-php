<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Conexión a Base de Datos MySQL</title>

<link rel="stylesheet" href="estilos.css">
<!-- <script src="formulario-phpmailer.js"></script> -->

</head>

<body>

<?php

// or die("mensaje) mata el proceso si la función falla.

$dbServer = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "mis_contactos";

// Pasos para conectar con BBDD MySQL con PHP

// 1 - Conectar: mysql_connect
// 1.1 - Servidor BBDD
// 1.2 - Usuario
// 1.3 - Password

echo "Servidor BBDD: " . $dbServer . "<br />";
echo "Usuario BBDD: " . $dbUser . "<hr>";

$conexion = mysqli_connect ( $dbServer, $dbUser, $dbPassword ) or die ( "No se pudo conectar con el servidor de BBDD." . "<br >" );
echo "Conectado a MySQL" . "<br />";


// Establecer el juego de caracteres de la conexión
printf ( "Conjunto de caracteres inicial: %s\n", mysqli_character_set_name ( $conexion ) );

/* cambiar el conjunto de caracteres a utf8 */
if (! mysqli_set_charset ( $conexion, "utf8" )) {
	printf ( "Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error ( $conexion ) );
	exit ();
} else {
	printf ( "Conjunto de caracteres actual: %s\n", mysqli_character_set_name ( $conexion ) );
}
echo "<hr>";


// 2 - Seleccionar la B.D.
mysqli_select_db ( $conexion, $dbName ) or die ( "No se ha podido seleccionar la base de datos " . $dbName . "<br />" );
echo "Base de datos " . $dbName . " seleccionada." . "<hr>";


// 3 - Crear una consulta SQL
$consulta = "SELECT * FROM pais ORDER BY 1";


// 4 - Ejecutar la consulta SQL
$ejecutar_consulta = mysqli_query ( $conexion, $consulta ) or die ( "Ha fallado la ejecución de la consulta '" . $consulta . "'." . "<br />" );
echo "Consulta '" . $consulta . "' ejecutada." . "<hr>";


// 5 - Mostrar el resultado de la ejecución de la consulta
// mixed mysqli_fetch_array ( mysqli_result $result [, int $resulttype = MYSQLI_BOTH ] )

echo PHP_EOL;
echo "<table> " . PHP_EOL . "<tr> <th>Id</th> <th>País</th> </tr>" . PHP_EOL;
while ( $registro = mysqli_fetch_array ( $ejecutar_consulta ) ) {
	// echo $registro ["id_pais"] . " - " . $registro ["pais"] . "<br />";
	echo "<tr> <td>" . $registro ["id_pais"] . "</td> <td>" . $registro ["pais"] . "</td> </tr>" . PHP_EOL;
}
echo "</table>" . PHP_EOL;
echo "<hr>";


// 6 - Cerrar la conexión
mysqli_close ( $conexion ) or die ( "Ocurrió un error al cerrar la conexión a la Base de Datos." . "<br /" );
echo "Conexión a la Base de Datos cerrada." . "<hr>";
?>