//Variables para la ficha de fotografia
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
var fp_tecnicas = [];
var fp_tecnica;
var fp_soportesFlexibles = [];
var fp_soporteFlexible;
var fp_soportesRigidos = [];
var fp_soporteRigido;
var fp_generos = [];
var fp_genero;
var fp_generosPeriodisticos = [];
var fp_generoPeriodistico;
var fp_generosLiterarios = [];
var fp_generoLiterario;
var fp_PersonaToma = 0;
var fp_Reader;
var fp_idEnlaceWeb = 0;
var fp_idImagenElegida = 0;
//Variables para la ficha de publicacion
var fp_IdPaisNuevaPublicacion = 0;
var fp_IdPublicacionElegida = 0;
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
            $("#tbVerAlbumFotografias").val($(this).find("numerofotografias").text());
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
    var titulo = $('#tbTitulo').val();
    var tituloSerie = $('#tbTituloSerie').val();
    var idCiudadAsunto = fp_LugarAsunto;
    var idCiudadToma = fp_LugarToma;
    var fechaAsunto = $('#tbFechaAsunto').val();
    var fechaToma = $('#tbFechaToma').val();
    var idEstudio = fp_Estudio;
    var idAlbum = fp_Album;
    var numeroFotografia = $('#tbNumeroFotografia').val();
    var coleccion = $('#tbColeccion').val();
    var claveTecnica = $('#tbClaveTecnica').val();
    var anotaciones = $('#taAnotaciones').val();
    var contextoHistorico = $('#taContextoHistorico').val();
    var estadoConservacion = $('#sEstadoConservacion').val();
    var estadoIntegridad = $("#sEstadoIntegridad").val();
    var agrietamiento = $("#cbAgrietamiento").is(":checked") ? "SI" : "NO";
    var ataqueBiologico = $("#cbAtaque").is(":checked") ? "SI" : "NO";
    var burbujas = $("#cbBurbujas").is(":checked") ? "SI" : "NO";
    var cambiosColor = $("#cbCambios").is(":checked") ? "SI" : "NO";
    var cintasAdhesivas = $("#cbCintas").is(":checked") ? "SI" : "NO";
    var deformaciones = $("#cbDeformaciones").is(":checked") ? "SI" : "NO";
    var craqueladuras = $("#cbCraqueladuras").is(":checked") ? "SI" : "NO";
    var desprendimientos = $("#cbDesprendimientos").is(":checked") ? "SI" : "NO";
    var desvanecimientos = $("#cbDesvanecimiento").is(":checked") ? "SI" : "NO";
    var huellasDigitales = $("#cbHuellas").is(":checked") ? "SI" : "NO";
    var hongos = $("#cbHongos").is(":checked") ? "SI" : "NO";
    var manchas = $("#cbManchas").is(":checked") ? "SI" : "NO";
    var raspaduras = $("#cbRaspaduras").is(":checked") ? "SI" : "NO";
    var ralladuras = $("#cbRalladuras").is(":checked") ? "SI" : "NO";
    var retocado = $("#cbRetocado").is(":checked") ? "SI" : "NO";
    var roturas = $("#cbRoturas").is(":checked") ? "SI" : "NO";
    var sellosTinta = $("#cbSellos").is(":checked") ? "SI" : "NO";
    var sulfuracion = $("#cbSulfuracion").is(":checked") ? "SI" : "NO";
    var alto = $('#tbAlto').val();
    var ancho = $('#tbAncho').val();
    var diametro = $('#tbDiametro').val();
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
    var tecnicas = fp_tecnicas;
    var soportesFlexibles = fp_soportesFlexibles;
    var soportesRigidos = fp_soportesRigidos;
    var generos = fp_generos;
    
    if (fp_IdFichaPublicacion == 0) {
        $.ajax({url: "php/agregarFichaFotografia.php", async: false, type: "POST", data: { idInstitucion : idInstitucion, numeroRegistroInterno: numeroRegistroInterno,
            numeroInventario: numeroInventario, titulo: titulo, tituloSerie: tituloSerie, idCiudadAsunto: idCiudadAsunto, idCiudadToma: idCiudadToma,
            fechaAsunto: fechaAsunto, fechaToma: fechaToma, idEstudio: idEstudio, idAlbum: idAlbum, numeroFotografia: numeroFotografia, coleccion: coleccion,
            claveTecnica: claveTecnica, anotaciones: anotaciones, contextoHistorico: contextoHistorico, estadoConservacion: estadoConservacion, estadoIntegridad: estadoIntegridad, agrietamiento: agrietamiento,
            ataqueBiologico: ataqueBiologico, burbujas: burbujas, cambiosColor: cambiosColor, craqueladuras: craqueladuras, cintasAdhesivas: cintasAdhesivas,
            deformaciones: deformaciones, desvanecimientos: desvanecimientos, desprendimientos: desprendimientos, huellasDigitales: huellasDigitales,
            hongos: hongos, manchas: manchas, raspaduras: raspaduras, ralladuras: ralladuras, retocado: retocado, roturas: roturas, sellosTinta: sellosTinta,
            sulfuracion: sulfuracion, alto: alto, ancho: ancho, diametro: diametro, inspeccionesOMarcas: inspeccionesOMarcas, caracteristicas: caracteristicas,
            idPersonaCaptura: idPersonaCaptura, fechaCaptura: fechaCaptura, estado: estado,
            autores: autores, temas: temas, tecnicas: tecnicas, soportesFlexibles: soportesFlexibles, soportesRigidos: soportesRigidos, generos: generos },
            success: function(res) {
            if (res == 'OK') {
                obtenerUltimasFichasFotografia();
                limpiarCamposFichaPublicacion();
                alert("Se ha ingresado la ficha de la fotografía.");
            } else {
                alert(res);
            }
        }});
    } else {
        $.ajax({url: "php/actualizarFichaFotografia.php", async: false, type: "POST", data: { idFichaFotografia: fp_IdFichaPublicacion, idInstitucion : idInstitucion, numeroRegistroInterno: numeroRegistroInterno,
            numeroInventario: numeroInventario, titulo: titulo, tituloSerie: tituloSerie, idCiudadAsunto: idCiudadAsunto, idCiudadToma: idCiudadToma,
            fechaAsunto: fechaAsunto, fechaToma: fechaToma, idEstudio: idEstudio, idAlbum: idAlbum, numeroFotografia: numeroFotografia, coleccion: coleccion,
            claveTecnica: claveTecnica, anotaciones: anotaciones, contextoHistorico: contextoHistorico, estadoConservacion: estadoConservacion, estadoIntegridad: estadoIntegridad, agrietamiento: agrietamiento,
            ataqueBiologico: ataqueBiologico, burbujas: burbujas, cambiosColor: cambiosColor, craqueladuras: craqueladuras, cintasAdhesivas: cintasAdhesivas,
            deformaciones: deformaciones, desvanecimientos: desvanecimientos, desprendimientos: desprendimientos, huellasDigitales: huellasDigitales,
            hongos: hongos, manchas: manchas, raspaduras: raspaduras, ralladuras: ralladuras, retocado: retocado, roturas: roturas, sellosTinta: sellosTinta,
            sulfuracion: sulfuracion, alto: alto, ancho: ancho, diametro: diametro, inspeccionesOMarcas: inspeccionesOMarcas, caracteristicas: caracteristicas,
            idPersonaCaptura: idPersonaCaptura, fechaCaptura: fechaCaptura, estado: estado,
            autores: autores, temas: temas, tecnicas: tecnicas, soportesFlexibles: soportesFlexibles, soportesRigidos: soportesRigidos, generos: generos },
            success: function(res) {
            if (res == 'OK') {
                obtenerUltimasFichasFotografia();
                limpiarCamposFichaPublicacion();
                alert("Se ha actualizado la ficha de la fotografía.");
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

function obtenerUltimasFichasFotografia() {
    $.ajax({url: "php/obtenerUltimasFichasFotografia.php", async: false, type: "POST", success: function(res) {
        $("#divUltimasFichas").html(res);
    }});
}

function elegirFichaFotografia(id) {
    fp_IdFichaPublicacion = id;
    $.ajax({url: "php/obtenerFichaFotografiaXML.php", async: false, type: "POST", data: { idFichaFotografia : id }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            $("#tbInstitucion").val($(this).find("nombreInstitucion").text());
            fp_InstitucionElegida = $(this).find("idinstitucion").text();
            $("#tbNumeroInterno").val($(this).find("numeroregistrointerno").text());
            $("#tbNumeroInventario").val($(this).find("numeroinventario").text());
            $("#tbTitulo").val($(this).find("titulo").text());
            $("#tbTituloSerie").val($(this).find("tituloserie").text());
            $("#tbLugarAsunto").val($(this).find("ciudadAsunto").text());
            fp_LugarAsunto = $(this).find("idciudadasunto").text();
            $("#tbLugarToma").val($(this).find("ciudadToma").text());
            fp_LugarToma = $(this).find("idciudadtoma").text();
            $("#tbFechaAsunto").val($(this).find("fechaasunto").text());
            $("#tbFechaToma").val($(this).find("fechatoma").text());
            $("#tbEstudio").val($(this).find("estudio").text());
            fp_Estudio = $(this).find("idestudio").text();
            $("#tbAlbum").val($(this).find("album").text());
            fp_Album = $(this).find("idalbum").text();
            $("#tbNumeroFotografia").val($(this).find("numerofotografia").text());
            $("#tbColeccion").val($(this).find("coleccion").text());
            $("#tbClaveTecnica").val($(this).find("clavetecnica").text());
            $("#taAnotaciones").val($(this).find("anotaciones").text());
            $("#taContextoHistorico").val($(this).find("contextohistorico").text());
            $("#sEstadoConservacion").val($(this).find("estadoconservacion").text());
            $("#sEstadoIntegridad").val($(this).find("estadointegridad").text());
            $(this).find("agrietamiento").text() == 'SI' ? $("#cbAgrietamiento").prop("checked", true) : $("#cbAgrietamiento").prop("checked", false);
            $(this).find("ataquebiologico").text() == 'SI' ? $("#cbAtaque").prop("checked", true) : $("#cbAtaque").prop("checked", false);
            $(this).find("burbujas").text() == 'SI' ? $("#cbBurbujas").prop("checked", true) : $("#cbBurbujas").prop("checked", false);
            $(this).find("cambioscolor").text() == 'SI' ? $("#cbCambios").prop("checked", true) : $("#cbCambios").prop("checked", false);
            $(this).find("craqueladuras").text() == 'SI' ? $("#cbCraqueladuras").prop("checked", true) : $("#cbCraqueladuras").prop("checked", false);
            $(this).find("cintasadhesivas").text() == 'SI' ? $("#cbCintas").prop("checked", true) : $("#cbCintas").prop("checked", false);
            $(this).find("deformaciones").text() == 'SI' ? $("#cbDeformaciones").prop("checked", true) : $("#cbDeformaciones").prop("checked", false);
            $(this).find("desprendimientos").text() == 'SI' ? $("#cbDesprendimientos").prop("checked", true) : $("#cbDesprendimientos").prop("checked", false);
            $(this).find("desvanecimientos").text() == 'SI' ? $("#cbDesvanecimiento").prop("checked", true) : $("#cbDesvanecimiento").prop("checked", false);
            $(this).find("huellasdigitales").text() == 'SI' ? $("#cbHuellas").prop("checked", true) : $("#cbHuellas").prop("checked", false);
            $(this).find("hongos").text() == 'SI' ? $("#cbHongos").prop("checked", true) : $("#cbHongos").prop("checked", false);
            $(this).find("manchas").text() == 'SI' ? $("#cbManchas").prop("checked", true) : $("#cbManchas").prop("checked", false);
            $(this).find("raspaduras").text() == 'SI' ? $("#cbRaspaduras").prop("checked", true) : $("#cbRaspaduras").prop("checked", false);
            $(this).find("ralladuras").text() == 'SI' ? $("#cbRalladuras").prop("checked", true) : $("#cbRalladuras").prop("checked", false);
            $(this).find("retocado").text() == 'SI' ? $("#cbRetocado").prop("checked", true) : $("#cbRetocado").prop("checked", false);
            $(this).find("roturas").text() == 'SI' ? $("#cbRoturas").prop("checked", true) : $("#cbRoturas").prop("checked", false);
            $(this).find("sellosotinta").text() == 'SI' ? $("#cbSellos").prop("checked", true) : $("#cbSellos").prop("checked", false);
            $(this).find("sulfuracion").text() == 'SI' ? $("#cbSulfuracion").prop("checked", true) : $("#cbSulfuracion").prop("checked", false);
            $("#tbAlto").val($(this).find("alto").text());
            $("#tbAncho").val($(this).find("ancho").text());
            $("#tbDiametro").val($(this).find("diametro").text());
            $("#taInspecciones").val($(this).find("inspeccionesomarcas").text());
            $("#taCaracteristicas").val($(this).find("caracteristicas").text());
            $("#divInformacionCaptura").html("Capturado por: " + $(this).find("nombre").text() + " - " + $(this).find("fechacaptura").text());
            $("#divEnlacesWeb").css("visibility", "visible");
            $("#divImagenesBien").css("visibility", "visible");
            $("#divPendientes").css("visibility", "visible");
        });
    }});
    $.ajax({url: "php/obtenerAutoresBienXML.php", async: false, type: "POST", data: { idFichaFotografia : id }, success: function(res) {
        fp_Autores = [];
        $('cat', res).each(function(index, element) {
            fp_Autor =  { id: $(this).find("idautor").text(), autor: $(this).find("autor").text() };
            fp_Autores[fp_Autores.length] = fp_Autor;
        });
    }});
    $.ajax({url: "php/obtenerTemasBienXML.php", async: false, type: "POST", data: { idFichaFotografia : id }, success: function(res) {
        fp_temas = [];
        $('cat', res).each(function(index, element) {
            fp_tema =  { id: $(this).find("idtema").text(), tema: $(this).find("tema").text() };
            fp_temas[fp_temas.length] = fp_tema;
        });
    }});
    $.ajax({url: "php/obtenerTecnicasFotografiaXML.php", async: false, type: "POST", data: { idFichaFotografia : id }, success: function(res) {
        fp_tecnicas = [];
        $('cat', res).each(function(index, element) {
            fp_tecnica =  { id: $(this).find("idtecnica").text(), tecnica: $(this).find("tecnica").text() };
            fp_tecnicas[fp_tecnicas.length] = fp_tecnica;
        });
    }});
    $.ajax({url: "php/obtenerSoportesFlexiblesFotografiaXML.php", async: false, type: "POST", data: { idFichaFotografia : id }, success: function(res) {
        fp_soportesFlexibles = [];
        $('cat', res).each(function(index, element) {
            fp_soporteFlexible =  { id: $(this).find("idsoporteflexible").text(), soporteFlexible: $(this).find("soporteflexible").text() };
            fp_soportesFlexibles[fp_soportesFlexibles.length] = fp_soporteFlexible;
        });
    }});
    $.ajax({url: "php/obtenerSoportesRigidosFotografiaXML.php", async: false, type: "POST", data: { idFichaFotografia : id }, success: function(res) {
        fp_soportesRigidos = [];
        $('cat', res).each(function(index, element) {
            fp_soporteRigido =  { id: $(this).find("idsoporterigido").text(), soporteRigido: $(this).find("soporterigido").text() };
            fp_soportesRigidos[fp_soportesRigidos.length] = fp_soporteRigido; 
        });
    }});
    $.ajax({url: "php/obtenerGenerosFotografiaXML.php", async: false, type: "POST", data: { idFichaFotografia : id }, success: function(res) {
        fp_generos = [];
        $('cat', res).each(function(index, element) {
            fp_genero =  { id: $(this).find("idgenero").text(), genero: $(this).find("genero").text() };
            fp_generos[fp_generos.length] = fp_genero;
        });
    }});
    mostrarAutores();
    mostrarTemas();
    mostrarTecnicas();
    mostrarSoportesFlexibles();
    mostrarSoportesRigidos();
    mostrarGeneros();
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
    fp_temas = [];
    fp_tema;
    fp_tecnicas = [];
    fp_tecnica;
    fp_generos = [];
    fp_genero;
    fp_PersonaToma = 0;
    fp_generosPeriodisticos = [];
    $("#tbInstitucion").val("");
    fp_InstitucionElegida = 0;
    $("#tbPublicacion").val("");
    fp_IdPublicacionElegida = 0;
    $("#tbNumeroInterno").val("");
    $("#tbNumeroInventario").val("");
    $("#tbAlbum").val("");
    fp_Album = 0;
    $("#taAnotaciones").val("");
    $("#taContextoHistorico").val("");
    $("#sEstadoConservacion").val("");
    $("#sEstadoIntegridad").val("");
    $("#cbAgrietamiento").prop("checked", false);
    $("#cbAtaque").prop("checked", false);
    $("#cbBurbujas").prop("checked", false);
    $("#cbCambios").prop("checked", false);
    $("#cbCraqueladuras").prop("checked", false);
    $("#cbCintas").prop("checked", false);
    $("#cbDeformaciones").prop("checked", false);
    $("#cbDesprendimientos").prop("checked", false);
    $("#cbDesvanecimiento").prop("checked", false);
    $("#cbHuellas").prop("checked", false);
    $("#cbHongos").prop("checked", false);
    $("#cbManchas").prop("checked", false);
    $("#cbRaspaduras").prop("checked", false);
    $("#cbRalladuras").prop("checked", false);
    $("#cbRetocado").prop("checked", false);
    $("#cbRoturas").prop("checked", false);
    $("#cbSellos").prop("checked", false);
    $("#cbSulfuracion").prop("checked", false);    
    $("#tbAlto").val("");
    $("#tbAncho").val("");
    $("#tbDiametro").val("");
    $("#taInspecciones").val("");
    $("#taCaracteristicas").val("");
    $("#tbInstitucion").val("");
    $("#tbInstitucion").val("");
    $("#divInformacionCaptura").html("");
    $("#divAutores").html("");
    $("#divTemas").html("");
    $("#divGenerosPeriodisticos").html("");    
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
    numeroFotografias = $("#tbNuevoAlbumFotografias").val();
    if (numeroFotografias.length == 0) {
        numeroFotografias = 0;
    }
    if (isNaN(numeroFotografias)) {
        alert("No ha introducido un número de fotografías válido.")
        return;
    }
    numeroAlbum = $("#tbNuevoAlbumNumero").val();

    $.ajax({url: "php/agregarAlbum.php", async: false, type: "POST", data: { nombre : nombre, institucion : institucion, descripcion : descripcion, numeroFotografias : numeroFotografias, numeroAlbum: numeroAlbum, tipoFicha: "Publicacion" }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoAlbumNombre").val('');
            $("#tbNuevoAlbumInstitucion").val('');
            $("#tbNuevoAlbumDescripcion").val('');
            $("#tbNuevoAlbumFotografias").val('');
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
    fp_tecnica = { id : id, tecnica : tecnica };
    fp_tecnicas[fp_tecnicas.length] = fp_tecnica;
    mostrarTecnicas();
}

function mostrarTecnicas() {
    $("#divTecnicas").html("");
    for (i = 0; i <= fp_tecnicas.length - 1; i++) {
        fp_tecnica = fp_tecnicas[i];
        $("#divTecnicas").html($("#divTecnicas").html() + '<span class="tag"><span>' + fp_tecnica.tecnica + '</span><span href="" onclick="quitarTecnica(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarTecnica(index) {
    fp_tecnicas.splice(index, 1);
    mostrarTecnicas();
}
//Soportes flexibles
function agregarNuevoSoporteFlexible() {
    var soporteFlexible;
    if ($("#tbNuevoSoporteFlexible").val().length > 0) {
        soporteFlexible = $("#tbNuevoSoporteFlexible").val();
    } else {
        alert("No ha escrito el tipo de soporte flexible.");
        return;
    }
    $.ajax({url: "php/agregarSoporteFlexible.php", async: false, type: "POST", data: { soporteFlexible : soporteFlexible }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoSoporteFlexible").val('');
            $('#modalAgregarSoporteFlexible').modal('hide');
        } else {
            alert(res);
        }
    }});
}

function agregarSoporteFlexible(id, soporteFlexible) {
    fp_soporteFlexible = { id : id, soporteFlexible : soporteFlexible };
    fp_soportesFlexibles[fp_soportesFlexibles.length] = fp_soporteFlexible;
    mostrarSoportesFlexibles();
}

function mostrarSoportesFlexibles() {
    $("#divSoportesFlexibles").html("");
    for (i = 0; i <= fp_soportesFlexibles.length - 1; i++) {
        fp_soporteFlexible = fp_soportesFlexibles[i];
        $("#divSoportesFlexibles").html($("#divSoportesFlexibles").html() + '<span class="tag"><span>' + fp_soporteFlexible.soporteFlexible + '</span><span href="" onclick="quitarSoporteFlexible(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarSoporteFlexible(index) {
    fp_soportesFlexibles.splice(index, 1);
    mostrarSoportesFlexibles();
}
//Soportes Rigidos
function agregarNuevoSoporteRigido() {
    var soporteRigido;
    if ($("#tbNuevoSoporteRigido").val().length > 0) {
        soporteRigido = $("#tbNuevoSoporteRigido").val();
    } else {
        alert("No ha escrito el tipo de soporte Rigido.");
        return;
    }
    $.ajax({url: "php/agregarSoporteRigido.php", async: false, type: "POST", data: { soporteRigido : soporteRigido }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoSoporteRigido").val('');
            $('#modalAgregarSoporteRigido').modal('hide');
        } else {
            alert(res);
        }
    }});
}

function agregarSoporteRigido(id, soporteRigido) {
    fp_soporteRigido = { id : id, soporteRigido : soporteRigido };
    fp_soportesRigidos[fp_soportesRigidos.length] = fp_soporteRigido;
    mostrarSoportesRigidos();
}

function mostrarSoportesRigidos() {
    $("#divSoportesRigidos").html("");
    for (i = 0; i <= fp_soportesRigidos.length - 1; i++) {
        fp_soporteRigido = fp_soportesRigidos[i];
        $("#divSoportesRigidos").html($("#divSoportesRigidos").html() + '<span class="tag"><span>' + fp_soporteRigido.soporteRigido + '</span><span href="" onclick="quitarSoporteRigido(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarSoporteRigido(index) {
    fp_soportesRigidos.splice(index, 1);
    mostrarSoportesRigidos();
}
//Generos
function agregarNuevoGenero() {
    var genero;
    if ($("#tbNuevoGenero").val().length > 0) {
        genero = $("#tbNuevoGenero").val();
    } else {
        alert("No ha escrito el tipo de Genero.");
        return;
    }
    $.ajax({url: "php/agregarGenero.php", async: false, type: "POST", data: { genero : genero }, success: function(res) {
        if (res == 'OK') {
            $("#tbNuevoGenero").val('');
            $('#modalAgregarGenero').modal('hide');
        } else {
            alert(res);
        }
    }});
}

function agregarGenero(id, genero) {
    fp_genero = { id : id, genero : genero };
    fp_generos[fp_generos.length] = fp_genero;
    mostrarGeneros();
}

function mostrarGeneros() {
    $("#divGeneros").html("");
    for (i = 0; i <= fp_generos.length - 1; i++) {
        fp_genero = fp_generos[i];
        $("#divGeneros").html($("#divGeneros").html() + '<span class="tag"><span>' + fp_genero.genero + '</span><span href="" onclick="quitarGenero(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarGenero(index) {
    fp_generos.splice(index, 1);
    mostrarGeneros();
}
//Enlaces web
function obtenerEnlacesWeb() {
    $.ajax({url: "php/obtenerEnlacesWebFotografia.php", async: false, type: "POST", data: { idFichaFotografia: fp_IdFichaPublicacion }, success: function(res) {
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
        $.ajax({url: "php/agregarEnlaceWebFotografia.php", async: false, type: "POST", data: { idFichaFotografia: fp_IdFichaPublicacion, enlaceWeb: enlaceWeb, notasEnlaceWeb: notasEnlaceWeb }, success: function(res) {
            if (res == "OK") {
                obtenerEnlacesWeb();
            } else {
                alert(res);
            }
        }});
    } else {
        $.ajax({url: "php/actualizarEnlaceWebFotografia.php", async: false, type: "POST", data: { idEnlaceWeb: fp_idEnlaceWeb, enlaceWeb: enlaceWeb, notasEnlaceWeb: notasEnlaceWeb }, success: function(res) {
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
        fd.append('idFichaFotografia', fp_IdFichaPublicacion);
        rutaImagen = "imagenesbienes/fotografias/" + fp_IdFichaPublicacion + "/" + files.name;
        $.ajax({ url: "imagenesbienes/subirImagenFotografia.php", type: "POST", data: fd, contentType: false, cache: false, processData: false, success: function(data) {
            $('#loading').hide();
            $("#message").html(data);
        }});
    } else {
        rutaImagen = $('#imgImagen').attr('src');
    }
    var aprobada = $("#selImagenAprobada").val();
    var fechaToma = $("#tbTomaFecha").val();    

    if (fp_idImagenElegida == 0) {
        $.ajax({url: "php/agregarImagenFotografia.php", async: false, type: "POST", data: { idFichaFotografia: fp_IdFichaPublicacion, idPersonaToma: fp_PersonaToma, rutaImagen: rutaImagen, aprobada: aprobada, fechaToma: fechaToma }, success: function(res) {
            if (res == "OK") {
                obtenerImagenesFotografia();
            } else {
                alert(res);
            }
        }});
    } else {
        $.ajax({url: "php/actualizarImagenFotografia.php", async: false, type: "POST", data: { idImagen: fp_idImagenElegida, idPersonaToma: fp_PersonaToma, rutaImagen: rutaImagen, aprobada: aprobada, fechaToma: fechaToma }, success: function(res) {
            if (res == "OK") {
                obtenerImagenesFotografia();
            } else {
                alert(res);
            }
        }});
    }
}

function obtenerImagenesFotografia() {
    $.ajax({url: "php/obtenerImagenesFotografia.php", async: false, type: "POST", data: { idFichaFotografia: fp_IdFichaPublicacion }, success: function(res) {
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