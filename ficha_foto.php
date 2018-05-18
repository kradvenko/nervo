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
                <label class="labelType01">Número de registro interno</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" id="tbNumeroInterno"></input>
            </div>
            <div class="col-2">
                <label class="labelType01">Número de inventario</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" id="tbNumeroInventario"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Título</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" id="tbTitulo"></input>
            </div>
            <div class="col-2">
                <label class="labelType01">Título serie</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" id="tbTituloSerie"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Lugar asunto</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" id="tbLugarAsunto"></input>
            </div>
            <div class="col-2">
                <label class="labelType01">Lugar toma</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" id="tbLugarToma"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-3">
                <label class="labelType01">Fecha asunto</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" id="tbFechaAsunto" placeholder="dd/mm/aaaa"></input>
            </div>
            <div class="col-3">
                <label class="labelType01">Fecha toma</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" id="tbFechaToma" placeholder="dd/mm/aaaa"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Autor</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" id="tbAutor"></input>
            </div>
            <div class="col-1">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarAutor'>+</button>
            </div>
            <div class="col-2">
                <label class="labelType01">Estudio fotográfico</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" id="tbEstudio"></input>
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
                <input type="text" class="form-control" id="tbAlbum"></input>
            </div>
            <div class="col-1">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarAlbum'>+</button>
            </div>
            <div class="col-2">
                <label class="labelType01">Número de fotografía</label>
            </div>
            <div class="col-1">
                <input type="text" class="form-control" id="tbNumeroFotografia"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Colección</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" id="tbColeccion"></input>
            </div>
            <div class="col-2">
                <label class="labelType01">Clave técnica</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" id="tbClaveTecnica"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Temas</label>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-7">
                        <input type="text" class="form-control" id="tbTema"></input>
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
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Institución</label>
            </div>
            <div class="col-10">
                <input type="text" class="form-control"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                <label class="labelType01">Técnica o proceso fotográfico</label>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-7">
                        <input type="text" class="form-control" id="tbTecnica"></input>
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
                        <input type="text" class="form-control" id="tbSoporteFlexible"></input>
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
                        <input type="text" class="form-control" id="tbSoporteRigido"></input>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalSoporteRigido'>+</button>
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
                        <input type="text" class="form-control" id="tbGenero"></input>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalGenero'>+</button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12" id="divGeneros">
                        
                    </div>
                </div>
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
</body>
<script>
    $( document ).ready(function() {
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
                    //log("Selected: " + ui.item.value + " aka " + ui.item.id);
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
    
</script>
</html>