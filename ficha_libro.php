<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.min.css" />
    <link rel="stylesheet" type="text/css" href="css/nervo.css" />
    <link rel="stylesheet" type="text/css" href="css/controls.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/nervo.js"></script>
    <script src="js/ficha-libro.js"></script>
    <title>Acervo artístico de Amado Nervo</title>
</head>
<body>
    <div class="container">
        <div class="row divBackgroundBlack">
            <div class="divLogo">

            </div>
        </div>
        <?php
            require_once('php/menu.php');
            echo menu();
        ?>
        <div class="row divMargin divBackgroundBlue">
            <div class="col-12">
                Ficha - Libros
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                Buscar por título
            </div>
            <div class="col-10">
                <input type="text" class="form-control textbox-center" id="tbBuscar"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                Últimas fichas
            </div>
            <div class="col-10" id="divUltimasFichas">

            </div>
        </div>
        <div class="row divMargin divBackgroundBlue2">
            <div class="col-12">
                Datos del bien cultural registrado
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Institución</label>
            </div>
            <div class="col-10">
                <input type="text" class="form-control textbox-center" id="tbInstitucion"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Número de registro interno</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbNumeroInterno"></input>
            </div>
            <div class="col-2">
                <label class="labelType01">Número de inventario</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbNumeroInventario"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Título de la publicación</label>
            </div>
            <div class="col-10">
                <input type="text" class="form-control textbox-center" id="tbTitulo"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Subtítulo</label>
            </div>
            <div class="col-10">
                <input type="text" class="form-control textbox-center" id="tbSubtitulo"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Autor</label>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-7">
                        <input type="text" class="form-control textbox-center" id="tbAutor"></input>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarAutor'>
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12" id="divAutores">
                        
                    </div>
                </div>
            </div>
            <div class="col-2">
                <label class="labelType01">Imprenta</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbImprenta"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Prologo</label>
            </div>
            <div class="col-4">
                <textarea rows="3" class="form-control" id="taPrologo"></textarea>
            </div>
            <div class="col-2">
                <label class="labelType01">Compiladores</label>
            </div>
            <div class="col-4">
                <textarea rows="3" class="form-control" id="taCompiladores"></textarea>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Editorial</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbEditorial"></input>
            </div>
            <div class="col-2">
                <label class="labelType01">Lugar de edición</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbLugarEdicion"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Idioma</label>
            </div>
            <div class="col-3" id="divIdiomas">
                
            </div>
            <div class="col-1">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarIdioma'>
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <div class="col-2">
                <label class="labelType01">Fecha de edición</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbFechaEdicion"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Fecha de impresión</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbFechaImpresion"></input>
            </div>
            <div class="col-2">
                <label class="labelType01">Fecha de reimpresión</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbFechaReimpresion"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">ISBN</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbISBN"></input>
            </div>            
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Volúmen</label>
            </div>
            <div class="col-1">
                <input type="text" class="form-control textbox-center" id="tbVolumen"></input>
            </div>
            <div class="col-1">
                <label class="labelType01">Tomo</label>
            </div>
            <div class="col-1">
                <input type="text" class="form-control textbox-center" id="tbTomo"></input>
            </div>
            <div class="col-1">
                <label class="labelType01">Tiraje</label>
            </div>
            <div class="col-1">
                <input type="text" class="form-control textbox-center" id="tbTiraje"></input>
            </div>
            <div class="col-1">
                <label class="labelType01">No. Ejemplar</label>
            </div>
            <div class="col-1">
                <input type="text" class="form-control textbox-center" id="tbEjemplares"></input>
            </div>
            <div class="col-1">
                <label class="labelType01">Ciudad</label>
            </div>
            <div class="col-2">
                <input type="text" class="form-control textbox-center" id="tbCiudad"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Colección</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbColeccion"></input>
            </div>
            <div class="col-2">
                <label class="labelType01">Número total colección</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbNumeroTotalColeccion"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Ilustrador</label>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-7">
                        <input type="text" class="form-control textbox-center" id="tbIlustrador"></input>
                    </div>
                    <div class="col-2">
                        
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarAutor'>
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12" id="divIlustradores">
                        
                    </div>
                </div>
            </div>
            <div class="col-2">
                <label class="labelType01">Géneros literarios</label>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-8" id="divGenerosLiterariosSelect">
                
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" onclick="agregarGeneroLiterarioSelect()">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarGeneroLiterario'>
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" id="divGenerosLiterarios">
                        
                    </div>
                </div>     
            </div>
        </div>        
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Temas</label>
            </div>
            <div class="col-4">
                <div class="row">
                    <!--<div class="col-7">
                        <input type="text" class="form-control textbox-center" id="tbTema"></input>
                    </div>-->
                    <div class="col-7" id="divTemasSelect">

                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" onclick="agregarTemaSelect()">
                            <i class="fas fa-check"></i>
                        </button>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarTema'>
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12" id="divTemas">
                        
                    </div>
                </div>
            </div>
            <div class="col-2">
                <label class="labelType01">Anotaciones</label>
            </div>
            <div class="col-4">
                <textarea rows="3" class="form-control" id="taAnotaciones"></textarea>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Contexto histórico</label>
            </div>
            <div class="col-10">
                <textarea rows="3" class="form-control" id="taContextoHistorico"></textarea>
            </div>
        </div>
        <div class="row divMargin divBackgroundBlue2">
            <div class="col-12">
                Caraterísticas físicas del bien
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Tipo de encuadernación</label>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-7">
                        <input type="text" class="form-control textbox-center" id="tbTipoEncuadernacion"></input>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarTipoEncuadernacion'>
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12" id="divTiposEncuadernacion">
                        
                    </div>
                </div>
            </div>
            <div class="col-2">
                <label class="labelType01">Técnica de impresión</label>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-7">
                        <input type="text" class="form-control textbox-center" id="tbTecnicaImpresion"></input>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarTecnicaImpresion'>
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12" id="divTecnicasImpresion">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Tipo de papel</label>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-7">
                        <input type="text" class="form-control textbox-center" id="tbTipoPapel"></input>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarTipoPapel'>
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12" id="divTiposPapel">
                        
                    </div>
                </div>
            </div>            
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Estado de Conservación</label>
            </div>
            <div class="col-4">
                <select class="form-control" id="sEstadoConservacion">
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Malo">Malo</option>                        
                </select>
            </div>
            <div class="col-2">
                <label class="labelType01">Estado de Integridad</label>
            </div>
            <div class="col-4">
                <select class="form-control" id="sEstadoIntegridad">
                    <option value="Completo">Completo</option>
                    <option value="Incompleto">Incompleto</option>
                </select>
            </div>
        </div>
        <!--
        <div class="row divMargin">
            <div class="col-2">
                <input type="checkbox" value="Arrugas" id="cbArrugas"> <label for="cbArrugas" class="labelType01">Arrugas</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Ataque biológico" id="cbAtaque"> <label for="cbAtaque" class="labelType01">Ataque biológico</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Cintas adhesivas" id="cbCintas"> <label for="cbCintas" class="labelType01">Cintas adhesivas</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Deformaciones" id="cbDeformaciones"> <label for="cbDeformaciones" class="labelType01">Deformaciones</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Deshojado" id="cbDeshojado"> <label for="cbDeshojado" class="labelType01">Deshojado</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Etiquetas" id="cbEtiquetas"> <label for="cbEtiquetas" class="labelType01">Etiquetas</label>
            </div>
        </div>
        <div class="row divMargin">            
            <div class="col-2">
                <input type="checkbox" value="Huellas digitales" id="cbHuellas"> <label for="cbHuellas" class="labelType01">Huellas digitales</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Hongos" id="cbHongos"> <label for="cbHongos" class="labelType01">Hongos</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Manchas" id="cbManchas"> <label for="cbManchas" class="labelType01">Manchas</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Rasgaduras" id="cbRasgaduras"> <label for="cbRasgaduras" class="labelType01">Rasgaduras</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Ralladuras" id="cbRalladuras"> <label for="cbRalladuras" class="labelType01">Ralladuras</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Retocado" id="cbRetocado"> <label for="cbRetocado" class="labelType01">Retocado</label>
            </div>
        </div>
        <div class="row divMargin">            
            <div class="col-2">
                <input type="checkbox" value="Roturas" id="cbRoturas"> <label for="cbRoturas" class="labelType01">Roturas</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Sellos o inscripciones por tinta" id="cbSellos"> <label for="cbSellos" class="labelType01">Sellos o tinta</label>
            </div>
            <div class="col-2">
                <label class="labelType01">Otros</label>
            </div>
            <div class="col-2">
                <input type="text" class="form-control textbox-center" id="tbOtros"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-4">
                <label class="labelType01">Objeto fragmentado (número de fragmentos)</label>
            </div>
            <div class="col-1">
                <input type="text" class="form-control textbox-center" id="tbNumeroFragmentos"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Medidas</label>
            </div>
            <div class="col-1">
                <label class="labelType01">Alto:</label>
            </div>
            <div class="col-2">
                <input type="text" class="form-control textbox-center" id="tbAlto"></input>
            </div>
            <div class="col-1">
                <label class="labelType01">Ancho:</label>
            </div>
            <div class="col-2">
                <input type="text" class="form-control textbox-center" id="tbAncho"></input>
            </div>            
            <div class="col-1">
                <label class="labelType01">Profundidad:</label>
            </div>
            <div class="col-2">
                <input type="text" class="form-control textbox-center" id="tbProfundidad"></input>
            </div> 
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Pie de imprenta</label>
            </div>
            <div class="col-10">
                <input type="text" class="form-control textbox-center" id="tbPieImprenta"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Inspecciones o marcas</label>
            </div>
            <div class="col-4">
                <textarea rows="3" class="form-control" id="taInspecciones"></textarea>
            </div>
            <div class="col-2">
                <label class="labelType01">Características o señas particulares</label>
            </div>
            <div class="col-4">
                <textarea rows="3" class="form-control" id="taCaracteristicas"></textarea>
            </div>
        </div>
    -->
        <div class="row divMargin" id="divEnlacesWeb">
            <div class="col-2">
                <label class="labelType01">Enlaces web</label>
            </div>
            <div class="col-4">
                <button class="btn btn-info" data-toggle='modal' data-target='#modalMostrarEnlaces' onclick="obtenerEnlacesWeb()">Ver Enlaces Web</button>
            </div>
        </div>
        <div class="row divMargin divBackgroundBlue2">
            <div class="col-12">
                Información de captura de la información
            </div>
            <div class="col-12" id="divInformacionCaptura">
                
            </div>
        </div>        
        <div class="row divMargin" id="divPendientes">
            <div class="col-12">
                <button class="btn btn-warning" data-toggle='modal' data-target='#modalMostrarPendientesBien' onclick="obtenerPendientesBien()">Pendientes</button>
            </div>
        </div>
        <div class="row divMargin divBackgroundBlue2">
            <div class="col-12">
                Imágenes del bien
            </div>
        </div>
        <div class="row divMargin" id="divImagenesBien">
            <div class="col-3">
                <button class="btn btn-info" data-toggle='modal' data-target='#modalMostrarAgregarImagen' onclick="obtenerImagenesLibro()">Agregar imagen</button>
            </div>
            <div class="col-3">
                <button class="btn btn-info" data-toggle='modal' data-target='#modalMostrarAgregarPdf' onclick="obtenerPdfsLibro()">Agregar Pdf</button>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-12">
                                
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-3">
                <button class="btn btn-primary" onclick="guardarFichaLibro()">Guardar</button>
            </div>
            <div class="col-3">
                <button class="btn btn-primary" onclick="limpiarCamposFichaLibro()">Limpiar campos</button>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar un nuevo autor-->
    <div class="modal fade" id="modalAgregarAutor" tabindex="-1" role="dialog" aria-labelledby="modalAgregarAutor" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nuevo autor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoAutor"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoAutor()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar un nuevo idioma-->
    <div class="modal fade" id="modalAgregarIdioma" tabindex="-1" role="dialog" aria-labelledby="modalAgregarIdioma" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nuevo idioma</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoIdioma"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoIdioma()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar un nuevo genero literario-->
    <div class="modal fade" id="modalAgregarGeneroLiterario" tabindex="-1" role="dialog" aria-labelledby="modalAgregarGeneroLiterario" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nuevo género literario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoGeneroLiterario"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoGeneroLiterario()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--Ventana modal para agregar un nuevo tema-->
    <div class="modal fade" id="modalAgregarTema" tabindex="-1" role="dialog" aria-labelledby="modalAgregarTema" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nuevo tema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoTema"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoTema()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar un nuevo tipo de encuadernación-->
    <div class="modal fade" id="modalAgregarTipoEncuadernacion" tabindex="-1" role="dialog" aria-labelledby="modalAgregarTipoEncuadernacion" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nuevo tipo de encuadernación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoTipoEncuadernacion"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoTipoEncuadernacion()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar una nueva técnica de impresión-->
    <div class="modal fade" id="modalAgregarTecnicaImpresion" tabindex="-1" role="dialog" aria-labelledby="modalAgregarTecnicaImpresion" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nueva técnica de impresión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevaTecnicaImpresion"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevaTecnicaImpresion()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar un nuevo tipo de papel-->
    <div class="modal fade" id="modalAgregarTipoPapel" tabindex="-1" role="dialog" aria-labelledby="modalAgregarTipoPapel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nuevo tipo de papel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoTipoPapel"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoTipoPapel()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para pendientes del bien-->
    <div class="modal fade" id="modalMostrarPendientesBien" tabindex="-1" role="dialog" aria-labelledby="modalMostrarPendientesBien" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pendientes de la captura del bien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin">
                        <div class="col-12">
                            <label class="labelType01">Pendiente</label>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" rows="4" id="tbPendienteBien"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="labelType01">Resolución</label>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" rows="4" id="tbPendienteBienResolucion"></textarea>
                        </div>
                        <div class="col-2">
                            <label class="labelType01">Estado</label>
                        </div>
                        <div class="col-2">
                            <label id="lblPendienteBienEstado"></label>
                        </div>
                        <div class="col-2">
                            <label class="labelType01">Fecha inicio</label>
                        </div>
                        <div class="col-2">
                            <label id="lblPendienteBienFechaInicio"></label>
                        </div>
                        <div class="col-2">
                            <label class="labelType01">Fecha fin</label>
                        </div>
                        <div class="col-2">
                            <label id="lblPendienteBienFechaFin"></label>
                        </div>
                    </div>
                    <div class="row divMargin">
                        <div class="col-3">
                            <button type="button" class="btn btn-success" onclick="guardarPendienteBien('ACTIVO')">Guardar</button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-danger" onclick="guardarPendienteBien('FINALIZADO')">Finalizar</button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-success" onclick="limpiarCamposPendienteBien()">Limpiar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" id="divListaPendientesBien">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposPendienteBien()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para mostrar los enlaces web-->
    <div class="modal fade" id="modalMostrarEnlaces" tabindex="-1" role="dialog" aria-labelledby="modalMostrarEnlaces" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Enlaces Web</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin">
                        <div class="col-12">
                            <label class="labelType01">Enlace Web</label>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbEnlaceWeb"></input>
                        </div>
                        <div class="col-12">
                            <label class="labelType01">Notas</label>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" rows="4" id="tbNotasEnlaceWeb"></textarea>
                        </div>
                    </div>
                    <div class="row divMargin">
                        <div class="col-3">
                            <button type="button" class="btn btn-success" onclick="guardarEnlaceWeb()">Guardar</button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-success" onclick="limpiarCamposEnlaceWeb()">Limpiar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" id="divListaEnlacesWeb">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposEnlaceWeb()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para mostrar las imagenes del bien-->
    <div class="modal fade" id="modalMostrarAgregarImagen" tabindex="-1" role="dialog" aria-labelledby="modalMostrarAgregarImagen" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Imagenes del bien cultural</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="fSubirImagen" action="" method="post" enctype="multipart/form-data">
                        <div class="row divMargin">
                            <div class="col-12">
                                <input type='file' name="imgInp" id="imgInp" />
                            </div>
                            <div class="col-12">
                                <img id="imgImagen" src="#" alt="Imágen" class="imgPreview" />
                            </div>
                            <div class="col-12">
                                <h4 id='loading' ></h4>
                            </div>
                        </div>                    
                        <div class="row divMargin">
                            <div class="col-2">
                                <label class="labelType01">Persona que tomó fotografia del bien</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control textbox-center" id="tbTomaPersona"></input>
                            </div>
                            <div class="col-2">
                                <label class="labelType01">Fecha de la toma</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control textbox-center" id="tbTomaFecha" placeholder="dd/mm/aaaa"></input>
                            </div>
                        </div>
                        <div class="row divMargin">
                            <div class="col-2">
                                <label class="labelType01">Aprobada para mostrar</label>
                            </div>
                            <div class="col-4">
                                <select id="selImagenAprobada">
                                    <option value="SI">SI</option>
                                    <option value="NO" selected>NO</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <label class="labelType01">Persona que editó la fotografía</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control textbox-center" id="tbPersonaEdita"></input>
                            </div>
                        </div>
                        <div class="row divMargin">
                            <div class="col-3">
                                <button type="button" class="btn btn-success" onclick="guardarImagenBien()">Guardar</button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-success" onclick="limpiarCamposAgregarImagen()">Limpiar</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12" id="divListaImagenesBien">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposAgregarImagen()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para mostrar los Pdfs del bien-->
    <div class="modal fade" id="modalMostrarAgregarPdf" tabindex="-1" role="dialog" aria-labelledby="modalMostrarAgregarPdf" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pdfs del bien cultural</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="fSubirImagen" action="" method="post" enctype="multipart/form-data">
                        <div class="row divMargin">
                            <div class="col-12">
                                <input type='file' name="pdfInp" id="pdfInp" />
                            </div>
                        </div>
                        <div class="row divMargin">
                            <div class="col-2">
                                <label class="labelType01">Aprobado para mostrar</label>
                            </div>
                            <div class="col-4">
                                <select id="selPdfAprobado">
                                    <option value="SI">SI</option>
                                    <option value="NO" selected>NO</option>
                                </select>
                            </div>
                        </div>
                        <div class="row divMargin">
                            <div class="col-3">
                                <button type="button" class="btn btn-success" onclick="guardarPdfBien()">Guardar</button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-success" onclick="limpiarCamposAgregarPdf()">Limpiar</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12" id="divListaPdfSBien">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposAgregarPdf()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $( document ).ready(function() {
        $(function() {     
            $("#tbInstitucion").autocomplete({
                source: "php/obtenerInstitucionesJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    elegirInstitucionBien(ui.item.id);
                }
            });
        });
        $(function() {     
            $("#tbAutor").autocomplete({
                source: "php/obtenerAutoresJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    agregarAutor(ui.item.id, ui.item.value);
                    this.value = '';
                    return false;
                }
            });
        });
        $(function() {     
            $("#tbIlustrador").autocomplete({
                source: "php/obtenerAutoresJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    agregarIlustrador(ui.item.id, ui.item.value);
                    this.value = '';
                    return false;
                }
            });
        });
        $(function() {     
            $("#tbEstudio").autocomplete({
                source: "php/obtenerEstudiosJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    elegirEstudio(ui.item.id);
                }
            });
        });
        $(function() {     
            $("#tbAlbum").autocomplete({
                source: 
                function(request, response) {
                $.getJSON(
                    "php/obtenerAlbumesJSON.php",
                    { term: request.term, tipoFicha: "Publicacion" },
                    response
                );},
                minLength: 2,
                select: function(event, ui) {
                    elegirAlbum(ui.item.id);
                }
            });
        });
        $(function() {     
            $("#tbNuevoAlbumInstitucion").autocomplete({
                source: "php/obtenerInstitucionesJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    fp_InstitucionElegidaNuevoAlbum = ui.item.id;
                }
            });
        });
        $(function() {     
            $("#tbTema").autocomplete({
                source: "php/obtenerTemasJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    agregarTema(ui.item.id, ui.item.value);
                    this.value = '';
                    return false;
                }
            });
        });
        $(function() {     
            $("#tbTipoEncuadernacion").autocomplete({
                source: "php/obtenerTiposEncuadernacionJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    agregarTipoEncuadernacion(ui.item.id, ui.item.value);
                    this.value = '';
                    return false;
                }
            });
        });
        $(function() {     
            $("#tbTecnicaImpresion").autocomplete({
                source: "php/obtenerTecnicasImpresionJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    agregarTecnicaImpresion(ui.item.id, ui.item.value);
                    this.value = '';
                    return false;
                }
            });
        });
        $(function() {     
            $("#tbTipoPapel").autocomplete({
                source: "php/obtenerTiposPapelJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    agregarTipoPapel(ui.item.id, ui.item.value);
                    this.value = '';
                    return false;
                }
            });
        });
        $(function() {     
            $("#tbTomaPersona").autocomplete({
                source: "php/obtenerUsuariosJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    elegirPersonaToma(ui.item.id);
                }
            });
        });
        $(function() {     
            $("#tbBuscar").autocomplete({
                source: "php/obtenerFichasLibroJSON.php",
                minLength: 1,
                select: function(event, ui) {
                    elegirFichaLibro(ui.item.id);
                }
            });
        });
        obtenerUltimasFichasLibro();
        obtenerIdiomasSelect();
        obtenerTemas();
        obtenerGenerosLiterariosSelect();
        $("#divEnlacesWeb").css("visibility", "hidden");
        $("#divImagenesBien").css("visibility", "hidden");
        $("#divPendientes").css("visibility", "hidden");
        limpiarCamposFichaLibro();
    });
    
    $('#modalAgregarIdioma').on('shown.bs.modal', function() {
        $('#tbNuevoIdioma').focus();
    });
    $('#modalAgregarAutor').on('shown.bs.modal', function() {
        $('#tbNuevoAutor').focus();
    });
    $('#modalAgregarGeneroLiterario').on('shown.bs.modal', function() {
        $('#tbNuevoGeneroLiterario').focus();
    });
    $('#modalAgregarTema').on('shown.bs.modal', function() {
        $('#tbNuevoTema').focus();
    });
    $('#modalAgregarTipoEncuadernacion').on('shown.bs.modal', function() {
        $('#tbNuevoTipoEncuadernacion').focus();
    });
    $('#modalAgregarTecnicaImpresion').on('shown.bs.modal', function() {
        $('#tbNuevaTecnicaImpresion').focus();
    });
    $('#modalAgregarTipoPapel').on('shown.bs.modal', function() {
        $('#tbNuevoTipoPapel').focus();
    });
    $('#modalMostrarPendientesBien').on('shown.bs.modal', function() {
        $('#tbPendienteBien').focus();
    });

    $("#imgInp").change(function(){
        readURL(this);
    });
    
</script>
</html>