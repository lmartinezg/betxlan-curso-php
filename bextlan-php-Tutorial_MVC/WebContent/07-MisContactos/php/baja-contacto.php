<form id="baja-contacto" name="baja_frm"
	action="php/eliminar-contacto.php" method="post"
	enctype="application/x-www-form-urlencoded">

	<fieldset>

		<legend>Baja de contacto</legend>

		<div>
			<label for="email">Email: </label> <select id="email" class="cambio"
				name="email_slc" required>
				<option value="">- - -</option>
			<?php include("select-email.php");?>
			</select>
		</div>
		<div>
			<input type="submit" id="enviar-baja" name="enviar_btn"
				class="cambio" value="Eliminar" />

		</div>
		<?php include("php/mensajes.php"); ?>
	</fieldset>
</form>