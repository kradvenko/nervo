//Variables globales para módulo de localidades
var idPaisSeleccionado;
var idRegionSeleccionada;
var idTipoRegionSeleccionada;
var idPaisRegionSeleccionado;
var idCiudadSeleccionada;
var idRegionCiudadSeleccionada;
var idPaisCiudadSeleccionada;
//Variables globales para módulo de instituciones
var categorias = []; 
var categoria;
var contactos = [];
var contacto;
var idInstitucion = 0;
var idContacto = 0;
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
            obtenerRegionesSelect();
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
    idTipoRegion = $("#selectTiposRegionesModificarRegion").val();
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
//Funciones para el módulo de instituciones
function obtenerCategoriasInstitucionSelect() {
    $.ajax({url: "php/obtenerCategoriasInstitucionSelect.php", async: false, type: "POST", data: { idSelect: "selectCategoriasInstitucion" }, success: function(res) {
        $('#divListaCategoriasInstitucion').html(res);
    }});
}

function agregarCategoriaInstitucion() {
    var categoria;
    categoria = $("#tbNuevaCategoria").val();
    $.ajax({url: "php/agregarCategoriaInstitucion.php", async: false, type: "POST", data: { categoria: categoria }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevaCategoria").val('');
            obtenerCategoriasInstitucionSelect();
            alert("Se ha agregado la categoría.");
        } else {
            alert(res);
        }
    }});
}

function agregarCategoria() {
    categoria =  { id: $("#selectCategoriasInstitucion").val(), categoria: $("#selectCategoriasInstitucion").children(":selected").text() };
    categorias[categorias.length] = categoria;
    mostrarCategorias();
}

