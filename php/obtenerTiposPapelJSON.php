<?php    
    try
    {
        require_once('connection.php');

        header('Content-type: application/json');

        $term = $_GET["term"];

        $con = new mysqli($hn, $un, $pw, $db);

        $data = array();

        $sql = "Select * From tipospapel " .
                "Where tipospapel.tipopapel Like '%$term%'";

        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            $item = array("id" => $row["idtipopapel"] , "value" => $row["tipopapel"]);
            array_push($data, $item);
        }
        
        echo json_encode($data);
        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>