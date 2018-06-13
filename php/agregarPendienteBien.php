<?php
    try
    {
        require_once('connection.php');

        $idBien = $_POST["idBien"];
        $tipoBien = $_POST["tipoBien"];
        $pendiente = $_POST["pendiente"];
        $estado = $_POST["estado"];
        $resolucion = $_POST["resolucion"];
        $fechaInicio = $_POST["fechaInicio"];

        if (!$idBien || !$pendiente) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into " . $tipoBien . "pendientes (id" . $tipoBien . ", pendiente, estado, fechaInicio, fechaFin, resolucion) Values (" . $idBien . ", '" . $pendiente . "', '" . $estado . "', '" . $fechaInicio . "', '', '" . $resolucion . "')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>