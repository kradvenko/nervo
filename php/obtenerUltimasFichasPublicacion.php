<?php
    try
    {
        require_once('connection.php');

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select * 
                    From fichaspublicacion 
                    Order By idfichapublicacion Desc 
                    Limit 10";

        $result = $con->query($sql);

        
        while ($row = $result->fetch_array()) {            
            echo "<span class='ultimaFicha' onclick='elegirFichaPublicacion(" . $row["idfichapublicacion"] . ")'>" . $row["tituloseccion"] . "</span>";
        }
        

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>