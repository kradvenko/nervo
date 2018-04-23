<?php
    try
    {
        require_once('connection.php');

        $idpais = $_POST["idpais"];
        $pais = $_POST["pais"];

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Update paises Set pais = '" . $pais . "' Where idpais = " . $idpais;

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>