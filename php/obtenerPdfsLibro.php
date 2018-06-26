<?php
    try
    {
        require_once('connection.php');

        $idFichaLibro = $_POST["idFichaLibro"];

        if (!$idFichaLibro) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select libropdfs.*
                From libropdfs
                Where idlibro = $idFichaLibro";

        $result = $con->query($sql);

        echo "<table class='table-fill'>";
        echo "<thead>";
        echo " <tr>";
        echo "  <th class='text-left'>PDF</th>";
        echo "  <th class='text-left'>Aprobado</th>";
        echo "  <th class='text-left'></th>";
        echo " </tr>";
        echo "</thead>";

        while ($row = $result->fetch_array()) {
            echo "<tr>";
            echo "  <td><a target='_blank' href='" . $row["rutapdf"] . "'>" . $row["rutapdf"] . "</a></td>";
            echo "  <td>" . $row["aprobado"] . "</td>";
            echo "  <td><button type='button' class='btn btn-success' onclick='elegirPdfLibro(" . $row["idlibropdf"] . ", \"" . $row["aprobado"] . "\", \"" . $row["rutapdf"] . "\")'>Elegir</button>";
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