//Variables globales para módulo de localidades
var idPaisSeleccionado;
var idRegionSeleccionada;
var idTipoRegionSeleccionada;
var idPaisRegionSeleccionado;
var idCiudadSeleccionada;
var idRegionCiudadSeleccionada;
var idPaisCiudadSeleccionada;
//Funciones para el módulo de localidades
function obtenerPaises() {
    $.ajax({url: "php/obtenerPaises.php", async: false, type: "POST", success: function(res) {
        $('#divListaPaises').html(res);
    }});
}

function obtenerPaisesSelect() {
    $.ajax({url: "php/obtenerPaisesSelect.php", async: false, type: "POST", data: { idSelect: "selectPaisRegiones" }, success: function(res) {
        $('#divSelectPaisesRegiones').html(res);
    }});
    $.ajax({url: "php/obtenerPaisesSelect.php", async: false, type: "POST", data: { idSelect: "selectPaisCiudades" }, success: function(res) {
        $('#divSelectPaisesCiudades').html(res);
        $('#divSelectPaisesCiudades').on("change", obtenerRegionesSelect);
    }});
}

function agregarPais() {
    var pais;
    if ($("#tbPais").val().length > 0) {
        pais = $("#tbPais").val();
    } else {
        alert("No ha escrito el nombre del país que desea agregar.");
        return;
    }
    $.ajax({url: "php/agregarPais.php", async: false, type: "POST", data: { pais : pais }, success: function(res) {
        if (res == 'OK') {
            $("#tbPais").val('');
            obtenerPaises();
            obtenerPaisesSelect();
        } else {
            alert(res);
        }
    }});
}

function seleccionarPais(idPais, pais) {
    idPaisSeleccionado = idPais;
    $("#divModalModificarPaisNombrePais").html("¿Desea cambiar el nombre del país: " + pais + "?");
}

function actualizarPais() {
    var pais;
    if ($("#tbNuevoNombrePais").val().length > 0) {
        pais = $("#tbNuevoNombrePais").val();
    } else {
        alert("No ha escrito el nombre del país que desea cambiar.");
        return;
    }
    $.ajax({url: "php/actualizarPais.php", async: false, type: "POST", data: { idpais: idPaisSeleccionado, pais : pais }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoNombrePais").val('');
            obtenerPaises();
            obtenerPaisesSelect();
            alert("Se ha actualizado el nombre del país.");
        } else {
            alert(res);
        }
    }});
}

function obtenerTiposRegionesSelect() {
    $.ajax({url: "php/obtenerTiposRegionesSelect.php", async: false, type: "POST", data: { idSelect: "selectTiposRegiones" }, success: function(res) {
        $('#divSelectTiposRegiones').html(res);
    }});    
}

function agregarTipoRegion() {
    var tipoRegion;
    if ($("#tbNuevoTipoRegion").val().length > 0) {
        tipoRegion = $("#tbNuevoTipoRegion").val();
    } else {
        alert("No ha escrito el tipo de región que desea agregar.");
        return;
    }
    $.ajax({url: "php/agregarTipoRegion.php", async: false, type: "POST", data: { tipoRegion : tipoRegion }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoTipoRegion").val('');
            obtenerTiposRegionesSelect();
        } else {
            alert(res);
        }
    }});
}

function obtenerRegiones() {
    $.ajax({url: "php/obtenerRegiones.php", async: false, type: "POST", success: function(res) {
        $('#divListaRegiones').html(res);
    }});
}

function agregarRegion() {
    var region;
    var idTipoRegion;
    var idPais;
    if ($("#tbNuevaRegion").val().length > 0) {
        region = $("#tbNuevaRegion").val();
    } else {
        alert("No ha escrito el nombre de la región que desea agregar.");
        return;
    }
    idTipoRegion = $("#selectTiposRegiones").val();
    if (idTipoRegion == null) {
        alert("No ha elegido el tipo de región.");
        return;
    }
    idPais = $("#selectPaisRegiones").val();
    if (idPais == null) {
        alert("No ha elegido el país de la región.");
        return;
    }
    $.ajax({url: "php/agregarRegion.php", async: false, type: "POST", data: { idTipoRegion: idTipoRegion, idPais: idPais, region : region }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevaRegion").val('');
            obtenerRegiones();
        } else {
            alert(res);
        }
    }});
}

function seleccionarRegion(idRegion, idPais, idTipoRegion, region) {
    idRegionSeleccionada = idRegion;
    idTipoRegionSeleccionada = idTipoRegion;
    idPaisRegionSeleccionado = idPais;
    $("#divModalModificarRegionNombreRegion").html("¿Desea cambiar la información de la región: " + region + "?");
    $('#tbNuevoNombreRegion').val(region);
    $.ajax({url: "php/obtenerPaisesSelect.php", async: false, type: "POST", data: { idSelect: "selectPaisRegionesModificarRegion" }, success: function(res) {
        $('#divNuevoPaísRegion').html(res);
        $('#selectPaisRegionesModificarRegion').val(idPais);
    }});
    $.ajax({url: "php/obtenerTiposRegionesSelect.php", async: false, type: "POST", data: { idSelect: "selectTiposRegionesModificarRegion" }, success: function(res) {
        $('#divNuevoTipoRegion').html(res);
        $('#selectTiposRegionesModificarRegion').val(idTipoRegion);
    }});
}

