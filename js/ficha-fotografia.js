//Variables para la ficha de fotografia
var ff_IdFichaFotografia = 0;
var ff_LugarAsunto = 0;
var ff_LugarToma = 0;
var ff_Autores = [];
var ff_Autor;
var ff_Estudio = 0;
var ff_Album = 0;
var ff_InstitucionElegida = 0;
var ff_InstitucionElegidaNuevoAlbum = 0;
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
var ff_PersonaToma = 0;
var ff_Reader;
var ff_idEnlaceWeb = 0;
var ff_idImagenElegida = 0;
//Funciones de elección de datos
function elegirInstitucionBien(id) {
    ff_InstitucionElegida = id;
}

function elegirLugarAsunto(id) {
    ff_LugarAsunto = id;
}

function elegirLugarToma(id) {
    ff_LugarToma = id;
}

function elegirEstudio(id) {
    ff_Estudio = id;
}

function elegirAlbum(id) {
    ff_Album = id;
}

function elegirPersonaToma(id) {
    ff_PersonaToma = id;
}
//Funciones de la ficha
function guardarFichaFoto() {
    var idInstitucion = ff_InstitucionElegida;
    var numeroRegistroInterno = $("#tbNumeroInterno").val();
    var numeroInventario = $("#tbNumeroInventario").val();
    var titulo = $('#tbTitulo').val();
    var tituloSerie = $('#tbTituloSerie').val();
    var idCiudadAsunto = ff_LugarAsunto;
    var idCiudadToma = ff_LugarToma;
    var fechaAsunto = $('#tbFechaAsunto').val();
    var fechaToma = $('#tbFechaToma').val();
    var idEstudio = ff_Estudio;
    var idAlbum = ff_Album;
    var numeroFotografia = $('#tbNumeroFotografia').val();
    var coleccion = $('#tbColeccion').val();
    var claveTecnica = $('#tbClaveTecnica').val();
    var anotaciones = $('#taAnotaciones').val();
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
    var autores = ff_Autores;
    var temas = ff_temas;
    var tecnicas = ff_tecnicas;
    var soportesFlexibles = ff_soportesFlexibles;
    var soportesRigidos = ff_soportesRigidos;
    var generos = ff_generos;
    
    if (ff_IdFichaFotografia == 0) {
        $.ajax({url: "php/agregarFichaFotografia.php", async: false, type: "POST", data: { idInstitucion : idInstitucion, numeroRegistroInterno: numeroRegistroInterno,
            numeroInventario: numeroInventario, titulo: titulo, tituloSerie: tituloSerie, idCiudadAsunto: idCiudadAsunto, idCiudadToma: idCiudadToma,
            fechaAsunto: fechaAsunto, fechaToma: fechaToma, idEstudio: idEstudio, idAlbum: idAlbum, numeroFotografia: numeroFotografia, coleccion: coleccion,
            claveTecnica: claveTecnica, anotaciones: anotaciones, estadoConservacion: estadoConservacion, estadoIntegridad: estadoIntegridad, agrietamiento: agrietamiento,
            ataqueBiologico: ataqueBiologico, burbujas: burbujas, cambiosColor: cambiosColor, craqueladuras: craqueladuras, cintasAdhesivas: cintasAdhesivas,
            deformaciones: deformaciones, desvanecimientos: desvanecimientos, desprendimientos: desprendimientos, huellasDigitales: huellasDigitales,
            hongos: hongos, manchas: manchas, raspaduras: raspaduras, ralladuras: ralladuras, retocado: retocado, roturas: roturas, sellosTinta: sellosTinta,
            sulfuracion: sulfuracion, alto: alto, ancho: ancho, diametro: diametro, inspeccionesOMarcas: inspeccionesOMarcas, caracteristicas: caracteristicas,
            idPersonaCaptura: idPersonaCaptura, fechaCaptura: fechaCaptura, estado: estado,
            autores: autores, temas: temas, tecnicas: tecnicas, soportesFlexibles: soportesFlexibles, soportesRigidos: soportesRigidos, generos: generos },
            success: function(res) {
            if (res == 'OK') {
                obtenerUltimasFichasFotografia();
                limpiarCamposFichaFotografia();
                alert("Se ha ingresado la ficha de la fotografía.");
            } else {
                alert(res);
            }
        }});
    } else {
        $.ajax({url: "php/actualizarFichaFotografia.php", async: false, type: "POST", data: { idFichaFotografia: ff_IdFichaFotografia, idInstitucion : idInstitucion, numeroRegistroInterno: numeroRegistroInterno,
            numeroInventario: numeroInventario, titulo: titulo, tituloSerie: tituloSerie, idCiudadAsunto: idCiudadAsunto, idCiudadToma: idCiudadToma,
            fechaAsunto: fechaAsunto, fechaToma: fechaToma, idEstudio: idEstudio, idAlbum: idAlbum, numeroFotografia: numeroFotografia, coleccion: coleccion,
            claveTecnica: claveTecnica, anotaciones: anotaciones, estadoConservacion: estadoConservacion, estadoIntegridad: estadoIntegridad, agrietamiento: agrietamiento,
            ataqueBiologico: ataqueBiologico, burbujas: burbujas, cambiosColor: cambiosColor, craqueladuras: craqueladuras, cintasAdhesivas: cintasAdhesivas,
            deformaciones: deformaciones, desvanecimientos: desvanecimientos, desprendimientos: desprendimientos, huellasDigitales: huellasDigitales,
            hongos: hongos, manchas: manchas, raspaduras: raspaduras, ralladuras: ralladuras, retocado: retocado, roturas: roturas, sellosTinta: sellosTinta,
            sulfuracion: sulfuracion, alto: alto, ancho: ancho, diametro: diametro, inspeccionesOMarcas: inspeccionesOMarcas, caracteristicas: caracteristicas,
            idPersonaCaptura: idPersonaCaptura, fechaCaptura: fechaCaptura, estado: estado,
            autores: autores, temas: temas, tecnicas: tecnicas, soportesFlexibles: soportesFlexibles, soportesRigidos: soportesRigidos, generos: generos },
            success: function(res) {
            if (res == 'OK') {
                obtenerUltimasFichasFotografia();
                limpiarCamposFichaFotografia();
                alert("Se ha actualizado la ficha de la fotografía.");
            } else {
                alert(res);
            }
        }});
    }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        ff_Reader = new FileReader();        
        ff_Reader.onload = function (e) {
            $('#imgImagen').attr('src', e.target.result);
        }        
        ff_Reader.readAsDataURL(input.files[0]);
    }
}

