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
                "From librotiposencuadernacion " .
                "Inner Join tiposencuadernacion " .
                "On tiposencuadernacion.idtipoencuadernacion = librotiposencuadernacion.idtipoencuadernacion " .
                "Where librotiposencuadernacion.idlibro = $idFichaLibro";

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