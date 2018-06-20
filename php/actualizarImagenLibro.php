<?php
    try
    {
        require_once('connection.php');

        $idImagen = $_POST["idImagen"];
        $idPersonaToma = $_POST["idPersonaToma"];
        $fechaToma = $_POST["fechaToma"];
        $rutaImagen = $_POST["rutaImagen"];
        $aprobada = $_POST["aprobada"];
        $personaEdita = $_POST["personaEdita"];
        $thumbnail = $_POST["thumbnail"];

        if (!$idImagen || !$rutaImagen) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Update libroimagenes Set idPersonaToma = " . $idPersonaToma . ", fechatoma = '" . $fechaToma . "', " .
        "rutaimagen = '" . $rutaImagen . "', aprobada = '" . $aprobada . "', personaedita = '" . $personaEdita . "', " .
        "thumbnail = '" . $thumbnail . "' " .
        "Where idlibroimagen = " . $idImagen;

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>