function mostrarCategorias() {
    $("#divCategoriasInstitucion").html("");
    for (i = 0; i <= categorias.length - 1; i++) {
        categoria = categorias[i];
        $("#divCategoriasInstitucion").html($("#divCategoriasInstitucion").html() + '<span class="tag"><span>' + categoria.categoria + '</span><span href="" onclick="quitarCategoria(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarCategoria(index) {
    categorias.splice(index, 1);
    mostrarCategorias();
}

function obtenerPaisesSelectInstitucion() {
    $.ajax({url: "php/obtenerPaisesSelect.php", async: false, type: "POST", data: { idSelect: "selectPaisInstitucion" }, success: function(res) {
        $('#divPaisSelect').html(res);
        $('#selectPaisInstitucion').on("change", obtenerRegionesInstitucionSelect);
    }});
    obtenerRegionesInstitucionSelect();    
}

function obtenerRegionesInstitucionSelect() {
    var idPais;
    idPais = $("#selectPaisInstitucion").val();
    $.ajax({url: "php/obtenerRegionesSelect.php", async: false, type: "POST", data: { idSelect: "selectRegionInstitucion", idPais: idPais }, success: function(res) {
        $('#divRegionSelect').html(res);
        $('#selectRegionInstitucion').on("change", obtenerCiudadesInstitucionSelect);
    }});
    obtenerCiudadesInstitucionSelect();
}

function obtenerCiudadesInstitucionSelect() {
    var idRegion;
    idRegion = $("#selectRegionInstitucion").val();
    $.ajax({url: "php/obtenerCiudadesSelect.php", async: false, type: "POST", data: { idSelect: "selectCiudadInstitucion", idRegion: idRegion }, success: function(res) {
        $('#divCiudadSelect').html(res);
    }});
}

function guardarInstitucion() {
    var nombreInstitucion = '';
    var sectorInstitucion = '';
    var tipoInstitucion = '';
    var sitioWeb = '';
    var correoElectronico = '';
    var telefonos = '';
    var extension = '';
    var domicilio = '';
    var colonia = '';
    var codigoPostal = '';
    var pais = '';
    var region = '';
    var ciudad = '';

    nombreInstitucion = $("#tbNombreInstitucion").val();
    if (nombreInstitucion.length == 0) {
        alert("No ha intorducido el nombre de la institución.")
        return;
    }
    sectorInstitucion = $("#selectSectorInstitucion").val();
    tipoInstitucion = $("#selectTipoInstitucion").val();
    sitioWeb = $("#tbSitioWeb").val();
    if (sitioWeb.length == 0) {
        sitioWeb = '';
    }
    correoElectronico = $("#tbCorreoElectronico").val();
    if (correoElectronico.length == 0) {
        correoElectronico = '';
    }
    telefonos = $("#tbTelefonosInstitucion").val();
    if (telefonos.length == 0) {
        telefonos = '';
    }
    extension = $("#tbExtensionInstitucion").val();
    if (extension.length == 0) {
        extension = '';
    }
    domicilio = $("#tbDomicilioInstitucion").val();
    if (domicilio.length == 0) {
        domicilio = '';
    }
    colonia = $("#tbColoniaInstitucion").val();
    if (colonia.length == 0) {
        colonia = '';
    }
    codigoPostal = $("#tbCodigoPostalInstitucion").val();
    if (codigoPostal.length == 0) {
        codigoPostal = '';
    }
    pais = $("#selectPaisInstitucion").val();
    region = $("#selectRegionInstitucion").val();
    ciudad = $("#selectCiudadInstitucion").val();
    
    if (idInstitucion == 0) {
        $.ajax({url: "php/agregarInstitucion.php", async: false, type: "POST", data: { nombreInstitucion: nombreInstitucion,
            sectorInstitucion: sectorInstitucion, tipoInstitucion: tipoInstitucion, sitioWeb: sitioWeb,correoElectronico: correoElectronico,
            telefonos: telefonos, extension: extension, domicilio: domicilio, colonia: colonia, codigoPostal: codigoPostal,
            idPais: pais, idRegion: region, idCiudad: ciudad, categorias: categorias }, success: function(res) {
                alert(res);
                limpiarCamposInstitucion();
                obtenerInstituciones();
        }});
    } else {
        $.ajax({url: "php/actualizarInstitucion.php", async: false, type: "POST", data: { idInstitucion: idInstitucion, nombreInstitucion: nombreInstitucion,
            sectorInstitucion: sectorInstitucion, tipoInstitucion: tipoInstitucion, sitioWeb: sitioWeb,correoElectronico: correoElectronico,
            telefonos: telefonos, extension: extension, domicilio: domicilio, colonia: colonia, codigoPostal: codigoPostal,
            idPais: pais, idRegion: region, idCiudad: ciudad, categorias: categorias }, success: function(res) {
                alert(res);
                limpiarCamposInstitucion();
                obtenerInstituciones();
        }});
    }
}

function obtenerInstituciones() {
    $.ajax({url: "php/obtenerInstituciones.php", async: false, type: "POST", success: function(res) {
        $('#divListaInstituciones').html(res);
    }});
}

function elegirInstitucion(id) {
    idInstitucion = id;
    $.ajax({url: "php/obtenerInstitucionXML.php", async: false, type: "POST", data: { idInstitucion: idInstitucion }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            $("#tbNombreInstitucion").val($(this).find("nombreInstitucion").text());
            $("#selectSectorInstitucion").val($(this).find("sectorInstitucion").text());
            $("#selectTipoInstitucion").val($(this).find("tipoInstitucion").text());
            $("#tbSitioWeb").val($(this).find("sitioWeb").text());
            $("#tbCorreoElectronico").val($(this).find("correoElectronico").text());
            $("#tbTelefonosInstitucion").val($(this).find("telefonos").text());
            $("#tbExtensionInstitucion").val($(this).find("extension").text());
            $("#tbDomicilioInstitucion").val($(this).find("domicilio").text());
            $("#tbColoniaInstitucion").val($(this).find("colonia").text());
            $("#tbCodigoPostalInstitucion").val($(this).find("codigoPostal").text());
            $("#selectPaisInstitucion").val($(this).find("idpais").text());
            obtenerRegionesInstitucionSelect();
            $("#selectRegionInstitucion").val($(this).find("idregion").text());
            obtenerCiudadesInstitucionSelect();
            $("#selectCiudadInstitucion").val($(this).find("idciudad").text());
        });
    }});
    $.ajax({url: "php/obtenerCategoriasInstitucionXML.php", async: false, type: "POST", data: { idInstitucion: idInstitucion }, success: function(res) {
        categorias = [];
        $('cat', res).each(function(index, element) {
            categoria =  { id: $(this).find("idcategoria").text(), categoria: $(this).find("categoria").text() };
            categorias[categorias.length] = categoria;            
        });
    }});
    mostrarCategorias();
    mostrarContactos();
    limpiarCamposContacto();
}

