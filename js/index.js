let show = true

function hiddenmenu(event) {
    if (show) {
        $("#helps").slideUp(0)
        show = false
    } else {
        $("#helps").slideDown(0)
        show = true

    }
}
if (document.getElementById('lista-button-id') != null) {
    document.getElementById('lista-button-id').onclick = listType;
    document.getElementById('cuadro-button-id').onclick = cuadriculeType;
    document.getElementById('iconG').onclick = GeneratePw_redirect;
    document.getElementById('add-box').onclick = mostrar;
}

if (document.getElementById('icon-security')) {
    var elemento = document.querySelector('#pw');
    var pw = document.getElementById("lacosa").innerText;
    elemento.setAttribute("value", pw);
}
document.getElementById('menu-button').onclick = hiddenmenu;
document.getElementById('iconsA').onclick = mostrar;
document.getElementById('close').onclick = ocultar;

function listType() {
    $(".box-pass").removeClass("col-lg-4 col-md-4");
}

function cuadriculeType() {
    $(".box-pass").addClass("col-lg-4 col-md-4");
}

function mostrar() {
    $("#mod-add").removeClass("hidden");
}

function ocultar() {
    $("#mod-add").addClass("hidden");
}

function GeneratePw_redirect() {
    location.href = "GeneratePassword/";
}