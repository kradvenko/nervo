<?php
    try
    {
        require_once('connection.php');

        $pais = $_POST["pais"];

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into paises (pais) Values ('" . $pais . "')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>