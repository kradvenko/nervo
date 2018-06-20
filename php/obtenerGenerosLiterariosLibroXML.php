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

        $sql = "Select *
                From librogenerosliterarios
                Inner Join generosliterarios
                On generosliterarios.idgeneroliterario = librogenerosliterarios.idgeneroliterario
                Where librogenerosliterarios.idlibro = $idFichaLibro";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<cat>";
            echo "<idgeneroliterario>" . $row['idgeneroliterario'] . "</idgeneroliterario>\n";
            echo "<genero>" . $row['genero'] . "</genero>\n";
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