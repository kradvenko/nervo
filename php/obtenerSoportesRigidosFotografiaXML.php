<?php
    try
    {
        require_once('connection.php');

        $idFichaFotografia = $_POST["idFichaFotografia"];

        if (!$idFichaFotografia) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select * ". 
                "From fotografiasoportesrigidos " .
                "Inner Join soportesrigidos " .
                "On soportesrigidos.idsoporterigido = fotografiasoportesrigidos.idsoporterigido " .
                "Where fotografiasoportesrigidos.idfotografia = $idFichaFotografia";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<cat>";
            echo "<idsoporterigido>" . $row['idsoporterigido'] . "</idsoporterigido>\n";
            echo "<soporterigido>" . $row['soporterigido'] . "</soporterigido>\n";
            echo "</cat>";
        }

        echo "</resultado>\n";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>