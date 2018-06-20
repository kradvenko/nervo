//Variables para la ficha de publicación
var fp_IdFichaPublicacion = 0;
var fp_LugarAsunto = 0;
var fp_LugarToma = 0;
var fp_Autores = [];
var fp_Autor;
var fp_Album = 0;
var fp_InstitucionElegida = 0;
var fp_InstitucionElegidaNuevoAlbum = 0;
var fp_temas = [];
var fp_tema;
var fp_generosPeriodisticos = [];
var fp_generoPeriodistico;
var fp_generosLiterarios = [];
var fp_generoLiterario;
var fp_tiposEncuadernacion = [];
var fp_tipoEncuadernacion;
var fp_tecnicasImpresion = [];
var fp_tecnicaImpresion;
var fp_tiposPapel = [];
var fp_tipoPapel;
var fp_PersonaToma = 0;
var fp_Reader;
var fp_idEnlaceWeb = 0;
var fp_idImagenElegida = 0;
var fp_IdPaisNuevaPublicacion = 0;
var fp_IdPublicacionElegida = 0;
var idPendienteBien = 0;
//Funciones de elección de datos
function elegirInstitucionBien(id) {
    fp_InstitucionElegida = id;
}

function elegirAlbum(id) {
    fp_Album = id;
}

function elegirPersonaToma(id) {
    fp_PersonaToma = id;
}

function elegirPublicacion(id) {
    fp_IdPublicacionElegida = id; 
}

function verAlbum() {
    if (fp_Album == 0) {
        return;
    }
    $.ajax({url: "php/obtenerAlbumesXML.php", async: false, type: "POST", data: { idAlbum : fp_Album }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            $("#tbVerAlbumNombre").val($(this).find("album").text());
            $("#tbVerAlbumInstitucion").val($(this).find("institucion").text());
            $("#tbVerAlbumDescripcion").val($(this).find("descripcion").text());
            //$("#tbVerAlbumFotografias").val($(this).find("numerofotografias").text());
            $("#tbVerAlbumNumero").val($(this).find("numeroalbum").text());
        });
    }});
}

function obtenerTemas() {
    $.ajax({url: "php/obtenerTemasSelect.php", async: false, type: "POST", data: { idSelect : "selTemas" }, success: function(res) {
        $("#divTemasSelect").html(res);
    }});
}
function obtenerTiposPublicacionSelect() {
    $.ajax({url: "php/obtenerTiposPublicacionSelect.php", async: false, type: "POST", data: { idSelect : "selNuevaPublicacionTiposPublicacion" }, success: function(res) {
        $("#divNuevaPublicacionTiposPublicacion").html(res);
    }});
}

function agregarNuevaPublicacionNombre() {
    var publicacion;
    var idPais;
    var idTipoPublicacion;

    publicacion = $("#tbNuevaPublicacion").val();
    idPais = fp_IdPaisNuevaPublicacion;
    if (idPais == 0) {
        alert("No ha elegido un país para la publicación.");
        return;
    }
    idTipoPublicacion = $("#selNuevaPublicacionTiposPublicacion").val();

    $.ajax({url: "php/agregarNuevaPublicacion.php", async: false, type: "POST", data: { publicacion : publicacion, idPais: idPais, idTipoPublicacion: idTipoPublicacion }, success: function(res) {
        if (res == "OK") {
            alert("Se ha agregado la publicación.");
            $('#modalAgregarPublicacion').modal('hide');
            limpiarCamposNuevaPublicacion();
        }
    }});
}

function limpiarCamposNuevaPublicacion() {
    $("#tbNuevaPublicacion").val("");
    $("#tbNuevaPublicacionPais").val("");
    fp_IdPaisNuevaPublicacion = 0;
}

