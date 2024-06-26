<?php    
    try
    {
        require_once('connection.php');

        header('Content-type: application/json');

        $idAlbum = $_POST["idAlbum"];

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select albumes.*, instituciones.nombreInstitucion As institucion
                From albumes
                Inner Join instituciones
                On instituciones.idinstitucion = albumes.idinstitucion
                Where albumes.idalbum = $idAlbum";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<cat>";
            echo "<idalbum>" . $row['idalbum'] . "</idalbum>\n";
            echo "<idinstitucion>" . $row['idinstitucion'] . "</idinstitucion>\n";
            echo "<institucion>" . $row['institucion'] . "</institucion>\n";
            echo "<album>" . utf8_decode($row['album']) . "</album>\n";
            echo "<descripcion>" . utf8_decode($row['descripcion']) . "</descripcion>\n";
            echo "<numerofotografias>" . $row['numerofotografias'] . "</numerofotografias>\n";
            echo "<numeroalbum>" . $row['numeroalbum'] . "</numeroalbum>\n";
            echo "<tipoficha>" . utf8_decode($row['tipoficha']) . "</tipoficha>\n";
            echo "<de>" . $row['de'] . "</de>\n";
            echo "<a>" . $row['a'] . "</a>\n";
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