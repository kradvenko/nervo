<?php
    try
    {
        require_once('connection.php');

        $idBien = $_POST["idBien"];
        $tipoBien = $_POST["tipoBien"];

        if (!$idBien) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select * " .
                "From " . $tipoBien . "enlacesweb " .
                "Where id$tipoBien = $idBien";

        $result = $con->query($sql);

        echo "<table class='table-fill'>";
        echo "<thead>";
        echo " <tr>";
        echo "  <th class='text-left'>Dirección</th>";
        echo "  <th class='text-left'>Notas</th>";
        echo "  <th class='text-left'></th>";
        echo " </tr>";
        echo "</thead>";

        while ($row = $result->fetch_array()) {
            echo "<tr>";
            echo "  <td><a target='_blank' href='" . $row["sitio"] . "'>" . $row["sitio"] . "</a></td>";
            echo "  <td>" . $row["notas"] . "</td>";
            echo "  <td><button type='button' class='btn btn-success' onclick='elegirEnlaceWeb(" . $row["id" . $tipoBien . "enlaceweb"] . ", \"" . $row["sitio"] . "\", " . json_encode($row["notas"]) . ")'>Elegir</button>";
            echo "</tr>";
        }

        echo "</table>";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>