//Funciones de la ficha
function guardarFichaFoto() {
    var idInstitucion = fp_InstitucionElegida;
    var numeroRegistroInterno = $("#tbNumeroInterno").val();
    var numeroInventario = $("#tbNumeroInventario").val();
    idPublicacion = fp_IdPublicacionElegida;
    if (idPublicacion == 0) {
        alert("No se ha elegido una publicación.");
        return;
    }
    var idAlbum = fp_Album;
    var numeroEdicion = $("#tbNumeroEdicion").val();
    var numeroPublicacion = $("#tbNumeroPublicacion").val();
    var numeroTotalPaginas = $("#tbNumeroTotalPaginas").val();
    var fechaPublicacion = $("#tbFechaPublicacion").val();
    var tituloSeccion = $("#tbTituloSeccion").val();
    var numeroPaginaEncuentra = $("#tbNumeroPaginaEncuentra").val();
    var numeroColumnas = $("#tbNumeroColumnas").val();
    var hallazgo = $("#selHallazgo").val();
    var idPeriodicidad = $("#selPeriodicidades").val();
    var issn = $("#tbISSN").val();
    var anotaciones = $('#taAnotaciones').val();
    var contextoHistorico = $('#taContextoHistorico').val();
    var estadoConservacion = $('#sEstadoConservacion').val();
    var estadoIntegridad = $("#sEstadoIntegridad").val();
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
    var idPersonaCaptura = getCookie("idusuario");
    var currentdate = new Date(); 
    var fechaCaptura = (currentdate.getDate() < 10 ? "0" + currentdate.getDate() : currentdate.getDate()) + "/"
                + ((currentdate.getMonth() + 1) < 10 ? ("0" + (currentdate.getMonth() + 1)) : (currentdate.getMonth() + 1)) + "/" 
                + currentdate.getFullYear() + " @ "  
                + (currentdate.getHours() < 10 ? ("0" + currentdate.getHours()) : currentdate.getHours()) + ":"  
                + (currentdate.getMinutes() < 10 ? ("0" + currentdate.getMinutes()) : currentdate.getMinutes()) + ":"  
                + (currentdate.getSeconds() < 10 ? ("0" + currentdate.getSeconds()) : currentdate.getSeconds());
    var estado = "ACTIVO";
    var autores = fp_Autores;
    var temas = fp_temas;
    var generosPeriodisticos = fp_generosPeriodisticos;
    var generosLiterarios = fp_generosLiterarios;
    var tiposEncuadernacion = fp_tiposEncuadernacion;
    var tecnicasImpresion = fp_tecnicasImpresion;
    var tiposPapel = fp_tiposPapel;

    if (fp_IdFichaPublicacion == 0) {
        $.ajax({url: "php/agregarFichaPublicacion.php", async: false, type: "POST", data: { idInstitucion : idInstitucion, idPublicacion: idPublicacion, numeroRegistroInterno: numeroRegistroInterno,
            numeroInventario: numeroInventario, idAlbum: idAlbum, numeroEdicion: numeroEdicion, numeroPublicacion: numeroPublicacion, numeroTotalPaginas: numeroTotalPaginas,
            fechaPublicacion: fechaPublicacion, tituloSeccion: tituloSeccion, numeroPaginaEncuentra: numeroPaginaEncuentra, numeroColumnas:numeroColumnas,
            hallazgo: hallazgo, idPeriodicidad: idPeriodicidad, issn: issn, anotaciones: anotaciones, contextoHistorico: contextoHistorico, estadoConservacion: estadoConservacion, estadoIntegridad: estadoIntegridad,
            arrugas: arrugas, ataqueBiologico: ataqueBiologico, cintasAdhesivas: cintasAdhesivas, deformaciones: deformaciones, deshojado: deshojado, etiquetas: etiquetas, huellasDigitales: huellasDigitales,
            hongos: hongos, manchas: manchas, rasgaduras: rasgaduras, ralladuras: ralladuras, retocado: retocado, roturas: roturas, sellosTinta: sellosTinta,
            alto: alto, ancho: ancho, profundidad: profundidad, otros: otros, numeroFragmentos: numeroFragmentos, pieImprenta: pieImprenta, inspeccionesOMarcas: inspeccionesOMarcas, caracteristicas: caracteristicas,
            idPersonaCaptura: idPersonaCaptura, fechaCaptura: fechaCaptura, estado: estado,
            autores: autores, temas: temas, generosPeriodisticos, generosLiterarios, tiposEncuadernacion, tecnicasImpresion, tiposPapel },
            success: function(res) {
            if (res > 0) {
                obtenerUltimasFichasPublicacion();
                //limpiarCamposFichaPublicacion();
                fp_IdFichaPublicacion = res;
                $("#divEnlacesWeb").css("visibility", "visible");
                $("#divImagenesBien").css("visibility", "visible");
                $("#divPendientes").css("visibility", "visible");
                alert("Se ha ingresado la ficha de la publicación.");
            } else {
                alert(res);
            }
        }});
    } else {
        $.ajax({url: "php/actualizarFichaPublicacion.php", async: false, type: "POST", data: { idFichaPublicacion: fp_IdFichaPublicacion, idInstitucion : idInstitucion, idPublicacion: idPublicacion, numeroRegistroInterno: numeroRegistroInterno,
            numeroInventario: numeroInventario, idAlbum: idAlbum, numeroEdicion: numeroEdicion, numeroPublicacion: numeroPublicacion, numeroTotalPaginas: numeroTotalPaginas,
            fechaPublicacion: fechaPublicacion, tituloSeccion: tituloSeccion, numeroPaginaEncuentra: numeroPaginaEncuentra, numeroColumnas:numeroColumnas,
            hallazgo: hallazgo, idPeriodicidad: idPeriodicidad, issn: issn, anotaciones: anotaciones, contextoHistorico: contextoHistorico, estadoConservacion: estadoConservacion, estadoIntegridad: estadoIntegridad,
            arrugas: arrugas, ataqueBiologico: ataqueBiologico, cintasAdhesivas: cintasAdhesivas, deformaciones: deformaciones, deshojado: deshojado, etiquetas: etiquetas, huellasDigitales: huellasDigitales,
            hongos: hongos, manchas: manchas, rasgaduras: rasgaduras, ralladuras: ralladuras, retocado: retocado, roturas: roturas, sellosTinta: sellosTinta,
            alto: alto, ancho: ancho, profundidad: profundidad, otros: otros, numeroFragmentos: numeroFragmentos, pieImprenta: pieImprenta, inspeccionesOMarcas: inspeccionesOMarcas, caracteristicas: caracteristicas,
            idPersonaCaptura: idPersonaCaptura, fechaCaptura: fechaCaptura, estado: estado,
            autores: autores, temas: temas, generosPeriodisticos, generosLiterarios, tiposEncuadernacion, tecnicasImpresion, tiposPapel },
            success: function(res) {
            if (res == 'OK') {
                obtenerUltimasFichasPublicacion();
                limpiarCamposFichaPublicacion();
                alert("Se ha actualizado la ficha de la publicación.");
            } else {
                alert(res);
            }
        }});
    }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        fp_Reader = new FileReader();        
        fp_Reader.onload = function (e) {
            $('#imgImagen').attr('src', e.target.result);
        }        
        fp_Reader.readAsDataURL(input.files[0]);
    }
}

