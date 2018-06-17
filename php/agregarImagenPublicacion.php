<?php
    try
    {
        require_once('connection.php');

        $idFichaPublicacion = $_POST["idFichaPublicacion"];
        $idPersonaToma = $_POST["idPersonaToma"];
        $fechaToma = $_POST["fechaToma"];
        $rutaImagen = $_POST["rutaImagen"];
        $aprobada = $_POST["aprobada"];
        $personaEdita = $_POST["personaEdita"];
        $thumbnail = $_POST["thumbnail"];

        if (!$idFichaPublicacion || !$rutaImagen) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into publicacionimagenes (idpublicacion, idpersonatoma, rutaimagen, aprobada, fechatoma, personaedita, thumbnail) Values (" . $idFichaPublicacion . ", " . $idPersonaToma . ", '" . $rutaImagen . "', '" . $aprobada . "', '" . $fechaToma . "', '" . $personaEdita . "', '" . $thumbnail . "')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>