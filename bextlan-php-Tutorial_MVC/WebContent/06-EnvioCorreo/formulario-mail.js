// Javascript document


//1. DECLARACION DE OBJETOS Y VARIABLES
var mailFrm;
var deTxt;
var paraTxt;
var asuntoTxt;
var mensajeTxa;
var enviarBtn;

//1.1 ASIGNACION DE VARIABLES
mailFrm = document.getElementByID("mail-frm");
deTxt = document.getElementByID("de-txt");
paraTxt = document.getElementByID("para-txt");
asuntoTxt = document.getElementByID("asunto-txt");
mensajeTxa = document.getElementByID("mensaje-txa");
enviarBtn = document.getElementByID("enviar-btn");



//2. DECLARACION DE FUNCIONES
function validarForm() {

    var verificar = true;
    var expRegEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

    if (!mailFrm.value) {
        alert("El campo 'De' es requerido.");
        mailFrm.focus();
        verificar = false;
    } else if (!expRegEmail.exec(deTxt.value)) {
        alert("La dirección de correo 'De' no es válida.");
        deTxt.focus();
        verificar = false;
    } else if (!paraTxt.value) {
        alert("El campo 'Para' es requerido.");
        paraTxt.focus();
        verificar = false;
    } else if (!expRegEmail.exec(paraTxt.value)) {
        alert("La dirección de correo 'Para' no es válida.");
        paraTxt.focus();
        verificar = false;
    } else if (!asuntoTxt.value) {
        alert("El campo 'Asunto' es requerido.");
        asuntoTxt.focus();
        verificar = false;
    } else if (!mensajeTxa.value) {
        alert("El campo 'Mensaje' es requerido.");
        mensajeTxa.focus();
        verificar = false;
    }

    if (verificar) {
        mailFrm.submit();
    }

}


function alCargarDocumento() {
    "use strict";

    enviarBtn.addEventListener("click", validarForm);
}


//3. ASIGNACION DE EVENTOS
window.addEventListener("load", alCargarDocumento);
