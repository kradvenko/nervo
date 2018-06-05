<?php
    try
    {
        require_once('connection.php');

        $idFichaFotografia = $_POST["idFichaFotografia"];
        $enlaceWeb = $_POST["enlaceWeb"];
        $notasEnlaceWeb = $_POST["notasEnlaceWeb"];

        if (!$idFichaFotografia || !$enlaceWeb) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into fotografiaenlacesweb (idfotografia, sitio, notas) Values (" . $idFichaFotografia . ", '" . $enlaceWeb . "', '" . $notasEnlaceWeb . "')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>