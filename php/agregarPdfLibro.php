<?php
    try
    {
        require_once('connection.php');

        $idFichaLibro = $_POST["idFichaLibro"];
        $rutaPdf = $_POST["rutaPdf"];
        $aprobado= $_POST["aprobado"];
        $fecha = $_POST["fecha"];

        if (!$idFichaLibro || !$rutaPdf) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "INSERT INTO libropdfs
                (idlibro, aprobado, fechasubido, rutapdf)
                VALUES
                ($idFichaLibro, '$aprobado', '$fecha', '$rutaPdf')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>