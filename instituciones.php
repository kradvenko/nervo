<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/nervo.css" />
    <link rel="stylesheet" type="text/css" href="css/controls.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/nervo.js"></script>
    <script src="js/instituciones.js"></script>

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
                Control de instituciones
            </div>
        </div>
        <div class="row" style="margin-bottom: 5px;">
            <div class="col-3 divBackgroundBlue2">                
                Lista de instituciones
            </div>
            <div class="col-9 divBackgroundBlue2">            
                Información de la institución
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="row" id="divListaInstituciones">
                    
                </div>
            </div>
            <div class="col-9">
                <div class="row divMargin">
                    <div class="col-4">
                        <label class="labelType01">Nombre de la institución o particular</label>
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="tbNombreInstitucion"></input>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-4">
                        <label class="labelType01">Categorías de la institución</label>
                    </div>
                    <div class="col-8" id="divCategoriasInstitucion">
                        
                    </div>
                </div>                
                <div class="row divMargin">
                    <div class="col-4">
                        <label class="labelType01">Agregar categoría</label>
                    </div>
                    <div class="col-5" id="divListaCategoriasInstitucion">
                        
                    </div>
                    <div class="col-1">
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarCategoria'>+</button>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary" onclick="agregarCategoria()">Agregar</button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-2">
                        <label class="labelType01">Sector de la institución</label>
                    </div>
                    <div class="col-4">
                        <select class="form-control" id="selectSectorInstitucion">
                            <option value="Publica">Pública</option>
                            <option value="Privada">Privada</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <label class="labelType01">Tipo de institución</label>
                    </div>
                    <div class="col-4">
                        <select class="form-control" id="selectTipoInstitucion">
                            <option value="Nacional">Nacional</option>
                            <option value="Estatal">Estatal</option>
                            <option value="Municipal">Municipal</option>
                            <option value="No gubernamental">No gubernamental</option>
                        </select>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-2">
                        <label class="labelType01">Sitio Web</label>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-info" data-toggle='modal' data-target='#modalMostrarSitios' onclick="obtenerSitiosWeb()">Ver Sitios Web</button>
                    </div>
                    <!--
                    <div class="col-4">
                        <input type="text" class="form-control" id="tbSitioWeb"></input>
                        <input type="button" class="button-green" onclick="irSitioWeb('tbSitioWeb')"></input>
                    </div>
                    -->
                    <div class="col-2">
                        <label class="labelType01">Correo electrónico</label>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-info" data-toggle='modal' data-target='#modalMostrarCorreos' onclick="obtenerCorreos()">Ver Correos</button>
                    </div>
                    <!--<div class="col-4">
                        <input type="text" class="form-control" id="tbCorreoElectronico"></input>
                    </div>-->
                </div>
                <div class="row divMargin">
                    <div class="col-2">
                        <label class="labelType01">Teléfonos</label>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-info" data-toggle='modal' data-target='#modalMostrarTelefonos' onclick="obtenerTelefonos()">Ver Teléfonos</button>
                    </div>
                    <!--
                    <div class="col-4">
                        <input type="text" class="form-control" id="tbTelefonosInstitucion"></input>
                    </div>
                    -->
                    <div class="col-2">
                        <label class="labelType01">Áreas de interés</label>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-info" data-toggle='modal' data-target='#modalMostrarAreas' onclick="obtenerAreas()">Ver Áreas de interés</button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-12">
                        <button class="btn btn-warning" data-toggle='modal' data-target='#modalMostrarPendientesInstitucion' onclick="obtenerPendientesInstitucion()">Pendientes</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 divBackgroundBlue2 divMargin">
                        Información de localización
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-4">
                        <label class="labelType01">Domicilio</label>    
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" id="tbDomicilioInstitucion"></input>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-2">
                        <label class="labelType01">Colonia</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="tbColoniaInstitucion"></input>
                    </div>
                    <div class="col-2">
                        <label class="labelType01">Código Postal</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="tbCodigoPostalInstitucion"></input>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-2">
                        <label class="labelType01">País</label> 
                    </div>
                    <div class="col-4" id="divPaisSelect">
                        
                    </div>
                    <div class="col-2">
                        <label class="labelType01">Región</label>
                    </div>
                    <div class="col-4" id="divRegionSelect">
                        
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-2">
                        <label class="labelType01">Ciudad</label>
                    </div>
                    <div class="col-4" id="divCiudadSelect">
                        
                    </div>                    
                </div>
                <div class="row divMargin">
                    <div class="col-4">
                        
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn btn-primary" onclick="limpiarCamposInstitucion()">Limpiar Campos</button>
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn btn-primary" onclick="guardarInstitucion()">Guardar Institución</button>
                    </div>
                </div>
                <div id="divContactos">
                    <div class="row divMargin">
                        <div class="col-12 divBackgroundBlue2">
                            Información de contacto
                        </div>
                    </div>
                    <div class="row divMargin">
                        <div class="col-4 divBackgroundBlue3">
                            Lista de contactos
                        </div>
                        <div class="col-8 divBackgroundBlue3">
                            Información del contacto
                        </div>
                    </div>
                    <div class="row divMargin">
                        <div class="col-4">
                            <div class="row" id="divListaContactos">
                    
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="row divMargin">
                                <div class="col-4">
                                    <label class="labelType01">Nombre del contacto</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="tbNombreContacto"></input>
                                </div>
                            </div>
                            <div class="row divMargin">
                                <div class="col-4">
                                    <label class="labelType01">Área del contacto</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="tbAreaContacto"></input>
                                </div>
                            </div>
                            <div class="row divMargin">
                                <div class="col-4">
                                    <label class="labelType01">Cargo del contacto</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="tbCargoContacto"></input>
                                </div>
                            </div>
                            <div class="row divMargin">
                                <div class="col-4">
                                    <label class="labelType01">Teléfonos</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="tbTelefonosContacto"></input>
                                </div>
                            </div>
                            <div class="row divMargin">
                                <div class="col-4">
                                    <label class="labelType01">Extensión</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="tbExtensionContacto"></input>
                                </div>
                            </div>
                            <div class="row divMargin">
                                <div class="col-4">
                                    <label class="labelType01">Correo electrónico</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="tbCorreoElectronicoContacto"></input>
                                </div>
                            </div>
                            <div class="row divMargin">
                                <div class="col-4">
                                    <label class="labelType01">Notas</label>
                                </div>
                                <div class="col-8">
                                    <textarea class="form-control" rows="5" id="tbNotasContacto"></textarea>
                                </div>
                            </div>
                            <div class="row divMargin">
                                <div class="col-4">
                                    <button type="button" class="btn btn-primary" onclick="limpiarCamposContacto()">Limpiar Campos</button>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-primary" onclick="guardarContacto()">Guardar Contacto</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar una nueva categoría de institución-->
    <div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="modalAgregarCategoria" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nueva categoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevaCategoria"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarCategoriaInstitucion()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para mostrar los sitios web-->
    <div class="modal fade" id="modalMostrarSitios" tabindex="-1" role="dialog" aria-labelledby="modalMostrarSitios" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sitios Web</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin">
                        <div class="col-12">
                            <label class="labelType01">Sitio Web</label>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbSitioWeb"></input>
                        </div>
                        <div class="col-12">
                            <label class="labelType01">Notas</label>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" rows="4" id="tbNotasSitioWeb"></textarea>
                        </div>
                    </div>
                    <div class="row divMargin">
                        <div class="col-3">
                            <button type="button" class="btn btn-success" onclick="guardarSitioWeb()">Guardar</button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-success" onclick="limpiarCamposSitioWeb()">Limpiar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" id="divListaSitiosWeb">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposSitioWeb()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para mostrar los correos-->
    <div class="modal fade" id="modalMostrarCorreos" tabindex="-1" role="dialog" aria-labelledby="modalMostrarCorreos" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Correos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin">
                        <div class="col-12">
                            <label class="labelType01">Correo</label>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbCorreoElectronico"></input>
                        </div>
                        <div class="col-12">
                            <label class="labelType01">Notas</label>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" rows="4" id="tbNotasCorreoElectronico"></textarea>
                        </div>
                    </div>
                    <div class="row divMargin">
                        <div class="col-3">
                            <button type="button" class="btn btn-success" onclick="guardarCorreo()">Guardar</button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-success" onclick="limpiarCamposCorreo()">Limpiar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" id="divListaCorreos">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposCorreo()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para mostrar los teléfonos-->
    <div class="modal fade" id="modalMostrarTelefonos" tabindex="-1" role="dialog" aria-labelledby="modalMostrarTelefonos" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Teléfonos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin">
                        <div class="col-12">
                            <label class="labelType01">Teléfono</label>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbTelefono"></input>
                        </div>
                        <div class="col-12">
                            <label class="labelType01">Extensión</label>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbTelefonoExtension"></input>
                        </div>
                        <div class="col-12">
                            <label class="labelType01">Notas</label>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" rows="4" id="tbTelefonoNotas"></textarea>
                        </div>
                    </div>
                    <div class="row divMargin">
                        <div class="col-3">
                            <button type="button" class="btn btn-success" onclick="guardarTelefono()">Guardar</button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-success" onclick="limpiarCamposTelefono()">Limpiar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" id="divListaTelefonos">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposTelefono()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para mostrar las áreas de interes-->
    <div class="modal fade" id="modalMostrarAreas" tabindex="-1" role="dialog" aria-labelledby="modalMostrarAreas" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Áreas de interés</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin">
                        <div class="col-12">
                            <label class="labelType01">Área</label>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbArea"></input>
                        </div>
                        <div class="col-12">
                            <label class="labelType01">Notas</label>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" rows="4" id="tbAreaNotas"></textarea>
                        </div>
                    </div>
                    <div class="row divMargin">
                        <div class="col-3">
                            <button type="button" class="btn btn-success" onclick="guardarArea()">Guardar</button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-success" onclick="limpiarCamposArea()">Limpiar</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" id="divListaAreas">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposArea()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para mostrar los pendientes de la institución-->
    <div class="modal fade" id="modalMostrarPendientesInstitucion" tabindex="-1" role="dialog" aria-labelledby="modalMostrarPendientesInstitucion" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Áreas de interés</h5>
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
        checkSession();
        $("#divContactos").css("visibility", "hidden");
        obtenerCategoriasInstitucionSelect();
        obtenerPaisesSelectInstitucion();
        obtenerInstituciones();
        limpiarCamposInstitucion();        
    });
    $('#modalMostrarSitios').on('shown.bs.modal', function() {
        $('#tbSitioWeb').focus();
    });
    $('#modalMostrarCorreos').on('shown.bs.modal', function() {
        $('#tbCorreoElectronico').focus();
    });
    $('#modalMostrarTelefonos').on('shown.bs.modal', function() {
        $('#tbTelefono').focus();
    });
    $('#modalMostrarAreas').on('shown.bs.modal', function() {
        $('#tbArea').focus();
    });
    $('#modalMostrarPendientesInstitucion').on('shown.bs.modal', function() {
        $('#tbPendienteInstitucion').focus();
    });
</script>
</html>