function limpiarCamposAgregarImagen() {
    ff_Reader = null;
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
    ff_IdFichaFotografia = id;
    $.ajax({url: "php/obtenerFichaFotografiaXML.php", async: false, type: "POST", data: { idFichaFotografia : id }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            $("#tbInstitucion").val($(this).find("nombreInstitucion").text());
            ff_InstitucionElegida = $(this).find("idinstitucion").text();
            $("#tbNumeroInterno").val($(this).find("numeroregistrointerno").text());
            $("#tbNumeroInventario").val($(this).find("numeroinventario").text());
            $("#tbTitulo").val($(this).find("titulo").text());
            $("#tbTituloSerie").val($(this).find("tituloserie").text());
            $("#tbLugarAsunto").val($(this).find("ciudadAsunto").text());
            ff_LugarAsunto = $(this).find("idciudadasunto").text();
            $("#tbLugarToma").val($(this).find("ciudadToma").text());
            ff_LugarToma = $(this).find("idciudadtoma").text();
            $("#tbFechaAsunto").val($(this).find("fechaasunto").text());
            $("#tbFechaToma").val($(this).find("fechatoma").text());
            $("#tbEstudio").val($(this).find("estudio").text());
            ff_Estudio = $(this).find("idestudio").text();
            $("#tbAlbum").val($(this).find("album").text());
            ff_Album = $(this).find("idalbum").text();
            $("#tbNumeroFotografia").val($(this).find("numerofotografia").text());
            $("#tbColeccion").val($(this).find("coleccion").text());
            $("#tbClaveTecnica").val($(this).find("clavetecnica").text());
            $("#taAnotaciones").val($(this).find("anotaciones").text());
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
        ff_Autores = [];
        $('cat', res).each(function(index, element) {
            ff_Autor =  { id: $(this).find("idautor").text(), autor: $(this).find("autor").text() };
            ff_Autores[ff_Autores.length] = ff_Autor;
        });
    }});
    $.ajax({url: "php/obtenerTemasBienXML.php", async: false, type: "POST", data: { idFichaFotografia : id }, success: function(res) {
        ff_temas = [];
        $('cat', res).each(function(index, element) {
            ff_tema =  { id: $(this).find("idtema").text(), tema: $(this).find("tema").text() };
            ff_temas[ff_temas.length] = ff_tema;
        });
    }});
    $.ajax({url: "php/obtenerTecnicasFotografiaXML.php", async: false, type: "POST", data: { idFichaFotografia : id }, success: function(res) {
        ff_tecnicas = [];
        $('cat', res).each(function(index, element) {
            ff_tecnica =  { id: $(this).find("idtecnica").text(), tecnica: $(this).find("tecnica").text() };
            ff_tecnicas[ff_tecnicas.length] = ff_tecnica;
        });
    }});
    $.ajax({url: "php/obtenerSoportesFlexiblesFotografiaXML.php", async: false, type: "POST", data: { idFichaFotografia : id }, success: function(res) {
        ff_soportesFlexibles = [];
        $('cat', res).each(function(index, element) {
            ff_soporteFlexible =  { id: $(this).find("idsoporteflexible").text(), soporteFlexible: $(this).find("soporteflexible").text() };
            ff_soportesFlexibles[ff_soportesFlexibles.length] = ff_soporteFlexible;
        });
    }});
    $.ajax({url: "php/obtenerSoportesRigidosFotografiaXML.php", async: false, type: "POST", data: { idFichaFotografia : id }, success: function(res) {
        ff_soportesRigidos = [];
        $('cat', res).each(function(index, element) {
            ff_soporteRigido =  { id: $(this).find("idsoporterigido").text(), soporteRigido: $(this).find("soporterigido").text() };
            ff_soportesRigidos[ff_soportesRigidos.length] = ff_soporteRigido; 
        });
    }});
    $.ajax({url: "php/obtenerGenerosFotografiaXML.php", async: false, type: "POST", data: { idFichaFotografia : id }, success: function(res) {
        ff_generos = [];
        $('cat', res).each(function(index, element) {
            ff_genero =  { id: $(this).find("idgenero").text(), genero: $(this).find("genero").text() };
            ff_generos[ff_generos.length] = ff_genero;
        });
    }});
    mostrarAutores();
    mostrarTemas();
    mostrarTecnicas();
    mostrarSoportesFlexibles();
    mostrarSoportesRigidos();
    mostrarGeneros();
}

