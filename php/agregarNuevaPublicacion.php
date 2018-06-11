<?php
    try
    {
        require_once('connection.php');

        $publicacion = $_POST["publicacion"];
        $idPais = $_POST["idPais"];
        $idTipoPublicacion = $_POST["idTipoPublicacion"];

        if (!$publicacion) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into publicaciones (idpais, idtipo, publicacion)
                Values ($idPais, $idTipoPublicacion, '$publicacion')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>