<?php
    try
    {
        require_once('connection.php');

        $tipoPapel = $_POST["tipoPapel"];

        if (!$tipoPapel) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into tipospapel (tipopapel) Values ('" . $tipoPapel . "')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>