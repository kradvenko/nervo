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

        $sql = "Select *
                From publicaciongenerosliterarios
                Inner Join generosliterarios
                On generosliterarios.idgeneroliterario = publicaciongenerosliterarios.idgeneroliterario
                Where publicaciongenerosliterarios.idpublicacion = $idFichaPublicacion";

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