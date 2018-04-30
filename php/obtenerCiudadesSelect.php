<?php
    try
    {
        require_once('connection.php');

        $idSelect = $_POST["idSelect"];
        $idRegion = $_POST["idRegion"];

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select * From ciudades Where idregion = " . $idRegion;

        $result = $con->query($sql);

        echo "<select class='form-control' id='" . $idSelect . "'>";

        while ($row = $result->fetch_array()) {
            echo "<option value='" . $row["idciudad"] . "'>" . $row["ciudad"] . "</option>";            
        }
        
        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>