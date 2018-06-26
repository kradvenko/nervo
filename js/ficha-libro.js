//Variables para la ficha de libro
var fl_IdFichaLibro = 0;
var fl_Autores = [];
var fl_Autor;
var fl_Ilustradores = [];
var fl_Ilustrador;
var fl_InstitucionElegida = 0;
var fl_temas = [];
var fl_tema;
var fl_generosLiterarios = [];
var fl_generoLiterario;
var fl_tiposEncuadernacion = [];
var fl_tipoEncuadernacion;
var fl_tecnicasImpresion = [];
var fl_tecnicaImpresion;
var fl_tiposPapel = [];
var fl_tipoPapel;
var fl_PersonaToma = 0;
var fl_Reader;
var fl_idEnlaceWeb = 0;
var fl_idImagenElegida = 0;
var idPendienteBien = 0;
var fl_idPdfElegido = 0;
//Funciones de elección de datos
function elegirInstitucionBien(id) {
    fl_InstitucionElegida = id;
}

function elegirPersonaToma(id) {
    fl_PersonaToma = id;
}

function obtenerIdiomasSelect() {
    $.ajax({url: "php/obtenerIdiomasSelect.php", async: false, type: "POST", data: { idSelect : "selIdioma" }, success: function(res) {
        $("#divIdiomas").html(res);
    }});
}

function agregarNuevoIdioma() {
    var idioma = $("#tbNuevoIdioma").val();
    $.ajax({url: "php/agregarIdioma.php", async: false, type: "POST", data: { idioma : idioma }, success: function(res) {
        $("#tbNuevoIdioma").val("");
        $('#modalAgregarIdioma').modal('hide');
        obtenerIdiomasSelect();
    }});
}

function obtenerTemas() {
    $.ajax({url: "php/obtenerTemasSelect.php", async: false, type: "POST", data: { idSelect : "selTemas" }, success: function(res) {
        $("#divTemasSelect").html(res);
    }});
}