function limpiarCamposInstitucion() {
    $("#tbNombreInstitucion").val('');
    $("#tbSitioWeb").val('');
    $("#tbCorreoElectronico").val('');
    $("#tbTelefonosInstitucion").val('');
    $("#tbExtensionInstitucion").val('');
    $("#tbExtensionInstitucion").val('');
    $("#tbDomicilioInstitucion").val('');
    $("#tbColoniaInstitucion").val('');
    $("#tbCodigoPostalInstitucion").val('');
    idInstitucion = 0;
    categorias = [];
    mostrarCategorias();
    ocultarContactos();
}

function mostrarContactos() {
    $("#divContactos").css("visibility", "visible");
    obtenerContactos();
}

function ocultarContactos() {
    $("#divContactos").css("visibility", "hidden");
}

function guardarContacto() {
    var nombreContacto;
    var area;
    var telefonos;
    var extension;
    var correoElectronico;
    var notas;

    if (idInstitucion == 0) {
        alert("No ha elegido una institución.");
        return;
    }

    nombreContacto = $("#tbNombreContacto").val();
    if (nombreContacto.length <= 0) {
        alert("No ha ingresado el nombre del contacto.");
        return;
    }
    area = $("#tbAreaContacto").val();
    telefonos = $("#tbTelefonosContacto").val();
    extension = $("#tbExtensionContacto").val();
    correoElectronico = $("#tbCorreoElectronicoContacto").val();
    notas = $("#tbNotasContacto").val();

    if (idContacto == 0) {
        $.ajax({url: "php/agregarContacto.php", async: false, type: "POST", data: { idInstitucion: idInstitucion, nombreContacto: nombreContacto, area: area, telefonos: telefonos, extension: extension, correoElectronico: correoElectronico, notas: notas }, success: function(res) {
            alert(res);
            obtenerContactos();
            limpiarCamposContacto();
        }});
    } else {
        $.ajax({url: "php/actualizarContacto.php", async: false, type: "POST", data: { idContacto: idContacto, nombreContacto: nombreContacto, area: area, telefonos: telefonos, extension: extension, correoElectronico: correoElectronico, notas: notas }, success: function(res) {
            alert(res);
            obtenerContactos();
            limpiarCamposContacto();
        }});
    }
}

function obtenerContactos() {
    $.ajax({url: "php/obtenerContactos.php", async: false, type: "POST", data: { idInstitucion: idInstitucion }, success: function(res) {
        $('#divListaContactos').html(res);
    }});
}

function limpiarCamposContacto() {
    $("#tbNombreContacto").val('');
    $("#tbAreaContacto").val('');
    $("#tbTelefonosContacto").val('');
    $("#tbExtensionContacto").val('');
    $("#tbCorreoElectronicoContacto").val('');
    $("#tbNotasContacto").val('');
    idContacto = 0;
}

function elegirContacto(id) {
    idContacto = id;
    $.ajax({url: "php/obtenerContactoXML.php", async: false, type: "POST", data: { idContacto: idContacto }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            $("#tbNombreContacto").val($(this).find("nombreContacto").text());
            $("#tbAreaContacto").val($(this).find("area").text());
            $("#tbTelefonosContacto").val($(this).find("telefonos").text());
            $("#tbExtensionContacto").val($(this).find("extension").text());
            $("#tbCorreoElectronicoContacto").val($(this).find("correoElectronico").text());
            $("#tbNotasContacto").val($(this).find("notas").text());
        });
    }});
}