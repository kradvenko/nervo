<?php
    try
    {
        require_once('connection.php');

        $idPdf = $_POST["idPdf"];
        $rutaPdf = $_POST["rutaPdf"];
        $aprobado = $_POST["aprobado"];

        if (!$idPdf || !$rutaPdf) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Update libropdfs Set 
                aprobado = '$aprobado', rutapdf = '$rutaPdf'
                Where idlibropdf = $idPdf";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>