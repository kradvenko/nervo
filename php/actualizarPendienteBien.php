<?php
    try
    {
        require_once('connection.php');

        $idPendienteBien = $_POST["idPendienteBien"];
        $tipoBien = $_POST["tipoBien"];
        $pendiente = $_POST["pendiente"];
        $estado = $_POST["estado"];
        $resolucion = $_POST["resolucion"];
        $fechaFin = $_POST["fechaFin"];

        if (!$idPendienteBien || !$pendiente) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        if ($estado == 'ACTIVO') {
            $sql = "Update " . $tipoBien . "pendientes Set pendiente = '$pendiente', resolucion = '$resolucion' Where id" . $tipoBien . "pendiente = $idPendienteBien ";
        } else if ($estado == 'FINALIZADO') {
            $sql = "Update " . $tipoBien . "pendientes Set pendiente = '$pendiente', estado = '$estado', fechaFin = '$fechaFin',  resolucion = '$resolucion' Where id" . $tipoBien . "pendiente = $idPendienteBien ";
        }

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>