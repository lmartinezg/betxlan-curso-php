<?php
include ("conexion.php");
$consulta = "SELECT * FROM pais ORDER BY pais";
$ejecutar_consulta = $conexion->query ( $consulta );
if ($ejecutar_consulta->num_rows > 0) {
	while ( $registro = $ejecutar_consulta->fetch_assoc () ) {
		
		echo "<option value='" . $registro ["pais"] . "'>" . $registro ["pais"] . "</option>";
		
		// $nombre_pais = utf8_encode ( $registro ["pais"] );
		// echo "<option value='" . $nombre_pais . "'>" . $nombre_pais . "</option>";
	}
}
?>
