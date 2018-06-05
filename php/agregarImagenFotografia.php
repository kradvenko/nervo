<?php
    try
    {
        require_once('connection.php');

        $idFichaFotografia = $_POST["idFichaFotografia"];
        $idPersonaToma = $_POST["idPersonaToma"];
        $fechaToma = $_POST["fechaToma"];
        $rutaImagen = $_POST["rutaImagen"];
        $aprobada = $_POST["aprobada"];

        if (!$idFichaFotografia || !$rutaImagen) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into fotografiaimagenes (idfotografia, idpersonatoma, rutaimagen, aprobada, fechatoma) Values (" . $idFichaFotografia . ", " . $idPersonaToma . ", '" . $rutaImagen . "', '" . $aprobada . "', '" . $fechaToma . "')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>