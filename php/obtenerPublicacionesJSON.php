<?php    
    try
    {
        require_once('connection.php');

        header('Content-type: application/json');

        $term = $_GET["term"];

        $con = new mysqli($hn, $un, $pw, $db);

        $data = array();

        $sql = "Select publicaciones.*, paises.pais
                From publicaciones 
                Inner Join paises
                On paises.idpais = publicaciones.idpais
                Where publicaciones.publicacion Like '%$term%'";

        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            $ciudad = array("id" => $row["idpublicacion"] , "value" => ($row["publicacion"] . " - " . $row["pais"]));
            array_push($data, $ciudad);
        }
        
        echo json_encode($data);
        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>