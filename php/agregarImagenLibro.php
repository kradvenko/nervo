<?php
    try
    {
        require_once('connection.php');

        $idFichaLibro = $_POST["idFichaLibro"];
        $idPersonaToma = $_POST["idPersonaToma"];
        $fechaToma = $_POST["fechaToma"];
        $rutaImagen = $_POST["rutaImagen"];
        $aprobada = $_POST["aprobada"];
        $personaEdita = $_POST["personaEdita"];
        $thumbnail = $_POST["thumbnail"];

        if (!$idFichaLibro || !$rutaImagen) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into libroimagenes (idlibro, idpersonatoma, rutaimagen, aprobada, fechatoma, personaedita, thumbnail) Values (" . $idFichaLibro . ", " . $idPersonaToma . ", '" . $rutaImagen . "', '" . $aprobada . "', '" . $fechaToma . "', '" . $personaEdita . "', '" . $thumbnail . "')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>