function actualizarRegion() {
    var region;
    var idTipoRegion;
    var idPais;
    if ($("#tbNuevoNombreRegion").val().length > 0) {
        region = $("#tbNuevoNombreRegion").val();
    } else {
        alert("No ha escrito el nombre de la región que desea modificar.");
        return;
    }
    idTipoRegion = $("#selectTiposRegionesModificar").val();
    if (idTipoRegion == null) {
        alert("No ha elegido el tipo de región.");
        return;
    }
    idPais = $("#selectPaisRegionesModificarRegion").val();
    if (idPais == null) {
        alert("No ha elegido el país de la región.");
        return;
    }
    $.ajax({url: "php/actualizarRegion.php", async: false, type: "POST", data: { idTipoRegion: idTipoRegion, idPais: idPais, region : region, idRegion: idRegionSeleccionada }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoNombreRegion").val('');
            obtenerRegiones();
            obtenerRegionesSelect();
            obtenerPaisesSelect();
            alert("Se ha actualizado la región.");
        } else {
            alert(res);
        }
    }});
}

function obtenerRegionesSelect() {
    var idPais;
    idPais = $("#selectPaisCiudades").val();
    $.ajax({url: "php/obtenerRegionesSelect.php", async: false, type: "POST", data: { idSelect: "selectRegionesCiudades", idPais: idPais }, success: function(res) {
        $('#divSelectRegionesCiudades').html(res);
    }});
}

function agregarCiudad() {
    var idPais;
    var idRegion;
    var ciudad;
    if ($("#tbNuevaCiudad").val().length > 0) {
        ciudad = $("#tbNuevaCiudad").val();
    } else {
        alert("No ha escrito el nombre de la ciudad que desea agregar.");
        return;
    }
    idPais = $("#selectPaisCiudades").val();
    if (idPais == null) {
        alert("No ha elegido el país.");
        return;
    }
    idRegion = $("#selectRegionesCiudades").val();
    if (idRegion == null) {
        alert("No ha la región.");
        return;
    }
    $.ajax({url: "php/agregarCiudad.php", async: false, type: "POST", data: { idPais: idPais, idRegion: idRegion, ciudad : ciudad }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevaCiudad").val('');
            obtenerCiudades();
        } else {
            alert(res);
        }
    }});
}

function obtenerCiudades() {
    $.ajax({url: "php/obtenerCiudades.php", async: false, type: "POST", success: function(res) {
        $('#divListaCiudades').html(res);
    }});
}

function seleccionarCiudad(idCiudad, idRegion, idPais, ciudad) {
    idCiudadSeleccionada = idCiudad;
    idRegionCiudadSeleccionada = idRegion;
    idPaisCiudadSeleccionada = idPais;
    $("#divModalModificarCiudadNombreRegion").html("¿Desea cambiar la información de la ciudad: " + ciudad + "?");
    $('#tbNuevoNombreCiudad').val(ciudad);
    $.ajax({url: "php/obtenerPaisesSelect.php", async: false, type: "POST", data: { idSelect: "selectPaisCiudadesModificarCiudad" }, success: function(res) {
        $('#divNuevoPaísCiudad').html(res);
        $('#selectPaisCiudadesModificarCiudad').val(idPais);
        $('#selectPaisCiudadesModificarCiudad').on("change", obtenerRegionesModificarCiudadSelect);
    }});
    $.ajax({url: "php/obtenerRegionesSelect.php", async: false, type: "POST", data: { idSelect: "selectTiposCiudadesModificarRegion", idPais: idPais }, success: function(res) {
        $('#divNuevaRegionCiudad').html(res);
        $('#selectTiposCiudadesModificarRegion').val(idRegion);
    }});
}

function obtenerRegionesModificarCiudadSelect() {
    var idPais;
    idPais = $("#selectPaisCiudadesModificarCiudad").val();
    $.ajax({url: "php/obtenerRegionesSelect.php", async: false, type: "POST", data: { idSelect: "selectTiposCiudadesModificarRegion", idPais: idPais }, success: function(res) {
        $('#divNuevaRegionCiudad').html(res);
    }});
}

function actualizarCiudad() {
    var ciudad;
    var idRegion;
    var idPais;
    if ($("#tbNuevoNombreCiudad").val().length > 0) {
        ciudad = $("#tbNuevoNombreCiudad").val();
    } else {
        alert("No ha escrito el nombre de la ciudad que desea modificar.");
        return;
    }
    idRegion = $("#selectTiposCiudadesModificarRegion").val();
    if (idRegion == null) {
        alert("No ha elegido la región.");
        return;
    }
    idPais = $("#selectPaisCiudadesModificarCiudad").val();
    if (idPais == null) {
        alert("No ha elegido el país de la ciudad.");
        return;
    }
    $.ajax({url: "php/actualizarCiudad.php", async: false, type: "POST", data: { idRegion: idRegion, idPais: idPais, ciudad : ciudad, idCiudad: idCiudadSeleccionada }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoNombreCiudad").val('');
            obtenerCiudades();
            alert("Se ha actualizado la ciudad.");
        } else {
            alert(res);
        }
    }});
}