//Funciones de la ficha
function guardarFichaLibro() {
    var idInstitucion = fl_InstitucionElegida;
    var numeroRegistroInterno = $("#tbNumeroInterno").val();
    var numeroInventario = $("#tbNumeroInventario").val();
    var tituloPublicacion = $("#tbTitulo").val();
    var subTitulo = $("#tbSubtitulo").val();
    var imprenta = $("#tbImprenta").val();
    var prologo = $("#taPrologo").val();
    var compiladores = $("#taCompiladores").val();
    var editorial = $("#tbEditorial").val();
    var lugarEdicion = $("#tbLugarEdicion").val();
    var idioma = $("#selIdioma").val();
    if (idioma == null) {
        idioma = 0;
    }
    var fechaEdicion = $("#tbFechaEdicion").val();
    var fechaImpresion = $("#tbFechaImpresion").val();
    var fechaReimpresion = $("#tbFechaReimpresion").val();
    var isbn = $("#tbISBN").val();
    var volumen = $("#tbVolumen").val();
    var tomo = $("#tbTomo").val();
    var tiraje = $("#tbTiraje").val();
    var ejemplares = $("#tbEjemplares").val();
    var ciudad = $("#tbCiudad").val();
    var coleccion = $("#tbColeccion").val();
    var numeroTotalColeccion = $("#tbNumeroTotalColeccion").val();    
    var anotaciones = $('#taAnotaciones').val();
    var contextoHistorico = $('#taContextoHistorico').val();
    var estadoConservacion = $('#sEstadoConservacion').val();
    var estadoIntegridad = $("#sEstadoIntegridad").val();
    /*
    var arrugas = $("#cbArrugas").is(":checked") ? "SI" : "NO";
    var ataqueBiologico = $("#cbAtaque").is(":checked") ? "SI" : "NO";    
    var cintasAdhesivas = $("#cbCintas").is(":checked") ? "SI" : "NO";
    var deformaciones = $("#cbDeformaciones").is(":checked") ? "SI" : "NO";
    var deshojado = $("#cbDeshojado").is(":checked") ? "SI" : "NO";
    var etiquetas = $("#cbEtiquetas").is(":checked") ? "SI" : "NO";    
    var huellasDigitales = $("#cbHuellas").is(":checked") ? "SI" : "NO";
    var hongos = $("#cbHongos").is(":checked") ? "SI" : "NO";
    var manchas = $("#cbManchas").is(":checked") ? "SI" : "NO";
    var rasgaduras = $("#cbRasgaduras").is(":checked") ? "SI" : "NO";
    var ralladuras = $("#cbRalladuras").is(":checked") ? "SI" : "NO";
    var retocado = $("#cbRetocado").is(":checked") ? "SI" : "NO";
    var roturas = $("#cbRoturas").is(":checked") ? "SI" : "NO";
    var sellosTinta = $("#cbSellos").is(":checked") ? "SI" : "NO";
    var otros = $('#tbOtros').val(); 
    var numeroFragmentos = $('#tbNumeroFragmentos').val();
    var alto = $('#tbAlto').val();
    var ancho = $('#tbAncho').val();
    var profundidad = $('#tbProfundidad').val();
    var pieImprenta = $('#tbPieImprenta').val();
    var inspeccionesOMarcas = $('#taInspecciones').val();
    var caracteristicas = $('#taCaracteristicas').val();
    */
    var idPersonaCaptura = getCookie("idusuario");
    var currentdate = new Date(); 
    var fechaCaptura = (currentdate.getDate() < 10 ? "0" + currentdate.getDate() : currentdate.getDate()) + "/"
                + ((currentdate.getMonth() + 1) < 10 ? ("0" + (currentdate.getMonth() + 1)) : (currentdate.getMonth() + 1)) + "/" 
                + currentdate.getFullYear() + " @ "  
                + (currentdate.getHours() < 10 ? ("0" + currentdate.getHours()) : currentdate.getHours()) + ":"  
                + (currentdate.getMinutes() < 10 ? ("0" + currentdate.getMinutes()) : currentdate.getMinutes()) + ":"  
                + (currentdate.getSeconds() < 10 ? ("0" + currentdate.getSeconds()) : currentdate.getSeconds());
    var estado = "ACTIVO";
    var autores = fl_Autores;
    var ilustradores = fl_Ilustradores;
    var temas = fl_temas;
    var generosLiterarios = fl_generosLiterarios;
    var tiposEncuadernacion = fl_tiposEncuadernacion;
    var tecnicasImpresion = fl_tecnicasImpresion;
    var tiposPapel = fl_tiposPapel;

    if (fl_IdFichaLibro == 0) {
        $.ajax({url: "php/agregarFichaLibro.php", async: false, type: "POST", data: { idInstitucion : idInstitucion, numeroRegistroInterno: numeroRegistroInterno,
            numeroInventario: numeroInventario, tituloPublicacion: tituloPublicacion, subTitulo: subTitulo, imprenta: imprenta, prologo: prologo,
            compiladores: compiladores, editorial: editorial, lugarEdicion: lugarEdicion, idioma: idioma, fechaEdicion: fechaEdicion, fechaImpresion: fechaImpresion,
            fechaReimpresion: fechaReimpresion, isbn: isbn, volumen: volumen, tomo: tomo, tiraje: tiraje, ejemplares: ejemplares, ciudad: ciudad, coleccion: coleccion, numeroTotalColeccion,
            anotaciones: anotaciones, contextoHistorico: contextoHistorico, estadoConservacion: estadoConservacion, estadoIntegridad: estadoIntegridad,            
            idPersonaCaptura: idPersonaCaptura, fechaCaptura: fechaCaptura, estado: estado,
            autores: autores, ilustradores: ilustradores, temas: temas, generosLiterarios, tiposEncuadernacion, tecnicasImpresion, tiposPapel },
            success: function(res) {
            if (res > 0) {
                obtenerUltimasFichasLibro();
                //limpiarCamposFichaPublicacion();
                fl_IdFichaLibro = res;
                $("#divEnlacesWeb").css("visibility", "visible");
                $("#divImagenesBien").css("visibility", "visible");
                $("#divPendientes").css("visibility", "visible");
                alert("Se ha ingresado la ficha del libro.");
            } else {
                alert(res);
            }
        }});
    } else {
        $.ajax({url: "php/actualizarFichaLibro.php", async: false, type: "POST", data: { idFichaLibro: fl_IdFichaLibro, idInstitucion : idInstitucion, numeroRegistroInterno: numeroRegistroInterno,
            numeroInventario: numeroInventario, tituloPublicacion: tituloPublicacion, subTitulo: subTitulo, imprenta: imprenta, prologo: prologo,
            compiladores: compiladores, editorial: editorial, lugarEdicion: lugarEdicion, idioma: idioma, fechaEdicion: fechaEdicion, fechaImpresion: fechaImpresion,
            fechaReimpresion: fechaReimpresion, isbn: isbn, volumen: volumen, tomo: tomo, tiraje: tiraje, ejemplares: ejemplares, ciudad: ciudad, coleccion: coleccion, numeroTotalColeccion,
            anotaciones: anotaciones, contextoHistorico: contextoHistorico, estadoConservacion: estadoConservacion, estadoIntegridad: estadoIntegridad,            
            idPersonaCaptura: idPersonaCaptura, fechaCaptura: fechaCaptura, estado: estado,
            autores: autores, ilustradores: ilustradores, temas: temas, generosLiterarios, tiposEncuadernacion, tecnicasImpresion, tiposPapel },
            success: function(res) {
            if (res == 'OK') {
                obtenerUltimasFichasLibro();
                limpiarCamposFichaLibro();
                alert("Se ha actualizado la ficha del libro.");
            } else {
                alert(res);
            }
        }});
    }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        fl_Reader = new FileReader();        
        fl_Reader.onload = function (e) {
            $('#imgImagen').attr('src', e.target.result);
        }        
        fl_Reader.readAsDataURL(input.files[0]);
    }
}