function limpiarCamposAgregarImagen() {
    fp_Reader = null;
    $('#imgImagen').attr('src', '');
    $("#tbTomaPersona").val("");
    $("#tbTomaFecha").val("");
    $("#imgInp").val("");    
}

function obtenerUltimasFichasPublicacion() {
    $.ajax({url: "php/obtenerUltimasFichasPublicacion.php", async: false, type: "POST", success: function(res) {
        $("#divUltimasFichas").html(res);
    }});
}

function elegirFichaPublicacion(id) {
    fp_IdFichaPublicacion = id;
    $.ajax({url: "php/obtenerFichaPublicacionXML.php", async: false, type: "POST", data: { idFichaPublicacion : id }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            $("#tbInstitucion").val($(this).find("nombreInstitucion").text());
            fp_InstitucionElegida = $(this).find("idinstitucion").text();
            $("#tbPublicacion").val($(this).find("publicacion").text());
            fp_IdPublicacionElegida = $(this).find("idpublicacion").text();
            $("#tbNumeroInterno").val($(this).find("numeroregistrointerno").text());
            $("#tbNumeroInventario").val($(this).find("numeroinventario").text());
            $("#tbNumeroEdicion").val($(this).find("numeroedicion").text());
            $("#tbNumeroPublicacion").val($(this).find("numeropublicacion").text());
            $("#tbNumeroTotalPaginas").val($(this).find("numerototalpaginas").text());
            $("#tbFechaPublicacion").val($(this).find("fechapublicacion").text());            
            $("#tbAlbum").val($(this).find("album").text());
            fp_Album = $(this).find("idalbum").text();
            $("#tbTituloSeccion").val($(this).find("tituloseccion").text())
            $("#tbNumeroPaginaEncuentra").val($(this).find("numeropaginaencuentra").text())
            $("#tbNumeroColumnas").val($(this).find("numerocolumnas").text())
            $("#selHallazgo").val($(this).find("hallazgo").text())
            $("#selPeriodicidades").val($(this).find("idperiodicidad").text())
            $("#tbISSN").val($(this).find("issn").text())
            $("#taAnotaciones").val($(this).find("anotaciones").text());
            $("#taContextoHistorico").val($(this).find("contextohistorico").text());
            $("#sEstadoConservacion").val($(this).find("estadoconservacion").text());
            $("#sEstadoIntegridad").val($(this).find("estadointegridad").text());
            $(this).find("arrugas").text() == 'SI' ? $("#cbArrugas").prop("checked", true) : $("#cbArrugas").prop("checked", false);
            $(this).find("ataquebiologico").text() == 'SI' ? $("#cbAtaque").prop("checked", true) : $("#cbAtaque").prop("checked", false);
            $(this).find("cintasadhesivas").text() == 'SI' ? $("#cbCintas").prop("checked", true) : $("#cbCintas").prop("checked", false);
            $(this).find("deformaciones").text() == 'SI' ? $("#cbDeformaciones").prop("checked", true) : $("#cbDeformaciones").prop("checked", false);
            $(this).find("deshojado").text() == 'SI' ? $("#cbDeshojado").prop("checked", true) : $("#cbDeshojado").prop("checked", false);
            $(this).find("etiquetas").text() == 'SI' ? $("#cbEtiquetas").prop("checked", true) : $("#cbEtiquetas").prop("checked", false);
            $(this).find("huellasdigitales").text() == 'SI' ? $("#cbHuellas").prop("checked", true) : $("#cbHuellas").prop("checked", false);
            $(this).find("hongos").text() == 'SI' ? $("#cbHongos").prop("checked", true) : $("#cbHongos").prop("checked", false);
            $(this).find("manchas").text() == 'SI' ? $("#cbManchas").prop("checked", true) : $("#cbManchas").prop("checked", false);
            $(this).find("rasgaduras").text() == 'SI' ? $("#cbRasgaduras").prop("checked", true) : $("#cbRasgaduras").prop("checked", false);
            $(this).find("ralladuras").text() == 'SI' ? $("#cbRalladuras").prop("checked", true) : $("#cbRalladuras").prop("checked", false);
            $(this).find("retocado").text() == 'SI' ? $("#cbRetocado").prop("checked", true) : $("#cbRetocado").prop("checked", false);
            $(this).find("roturas").text() == 'SI' ? $("#cbRoturas").prop("checked", true) : $("#cbRoturas").prop("checked", false);
            $(this).find("sellosotinta").text() == 'SI' ? $("#cbSellos").prop("checked", true) : $("#cbSellos").prop("checked", false);
            $("#tbAlto").val($(this).find("alto").text());
            $("#tbAncho").val($(this).find("ancho").text());
            $("#tbProfundidad").val($(this).find("profundidad").text());
            $("#tbOtros").val($(this).find("otros").text());
            $("#tbNumeroFragmentos").val($(this).find("numerofragmentos").text());
            $("#tbPieImprenta").val($(this).find("pieimprenta").text());
            $("#taInspecciones").val($(this).find("inspeccionesomarcas").text());
            $("#taCaracteristicas").val($(this).find("caracteristicas").text());
            $("#divInformacionCaptura").html("Capturado por: " + $(this).find("nombre").text() + " - " + $(this).find("fechacaptura").text());
            $("#divEnlacesWeb").css("visibility", "visible");
            $("#divImagenesBien").css("visibility", "visible");
            $("#divPendientes").css("visibility", "visible");
        });
    }});
    $.ajax({url: "php/obtenerAutoresPublicacionXML.php", async: false, type: "POST", data: { idFichaPublicacion : id }, success: function(res) {
        fp_Autores = [];
        $('cat', res).each(function(index, element) {
            fp_Autor =  { id: $(this).find("idautor").text(), autor: $(this).find("autor").text() };
            fp_Autores[fp_Autores.length] = fp_Autor;
        });
    }});
    $.ajax({url: "php/obtenerTemasPublicacionXML.php", async: false, type: "POST", data: { idFichaPublicacion : id }, success: function(res) {
        fp_temas = [];
        $('cat', res).each(function(index, element) {
            fp_tema =  { id: $(this).find("idtema").text(), tema: $(this).find("tema").text() };
            fp_temas[fp_temas.length] = fp_tema;
        });
    }});
    $.ajax({url: "php/obtenerGenerosLiterariosPublicacionXML.php", async: false, type: "POST", data: { idFichaPublicacion : id }, success: function(res) {
        fp_generosLiterarios = [];
        $('cat', res).each(function(index, element) {
            fp_generoLiterario =  { id: $(this).find("idgeneroliterario").text(), genero: $(this).find("genero").text() };
            fp_generosLiterarios[fp_generosLiterarios.length] = fp_generoLiterario;
        });
    }});
    $.ajax({url: "php/obtenerGenerosPeriodisticosPublicacionXML.php", async: false, type: "POST", data: { idFichaPublicacion : id }, success: function(res) {
        fp_generosPeriodisticos = [];
        $('cat', res).each(function(index, element) {
            fp_generoPeriodistico =  { id: $(this).find("idgeneroperiodistico").text(), genero: $(this).find("genero").text() };
            fp_generosPeriodisticos[fp_generosPeriodisticos.length] = fp_generoPeriodistico;
        });
    }});
    $.ajax({url: "php/obtenerTiposEncuadernacionXML.php", async: false, type: "POST", data: { idFichaPublicacion : id }, success: function(res) {
        fp_tiposEncuadernacion = [];
        $('cat', res).each(function(index, element) {
            fp_tipoEncuadernacion =  { id: $(this).find("idtipoencuadernacion").text(), tipo: $(this).find("tipoencuadernacion").text() };
            fp_tiposEncuadernacion[fp_tiposEncuadernacion.length] = fp_tipoEncuadernacion;
        });
    }});
    $.ajax({url: "php/obtenerTecnicasImpresionXML.php", async: false, type: "POST", data: { idFichaPublicacion : id }, success: function(res) {
        fp_tecnicasImpresion = [];
        $('cat', res).each(function(index, element) {
            fp_tecnicaImpresion =  { id: $(this).find("idtecnicaimpresion").text(), tecnica: $(this).find("tecnicaimpresion").text() };
            fp_tecnicasImpresion[fp_tecnicasImpresion.length] = fp_tecnicaImpresion;
        });
    }});
    $.ajax({url: "php/obtenerTiposPapelXML.php", async: false, type: "POST", data: { idFichaPublicacion : id }, success: function(res) {
        fp_tiposPapel = [];
        $('cat', res).each(function(index, element) {
            fp_tipoPapel =  { id: $(this).find("idtipopapel").text(), tipo: $(this).find("tipopapel").text() };
            fp_tiposPapel[fp_tiposPapel.length] = fp_tipoPapel;
        });
    }});
    
    mostrarAutores();
    mostrarTemas();
    mostrarGenerosLiterarios();
    mostrarGenerosPeriodisticos();
    mostrarTecnicasImpresion();
    mostrarTiposPapel();
    mostrarTiposEncuadernacion();
}

