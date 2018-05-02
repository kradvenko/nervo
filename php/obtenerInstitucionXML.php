<?php
    try
    {
        require_once('connection.php');

        $idInstitucion = $_POST["idInstitucion"];

        if (!$idInstitucion) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select instituciones.*, paises.pais From instituciones ". 
                "Inner Join paises " .
                "On paises.idpais = instituciones.idpais " .
                "Where instituciones.idinstitucion = $idInstitucion";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<nombreInstitucion>" . $row['nombreInstitucion'] . "</nombreInstitucion>\n";
        }

        echo "</resultado>\n";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>