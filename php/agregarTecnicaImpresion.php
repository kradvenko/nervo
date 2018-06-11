<?php
    try
    {
        require_once('connection.php');

        $tecnicaImpresion = $_POST["tecnicaImpresion"];

        if (!$tecnicaImpresion) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into tecnicasimpresion (tecnicaimpresion) Values ('" . $tecnicaImpresion . "')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>