function limpiarCamposFichaPublicacion () {
    fp_IdFichaPublicacion = 0;
    fp_LugarAsunto = 0;
    fp_LugarToma = 0;
    fp_Autores = [];
    fp_Autor;
    fp_Album = 0;
    fp_InstitucionElegida = 0;
    fp_InstitucionElegidaNuevoAlbum = 0;
    fp_IdPublicacionElegida = 0;
    fp_temas = [];
    fp_tema;
    fp_PersonaToma = 0;
    fp_generosPeriodisticos = [];
    fp_generosLiterarios = [];
    fp_tiposEncuadernacion = [];
    fp_tecnicasImpresion = [];
    fp_tiposPapel = [];
    $("#tbInstitucion").val("");
    $("#tbPublicacion").val("");
    $("#tbNumeroInterno").val("");
    $("#tbNumeroInventario").val("");
    $("#tbNumeroEdicion").val("");
    $("#tbNumeroPublicacion").val("");
    $("#tbNumeroTotalPaginas").val("");
    $("#tbFechaPublicacion").val("");
    $("#tbTituloSeccion").val("");
    $("#tbNumeroPaginaEncuentra").val("");
    $("#tbNumeroColumnas").val("");
    $("#tbISSN").val("");
    $("#tbAlbum").val("");
    $("#taAnotaciones").val("");
    $("#taContextoHistorico").val("");
    $("#sEstadoConservacion").val("");
    $("#sEstadoIntegridad").val("");
    $("#cbArrugas").prop("checked", false);
    $("#cbAtaque").prop("checked", false);    
    $("#cbCintas").prop("checked", false);
    $("#cbDeformaciones").prop("checked", false);
    $("#cbDeshojado").prop("checked", false);
    $("#cbEtiquetas").prop("checked", false);
    $("#cbHuellas").prop("checked", false);
    $("#cbHongos").prop("checked", false);
    $("#cbManchas").prop("checked", false);
    $("#cbRasgaduras").prop("checked", false);
    $("#cbRalladuras").prop("checked", false);
    $("#cbRetocado").prop("checked", false);
    $("#cbRoturas").prop("checked", false);
    $("#cbSellos").prop("checked", false);      
    $("#tbAlto").val("");
    $("#tbAncho").val("");
    $("#tbProfundidad").val("");
    $("#tbPieImprenta").val("");
    $('#tbOtros').val(""); 
    $('#tbNumeroFragmentos').val(""); 
    $("#taInspecciones").val("");
    $("#taCaracteristicas").val("");
    $("#tbInstitucion").val("");
    $("#tbInstitucion").val("");
    $("#divInformacionCaptura").html("");
    $("#divAutores").html("");
    $("#divTemas").html("");
    $("#divGenerosPeriodisticos").html("");
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
    fp_Autor = { id : id, autor : autor };
    fp_Autores[fp_Autores.length] = fp_Autor;
    mostrarAutores();
}

