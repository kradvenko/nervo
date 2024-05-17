<?php    
    try
    {
        require_once('connection.php');

        header('Content-type: application/json');

        $term = utf8_encode($_GET["term"]);

        $con = new mysqli($hn, $un, $pw, $db);

        $data = array();

        $sql = "Select * 
                    From fichasfotografia
                    Where fichasfotografia.numerofotografia Like '%$term%' 
                    Order By idfichafotografia Desc 
                    Limit 10";       

        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            $item = array("id" => $row["idfichafotografia"] , "value" => json_encode(utf8_decode($row["numerofotografia"])));
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