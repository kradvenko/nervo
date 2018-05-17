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
    <script src="js/nervo.js"></script>
    <script src="js/jquery-ui.min.js"></script>

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
            <div class="col-3">
                <label class="labelType01">Número de registro interno</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control"></input>
            </div>
            <div class="col-3">
                <label class="labelType01">Número de inventario</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-3">
                <label class="labelType01">Título</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control"></input>
            </div>
            <div class="col-3">
                <label class="labelType01">Título serie</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-3">
                <label class="labelType01">Lugar asunto</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" id="tbLugarAsunto"></input>
            </div>
            <div class="col-3">
                <label class="labelType01">Lugar toma</label>
            </div>
            <div class="col-3">
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
                <input type="text" class="form-control" placeholder="dd/mm/aaaa"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-3">
                <label class="labelType01">Autor</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control"></input>
            </div>
            <div class="col-3">
                <label class="labelType01">Estudio fotográfico</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-3">
                <label class="labelType01">Número y/o título albúm</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control"></input>
            </div>
            <div class="col-3">
                <label class="labelType01">Fondo</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-3">
                <label class="labelType01">Colección</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control"></input>
            </div>
            <div class="col-3">
                <label class="labelType01">Clave técnica</label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control"></input>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-3">
                <label class="labelType01">Tema</label>
            </div>
            <div class="col-3">
                <textarea rows="3" class="form-control"></textarea>
            </div>
            <div class="col-3">
                <label class="labelType01">Anotaciones</label>
            </div>
            <div class="col-3">
                <textarea rows="3" class="form-control"></textarea>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-3">
                <label class="labelType01">Institución</label>
            </div>
            <div class="col-9">
                <input type="text" class="form-control"></input>
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
                    //log("Selected: " + ui.item.value + " aka " + ui.item.id);
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
    });    
</script>
</html>