function mostrarAutores() {
    $("#divAutores").html("");
    for (i = 0; i <= fp_Autores.length - 1; i++) {
        fp_Autor = fp_Autores[i];
        $("#divAutores").html($("#divAutores").html() + '<span class="tag"><span>' + fp_Autor.autor + '</span><span href="" onclick="quitarAutor(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarAutor(index) {
    fp_Autores.splice(index, 1);
    mostrarAutores();
}
//Géneros periodísticos
function agregarNuevoGeneroPeriodistico() {
    var genero;
    if ($("#tbNuevoGeneroPeriodistico").val().length > 0) {
        genero = $("#tbNuevoGeneroPeriodistico").val();
    } else {
        alert("No ha escrito el nombre del género periodístico.");
        return;
    }
    $.ajax({url: "php/agregarGeneroPeriodistico.php", async: false, type: "POST", data: { genero : genero }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoGeneroPeriodistico").val('');
            $('#modalAgregarGeneroPeriodistico').modal('hide');
            obtenerGenerosPeriodisticosSelect();
        } else {
            alert(res);
        }
    }});
}

function obtenerGenerosPeriodisticosSelect() {
    $.ajax({url: "php/obtenerGenerosPeriodisticosSelect.php", async: false, type: "POST", data: { idSelect : "selGenerosPeriodisticos" }, success: function(res) {
        $("#divGenerosPeriodisticosSelect").html(res);
    }});
}

