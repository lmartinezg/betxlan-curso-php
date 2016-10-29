<?php
// 	Comentario de una sola línea

/* 
Esto es
un comentario 
multilínea
*/
vasfasfsdafasdf

// Imprimir en pantalla
echo ("Hola, Mundo<br />");
echo ("Hola cruel mundo<br />estoy<h1>aprendiendo PHP</h1>");

// Variables (precediendo el nombre con el signo del dólar)
$nombre = "Jonathan";
$Nombre = "Ulises";
echo $nombre;
echo "<br />";
echo $Nombre;
echo "<br />";

// Para concatenar, con el símbolo de punto
echo $nombre."&nbsp;".$Nombre,"<br />";

// Salto de línea
echo "<br />";

// Variables numéricas y operación suma
$num1 = 5;
$num2 = 78;
$suma = $num1 + $num2;
echo "Suma: ".$suma."<br />";

// Operación módulo
$modulo = $num2 % 2;
if($modulo==0){
	echo "El número es Par";
}else{
	echo "El número es Impar";
}
echo "<br />";

// Bucle for
echo "<br />";
for($i=0;$i<=10;$i++){
	echo "El valor de la variable \$i es ".$i."<br />";
}

?>