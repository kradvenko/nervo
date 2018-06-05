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
                "From fotografiasoportesflexibles " .
                "Inner Join soportesflexibles " .
                "On soportesflexibles.idsoporteflexible = fotografiasoportesflexibles.idsoporteflexible " .
                "Where fotografiasoportesflexibles.idfotografia = $idFichaFotografia";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<cat>";
            echo "<idsoporteflexible>" . $row['idsoporteflexible'] . "</idsoporteflexible>\n";
            echo "<soporteflexible>" . $row['soporte'] . "</soporteflexible>\n";
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