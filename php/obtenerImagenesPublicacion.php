<?php
    try
    {
        require_once('connection.php');

        $idFichaPublicacion = $_POST["idFichaPublicacion"];

        if (!$idFichaPublicacion) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select publicacionimagenes.*, usuarios.nombre " .
                "From publicacionimagenes " .
                "Left Join usuarios " .
                "On usuarios.idusuario = publicacionimagenes.idpersonatoma " .
                "Where idpublicacion = $idFichaPublicacion";

        $result = $con->query($sql);

        echo "<table class='table-fill'>";
        echo "<thead>";
        echo " <tr>";
        echo "  <th class='text-left'>Imagen</th>";
        echo "  <th class='text-left'>Persona toma</th>";
        echo "  <th class='text-left'>Fecha toma</th>";
        echo "  <th class='text-left'>Aprobada</th>";
        echo "  <th class='text-left'>Persona edita</th>";
        echo "  <th class='text-left'></th>";
        echo " </tr>";
        echo "</thead>";

        while ($row = $result->fetch_array()) {
            echo "<tr>";
            echo "  <td><a target='_blank' href='" . $row["rutaimagen"] . "'>" . $row["rutaimagen"] . "</a></td>";
            echo "  <td>" . $row["nombre"] . "</td>";
            echo "  <td>" . $row["fechatoma"] . "</td>";
            echo "  <td>" . $row["aprobada"] . "</td>";
            echo "  <td>" . $row["personaedita"] . "</td>";
            echo "  <td><button type='button' class='btn btn-success' onclick='elegirImagenFotografia(" . $row["idpublicacionimagen"] . ", \"" . $row["idpersonatoma"] . "\", \"" . $row["nombre"] . "\", \"" . $row["fechatoma"] . "\", \"" . $row["aprobada"] . "\", \"" . $row["rutaimagen"] . "\", \"" . $row["personaedita"] . "\")'>Elegir</button>";
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