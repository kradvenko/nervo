<?php
    try
    {
        require_once('connection.php');

        $idSelect = $_POST["idSelect"];

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select * From paises";

        $result = $con->query($sql);

        echo "<select class='form-control' id='" . $idSelect . "'>";

        while ($row = $result->fetch_array()) {
            echo "<option value='" . $row["idpais"] . "'>" . $row["pais"] . "</option>";            
        }
        
        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>