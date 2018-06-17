<?php
    try
    {
        require_once('connection.php');

        $idFichaPublicacion = $_POST["idFichaPublicacion"];

        if (!$idFichaPublicacion) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select * ". 
                "From publicaciontecnicasimpresion " .
                "Inner Join tecnicasimpresion " .
                "On tecnicasimpresion.idtecnicaimpresion = publicaciontecnicasimpresion.idtecnicaimpresion " .
                "Where publicaciontecnicasimpresion.idpublicacion = $idFichaPublicacion";

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