function limpiarCamposAgregarImagen() {
    fl_Reader = null;
    $('#imgImagen').attr('src', '');
    $("#tbTomaPersona").val("");
    $("#tbTomaFecha").val("");
    $("#imgInp").val("");    
}

function obtenerUltimasFichasLibro() {
    $.ajax({url: "php/obtenerUltimasFichasLibro.php", async: false, type: "POST", success: function(res) {
        $("#divUltimasFichas").html(res);
    }});
}

function elegirFichaLibro(id) {
    fl_IdFichaLibro = id;
    $.ajax({url: "php/obtenerFichaLibroXML.php", async: false, type: "POST", data: { idFichaLibro : id }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            $("#tbInstitucion").val($(this).find("nombreInstitucion").text());
            fl_InstitucionElegida = $(this).find("idinstitucion").text();
            $("#tbNumeroInterno").val($(this).find("numeroregistrointerno").text());
            $("#tbNumeroInventario").val($(this).find("numeroinventario").text());
            $("#tbTitulo").val($(this).find("titulo").text());
            $("#tbSubtitulo").val($(this).find("subtitulo").text());
            $("#tbImprenta").val($(this).find("imprenta").text());
            $("#taPrologo").val($(this).find("prologo").text());
            $("#taCompiladores").val($(this).find("compiladores").text());
            $("#tbEditorial").val($(this).find("editorial").text());
            $("#tbLugarEdicion").val($(this).find("lugaredicion").text());
            $("#selIdioma").val($(this).find("ididioma").text());
            $("#tbFechaEdicion").val($(this).find("fechaedicion").text());
            $("#tbFechaImpresion").val($(this).find("fechaimpresion").text());
            $("#tbFechaReimpresion").val($(this).find("fechareimpresion").text());
            $("#tbISBN").val($(this).find("isbn").text());
            $("#tbVolumen").val($(this).find("volumen").text());
            $("#tbTomo").val($(this).find("tomo").text());
            $("#tbTiraje").val($(this).find("tiraje").text());
            $("#tbEjemplares").val($(this).find("ejemplares").text());
            $("#tbColeccion").val($(this).find("coleccion").text());
            $("#tbNumeroTotalColeccion").val($(this).find("numerototalcoleccion").text()); 
            $("#taAnotaciones").val($(this).find("anotaciones").text());
            $("#taContextoHistorico").val($(this).find("contextohistorico").text());
            $("#sEstadoConservacion").val($(this).find("estadoconservacion").text());
            $("#sEstadoIntegridad").val($(this).find("estadointegridad").text());
            /*$(this).find("arrugas").text() == 'SI' ? $("#cbArrugas").prop("checked", true) : $("#cbArrugas").prop("checked", false);
            $("#tbAlto").val($(this).find("alto").text());
            $("#tbAncho").val($(this).find("ancho").text());
            $("#tbProfundidad").val($(this).find("profundidad").text());
            $("#tbOtros").val($(this).find("otros").text());
            $("#tbNumeroFragmentos").val($(this).find("numerofragmentos").text());
            $("#tbPieImprenta").val($(this).find("pieimprenta").text());
            $("#taInspecciones").val($(this).find("inspeccionesomarcas").text());
            $("#taCaracteristicas").val($(this).find("caracteristicas").text());*/
            $("#divInformacionCaptura").html("Capturado por: " + $(this).find("nombre").text() + " - " + $(this).find("fechacaptura").text());
            $("#divEnlacesWeb").css("visibility", "visible");
            $("#divImagenesBien").css("visibility", "visible");
            $("#divPendientes").css("visibility", "visible");
        });
    }});
    $.ajax({url: "php/obtenerAutoresLibroXML.php", async: false, type: "POST", data: { idFichaLibro : id }, success: function(res) {
        fl_Autores = [];
        $('cat', res).each(function(index, element) {
            fl_Autor =  { id: $(this).find("idautor").text(), autor: $(this).find("autor").text() };
            fl_Autores[fl_Autores.length] = fl_Autor;
        });
    }});
    $.ajax({url: "php/obtenerIlustradoresLibroXML.php", async: false, type: "POST", data: { idFichaLibro : id }, success: function(res) {
        fl_Ilustradores = [];
        $('cat', res).each(function(index, element) {
            fl_Ilustrador =  { id: $(this).find("idautor").text(), ilustrador: $(this).find("autor").text() };
            fl_Ilustradores[fl_Ilustradores.length] = fl_Ilustrador;
        });
    }});
    $.ajax({url: "php/obtenerTemasLibroXML.php", async: false, type: "POST", data: { idFichaLibro : id }, success: function(res) {
        fl_temas = [];
        $('cat', res).each(function(index, element) {
            fl_tema =  { id: $(this).find("idtema").text(), tema: $(this).find("tema").text() };
            fl_temas[fl_temas.length] = fl_tema;
        });
    }});
    $.ajax({url: "php/obtenerGenerosLiterariosLibroXML.php", async: false, type: "POST", data: { idFichaLibro : id }, success: function(res) {
        fl_generosLiterarios = [];
        $('cat', res).each(function(index, element) {
            fl_generoLiterario =  { id: $(this).find("idgeneroliterario").text(), genero: $(this).find("genero").text() };
            fl_generosLiterarios[fl_generosLiterarios.length] = fl_generoLiterario;
        });
    }});
    $.ajax({url: "php/obtenerTiposEncuadernacionLibroXML.php", async: false, type: "POST", data: { idFichaLibro : id }, success: function(res) {
        fl_tiposEncuadernacion = [];
        $('cat', res).each(function(index, element) {
            fl_tipoEncuadernacion =  { id: $(this).find("idtipoencuadernacion").text(), tipo: $(this).find("tipoencuadernacion").text() };
            fl_tiposEncuadernacion[fl_tiposEncuadernacion.length] = fl_tipoEncuadernacion;
        });
    }});
    $.ajax({url: "php/obtenerTecnicasImpresionLibroXML.php", async: false, type: "POST", data: { idFichaLibro : id }, success: function(res) {
        fl_tecnicasImpresion = [];
        $('cat', res).each(function(index, element) {
            fl_tecnicaImpresion =  { id: $(this).find("idtecnicaimpresion").text(), tecnica: $(this).find("tecnicaimpresion").text() };
            fl_tecnicasImpresion[fl_tecnicasImpresion.length] = fl_tecnicaImpresion;
        });
    }});
    $.ajax({url: "php/obtenerTiposPapelLibroXML.php", async: false, type: "POST", data: { idFichaLibro : id }, success: function(res) {
        fl_tiposPapel = [];
        $('cat', res).each(function(index, element) {
            fl_tipoPapel =  { id: $(this).find("idtipopapel").text(), tipo: $(this).find("tipopapel").text() };
            fl_tiposPapel[fl_tiposPapel.length] = fl_tipoPapel;
        });
    }});
    
    mostrarAutores();
    mostrarIlustradores();
    mostrarTemas();
    mostrarGenerosLiterarios();
    mostrarTecnicasImpresion();
    mostrarTiposPapel();
    mostrarTiposEncuadernacion();
}

