<?php    
    try
    {
        require_once('connection.php');

        header('Content-type: application/json');

        $term = $_GET["term"];

        $con = new mysqli($hn, $un, $pw, $db);

        $data = array();

        $sql = "Select * From paises " .
                "Where paises.pais Like '%$term%'";

        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            $ciudad = array("id" => $row["idpais"] , "value" => $row["pais"]);
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