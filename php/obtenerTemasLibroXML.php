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
                "From librotemas " .
                "Inner Join temas " .
                "On temas.idtema = librotemas.idtema " .
                "Where librotemas.idlibro = $idFichaLibro";

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