function limpiarCamposFichaFotografia () {
    ff_IdFichaFotografia = 0;
    ff_LugarAsunto = 0;
    ff_LugarToma = 0;
    ff_Autores = [];
    ff_Autor;
    ff_Estudio = 0;
    ff_Album = 0;
    ff_InstitucionElegida = 0;
    ff_InstitucionElegidaNuevoAlbum = 0;
    ff_temas = [];
    ff_tema;
    ff_tecnicas = [];
    ff_tecnica;
    ff_soportesFlexibles = [];
    ff_soporteFlexible;
    ff_soportesRigidos = [];
    ff_soporteRigido;
    ff_generos = [];
    ff_genero;
    ff_PersonaToma = 0;
    $("#tbInstitucion").val("");
    ff_InstitucionElegida = 0;
    $("#tbNumeroInterno").val("");
    $("#tbNumeroInventario").val("");
    $("#tbTitulo").val("");
    $("#tbTituloSerie").val("");
    $("#tbLugarAsunto").val("");
    ff_LugarAsunto = 0;
    $("#tbLugarToma").val("");
    ff_LugarToma = 0;
    $("#tbFechaAsunto").val("");
    $("#tbFechaToma").val("");
    $("#tbEstudio").val("");
    ff_Estudio = 0;
    $("#tbAlbum").val("");
    ff_Album = 0;
    $("#tbNumeroFotografia").val("");
    $("#tbColeccion").val("");
    $("#tbClaveTecnica").val("");
    $("#taAnotaciones").val("");
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
    $("#divTecnicas").html("");
    $("#divSoportesFlexibles").html("");
    $("#divSoportesRigidos").html("");
    $("#divGeneros").html("");
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
    ff_Autor = { id : id, autor : autor };
    ff_Autores[ff_Autores.length] = ff_Autor;
    mostrarAutores();
}

