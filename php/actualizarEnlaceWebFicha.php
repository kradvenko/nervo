<?php
    try
    {
        require_once('connection.php');

        $idEnlaceWeb = $_POST["idEnlaceWeb"];
        $enlaceWeb = $_POST["enlaceWeb"];
        $notasEnlaceWeb = $_POST["notasEnlaceWeb"];
        $tipoBien = $_POST["tipoBien"];

        if (!$idEnlaceWeb || !$enlaceWeb) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Update $tipoBien" . "enlacesweb Set sitio = '" . $enlaceWeb . "', notas = '" . $notasEnlaceWeb . "' Where id$tipoBien" . "enlaceweb = " . $idEnlaceWeb;

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>