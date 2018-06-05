<?php
    try
    {
        require_once('connection.php');

        $idEnlaceWeb = $_POST["idEnlaceWeb"];
        $enlaceWeb = $_POST["enlaceWeb"];
        $notasEnlaceWeb = $_POST["notasEnlaceWeb"];

        if (!$idEnlaceWeb || !$enlaceWeb) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Update fotografiaenlacesweb Set sitio = '" . $enlaceWeb . "', notas = '" . $notasEnlaceWeb . "' Where idfotografiaenlaceweb = " . $idEnlaceWeb;

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>