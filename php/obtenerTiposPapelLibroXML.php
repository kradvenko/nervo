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
                From librotipospapel 
                Inner Join tipospapel
                On tipospapel.idtipopapel = librotipospapel.idtipopapel
                Where librotipospapel.idlibro = $idFichaLibro";

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