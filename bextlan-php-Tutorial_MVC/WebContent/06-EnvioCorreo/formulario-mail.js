// Javascript document

function validarForm() {

	var verificar = true;
	var expRegEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

	if (!document.mail_frm.de_txt.value) {
		alert("El campo 'De' es requerido.");
		document.mail_frm.de_txt.focus();
		verificar = false;
	} else if (!expRegEmail.exec(document.mail_frm.de_txt.value)) {
		alert("La dirección de correo 'De' no es válida.");
		document.mail_frm.de_txt.focus();
		verificar = false;
	} else if (!document.mail_frm.para_txt.value) {
		alert("El campo 'Para' es requerido.");
		document.mail_frm.para_txt.focus();
		verificar = false;
	} else if (!expRegEmail.exec(document.mail_frm.para_txt.value)) {
		alert("La dirección de correo 'Para' no es válida.");
		document.mail_frm.para_txt.focus();
		verificar = false;
	} else if (!document.mail_frm.asunto_txt.value) {
		alert("El campo 'Asunto' es requerido.");
		document.mail_frm.asunto_txt.focus();
		verificar = false;
	} else if (!document.mail_frm.mensaje_txa.value) {
		alert("El campo 'Mensaje' es requerido.");
		document.mail_frm.mensaje_txa.focus();
		verificar = false;
	}

	if (verificar) {
		document.mail_frm.submit();
	}

}

window.onload = function() {
	document.mail_frm.enviar_btn.onclick = validarForm;
}