function mostrarAutores() {
    $("#divAutores").html("");
    for (i = 0; i <= ff_Autores.length - 1; i++) {
        ff_Autor = ff_Autores[i];
        $("#divAutores").html($("#divAutores").html() + '<span class="tag"><span>' + ff_Autor.autor + '</span><span href="" onclick="quitarAutor(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarAutor(index) {
    ff_Autores.splice(index, 1);
    mostrarAutores();
}
//Estudios
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
    ff_soporteFlexible = { id : id, soporteFlexible : soporteFlexible };
    ff_soportesFlexibles[ff_soportesFlexibles.length] = ff_soporteFlexible;
    mostrarSoportesFlexibles();
}

function mostrarSoportesFlexibles() {
    $("#divSoportesFlexibles").html("");
    for (i = 0; i <= ff_soportesFlexibles.length - 1; i++) {
        ff_soporteFlexible = ff_soportesFlexibles[i];
        $("#divSoportesFlexibles").html($("#divSoportesFlexibles").html() + '<span class="tag"><span>' + ff_soporteFlexible.soporteFlexible + '</span><span href="" onclick="quitarSoporteFlexible(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarSoporteFlexible(index) {
    ff_soportesFlexibles.splice(index, 1);
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
    ff_soporteRigido = { id : id, soporteRigido : soporteRigido };
    ff_soportesRigidos[ff_soportesRigidos.length] = ff_soporteRigido;
    mostrarSoportesRigidos();
}

function mostrarSoportesRigidos() {
    $("#divSoportesRigidos").html("");
    for (i = 0; i <= ff_soportesRigidos.length - 1; i++) {
        ff_soporteRigido = ff_soportesRigidos[i];
        $("#divSoportesRigidos").html($("#divSoportesRigidos").html() + '<span class="tag"><span>' + ff_soporteRigido.soporteRigido + '</span><span href="" onclick="quitarSoporteRigido(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarSoporteRigido(index) {
    ff_soportesRigidos.splice(index, 1);
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
    ff_genero = { id : id, genero : genero };
    ff_generos[ff_generos.length] = ff_genero;
    mostrarGeneros();
}

function mostrarGeneros() {
    $("#divGeneros").html("");
    for (i = 0; i <= ff_generos.length - 1; i++) {
        ff_genero = ff_generos[i];
        $("#divGeneros").html($("#divGeneros").html() + '<span class="tag"><span>' + ff_genero.genero + '</span><span href="" onclick="quitarGenero(' + i + ')" class="closeTag">x</span></span>');
    }
}

function quitarGenero(index) {
    ff_generos.splice(index, 1);
    mostrarGeneros();
}
//Enlaces web
function obtenerEnlacesWeb() {
    $.ajax({url: "php/obtenerEnlacesWebFotografia.php", async: false, type: "POST", data: { idFichaFotografia: ff_IdFichaFotografia }, success: function(res) {
        $("#divListaEnlacesWeb").html(res);
    }});
}

function elegirEnlaceWeb(idInstitucionEnlaceWeb, urlEnlaceWeb, notasEnlaceWeb) {
    ff_idEnlaceWeb = idInstitucionEnlaceWeb;
    $("#tbEnlaceWeb").val(urlEnlaceWeb);
    $("#tbNotasEnlaceWeb").val(notasEnlaceWeb);
}

function guardarEnlaceWeb() {
    if (ff_IdFichaFotografia == 0) {
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
    if (ff_idEnlaceWeb == 0) {
        $.ajax({url: "php/agregarEnlaceWebFotografia.php", async: false, type: "POST", data: { idFichaFotografia: ff_IdFichaFotografia, enlaceWeb: enlaceWeb, notasEnlaceWeb: notasEnlaceWeb }, success: function(res) {
            if (res == "OK") {
                obtenerEnlacesWeb();
            } else {
                alert(res);
            }
        }});
    } else {
        $.ajax({url: "php/actualizarEnlaceWebFotografia.php", async: false, type: "POST", data: { idEnlaceWeb: ff_idEnlaceWeb, enlaceWeb: enlaceWeb, notasEnlaceWeb: notasEnlaceWeb }, success: function(res) {
            if (res == "OK") {
                obtenerEnlacesWeb();
            } else {
                alert(res);
            }
        }});
    }
}

function limpiarCamposEnlaceWeb() {
    ff_idEnlaceWeb = 0;
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
        fd.append('idFichaFotografia', ff_IdFichaFotografia);
        rutaImagen = "imagenesbienes/fotografias/" + ff_IdFichaFotografia + "/" + files.name;
        $.ajax({ url: "imagenesbienes/subirImagenFotografia.php", type: "POST", data: fd, contentType: false, cache: false, processData: false, success: function(data) {
            $('#loading').hide();
            $("#message").html(data);
        }});
    } else {
        rutaImagen = $('#imgImagen').attr('src');
    }
    var aprobada = $("#selImagenAprobada").val();
    var fechaToma = $("#tbTomaFecha").val();    

    if (ff_idImagenElegida == 0) {
        $.ajax({url: "php/agregarImagenFotografia.php", async: false, type: "POST", data: { idFichaFotografia: ff_IdFichaFotografia, idPersonaToma: ff_PersonaToma, rutaImagen: rutaImagen, aprobada: aprobada, fechaToma: fechaToma }, success: function(res) {
            if (res == "OK") {
                obtenerImagenesFotografia();
            } else {
                alert(res);
            }
        }});
    } else {
        $.ajax({url: "php/actualizarImagenFotografia.php", async: false, type: "POST", data: { idImagen: ff_idImagenElegida, idPersonaToma: ff_PersonaToma, rutaImagen: rutaImagen, aprobada: aprobada, fechaToma: fechaToma }, success: function(res) {
            if (res == "OK") {
                obtenerImagenesFotografia();
            } else {
                alert(res);
            }
        }});
    }
}

function obtenerImagenesFotografia() {
    $.ajax({url: "php/obtenerImagenesFotografia.php", async: false, type: "POST", data: { idFichaFotografia: ff_IdFichaFotografia }, success: function(res) {
        $("#divListaImagenesBien").html(res);
    }});
}

function elegirImagenFotografia(idimagen, idpersona, personatoma, fechatoma, aprobada, rutaimagen) {
    ff_idImagenElegida = idimagen;
    ff_PersonaToma = idpersona;
    $("#tbTomaPersona").val(personatoma);
    $("#tbTomaFecha").val(fechatoma);
    $("#selImagenAprobada").val(aprobada);
    $('#imgImagen').attr('src', rutaimagen);
}