<?php
    try
    {
        require_once('connection.php');

        $idFichaLibro = $_POST["idFichaLibro"];

        if (!$idFichaLibro) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select * ". 
                "From librotecnicasimpresion " .
                "Inner Join tecnicasimpresion " .
                "On tecnicasimpresion.idtecnicaimpresion = librotecnicasimpresion.idtecnicaimpresion " .
                "Where librotecnicasimpresion.idlibro = $idFichaLibro";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<cat>";
            echo "<idtecnicaimpresion>" . $row['idtecnicaimpresion'] . "</idtecnicaimpresion>\n";
            echo "<tecnicaimpresion>" . $row['tecnicaimpresion'] . "</tecnicaimpresion>\n";
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