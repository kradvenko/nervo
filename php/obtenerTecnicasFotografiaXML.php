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

        $sql = "Select * " . 
                "From fotografiatecnica " .
                "Inner Join tecnicasfotograficas " .
                "On tecnicasfotograficas.idtecnicafotografica = fotografiatecnica.idtecnica " .
                "Where fotografiatecnica.idfotografia = $idFichaFotografia";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<cat>";
            echo "<idtecnica>" . $row['idtecnicafotografica'] . "</idtecnica>\n";
            echo "<tecnica>" . $row['tecnica'] . "</tecnica>\n";
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