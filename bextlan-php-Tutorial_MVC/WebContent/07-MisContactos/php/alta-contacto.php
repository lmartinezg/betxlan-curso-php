<form id="alta-contacto" name="alta_frm"
	action="php/agregar-contacto.php" method="post"
	enctype="multipart/form-data>

<fieldset>
	
	<legend>Alta de contactos</legend>
	<div>
		<label for="email">Email:</label> <input type="email" id="email"
			name="email_txt" class="cambio" placeholder="Escribe tu email"
			title="Tu email" required />
	</div>
	<div>
		<labelfor"nombre">Nombre:</label> <input type="text" id="nombre"
			name="nombre_txt" class="cambio" placeholder="Escribe tu nombre"
			title="Tu nombre" required />
	
	</div>
	<div>
		<label for="m">Sexo: </label> <input type="radio" id="m"
			name="sexo_rdo" title="Tu sexo" value="M" required />&nbsp; <label
			for="m">Masculino</label> &nbsp;&nbsp;&nbsp; <input type="radio"
			id="f" name="sexo_rdo" title="Tu sexo" value="F" required />&nbsp; <label
			for="f">Femenino</label>
	</div>
	<div>
		<label for="nacimiento">Fecha de nacimiento: </label> <input
			type="date" id="nacimiento" class="cambios" name="nacimiento_txt"
			title="Tu cumple" required />
	</div>
	<div>
		<label for="telefono">Teléfono: </label> <input type="name"
			id="telefono" name="telefono_txt" class="cambio"
			placeholder="Escribe tu teléfono" title="Tu teléfono" required />
	</div>
	<div>
		<label for="pais">País: </label> <select id="pais" class="cambio"
			name="pais_slc" required>
			<option value="">- - -</option>
			<?php include("select-pais.php")?>
		</select>
	</div>
	<div>
		<label for="foto">Foto: </label> <input type="file" id="foto"
			class="cambio" name="foto_fls" title="Sube tu foto" />
	</div>
	<input type="submit" id="enviar-alta" class="cambio" name="enviar_btn"
		value="Agregar" />
	<div>
	<?php include ("php/mensajes.php"); ?>
	</div>

	</fieldset>

</form>