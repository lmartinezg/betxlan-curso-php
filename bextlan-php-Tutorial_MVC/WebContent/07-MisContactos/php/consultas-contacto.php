<form id="consultas-contacto" name="consulta_form"
	action="" method="get">

	<fieldset>

		<legend>Consulta de contactos</legend>

		<label for="consulta-lista">Tipo de consulta: </label> 
		
<?php include ("select-tipo-consulta.php")?>

		<?php
		switch ($_GET ["consulta_slc"]) {
			case "todos" :
				include ("php/consulta-todo.php");
				break;
			case "email" :
				include ("php/consulta-email.php");
				break;
			case "inicial" :
				include ("php/consulta-inicial.php");
				break;
			case "sexo" :
				include ("php/consulta-sexo.php");
				break;
			case "pais" :
				include ("php/consulta-pais.php");
				break;
			case "buscador" :
				include ("php/consulta-buscador.php");
				break;
		}
		?>

</form>

<script>
window.onload = function()
{
	var lista = document.getElementById("consulta-lista");
	lista.onchange = function()
	{
		window.location="?op=consultas&consulta_slc="+lista.value;
	}
}
</script>