<?php
    try
    {
        require_once('connection.php');

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select instituciones.*, paises.pais, 
                (If (institucionpendientes.estado = 'ACTIVO', Count(institucionpendientes.idinstitucion), 0)) As pendientes
                From instituciones
                Inner Join paises
                On paises.idpais = instituciones.idpais
                Left Join institucionpendientes
                On institucionpendientes.idinstitucion = instituciones.idinstitucion And institucionpendientes.estado = 'ACTIVO'
                Group By instituciones.idinstitucion";

        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            echo '<div class="col-12">';            
            echo '<div class="divTarjetaInstitucion" onclick="elegirInstitucion(' . $row["idinstitucion"] . ')">';
            echo '<div class="divTarjetaInstitucionHeader">' . utf8_decode($row["nombreInstitucion"]) . '</div>';
            if ($row["pendientes"] > 0) {
                echo '<div class="divTarjetaInstitucionBody">' . utf8_decode($row["pais"]) . '<span class="badge badge-warning">' . $row["pendientes"] . '</span></div></div></div>';
            } else {
                echo '<div class="divTarjetaInstitucionBody">' . utf8_decode($row["pais"]) . '</div></div></div>';
            }            
        }

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>