function limpiarCamposFichaLibro () {
    fl_IdFichaLibro = 0;
    fl_Autores = [];
    fl_Ilustradores  = [];
    fl_Album = 0;
    fl_InstitucionElegida = 0;
    fl_InstitucionElegidaNuevoAlbum = 0;
    fl_IdPublicacionElegida = 0;
    fl_temas = [];
    fl_tema = 0;
    fl_PersonaToma = 0;
    fl_generosLiterarios = [];
    fl_tiposEncuadernacion = [];
    fl_tecnicasImpresion = [];
    fl_tiposPapel = [];
    $("#tbInstitucion").val("");
    $("#tbNumeroInterno").val("");
    $("#tbNumeroInventario").val("");
    $("#tbTitulo").val("");
    $("#tbSubtitulo").val("");
    $("#tbImprenta").val("");
    $("#taPrologo").val("");
    $("#taCompiladores").val("");
    $("#tbEditorial").val("");
    $("#tbLugarEdicion").val("");
    $("#selIdioma").val("");
    $("#tbFechaEdicion").val("");
    $("#tbFechaImpresion").val("");
    $("#tbFechaReimpresion").val("");
    $("#tbISBN").val("");
    $("#tbVolumen").val("");
    $("#tbTomo").val("");
    $("#tbTiraje").val("");
    $("#tbEjemplares").val("");
    $("#tbColeccion").val("");
    $("#tbNumeroTotalColeccion").val("");    
    $("#taAnotaciones").val("");
    $("#taContextoHistorico").val("");
    $("#sEstadoConservacion").val("");
    $("#sEstadoIntegridad").val("");
    //$("#cbSellos").prop("checked", false);
    $("#divInformacionCaptura").html("");
    $("#divAutores").html("");
    $("#divIlustradores").html("");
    $("#divTemas").html("");
    $("#divGenerosLiterarios").html("");
    $("#divTiposEncuadernacion").html("");
    $("#divTecnicasImpresion").html("");
    $("#divTiposPapel").html("");
    $("#divEnlacesWeb").css("visibility", "hidden");
    $("#divImagenesBien").css("visibility", "hidden");
    $("#divPendientes").css("visibility", "hidden");
}
//Autores
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

