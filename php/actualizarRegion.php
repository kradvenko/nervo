<?php
    try
    {
        require_once('connection.php');

        $idRegion = $_POST["idRegion"];
        $idPais = $_POST["idPais"];
        $idTipoRegion = $_POST["idTipoRegion"];
        $region = $_POST["region"];

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Update regiones Set idPais = " . $idPais . ", idtiporegion = " . $idTipoRegion . ", region = '" . $region . "' Where idregion = " . $idRegion;

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>