<?php
    try
    {
        require_once('connection.php');

        $idImagen = $_POST["idImagen"];
        $idPersonaToma = $_POST["idPersonaToma"];
        $fechaToma = $_POST["fechaToma"];
        $rutaImagen = $_POST["rutaImagen"];
        $aprobada = $_POST["aprobada"];

        if (!$idImagen || !$rutaImagen) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Update fotografiaimagenes Set idPersonaToma = " . $idPersonaToma . ", fechatoma = '" . $fechaToma . "', " .
        "rutaimagen = '" . $rutaImagen . "', aprobada = '" . $aprobada . "' " .
        "Where idfotografiaimagen = " . $idImagen;

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>