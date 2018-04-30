<?php
    try
    {
        require_once('connection.php');

        $categoria = $_POST["categoria"];

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into categoriasinstitucion (categoria) Values ('" . $categoria . "')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>