<?php
    try
    {
        require_once('connection.php');

        $periodicidad = $_POST["periodicidad"];

        if (!$periodicidad) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into publicacionperiodicidades (periodicidad)
                Values ('$periodicidad')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>