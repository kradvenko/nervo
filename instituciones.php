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
                <div class="row divBackgroundBlue2" id="divListaInstituciones">
                    
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
                    <div class="col-6" id="divListaCategoriasInstitucion">
                        <select class="form-control">
                            <option>Casas-Museos</option>
                            <option>Bibliotecas</option>
                            <option>Archivos</option>
                            <option>Colección privada</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary">Agregar</button>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-2">
                        <label class="labelType01">Sitio Web</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id=""></input>
                    </div>
                    <div class="col-2">
                        <label class="labelType01">Correo electrónico</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id=""></input>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-2">
                        <label class="labelType01">Teléfonos</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id=""></input>
                    </div>
                    <div class="col-2">
                        <label class="labelType01">Extensión</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id=""></input>
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
                        <input type="text" class="form-control" id=""></input>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-2">
                        <label class="labelType01">Colonia</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id=""></input>
                    </div>
                    <div class="col-2">
                        <label class="labelType01">Código Postal</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id=""></input>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-2">
                        <label class="labelType01">País</label> 
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id=""></input>
                    </div>
                    <div class="col-2">
                        <label class="labelType01">Región</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id=""></input>
                    </div>
                </div>
                <div class="row divMargin">
                    <div class="col-2">
                        <label class="labelType01">Ciudad</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id=""></input>
                    </div>                    
                </div>
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
                            
                        </div>
                        <div class="col-8">
                            <div class="row divMargin">
                                <div class="col-4">
                                    <label class="labelType01">Nombre del contacto</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" id=""></input>
                                </div>
                            </div>
                            <div class="row divMargin">
                                <div class="col-4">
                                    <label class="labelType01">Área del contacto</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" id=""></input>
                                </div>
                            </div>
                            <div class="row divMargin">
                                <div class="col-4">
                                    <label class="labelType01">Teléfonos</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" id=""></input>
                                </div>
                            </div>
                            <div class="row divMargin">
                                <div class="col-4">
                                    <label class="labelType01">Extensión</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" id=""></input>
                                </div>
                            </div>
                            <div class="row divMargin">
                                <div class="col-4">
                                    <label class="labelType01">Correo electrónico</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" id=""></input>
                                </div>
                            </div>
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
</body>
<script>
    $( document ).ready(function() {
        
    });
    
</script>
</html>