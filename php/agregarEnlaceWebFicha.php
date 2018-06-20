<?php
    try
    {
        require_once('connection.php');

        $idBien = $_POST["idBien"];
        $tipoBien = $_POST["tipoBien"];
        $enlaceWeb = $_POST["enlaceWeb"];
        $notasEnlaceWeb = $_POST["notasEnlaceWeb"];

        if (!$idBien || !$enlaceWeb) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into $tipoBien" . "enlacesweb (id$tipoBien, sitio, notas) Values (" . $idBien . ", '" . $enlaceWeb . "', '" . $notasEnlaceWeb . "')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>