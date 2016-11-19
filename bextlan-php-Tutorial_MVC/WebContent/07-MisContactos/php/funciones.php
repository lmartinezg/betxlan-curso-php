<?php

// Función para borrar las posibles imágenes con el mismo nombre pero extensión distinta a la pasada como parámetro
// Parámetros:
// $ruta ==> ruta y nombre del archivo sin extensión
// $extension ==> extensión del nuevo archivo (el que no hay que borrar)
function borrar_imagenes($ruta, $extension) {
	$arr = array (
			".gif",
			".jpg",
			".png" 
	);
	foreach ( $arr as $value ) {
		if ($value != $extension) {
			if (file_exists ( $ruta . $value ))
				unlink ( $ruta . $value );
		}
	}
}

// Función para subir la imagen del usuario
function subir_imagen($tipo, $imagen, $email) {
	// strstr() comprueba si una cadena contiene la otra
	if (strstr ( $tipo, "image/" )) {
		// El archivo sí que es una imagen
		if (strstr ( $tipo, "jpeg" ))
			$extension = ".jpg";
		else if (strstr ( $tipo, "gif" ))
			$extension = ".gif";
		else if (strstr ( $tipo, "png" ))
			$extension = ".png";
			
			// El tamaño correcto para la maquetación es de 420px
		$tam_img = getimagesize ( $imagen );
		$ancho_imagen = $tam_img [0];
		$alto_imagen = $tam_img [1];
		$ancho_imagen_deseado = 420;
		
		// Ruta y nombre del archivo donde se guardará la imagen en el servidor
		$ruta_nombre_img = "../img/fotos/" . $email;
		$destino = $ruta_nombre_img . $extension;
		$nombre_img_ext_BD = $email . $extension;
		
		if ($ancho_imagen > $ancho_imagen_deseado) {
			// Reajustar tamaño imagen si es mayor que el establecido
			
			// Calcular nuevo alto proporcionalmente
			$nuevo_ancho_img = $ancho_imagen_deseado;
			$nuevo_alto_img = $alto_imagen / $ancho_imagen * $nuevo_ancho_img;
			
			// Crear nueva imagen (vacía) con el nuevo tamaño
			$imagen_reajustada = imagecreatetruecolor ( $nuevo_ancho_img, $nuevo_alto_img );
			
			// imagecreatefromjpeg — Crea una nueva imagen a partir de un fichero o de una URL
			// resource imagecreatefromjpeg ( string $filename )
			
			// imagecreatefromgif — Crea una nueva imagen a partir de un fichero o de una URL
			// resource imagecreatefromgif ( string $filename )
			
			// imagecreatefrompng — Crea una nueva imagen a partir de un fichero o de una URL
			// resource imagecreatefromgif ( string $filename )
			
			// imagecopyresampled — Copia y cambia el tamaño de parte de una imagen redimensionándola
			// bool imagecopyresampled (
			// resource $dst_image , resource $src_image ,
			// int $dst_x , int $dst_y , int $src_x , int $src_y ,
			// int $dst_w , int $dst_h , int $src_w , int $src_h )
			
			// imagejpeg — Exportar la imagen al navegador o a un fichero
			// bool imagejpeg ( resource $image [, mixed $to [, int $quality ]] )
			
			// imagegif — Exportar la imagen al navegador o a un fichero
			// bool imagegif ( resource $image [, string $filename ] )
			
			// imagepng — Imprimir una imagen PNG al navegador o a un archivo
			// bool imagepng ( resource $image [, string $filename [, int $quality [, int $filters ]]] )
			
			switch ($extension) {
				
				case ".jpg" :
					$img_original = imagecreatefromjpeg ( $imagen );
					imagecopyresampled ( $imagen_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, $ancho_imagen, $alto_imagen );
					imagejpeg ( $img_reajustada, $destino, 100 );
					borrar_imagenes ( $ruta_nombre_img, $extension );
					break;
				
				case ".gif" :
					$img_original = imagecreatefromgif ( $imagen );
					imagecopyresampled ( $imagen_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, $ancho_imagen, $alto_imagen );
					imagegif ( $img_reajustada, $destino );
					borrar_imagenes ( $ruta_nombre_img, $extension );
					break;
				
				case ".png" :
					$img_original = imagecreatefrompng ( $imagen );
					imagecopyresampled ( $imagen_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, $ancho_imagen, $alto_imagen );
					imagepng ( $img_reajustada, $destino );
					borrar_imagenes ( $ruta_nombre_img, $extension );
					break;
			}
		} else {
			// No hace falta reajustar la imagen. Subirla directamente
			move_uploaded_file ( $imagen, $destino ) or die ( "No se pudo subir la imagen al servidor." );
			// Borra posibles imágenes anteriores
			borrar_imagenes ( $ruta_nombre_img, $extension );
		}
		// Nombre que tendrá la imagen en la base de datos
		return $nombre_img_ext_BD;
	} else {
		return false;
	}
}
?>	