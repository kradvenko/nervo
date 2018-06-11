<?php
    try
    {
        require_once('connection.php');

        $idSelect = $_POST["idSelect"];

        if (!$idSelect) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select * From temas Order By tema";

        $result = $con->query($sql);

        echo "<select class='form-control' id='" . $idSelect . "'>";

        while ($row = $result->fetch_array()) {
            echo "<option value='" . $row["idtema"] . "'>" . $row["tema"] . "</option>";            
        }
        
        echo "</select>";
        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>