function agregarAutor(id, autor) {
    fl_Autor = { id : id, autor : autor };
    fl_Autores[fl_Autores.length] = fl_Autor;
    mostrarAutores();
}

function mostrarAutores() {
    $("#divAutores").html("");
    for (i = 0; i <= fl_Autores.length - 1; i++) {
        fl_Autor = fl_Autores[i];
        $("#divAutores").html($("#divAutores").html() + '<span class="tag"><span>' + fl_Autor.autor + '</span><span href="" onclick="quitarAutor(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarAutor(index) {
    fl_Autores.splice(index, 1);
    mostrarAutores();
}
//Ilustradores
function agregarIlustrador(id, ilustrador) {
    fl_Ilustrador = { id : id, ilustrador : ilustrador };
    fl_Ilustradores[fl_Ilustradores.length] = fl_Ilustrador;
    mostrarIlustradores();
}

function mostrarIlustradores() {
    $("#divIlustradores").html("");
    for (i = 0; i <= fl_Ilustradores.length - 1; i++) {
        fl_Ilustrador = fl_Ilustradores[i];
        $("#divIlustradores").html($("#divIlustradores").html() + '<span class="tag"><span>' + fl_Ilustrador.ilustrador + '</span><span href="" onclick="quitarIlustrador(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarIlustrador(index) {
    fl_Ilustradores.splice(index, 1);
    mostrarIlustradores();
}
//Generos literarios
function agregarNuevoGeneroLiterario() {
    var genero;
    if ($("#tbNuevoGeneroLiterario").val().length > 0) {
        genero = $("#tbNuevoGeneroLiterario").val();
    } else {
        alert("No ha escrito el nombre del género literario.");
        return;
    }
    $.ajax({url: "php/agregarGeneroLiterario.php", async: false, type: "POST", data: { genero : genero }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoGeneroLiterario").val('');
            $('#modalAgregarGeneroLiterario').modal('hide');
            obtenerGenerosLiterariosSelect();
        } else {
            alert(res);
        }
    }});
}

function obtenerGenerosLiterariosSelect() {
    $.ajax({url: "php/obtenerGenerosLiterariosSelect.php", async: false, type: "POST", data: { idSelect : "selGenerosLiterarios" }, success: function(res) {
        $("#divGenerosLiterariosSelect").html(res);
    }});
}

function agregarGeneroLiterarioSelect() {
    var id = $("#selGenerosLiterarios").val();
    var genero = $( "#selGenerosLiterarios option:selected" ).text();
    agregarGeneroLiterario(id, genero);
}

function agregarGeneroLiterario(id, genero) {
    fl_generoLiterario = { id : id, genero : genero };
    fl_generosLiterarios[fl_generosLiterarios.length] = fl_generoLiterario;
    mostrarGenerosLiterarios();
}

function mostrarGenerosLiterarios() {
    $("#divGenerosLiterarios").html("");
    for (i = 0; i <= fl_generosLiterarios.length - 1; i++) {
        fl_generoLiterario = fl_generosLiterarios[i];
        $("#divGenerosLiterarios").html($("#divGenerosLiterarios").html() + '<span class="tag"><span>' + fl_generoLiterario.genero + '</span><span href="" onclick="quitarGeneroLiterario(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarGeneroLiterario(index) {
    fl_generosLiterarios.splice(index, 1);
    mostrarGenerosLiterarios();
}
//Tipos de encuadernación
function agregarNuevoTipoEncuadernacion() {
    var tipoEncuadernacion;
    if ($("#tbNuevoTipoEncuadernacion").val().length > 0) {
        tipoEncuadernacion = $("#tbNuevoTipoEncuadernacion").val();
    } else {
        alert("No ha escrito el nombre del tipo de encuadernación.");
        return;
    }
    $.ajax({url: "php/agregarTipoEncuadernacion.php", async: false, type: "POST", data: { tipoEncuadernacion : tipoEncuadernacion }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoTipoEncuadernacion").val('');
            $('#modalAgregarTipoEncuadernacion').modal('hide');
        } else {
            alert(res);
        }
    }});
}

function agregarTipoEncuadernacion(id, tipo) {
    fl_tipoEncuadernacion = { id : id, tipo : tipo };
    fl_tiposEncuadernacion[fl_tiposEncuadernacion.length] = fl_tipoEncuadernacion;
    mostrarTiposEncuadernacion();
}

function mostrarTiposEncuadernacion() {
    $("#divTiposEncuadernacion").html("");
    for (i = 0; i <= fl_tiposEncuadernacion.length - 1; i++) {
        fl_tipoEncuadernacion = fl_tiposEncuadernacion[i];
        $("#divTiposEncuadernacion").html($("#divTiposEncuadernacion").html() + '<span class="tag"><span>' + fl_tipoEncuadernacion.tipo + '</span><span href="" onclick="quitarTipoEncuadernacion(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarTipoEncuadernacion(index) {
    fl_tiposEncuadernacion.splice(index, 1);
    mostrarTiposEncuadernacion();
}
//Tecnicas de impresión
function agregarNuevaTecnicaImpresion() {
    var tecnicaImpresion;
    if ($("#tbNuevaTecnicaImpresion").val().length > 0) {
        tecnicaImpresion = $("#tbNuevaTecnicaImpresion").val();
    } else {
        alert("No ha escrito el nombre de la técnica de impresión.");
        return;
    }
    $.ajax({url: "php/agregarTecnicaImpresion.php", async: false, type: "POST", data: { tecnicaImpresion : tecnicaImpresion }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevaTecnicaImpresion").val('');
            $('#modalAgregarTecnicaImpresion').modal('hide');
        } else {
            alert(res);
        }
    }});
}

function agregarTecnicaImpresion(id, tecnica) {
    fl_tecnicaImpresion = { id : id, tecnica : tecnica };
    fl_tecnicasImpresion[fl_tecnicasImpresion.length] = fl_tecnicaImpresion;
    mostrarTecnicasImpresion();
}

function mostrarTecnicasImpresion() {
    $("#divTecnicasImpresion").html("");
    for (i = 0; i <= fl_tecnicasImpresion.length - 1; i++) {
        fl_tecnicaImpresion = fl_tecnicasImpresion[i];
        $("#divTecnicasImpresion").html($("#divTecnicasImpresion").html() + '<span class="tag"><span>' + fl_tecnicaImpresion.tecnica + '</span><span href="" onclick="quitarTecnicaImpresion(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarTecnicaImpresion(index) {
    fl_tecnicasImpresion.splice(index, 1);
    mostrarTecnicasImpresion();
}
//Tipos de papel
function agregarNuevoTipoPapel() {
    var tipoPapel;
    if ($("#tbNuevoTipoPapel").val().length > 0) {
        tipoPapel = $("#tbNuevoTipoPapel").val();
    } else {
        alert("No ha escrito el nombre del tipo de papel.");
        return;
    }
    $.ajax({url: "php/agregarTipoPapel.php", async: false, type: "POST", data: { tipoPapel : tipoPapel }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoTipoPapel").val('');
            $('#modalAgregarTipoPapel').modal('hide');
        } else {
            alert(res);
        }
    }});
}

function agregarTipoPapel(id, tipo) {
    fl_tipoPapel = { id : id, tipo : tipo };
    fl_tiposPapel[fl_tiposPapel.length] = fl_tipoPapel;
    mostrarTiposPapel();
}

function mostrarTiposPapel() {
    $("#divTiposPapel").html("");
    for (i = 0; i <= fl_tiposPapel.length - 1; i++) {
        fl_tipoPapel = fl_tiposPapel[i];
        $("#divTiposPapel").html($("#divTiposPapel").html() + '<span class="tag"><span>' + fl_tipoPapel.tipo + '</span><span href="" onclick="quitarTipoPapel(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarTipoPapel(index) {
    fl_tiposPapel.splice(index, 1);
    mostrarTiposPapel();
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
            obtenerTemas();
        } else {
            alert(res);
        }
    }});
}

