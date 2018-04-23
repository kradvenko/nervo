<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/nervo.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/nervo.js"></script>

    <title>Acervo artístico de Amado Nervo</title>
</head>
<body>
    <div class="container">
        <div class="row divBackgroundBlack">
            <div class="divLogo">

            </div>
        </div>
        <div class="row mainMenu">
            <ul class="nav">
                <li><a href="menu.php" class="mainMenuElement">Menú principal</a></li>
                <li><a href="localidades.php" class="mainMenuElement">Control de localidades</a></li>
                <li><a href="instituciones.php" class="mainMenuElement">Control de instituciones</a></li>
            </ul>
        </div>
        <div class="row divMargin divBackgroundBlue">
            <div class="col-12">
                Control de localidades
            </div>
        </div>
        <div class="row divMargin divBackgroundBlue">
            <div class="col-4">
                Paises
            </div>
            <div class="col-4">
                Regiones
            </div>
            <div class="col-4">
                Ciudades
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="row divMargin">
                    <div class="col-6">
                        <input type="text" class="form-control" id="tbPais"/>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary" onclick="agregarPais()">Agregar</button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12 divBackgroundBlue2">
                        Lista de paises
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12" id="divListaPaises">

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row divMargin">
                    <div class="col-6">
                        Elija un páis
                    </div>
                    <div class="col-6" id="divSelectPaisesRegiones">
                        No ha ingresado paises.                    
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-6">
                        Tipo de región
                    </div>
                    <div class="col-4" id="divSelectTiposRegiones">
                        No ha ingresado tipos de regiones.
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary" data-toggle='modal' data-target='#modalNuevaRegion'>+</button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-6">
                        <input type="text" class="form-control" id="tbNuevaRegion"/>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary" onclick="agregarRegion()">Agregar</button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12 divBackgroundBlue2">
                        Lista de Regiones
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12" id="divListaRegiones">

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row divMargin">
                    <div class="col-6">
                        Elija un páis
                    </div>
                    <div class="col-6" id="divSelectPaisesCiudades">
                                         
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-6">
                        Elija una región
                    </div>
                    <div class="col-6" id="divSelectRegionesCiudades">
                        
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-6">
                        <input type="text" class="form-control" id="tbNuevaCiudad"/>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary" onclick="agregarCiudad()">Agregar</button>
                    </div>
                </div>
                <div class="row divMargin divBackgroundBlue2">
                    <div class="col-12">
                        Lista de ciudades
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12" id="divListaCiudades">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para cambio en el nombre del páis-->
    <div class="modal fade" id="modalModificarPais" tabindex="-1" role="dialog" aria-labelledby="modalModificarPais" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modificar nombre del país</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12" id="divModalModificarPaisNombrePais">
                            
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoNombrePais"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="actualizarPais()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar un nuevo tipo de región-->
    <div class="modal fade" id="modalNuevaRegion" tabindex="-1" role="dialog" aria-labelledby="modalNuevaRegion" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo tipo de región</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevoTipoRegion"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarTipoRegion()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para modificar una región-->
    <div class="modal fade" id="modalModificarRegion" tabindex="-1" role="dialog" aria-labelledby="modalModificarRegion" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modificar región</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12" id="divModalModificarRegionNombreRegion">
                            
                        </div>
                        <div class="col-12">
                            <label>Nombre</label>
                        </div>
                        <div class="col-12">                            
                            <input type="text" class="form-control" id="tbNuevoNombreRegion"></input>
                        </div>
                        <div class="col-12">
                            <label>País</label>
                        </div>
                        <div class="col-12" id="divNuevoPaísRegion">
                            
                        </div>
                        <div class="col-12">
                            <label>Tipo de región</label>
                        </div>
                        <div class="col-12" id="divNuevoTipoRegion">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="actualizarRegion()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para modificar una ciudad-->
    <div class="modal fade" id="modalModificarCiudad" tabindex="-1" role="dialog" aria-labelledby="modalModificarCiudad" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modificar ciudad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12" id="divModalModificarCiudadNombreRegion">
                            
                        </div>
                        <div class="col-12">
                            <label>Nombre</label>
                        </div>
                        <div class="col-12">                            
                            <input type="text" class="form-control" id="tbNuevoNombreCiudad"></input>
                        </div>
                        <div class="col-12">
                            <label>País</label>
                        </div>
                        <div class="col-12" id="divNuevoPaísCiudad">
                            
                        </div>
                        <div class="col-12">
                            <label>Región</label>
                        </div>
                        <div class="col-12" id="divNuevaRegionCiudad">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="actualizarCiudad()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $( document ).ready(function() {
        obtenerPaises();
        obtenerPaisesSelect();
        obtenerTiposRegionesSelect();
        obtenerRegiones();
        obtenerRegionesSelect();
        obtenerCiudades();
    });
    $('#modalModificarPais').on('shown.bs.modal', function() {
        $('#tbNuevoNombrePais').focus();
    });
    $('#modalNuevaRegion').on('shown.bs.modal', function() {
        $('#tbNuevoTipoRegion').focus();
    });
</script>
</html>