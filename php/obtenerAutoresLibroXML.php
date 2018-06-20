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
                "From libroautores " .
                "Inner Join autores " .
                "On autores.idautor = libroautores.idautor " .
                "Where idlibro = $idFichaLibro";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<cat>";
            echo "<idautor>" . $row['idautor'] . "</idautor>\n";
            echo "<autor>" . $row['autor'] . "</autor>\n";
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