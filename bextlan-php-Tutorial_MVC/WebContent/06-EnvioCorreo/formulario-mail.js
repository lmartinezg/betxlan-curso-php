// Opción 1 @luispuchades

//DECLARACION DE OBJETOS Y VARIABLES
var mailFrm = document.querySelector("#mail-frm");
var deTxt = document.querySelector("#de-txt");
var paraTxt = document.querySelector("#para-txt");
var asuntoTxt = document.querySelector("#asunto-txt");
var mensajeTxa = document.querySelector("#mensaje-txa");
var enviarBtn = document.querySelector("#enviar-btn");



//DECLARACION DE FUNCIONES
function validarForm()
{
    var verificar = true;
    var expRegMail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

    if(!deTxt.value)
    {
        alert("Por favor, indique el correo electrónico del remitente");
        deTxt.focus();
        verificar = false;
    }
    else if (!expRegMail.exec(deTxt.value))
    {
        alert("El remitente no tiene el formato adecuado");
        deTxt.focus();
        verificar = false;
    }
    else if(!paraTxt.value)
    {
        alert("Por favor, indique el correo electrónico del destinatario");
        paraTxt.focus();
        verificar = false;
    }
    else if (!expRegMail.exec(paraTxt.value))
    {
        alert("El destinatario no tiene el formato adecuado");
        paraTxt.focus();
        verificar = false;
    }
    else if(!asuntoTxt.value)
    {
        alert("Por favor, debe introducir un asunto");
        asuntoTxt.focus();
        verificar = false;
    }
    else if(!mensajeTxa.value)
    {
        alert("Por favor, debe introducir un mensaje");
        mensajeTxa.focus();
        verificar = false;
    }
    if (verificar)
    {
        mailFrm.submit();
    }

}

function alCargarDocumento()
{
    enviarBtn.addEventListener("click", validarForm);
}


//ASIGNACION DE EVENTOS
window.addEventListener("load", alCargarDocumento);