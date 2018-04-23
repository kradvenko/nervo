<?php
    try
    {
        require_once('connection.php');

        $idPais = $_POST["idPais"];
        $idRegion = $_POST["idRegion"];
        $ciudad = $_POST["ciudad"];

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into ciudades (idPais, idRegion, ciudad) Values (" . $idPais . ", " . $idRegion . ", '" . $ciudad . "')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>