function agregarTemaSelect() {
    var id = $("#selTemas").val();
    var tema = $( "#selTemas option:selected" ).text();
    agregarTema(id, tema);
}

function agregarTema(id, tema) {
    fl_tema = { id : id, tema : tema };
    fl_temas[fl_temas.length] = fl_tema;
    mostrarTemas();
}

function mostrarTemas() {
    $("#divTemas").html("");
    for (i = 0; i <= fl_temas.length - 1; i++) {
        fl_tema = fl_temas[i];
        $("#divTemas").html($("#divTemas").html() + '<span class="tag"><span>' + fl_tema.tema + '</span><span href="" onclick="quitarTema(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarTema(index) {
    fl_temas.splice(index, 1);
    mostrarTemas();
}
//Enlaces web
function obtenerEnlacesWeb() {
    $.ajax({url: "php/obtenerEnlacesWebFicha.php", async: false, type: "POST", data: { idBien: fl_IdFichaLibro, tipoBien: "libro" }, success: function(res) {
        $("#divListaEnlacesWeb").html(res);
    }});
}

function elegirEnlaceWeb(idInstitucionEnlaceWeb, urlEnlaceWeb, notasEnlaceWeb) {
    fl_idEnlaceWeb = idInstitucionEnlaceWeb;
    $("#tbEnlaceWeb").val(urlEnlaceWeb);
    $("#tbNotasEnlaceWeb").val(notasEnlaceWeb);
}

function guardarEnlaceWeb() {
    if (fl_IdFichaLibro == 0) {
        return;
    }
    var enlaceWeb;
    var notasEnlaceWeb;

    enlaceWeb =  $("#tbEnlaceWeb").val();
    if (enlaceWeb.length == 0) {
        alert("No ha escrito la dirección del Enlace web.")
        return;
    }
    notasEnlaceWeb = $("#tbNotasEnlaceWeb").val();
    if (fl_idEnlaceWeb == 0) {
        $.ajax({url: "php/agregarEnlaceWebFicha.php", async: false, type: "POST", data: { idBien: fl_IdFichaLibro, enlaceWeb: enlaceWeb, notasEnlaceWeb: notasEnlaceWeb, tipoBien: "libro" }, success: function(res) {
            if (res == "OK") {
                obtenerEnlacesWeb();
            } else {
                alert(res);
            }
        }});
    } else {
        $.ajax({url: "php/actualizarEnlaceWebFicha.php", async: false, type: "POST", data: { idEnlaceWeb: fl_idEnlaceWeb, enlaceWeb: enlaceWeb, notasEnlaceWeb: notasEnlaceWeb, tipoBien: "libro" }, success: function(res) {
            if (res == "OK") {
                obtenerEnlacesWeb();
            } else {
                alert(res);
            }
        }});
    }
}

function limpiarCamposEnlaceWeb() {
    fl_idEnlaceWeb = 0;
    $("#tbEnlaceWeb").val("");
    $("#tbNotasEnlaceWeb").val("");
}
//Imagenes
function guardarImagenBien() {
    var fd = new FormData();
    var files = $('#imgInp')[0].files[0];
    var rutaImagen;
    if (files != null) {
        fd.append('imgInp', files);
        fd.append('idFichaLibro', fl_IdFichaLibro);
        rutaImagen = "imagenesbienes/libros/" + fl_IdFichaLibro + "/" + files.name;
        thumbnail = fl_IdFichaLibro + "_" + files.name;
        $.ajax({ url: "imagenesbienes/subirImagenLibro.php", type: "POST", data: fd, contentType: false, cache: false, processData: false, success: function(data) {
            $('#loading').hide();
            $("#message").html(data);
        }});
    } else {
        rutaImagen = $('#imgImagen').attr('src');
    }
    var aprobada = $("#selImagenAprobada").val();
    var fechaToma = $("#tbTomaFecha").val();
    var personaEdita = $("#tbPersonaEdita").val();

    if (fl_idImagenElegida == 0) {
        $.ajax({url: "php/agregarImagenLibro.php", async: false, type: "POST", data: { idFichaLibro: fl_IdFichaLibro, idPersonaToma: fl_PersonaToma, rutaImagen: rutaImagen, aprobada: aprobada, fechaToma: fechaToma, personaEdita: personaEdita, thumbnail: thumbnail }, success: function(res) {
            if (res == "OK") {
                obtenerImagenesLibro();
            } else {
                alert(res);
            }
        }});
    } else {
        $.ajax({url: "php/actualizarImagenLibro.php", async: false, type: "POST", data: { idImagen: fl_idImagenElegida, idPersonaToma: fl_PersonaToma, rutaImagen: rutaImagen, aprobada: aprobada, fechaToma: fechaToma, personaEdita: personaEdita, thumbnail: thumbnail }, success: function(res) {
            if (res == "OK") {
                obtenerImagenesLibro();
            } else {
                alert(res);
            }
        }});
    }
}

function obtenerImagenesLibro() {
    $.ajax({url: "php/obtenerImagenesLibro.php", async: false, type: "POST", data: { idFichaLibro: fl_IdFichaLibro }, success: function(res) {
        $("#divListaImagenesBien").html(res);
    }});
}

function elegirImagenLibro(idimagen, idpersona, personatoma, fechatoma, aprobada, rutaimagen) {
    fl_idImagenElegida = idimagen;
    fl_PersonaToma = idpersona;
    $("#tbTomaPersona").val(personatoma);
    $("#tbTomaFecha").val(fechatoma);
    $("#selImagenAprobada").val(aprobada);
    $('#imgImagen').attr('src', rutaimagen);
}

//PDFs
function guardarPdfBien() {
    var fd = new FormData();
    var files = $('#pdfInp')[0].files[0];
    var rutaPdf;
    var fecha = obtenerFechaActual();
    if (files != null) {
        fd.append('pdfInp', files);
        fd.append('idFichaLibro', fl_IdFichaLibro);
        rutaPdf = "pdf/libros/" + fl_IdFichaLibro + "/" + files.name;
        //thumbnail = fl_IdFichaLibro + "_" + files.name;
        $.ajax({ url: "pdf/subirPdfLibro.php", type: "POST", data: fd, contentType: false, cache: false, processData: false, success: function(data) {
            if (data == "OK") {
                
            } else {
                alert(data);
                return;
            }
        }});
    }
    var aprobado = $("#selPdfAprobado").val();

    if (fl_idPdfElegido == 0) {
        $.ajax({url: "php/agregarPdfLibro.php", async: false, type: "POST", data: { idFichaLibro: fl_IdFichaLibro, rutaPdf: rutaPdf, aprobado: aprobado, fecha: fecha }, success: function(res) {
            if (res == "OK") {
                obtenerPdfsLibro();
            } else {
                alert(res);
            }
        }});
    } else {
        $.ajax({url: "php/actualizarPdfLibro.php", async: false, type: "POST", data: { idPdf: fl_idPdfElegido, rutaPdf: rutaPdf, aprobado: aprobado }, success: function(res) {
            if (res == "OK") {
                obtenerPdfsLibro();
            } else {
                alert(res);
            }
        }});
    }
}

function obtenerPdfsLibro() {
    $.ajax({url: "php/obtenerPdfsLibro.php", async: false, type: "POST", data: { idFichaLibro: fl_IdFichaLibro }, success: function(res) {
        $("#divListaPdfSBien").html(res);
    }});
}

function elegirPdfLibro(idpdf, aprobado, rutapdf) {
    fl_idPdfElegido = idpdf;
    $("#selPdfAprobado").val(aprobado);
}

function limpiarCamposAgregarPdf() {
    $("#selPdfAprobado").val("NO");
    $("#pdfInp").val("");
}

//Pendientes bien
function obtenerPendientesBien() {
    $.ajax({url: "php/obtenerPendientesBien.php", async: false, type: "POST", data: { idBien: fl_IdFichaLibro, tipoBien: "libro" }, success: function(res) {
        $("#divListaPendientesBien").html(res);
    }});
}

function elegirPendienteBien(idBienPendiente, pendiente, estado, fechaInicio, fechaFin, resolucion) {
    idPendienteBien = idBienPendiente;
    $("#tbPendienteBien").val(pendiente);
    $("#tbPendienteBienResolucion").val(resolucion);
    $("#lblPendienteBienEstado").text(estado);
    $("#lblPendienteBienFechaInicio").text(fechaInicio);
    $("#lblPendienteBienFechaFin").text(fechaFin);
}

function guardarPendienteBien(estado) {
    if (fl_IdFichaLibro == 0) {
        return;
    }
    var pendiente;
    var resolucion;
    var fechaInicio;
    var fechaFin;

    pendiente =  $("#tbPendienteBien").val();
    if (pendiente.length == 0) {
        alert("No ha escrito el pendiente.")
        return;
    }
    resolucion = $("#tbPendienteBienResolucion").val();
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output = ((''+day).length<2 ? '0' : '') + day + '/' +
    ((''+month).length<2 ? '0' : '') + month + '/' +
    d.getFullYear();

    fechaInicio = output;
    fechaFin = output;

    if (idPendienteBien == 0) {
        $.ajax({url: "php/agregarPendienteBien.php", async: false, type: "POST", data: { idBien: fl_IdFichaLibro, tipoBien: "libro", pendiente: pendiente, estado: estado, resolucion: resolucion, fechaInicio: fechaInicio }, success: function(res) {
            if (res == "OK") {
                obtenerPendientesBien();
                //obtenerBienes();
            } else {
                alert(res);
            }
        }});
    } else {
        $.ajax({url: "php/actualizarPendienteBien.php", async: false, type: "POST", data: { idPendienteBien: idPendienteBien, tipoBien: "libro", pendiente: pendiente, estado: estado, resolucion: resolucion, fechaFin: fechaFin }, success: function(res) {
            if (res == "OK") {
                obtenerPendientesBien();
                //obtenerBienes();
            } else {
                alert(res);
            }
        }});
    }
}

function limpiarCamposPendienteBien() {
    idPendienteBien = 0;
    $("#tbPendienteBien").val("");
    $("#tbPendienteBienResolucion").val("");
    $("#lblPendienteBienEstado").text("");
    $("#lblPendienteBienFechaInicio").text("");
    $("#lblPendienteBienFechaFin").text("");
}