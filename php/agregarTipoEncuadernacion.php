<?php
    try
    {
        require_once('connection.php');

        $tipoEncuadernacion = $_POST["tipoEncuadernacion"];

        if (!$tipoEncuadernacion) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into tiposencuadernacion (tipoencuadernacion) Values ('" . $tipoEncuadernacion . "')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>