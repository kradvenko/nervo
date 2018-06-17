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
                "From publicaciontiposencuadernacion " .
                "Inner Join tiposencuadernacion " .
                "On publicaciontiposencuadernacion.idtipoencuadernacion = tiposencuadernacion.idtipoencuadernacion " .
                "Where publicaciontiposencuadernacion.idpublicacion = $idFichaPublicacion";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<cat>";
            echo "<idtipoencuadernacion>" . $row['idtipoencuadernacion'] . "</idtipoencuadernacion>\n";
            echo "<tipoencuadernacion>" . $row['tipoencuadernacion'] . "</tipoencuadernacion>\n";
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