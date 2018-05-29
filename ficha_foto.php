<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.min.css" />
    <link rel="stylesheet" type="text/css" href="css/nervo.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/nervo.js"></script>
    <script src="js/ficha-fotografia.js"></script>
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
                Ficha - Fotografía
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
                <label class="labelType01">Título</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbTitulo"></input>
            </div>
            <div class="col-2">
                <label class="labelType01">Título serie</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbTituloSerie"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Lugar asunto</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbLugarAsunto"></input>
            </div>
            <div class="col-2">
                <label class="labelType01">Lugar toma</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbLugarToma"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-3">
                <label class="labelType01">Fecha asunto</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control textbox-center" id="tbFechaAsunto" placeholder="dd/mm/aaaa"></input>
            </div>
            <div class="col-3">
                <label class="labelType01">Fecha toma</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control textbox-center" id="tbFechaToma" placeholder="dd/mm/aaaa"></input>
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
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarAutor'>+</button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12" id="divAutores">
                        
                    </div>
                </div>
            </div>
            <div class="col-2">
                <label class="labelType01">Estudio fotográfico</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control textbox-center" id="tbEstudio"></input>
            </div>
            <div class="col-1">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarEstudio'>+</button>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Albúm</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control textbox-center" id="tbAlbum"></input>
            </div>
            <div class="col-1">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarAlbum'>+</button>
            </div>
            <div class="col-2">
                <label class="labelType01">Número de fotografía</label>
            </div>
            <div class="col-1">
                <input type="text" class="form-control textbox-center" id="tbNumeroFotografia"></input>
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
                <label class="labelType01">Clave técnica</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control textbox-center" id="tbClaveTecnica"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Temas</label>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-7">
                        <input type="text" class="form-control textbox-center" id="tbTema"></input>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarTema'>+</button>
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
                <textarea rows="3" class="form-control"></textarea>
            </div>
        </div>
        <div class="row divMargin divBackgroundBlue2">
            <div class="col-12">
                Caraterísticas físicas del bien
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Técnica o proceso fotográfico</label>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-7">
                        <input type="text" class="form-control textbox-center" id="tbTecnica"></input>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarTecnica'>+</button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12" id="divTecnicas">
                        
                    </div>
                </div>
            </div>
            <div class="col-2">
                <label class="labelType01">Soportes flexibles</label>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-7">
                        <input type="text" class="form-control textbox-center" id="tbSoporteFlexible"></input>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarSoporteFlexible'>+</button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12" id="divSoportesFlexibles">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Soportes rígidos</label>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-7">
                        <input type="text" class="form-control textbox-center" id="tbSoporteRigido"></input>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarSoporteRigido'>+</button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12" id="divSoportesRigidos">
                        
                    </div>
                </div>
            </div>
            <div class="col-2">
                <label class="labelType01">Genero</label>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-7">
                        <input type="text" class="form-control textbox-center" id="tbGenero"></input>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarGenero'>+</button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12" id="divGeneros">
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Estado de Conservación</label>
            </div>
            <div class="col-4">
                <select class="form-control">
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Malo">Malo</option>                        
                </select>
            </div>
            <div class="col-2">
                <label class="labelType01">Estado de Integridad</label>
            </div>
            <div class="col-4">
                <select class="form-control">
                    <option value="Completo">Completo</option>
                    <option value="Imcompleto">Imcompleto</option>
                </select>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <input type="checkbox" value="Agrietamiento" id="cbAgrietamiento"> <label for="cbAgrietamiento" class="labelType01">Agrietamiento</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Ataque biológico" id="cbAtaque"> <label for="cbAtaque" class="labelType01">Ataque biológico</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Burbujas" id="cbBurbujas"> <label for="cbBurbujas" class="labelType01">Burbujas</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Cambios de Color" id="cbCambios"> <label for="cbCambios" class="labelType01">Cambios de Color</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Craqueladuras" id="cbCraqueladuras"> <label for="cbCraqueladuras" class="labelType01">Craqueladuras</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Cintas adhesivas" id="cbCintas"> <label for="cbCintas" class="labelType01">Cintas adhesivas</label>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <input type="checkbox" value="Deformaciones" id="cbDeformaciones"> <label for="cbDeformaciones" class="labelType01">Deformaciones</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Desprendimientos" id="cbDesprendimientos"> <label for="cbDesprendimientos" class="labelType01">Desprendimientos</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Desvanecimento por luz" id="cbDesvanecimiento"> <label for="cbDesvanecimiento" class="labelType01">Desvan. por luz</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Huellas digitales" id="cbHuellas"> <label for="cbHuellas" class="labelType01">Huellas digitales</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Hongos" id="cbHongos"> <label for="cbHongos" class="labelType01">Hongos</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Manchas" id="cbManchas"> <label for="cbManchas" class="labelType01">Manchas</label>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <input type="checkbox" value="Raspaduras" id="cbRaspaduras"> <label for="cbRaspaduras" class="labelType01">Raspaduras</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Ralladuras" id="cbRalladuras"> <label for="cbRalladuras" class="labelType01">Ralladuras</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Retocado" id="cbRetocado"> <label for="cbRetocado" class="labelType01">Retocado</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Roturas" id="cbRoturas"> <label for="cbRoturas" class="labelType01">Roturas</label>
            </div>
            <div class="col-2">
                <input type="checkbox" value="Sellos o inscripciones por tinta" id="cbSellos"> <label for="cbSellos" class="labelType01">Sellos o tinta</label>
            </div>            
            <div class="col-2">
                <input type="checkbox" value="Sulfuración" id="cbSulfuracion"> <label for="cbSulfuracion" class="labelType01">Sulfuración</label>
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
                <label class="labelType01">Diámetro:</label>
            </div>
            <div class="col-2">
                <input type="text" class="form-control textbox-center" id="tbDiametro"></input>
            </div> 
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Inspecciones o marcas</label>
            </div>
            <div class="col-4">
                <textarea rows="3" class="form-control"></textarea>
            </div>
            <div class="col-2">
                <label class="labelType01">Características o señas particulares</label>
            </div>
            <div class="col-4">
                <textarea rows="3" class="form-control"></textarea>
            </div>
        </div>
        <div class="row divMargin divBackgroundBlue2">
            <div class="col-12">
                Información de captura de la información
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
            <div class="col-12">
                <button class="btn btn-warning" data-toggle='modal' data-target='#modalMostrarPendientesBien' onclick="obtenerPendientesBien()">Pendientes</button>
            </div>
        </div>
        <div class="row divMargin divBackgroundBlue2">
            <div class="col-12">
                Información de captura de la información
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
    <!--Ventana modal para agregar un nuevo estudio fotográfico-->
    <div class="modal fade" id="modalAgregarEstudio" tabindex="-1" role="dialog" aria-labelledby="modalAgregarEstudio" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nuevo estudio fotográfico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoEstudio"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoEstudio()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar un nuevo albúm-->
    <div class="modal fade" id="modalAgregarAlbum" tabindex="-1" role="dialog" aria-labelledby="modalAgregarAlbum" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nuevo albúm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label>Nombre del albúm</label>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoAlbumNombre"></input>
                        </div>
                        <div class="col-12">
                            <label>Institución</label>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoAlbumInstitucion"></input>
                        </div>
                        <div class="col-12">
                            <label>Descripción</label>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoAlbumDescripcion"></input>
                        </div>
                        <div class="col-12">
                            <label>Número de fotografías</label>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoAlbumFotografias"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoAlbum()">Guardar cambios</button>
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
    <!--Ventana modal para agregar una nueva técnica-->
    <div class="modal fade" id="modalAgregarTecnica" tabindex="-1" role="dialog" aria-labelledby="modalAgregarTecnica" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nueva técnica</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevaTecnica"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevaTecnica()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar un nuevo soporte flexible-->
    <div class="modal fade" id="modalAgregarSoporteFlexible" tabindex="-1" role="dialog" aria-labelledby="modalAgregarSoporteFlexible" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nuevo soporte flexible</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoSoporteFlexible"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoSoporteFlexible()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar un nuevo soporte rigido-->
    <div class="modal fade" id="modalAgregarSoporteRigido" tabindex="-1" role="dialog" aria-labelledby="modalAgregarSoporteRigido" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nuevo soporte flexible</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoSoporteRigido"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoSoporteRigido()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar un nuevo genero-->
    <div class="modal fade" id="modalAgregarGenero" tabindex="-1" role="dialog" aria-labelledby="modalAgregarGenero" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nuevo genero</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoGenero"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoGenero()">Guardar cambios</button>
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
                            <textarea class="form-control" rows="4" id="tbPendienteInstitucion"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="labelType01">Resolución</label>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" rows="4" id="tbPendienteInstitucionResolucion"></textarea>
                        </div>
                        <div class="col-2">
                            <label class="labelType01">Estado</label>
                        </div>
                        <div class="col-2">
                            <label id="lblPendienteInstitucionEstado"></label>
                        </div>
                        <div class="col-2">
                            <label class="labelType01">Fecha inicio</label>
                        </div>
                        <div class="col-2">
                            <label id="lblPendienteInstitucionFechaInicio"></label>
                        </div>
                        <div class="col-2">
                            <label class="labelType01">Fecha fin</label>
                        </div>
                        <div class="col-2">
                            <label id="lblPendienteInstitucionFechaFin"></label>
                        </div>
                    </div>
                    <div class="row divMargin">
                        <div class="col-3">
                            <button type="button" class="btn btn-success" onclick="guardarPendienteInstitucion('ACTIVO')">Guardar</button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-danger" onclick="guardarPendienteInstitucion('FINALIZADO')">Finalizar</button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-success" onclick="limpiarCamposPendienteInstitucion()">Limpiar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" id="divListaPendientesInstitucion">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposPendienteInstitucion()">Cerrar</button>
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
                    //alert(ui.item.id);
                }
            });
        });
        $(function() {     
            $("#tbLugarAsunto").autocomplete({
                source: "php/obtenerLugaresJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    //alert(ui.item.id);
                }
            });
        });
        $(function() {     
            $("#tbLugarToma").autocomplete({
                source: "php/obtenerLugaresJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    //log("Selected: " + ui.item.value + " aka " + ui.item.id);
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
            $("#tbEstudio").autocomplete({
                source: "php/obtenerEstudiosJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    //log("Selected: " + ui.item.value + " aka " + ui.item.id);
                }
            });
        });
        $(function() {     
            $("#tbAlbum").autocomplete({
                source: "php/obtenerAlbumesJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    //log("Selected: " + ui.item.value + " aka " + ui.item.id);
                }
            });
        });
        $(function() {     
            $("#tbNuevoAlbumInstitucion").autocomplete({
                source: "php/obtenerInstitucionesJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    //log("Selected: " + ui.item.value + " aka " + ui.item.id);
                    ff_InstitucionElegidaNuevoAlbum = ui.item.id;
                    alert(ff_InstitucionElegidaNuevoAlbum);
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
            $("#tbTecnica").autocomplete({
                source: "php/obtenerTecnicasJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    agregarTecnica(ui.item.id, ui.item.value);
                    this.value = '';
                    return false;
                }
            });
        });
        $(function() {     
            $("#tbSoporteFlexible").autocomplete({
                source: "php/obtenerSoportesFlexiblesJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    agregarSoporteFlexible(ui.item.id, ui.item.value);
                    this.value = '';
                    return false;
                }
            });
        });
        $(function() {     
            $("#tbSoporteRigido").autocomplete({
                source: "php/obtenerSoportesRigidosJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    agregarSoporteRigido(ui.item.id, ui.item.value);
                    this.value = '';
                    return false;
                }
            });
        });
        $(function() {     
            $("#tbGenero").autocomplete({
                source: "php/obtenerGenerosJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    agregarGenero(ui.item.id, ui.item.value);
                    this.value = '';
                    return false;
                }
            });
        });
    });

    $('#modalAgregarAutor').on('shown.bs.modal', function() {
        $('#tbNuevoAutor').focus();
    });
    $('#modalAgregarEstudio').on('shown.bs.modal', function() {
        $('#tbNuevoEstudio').focus();
    });
    $('#modalAgregarAlbum').on('shown.bs.modal', function() {
        $('#tbNuevoAlbumNombre').focus();
    });
    $('#modalAgregarTema').on('shown.bs.modal', function() {
        $('#tbNuevoTema').focus();
    });
    $('#modalAgregarTecnica').on('shown.bs.modal', function() {
        $('#tbNuevaTecnica').focus();
    });
    $('#modalAgregarSoporteFlexible').on('shown.bs.modal', function() {
        $('#tbNuevoSoporteFlexible').focus();
    });
    $('#modalAgregarSoporteRigido').on('shown.bs.modal', function() {
        $('#tbNuevoSoporteRigido').focus();
    });
    $('#modalAgregarGenero').on('shown.bs.modal', function() {
        $('#tbNuevoGenero').focus();
    });
    
</script>
</html>