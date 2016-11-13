<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Operaciones básicas en Base de Datos MySQL</title>

<link rel="stylesheet" href="estilos.css">
<!-- <script src="formulario-phpmailer.js"></script> -->

</head>

<body>

<?php
$dbServer = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "mis_contactos";
$dbCharSet = "";

echo "<h1>Las 4 operaciones básicas a una Base de Datos</h1>";

echo "<hr>";

echo PHP_EOL . PHP_EOL;

$conexion = mysqli_connect ( $dbServer, $dbUser, $dbPassword ) or die ( "No se pudo conectar con el servidor de BBDD." . "<br >" );
echo "Conectado a MySQL" . "<br />";

mysqli_set_charset ( $conexion, "utf8" ) or die ( "Error cargando el conjunto de caracteres utf8:" . "<br />" );
echo "Conjunto de caracteres actual: " . mysqli_character_set_name ( $conexion ) . "<br />";

mysqli_select_db ( $conexion, $dbName ) or die ( "No se ha podido seleccionar la base de datos " . $dbName . "<br />" );
echo "Base de datos <b>" . $dbName . "</b> seleccionada." . "<br />";

echo "<hr>";

echo PHP_EOL . PHP_EOL;

// Insertar registros
echo "<h2>1) Insertar registros</h2>";

$email = "correo3@dominio.com";
$nombre = "José Manuel Hernández";
$sexo = "M";
$nacimiento = "1978-12-23";
$telefono = "919829202";
$pais = "Honduras";
$imagen = "ruta/archivo.png";

$consulta = "INSERT INTO contactos ";
$consulta .= "(email, nombre, sexo, nacimiento, telefono, pais, imagen) ";
$consulta .= "VALUES('" . $email . "', '" . $nombre . "', '" . $sexo . "', '" . $nacimiento . "', '" . $telefono . "', '" . $pais . "', '" . $imagen . "')";

// $ejecutar_consulta = mysqli_query ( $conexion, $consulta ) or die ( "Ha fallado la ejecución de la consulta '" . $consulta . "'." . "<br />" );
echo "Consulta:<br />" . $consulta . "<br />";
if (! mysqli_query ( $conexion, $consulta )) {
	echo ("Error description: " . mysqli_error ( $conexion ));
} else {
	echo "Consulta ejecutada.";
}
echo "<br />";
echo "<hr>";

echo PHP_EOL . PHP_EOL;

// Suprimir registros
echo "<h2>2) Suprimir datos</h2>";

$email = "correo2@dominio.com";
$consulta = "DELETE FROM contactos WHERE email = '" . $email . "'";
echo "Consulta:<br />" . $consulta . "<br />";
if (! mysqli_query ( $conexion, $consulta )) {
	echo ("Error description: " . mysqli_error ( $conexion ));
} else {
	echo "Consulta ejecutada.";
}
echo "<br />";
echo "<hr>";

echo PHP_EOL . PHP_EOL;

// Actualizar registros
echo "<h2>3) Actualizar datos</h2>";

$email = "correo3@dominio.com";
$nombre = "Nombre Modificado";
$telefono = "555555555";
$nacimiento = "2001-01-01";

// UPDATE table SET campo1=valor1, campo2=valor2 WHERE email="a@b.com"
$consulta = "UPDATE contactos SET nombre = '" . $nombre . "', telefono = '" . $telefono . "', nacimiento = '" . $nacimiento . "' WHERE email = '" . $email . "'";

echo "Consulta:<br />" . $consulta . "<br />";
if (! mysqli_query ( $conexion, $consulta )) {
	echo ("Error description: " . mysqli_error ( $conexion ));
} else {
	echo "Consulta ejecutada.";
}
echo "<br />";
echo "<hr>";

echo PHP_EOL . PHP_EOL;

// Seleccionar registros y recorrer la tabla de resultados
echo "<h2>4) Seleccionar registros</h2>";

// 5 - Mostrar el resultado de la ejecución de la consulta
// mixed mysqli_fetch_array ( mysqli_result $result [, int $resulttype = MYSQLI_BOTH ] )

$consulta = "SELECT * FROM contactos ORDER BY 1";

// echo "Consulta:<br />'" . $consulta . "<br />";
// $ejecutar_consulta = mysqli_query ( $conexion, $consulta ) or die ( "Ha fallado la ejecución de la consulta '" . $consulta . "'." . "<br />" );
echo "Consulta:<br />" . $consulta . "<br />";
$ejecutar_consulta = mysqli_query ( $conexion, $consulta );
if (! mysqli_query ( $conexion, $consulta )) {
	echo ("Error description: " . mysqli_error ( $conexion ));
} else {
	echo "Consulta ejecutada.";
	echo "<br >";
	
	echo PHP_EOL;
	
	echo "<br />Contenido de la tabla:<br />";
	
	echo PHP_EOL . PHP_EOL;
	
	echo "<table>";
	echo PHP_EOL;
	echo " <tr>";
	echo " <th>email</th>";
	echo " <th>Nombre</th>";
	echo " <th>Sexo</th>";
	echo " <th>Nacimiento</th>";
	echo " <th>Teléfono</th>";
	echo " <th>País</th>";
	echo " <th>Imagen</th>";
	echo " </tr>";
	echo PHP_EOL;
	
	while ( $registro = mysqli_fetch_array ( $ejecutar_consulta ) ) {
		// echo $registro ["id_pais"] . " - " . $registro ["pais"] . "<br />";
		
		echo " <tr>";
		echo " <td>" . $registro ["email"] . "</td>";
		echo " <td>" . $registro ["nombre"] . "</td>";
		echo " <td>" . $registro ["sexo"] . "</td>";
		echo " <td>" . $registro ["nacimiento"] . "</td>";
		echo " <td>" . $registro ["telefono"] . "</td>";
		echo " <td>" . $registro ["pais"] . "</td>";
		echo " <td>" . $registro ["imagen"] . "</td>";
		echo " </tr>";
		echo PHP_EOL;
	}
	echo "</table>" . PHP_EOL;
}
echo "<br />";
echo "<hr>";

echo PHP_EOL . PHP_EOL;

// 6 - Cerrar la conexión
// mysqli_close ( $conexion ) or die ( "Ocurrió un error al cerrar la conexión a la Base de Datos." . "<br /" );if (! mysqli_close ( $conexion )) {
if (! mysqli_close ( $conexion )) {
	echo ("Error description: " . mysqli_error ( $conexion ));
} else {
	echo "Conexión a la Base de Datos cerrada.";
}
echo "<br />";
echo "<hr>";
?>