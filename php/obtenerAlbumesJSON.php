<?php    
    try
    {
        require_once('connection.php');

        header('Content-type: application/json');

        $term = $_GET["term"];
        $tipoFicha = $_GET["tipoFicha"];

        $con = new mysqli($hn, $un, $pw, $db);

        $data = array();

        $sql = "Select * From albumes " .
                "Where albumes.album Like '%$term%' And tipoficha = '$tipoFicha'";

        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            $ciudad = array("id" => $row["idalbum"] , "value" => ($row["album"]));
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