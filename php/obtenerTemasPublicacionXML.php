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
                "From publicaciontemas " .
                "Inner Join temas " .
                "On temas.idtema = publicaciontemas.idtema " .
                "Where publicaciontemas.idpublicacion = $idFichaPublicacion";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<cat>";
            echo "<idtema>" . $row['idtema'] . "</idtema>\n";
            echo "<tema>" . $row['tema'] . "</tema>\n";
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