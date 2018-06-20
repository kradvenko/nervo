<?php
    try
    {
        require_once('connection.php');

        $idioma = $_POST["idioma"];

        if (!$idioma) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into idiomas (idioma) Values ('" . $idioma . "')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>