function agregarGeneroPeriodisticoSelect() {
    var id = $("#selGenerosPeriodisticos").val();
    var genero = $( "#selGenerosPeriodisticos option:selected" ).text();
    agregarGeneroPeriodistico(id, genero);
}

function agregarGeneroPeriodistico(id, genero) {
    fp_generoPeriodistico = { id : id, genero : genero };
    fp_generosPeriodisticos[fp_generosPeriodisticos.length] = fp_generoPeriodistico;
    mostrarGenerosPeriodisticos();
}

function mostrarGenerosPeriodisticos() {
    $("#divGenerosPeriodisticos").html("");
    for (i = 0; i <= fp_generosPeriodisticos.length - 1; i++) {
        fp_generoPeriodistico = fp_generosPeriodisticos[i];
        $("#divGenerosPeriodisticos").html($("#divGenerosPeriodisticos").html() + '<span class="tag"><span>' + fp_generoPeriodistico.genero + '</span><span href="" onclick="quitarGeneroPeriodistico(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarGeneroPeriodistico(index) {
    fp_generosPeriodisticos.splice(index, 1);
    mostrarGenerosPeriodisticos();
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
    fp_generoLiterario = { id : id, genero : genero };
    fp_generosLiterarios[fp_generosLiterarios.length] = fp_generoLiterario;
    mostrarGenerosLiterarios();
}

function mostrarGenerosLiterarios() {
    $("#divGenerosLiterarios").html("");
    for (i = 0; i <= fp_generosLiterarios.length - 1; i++) {
        fp_generoLiterario = fp_generosLiterarios[i];
        $("#divGenerosLiterarios").html($("#divGenerosLiterarios").html() + '<span class="tag"><span>' + fp_generoLiterario.genero + '</span><span href="" onclick="quitarGeneroLiterario(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarGeneroLiterario(index) {
    fp_generosLiterarios.splice(index, 1);
    mostrarGenerosLiterarios();
}
//Periodicidades
function agregarNuevaPeriodicidad() {
    var periodicidad;
    if ($("#tbNuevaPeriodicidad").val().length > 0) {
        periodicidad = $("#tbNuevaPeriodicidad").val();
    } else {
        alert("No ha escrito el nombre de la periodicidad.");
        return;
    }
    $.ajax({url: "php/agregarPublicacionPeriodicidad.php", async: false, type: "POST", data: { periodicidad : periodicidad }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevaPeriodicidad").val('');
            $('#modalAgregarNuevaPeriodicidad').modal('hide');
            obtenerPeriodicidadesSelect();
        } else {
            alert(res);
        }
    }});
}

function obtenerPeriodicidadesSelect() {
    $.ajax({url: "php/obtenerPeriodicidadesSelect.php", async: false, type: "POST", data: { idSelect : "selPeriodicidades" }, success: function(res) {
        $("#divPeriodicidades").html(res);
    }});
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
    fp_tipoEncuadernacion = { id : id, tipo : tipo };
    fp_tiposEncuadernacion[fp_tiposEncuadernacion.length] = fp_tipoEncuadernacion;
    mostrarTiposEncuadernacion();
}

function mostrarTiposEncuadernacion() {
    $("#divTiposEncuadernacion").html("");
    for (i = 0; i <= fp_tiposEncuadernacion.length - 1; i++) {
        fp_tipoEncuadernacion = fp_tiposEncuadernacion[i];
        $("#divTiposEncuadernacion").html($("#divTiposEncuadernacion").html() + '<span class="tag"><span>' + fp_tipoEncuadernacion.tipo + '</span><span href="" onclick="quitarTipoEncuadernacion(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarTipoEncuadernacion(index) {
    fp_tiposEncuadernacion.splice(index, 1);
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
    fp_tecnicaImpresion = { id : id, tecnica : tecnica };
    fp_tecnicasImpresion[fp_tecnicasImpresion.length] = fp_tecnicaImpresion;
    mostrarTecnicasImpresion();
}

function mostrarTecnicasImpresion() {
    $("#divTecnicasImpresion").html("");
    for (i = 0; i <= fp_tecnicasImpresion.length - 1; i++) {
        fp_tecnicaImpresion = fp_tecnicasImpresion[i];
        $("#divTecnicasImpresion").html($("#divTecnicasImpresion").html() + '<span class="tag"><span>' + fp_tecnicaImpresion.tecnica + '</span><span href="" onclick="quitarTecnicaImpresion(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarTecnicaImpresion(index) {
    fp_tecnicasImpresion.splice(index, 1);
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
    fp_tipoPapel = { id : id, tipo : tipo };
    fp_tiposPapel[fp_tiposPapel.length] = fp_tipoPapel;
    mostrarTiposPapel();
}

function mostrarTiposPapel() {
    $("#divTiposPapel").html("");
    for (i = 0; i <= fp_tiposPapel.length - 1; i++) {
        fp_tipoPapel = fp_tiposPapel[i];
        $("#divTiposPapel").html($("#divTiposPapel").html() + '<span class="tag"><span>' + fp_tipoPapel.tipo + '</span><span href="" onclick="quitarTipoPapel(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarTipoPapel(index) {
    fp_tiposPapel.splice(index, 1);
    mostrarTiposPapel();
}
//Albumes
function agregarNuevoAlbum() {
    var nombre;
    var institucion;
    var descripcion;
    var numeroFotografias;
    var numeroAlbum;

    if ($("#tbNuevoAlbumNombre").val().length > 0) {
        nombre = $("#tbNuevoAlbumNombre").val();
    } else {
        alert("No ha escrito el nombre del albúm.");
        return;
    }
    institucion = fp_InstitucionElegidaNuevoAlbum;
    if (institucion <= 0) {
        alert("No ha elegido una institución para el albúm.")
        return;
    }
    descripcion = $("#tbNuevoAlbumDescripcion").val();
    /*
    numeroFotografias = $("#tbNuevoAlbumFotografias").val();
    if (numeroFotografias.length == 0) {
        numeroFotografias = 0;
    }
    if (isNaN(numeroFotografias)) {
        alert("No ha introducido un número de fotografías válido.")
        return;
    }
    */
    numeroFotografias = 0;
    numeroAlbum = $("#tbNuevoAlbumNumero").val();

    $.ajax({url: "php/agregarAlbum.php", async: false, type: "POST", data: { nombre : nombre, institucion : institucion, descripcion : descripcion, numeroFotografias : numeroFotografias, numeroAlbum: numeroAlbum, tipoFicha: "Publicacion" }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoAlbumNombre").val('');
            $("#tbNuevoAlbumInstitucion").val('');
            $("#tbNuevoAlbumDescripcion").val('');
            //$("#tbNuevoAlbumFotografias").val('');
            $("#tbNuevoAlbumNumero").val('');
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
    fp_tema = { id : id, tema : tema };
    fp_temas[fp_temas.length] = fp_tema;
    mostrarTemas();
}

function mostrarTemas() {
    $("#divTemas").html("");
    for (i = 0; i <= fp_temas.length - 1; i++) {
        fp_tema = fp_temas[i];
        $("#divTemas").html($("#divTemas").html() + '<span class="tag"><span>' + fp_tema.tema + '</span><span href="" onclick="quitarTema(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarTema(index) {
    fp_temas.splice(index, 1);
    mostrarTemas();
}
//Enlaces web
function obtenerEnlacesWeb() {
    $.ajax({url: "php/obtenerEnlacesWebFicha.php", async: false, type: "POST", data: { idBien: fp_IdFichaPublicacion, tipoBien: "publicacion" }, success: function(res) {
        $("#divListaEnlacesWeb").html(res);
    }});
}

function elegirEnlaceWeb(idInstitucionEnlaceWeb, urlEnlaceWeb, notasEnlaceWeb) {
    fp_idEnlaceWeb = idInstitucionEnlaceWeb;
    $("#tbEnlaceWeb").val(urlEnlaceWeb);
    $("#tbNotasEnlaceWeb").val(notasEnlaceWeb);
}

function guardarEnlaceWeb() {
    if (fp_IdFichaPublicacion == 0) {
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
    if (fp_idEnlaceWeb == 0) {
        $.ajax({url: "php/agregarEnlaceWebFicha.php", async: false, type: "POST", data: { idBien: fp_IdFichaPublicacion, enlaceWeb: enlaceWeb, notasEnlaceWeb: notasEnlaceWeb, tipoBien: "publicacion" }, success: function(res) {
            if (res == "OK") {
                obtenerEnlacesWeb();
            } else {
                alert(res);
            }
        }});
    } else {
        $.ajax({url: "php/actualizarEnlaceWebFicha.php", async: false, type: "POST", data: { idEnlaceWeb: fp_idEnlaceWeb, enlaceWeb: enlaceWeb, notasEnlaceWeb: notasEnlaceWeb, tipoBien: "publicacion" }, success: function(res) {
            if (res == "OK") {
                obtenerEnlacesWeb();
            } else {
                alert(res);
            }
        }});
    }
}

function limpiarCamposEnlaceWeb() {
    fp_idEnlaceWeb = 0;
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
        fd.append('idFichaPublicacion', fp_IdFichaPublicacion);
        rutaImagen = "imagenesbienes/publicaciones/" + fp_IdFichaPublicacion + "/" + files.name;
        thumbnail = fp_IdFichaPublicacion + "_" + files.name;
        $.ajax({ url: "imagenesbienes/subirImagenPublicacion.php", type: "POST", data: fd, contentType: false, cache: false, processData: false, success: function(data) {
            $('#loading').hide();
            $("#message").html(data);
        }});
    } else {
        rutaImagen = $('#imgImagen').attr('src');
    }
    var aprobada = $("#selImagenAprobada").val();
    var fechaToma = $("#tbTomaFecha").val();
    var personaEdita = $("#tbPersonaEdita").val();

    if (fp_idImagenElegida == 0) {
        $.ajax({url: "php/agregarImagenPublicacion.php", async: false, type: "POST", data: { idFichaPublicacion: fp_IdFichaPublicacion, idPersonaToma: fp_PersonaToma, rutaImagen: rutaImagen, aprobada: aprobada, fechaToma: fechaToma, personaEdita: personaEdita, thumbnail: thumbnail }, success: function(res) {
            if (res == "OK") {
                obtenerImagenesPublicacion();
            } else {
                alert(res);
            }
        }});
    } else {
        $.ajax({url: "php/actualizarImagenPublicacion.php", async: false, type: "POST", data: { idImagen: fp_idImagenElegida, idPersonaToma: fp_PersonaToma, rutaImagen: rutaImagen, aprobada: aprobada, fechaToma: fechaToma, personaEdita: personaEdita, thumbnail: thumbnail }, success: function(res) {
            if (res == "OK") {
                obtenerImagenesPublicacion();
            } else {
                alert(res);
            }
        }});
    }
}

function obtenerImagenesPublicacion() {
    $.ajax({url: "php/obtenerImagenesPublicacion.php", async: false, type: "POST", data: { idFichaPublicacion: fp_IdFichaPublicacion }, success: function(res) {
        $("#divListaImagenesBien").html(res);
    }});
}

function elegirImagenFotografia(idimagen, idpersona, personatoma, fechatoma, aprobada, rutaimagen) {
    fp_idImagenElegida = idimagen;
    fp_PersonaToma = idpersona;
    $("#tbTomaPersona").val(personatoma);
    $("#tbTomaFecha").val(fechatoma);
    $("#selImagenAprobada").val(aprobada);
    $('#imgImagen').attr('src', rutaimagen);
}

//Pendientes bien
function obtenerPendientesBien() {
    $.ajax({url: "php/obtenerPendientesBien.php", async: false, type: "POST", data: { idBien: fp_IdFichaPublicacion, tipoBien: "publicacion" }, success: function(res) {
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
    if (fp_IdFichaPublicacion == 0) {
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
        $.ajax({url: "php/agregarPendienteBien.php", async: false, type: "POST", data: { idBien: fp_IdFichaPublicacion, tipoBien: "publicacion", pendiente: pendiente, estado: estado, resolucion: resolucion, fechaInicio: fechaInicio }, success: function(res) {
            if (res == "OK") {
                obtenerPendientesBien();
                //obtenerBienes();
            } else {
                alert(res);
            }
        }});
    } else {
        $.ajax({url: "php/actualizarPendienteBien.php", async: false, type: "POST", data: { idPendienteBien: idPendienteBien, tipoBien: "publicacion", pendiente: pendiente, estado: estado, resolucion: resolucion, fechaFin: fechaFin }, success: function(res) {
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