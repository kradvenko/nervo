<?php
    
    try
    {
        require_once('connection.php');

        header('Content-type: application/json');

        $term = $_GET["term"];

        $con = new mysqli($hn, $un, $pw, $db);

        $data = array();

        $sql = "Select * From autores " .
                "Where autores.autor Like '%$term%'";

        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            $ciudad = array("id" => $row["idautor"] , "value" => $row["autor"]);
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