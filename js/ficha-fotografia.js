//Variables para la ficha de fotografia
var ff_LugarAsunto;
var ff_LugarToma;
var ff_Autor;
var ff_Estudio;
var ff_Album;
var ff_InstitucionElegida;
var ff_InstitucionElegidaNuevoAlbum;
var ff_temas = [];
var ff_tema;
var ff_tecnicas = [];
var ff_tecnica;
var ff_soportesFlexibles = [];
var ff_soporteFlexible;
var ff_soportesRigidos = [];
var ff_soporteRigido;
var ff_generos = [];
var ff_genero;

function agregarNuevoAutor() {
    var autor;
    if ($("#tbNuevoAutor").val().length > 0) {
        autor = $("#tbNuevoAutor").val();
    } else {
        alert("No ha escrito el nombre del autor.");
        return;
    }
    $.ajax({url: "php/agregarAutor.php", async: false, type: "POST", data: { autor : autor }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoAutor").val('');
            $('#modalAgregarAutor').modal('hide');
        } else {
            alert(res);
        }
    }});
}

function agregarNuevoEstudio() {
    var estudio;
    if ($("#tbNuevoEstudio").val().length > 0) {
        estudio = $("#tbNuevoEstudio").val();
    } else {
        alert("No ha escrito el nombre del estudio.");
        return;
    }
    $.ajax({url: "php/agregarEstudio.php", async: false, type: "POST", data: { estudio : estudio }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoEstudio").val('');
            $('#modalAgregarEstudio').modal('hide');
        } else {
            alert(res);
        }
    }});
}

function agregarNuevoAlbum() {
    var nombre;
    var institucion;
    var descripcion;
    var numeroFotografias;

    if ($("#tbNuevoAlbumNombre").val().length > 0) {
        nombre = $("#tbNuevoAlbumNombre").val();
    } else {
        alert("No ha escrito el nombre del albúm.");
        return;
    }
    institucion = ff_InstitucionElegidaNuevoAlbum;
    if (institucion <= 0) {
        alert("No ha elegido una institución para el albúm.")
        return;
    }
    descripcion = $("#tbNuevoAlbumDescripcion").val();
    numeroFotografias = $("#tbNuevoAlbumFotografias").val();
    if (numeroFotografias.length == 0) {
        numeroFotografias = 0;
    }
    if (isNaN(numeroFotografias)) {
        alert("No ha introducido un número de fotografías válido.")
        return;
    }

    $.ajax({url: "php/agregarAlbum.php", async: false, type: "POST", data: { nombre : nombre, institucion : institucion, descripcion : descripcion, numeroFotografias : numeroFotografias }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoAlbumNombre").val('');
            $("#tbNuevoAlbumInstitucion").val('');
            $("#tbNuevoAlbumDescripcion").val('');
            $("#tbNuevoAlbumFotografias").val('');
            $('#modalAgregarAlbum').modal('hide');
        } else {
            alert(res);
        }
    }});
}
//Temas
function agregarNuevoTema() {
    var tema;
    if ($("#tbNuevoTema").val().length > 0) {
        tema = $("#tbNuevoTema").val();
    } else {
        alert("No ha escrito el tema.");
        return;
    }
    $.ajax({url: "php/agregarTema.php", async: false, type: "POST", data: { tema : tema }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoTema").val('');
            $('#modalAgregarTema').modal('hide');
        } else {
            alert(res);
        }
    }});
}

function agregarTema(id, tema) {
    ff_tema = { id : id, tema : tema };
    ff_temas[ff_temas.length] = ff_tema;
    mostrarTemas();
}

function mostrarTemas() {
    $("#divTemas").html("");
    for (i = 0; i <= ff_temas.length - 1; i++) {
        ff_tema = ff_temas[i];
        $("#divTemas").html($("#divTemas").html() + '<span class="tag"><span>' + ff_tema.tema + '</span><span href="" onclick="quitarTema(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarTema(index) {
    ff_temas.splice(index, 1);
    mostrarTemas();
}
//Técnicas fotográficas
function agregarNuevaTecnica() {
    var tecnica;
    if ($("#tbNuevaTecnica").val().length > 0) {
        tecnica = $("#tbNuevaTecnica").val();
    } else {
        alert("No ha escrito la técnica o proceso fotográfico.");
        return;
    }
    $.ajax({url: "php/agregarTecnica.php", async: false, type: "POST", data: { tecnica : tecnica }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevaTecnica").val('');
            $('#modalAgregarTecnica').modal('hide');
        } else {
            alert(res);
        }
    }});
}

function agregarTecnica(id, tecnica) {
    ff_tecnica = { id : id, tecnica : tecnica };
    ff_tecnicas[ff_tecnicas.length] = ff_tecnica;
    mostrarTecnicas();
}

function mostrarTecnicas() {
    $("#divTecnicas").html("");
    for (i = 0; i <= ff_tecnicas.length - 1; i++) {
        ff_tecnica = ff_tecnicas[i];
        $("#divTecnicas").html($("#divTecnicas").html() + '<span class="tag"><span>' + ff_tecnica.tecnica + '</span><span href="" onclick="quitarTecnica(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarTecnica(index) {
    ff_tecnicas.splice(index, 1);
    mostrarTecnicas();
}