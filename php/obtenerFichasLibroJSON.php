<?php    
    try
    {
        require_once('connection.php');

        header('Content-type: application/json');

        $term = $_GET["term"];

        $con = new mysqli($hn, $un, $pw, $db);

        $data = array();

        $sql = "Select * 
                    From fichaslibro
                    Where fichaslibro.titulo Like '%$term%' 
                    Order By idfichalibro";       

        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            $item = array("id" => $row["idfichalibro"] , "value" => $row["titulo"]);
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