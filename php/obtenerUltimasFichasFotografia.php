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

        echo "<table class='tableUltimasFichas'>";
        echo "<tr>";
        while ($row = $result->fetch_array()) {            
            echo "<td onclick='elegirFichaFotografia(" . $row["idfichafotografia"] . ")'>" . $row["titulo"] . "</td>";
        }
        echo "</tr>";
        echo "</table>";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>