<?php
echo "Debug: Inicio" . "<br />";
echo "\$_POST: <br />";
foreach ( $_POST as $key => $value ) {
	echo $key . " ==> " . $value . "<br />";
}
echo "Debug: Fin" . "<br /><br />" . 

// Asignar a variables PHP los valores del formulario
$email = $_POST ["email_txt"];
$nombre = $_POST ["nombre_txt"];
$sexo = $_POST ["sexo_rdo"];
$nacimiento = $_POST ["nacimiento_txt"];
$telefono = $_POST ["telefono_txt"];
$pais = $_POST ["pais_slc"];

// die();

echo "Debug: Inicio" . "<br />";
echo "email=" . $email . "<br />";
echo "Degug: Fin" . "<br /><br />" . 

// Dependiendo del sexo asignamos una imagen genérica u otra
$imagen_generica = ($sexo == "M") ? "amigo.png" : "amiga.png";

// Comprobamos que el email introducido es nuevo en la BBDD
include ("conexion.php");
$consulta = "SELECT * FROM contactos WHERE email='$email'";
$ejecutar_consulta = $conexion->query ( $consulta );
$num_regs = $ejecutar_consulta->num_rows;
if ($num_regs == 0) {
	
	include "funciones.php"; // Contendrá funciones para manipular las imágenes subidas
	$tipo = $_FILES ["foto_fls"] ["type"]; // Tipo del archivo de imagen
	$archivo = $_FILES ["foto_fls"] ["tmp_name"]; // Donde se ha guardado temporalmente el archivo
	$se_subio_imagen = subir_imagen ( $tipo, $archivo, $email );
	$imagen = empty ( $archivo ) ? $imagen_generica : $se_subio_imagen;
	
	$consulta = "INSERT INTO contactos(email, nombre, sexo, nacimiento, telefono, pais, imagen) VALUES('$email', '$nombre', '$sexo', '$nacimiento', '$telefono', '$pais', '$imagen')";
	$ejecutar_consulta = $conexion->query ( $consulta );
	if ($ejecutar_consulta) {
		$mensaje = "Se ha dado de alta el contacto con email <b>$email</b>.";
	} else {
		$mensaje = "No se pudo dar de alta el contacto con email <b>$email</b>.";
	}
} else {
	$mensaje = "No se pudo crear el contacto con email <b>$email</b> porque ya existe en la base de datos.";
}
$conexion->close ();
header ( "Location: ../index.php?op=alta&mensaje=$mensaje" );
?>