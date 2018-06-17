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
                "From publicaciontipospapel " .
                "Inner Join tipospapel " .
                "On tipospapel.idtipopapel = publicaciontipospapel.idtipopapel " .
                "Where publicaciontipospapel.idpublicacion = $idFichaPublicacion";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<cat>";
            echo "<idtipopapel>" . $row['idtipopapel'] . "</idtipopapel>\n";
            echo "<tipopapel>" . $row['tipopapel'] . "</tipopapel>\n";
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