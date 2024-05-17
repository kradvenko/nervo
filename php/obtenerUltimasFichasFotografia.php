<?php
    try
    {
        require_once('connection.php');

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select * 
                    From fichasfotografia 
                    Order By idfichafotografia Desc 
                    Limit 10";

        $result = $con->query($sql);

        
        while ($row = $result->fetch_array()) {            
            echo "<span class='ultimaFicha' onclick='elegirFichaFotografia(" . $row["idfichafotografia"] . ")'>" . utf8_decode($row["titulo"]) . "</span>";
        }
        

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>