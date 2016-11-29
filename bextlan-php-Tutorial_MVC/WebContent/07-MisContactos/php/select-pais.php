<?php
// if (! $registro_contacto ["pais"]) {
	include ("conexion.php");
// }

// echo "registro_contacto[pais]=" . $registro_contacto ["pais"] . "<br />" . PHP_EOL;

$conexion = conectarse ();
$consulta = "SELECT * FROM pais ORDER BY pais";
$ejecutar_consulta = $conexion->query ( $consulta );
$conexion->close ();

if ($ejecutar_consulta->num_rows > 0) {
	while ( $registro = $ejecutar_consulta->fetch_assoc () ) {
		$nombre_pais = $registro ["pais"];
		echo "<option value='" . $registro ["pais"] . "'";
		if ($nombre_pais == $registro_contacto ["pais"]) {
			echo " selected";
		}
		echo ">" . $registro ["pais"] . "</option>" . PHP_EOL;
		
		// $nombre_pais = utf8_encode ( $registro ["pais"] );
		// echo "<option value='" . $nombre_pais . "'>" . $nombre_pais . "</option>";
	}
}
?>
