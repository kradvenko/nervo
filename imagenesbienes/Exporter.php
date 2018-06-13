<?php
    try
    {
        require_once('connection.php');

        $con = new mysqli($hn, $un, $pw, $db);
        
        $sql = "Select *
                From TABLE34";
        /*
        $sql = "Select *
                From joomnervo";
        $result = $con->query($sql);
        */
        $result = $con->query($sql);
        
        while ($row = $result->fetch_array()) {
            $idAlbum = 0;
            switch ($row["COL 3"]) {
                case "ALBUM 6":
                                $idAlbum = 9;
                                break;
                case "ALBUM 7":
                                $idAlbum = 10;
                                break;
                case "ALBUM 8":
                                $idAlbum = 11;
                                break;
                case "ALBUM 9":
                                $idAlbum = 12;
                                break;
            }
            
            $sql = "INSERT INTO fichasfotografia
                (idinstitucion, numeroregistrointerno, numeroinventario, titulo, tituloserie, idciudadasunto, idciudadtoma,
                fechaasunto, fechatoma, idestudio, idalbum, numerofotografia, coleccion, clavetecnica, anotaciones, contextohistorico, estadoconservacion,
                estadointegridad, agrietamiento, ataquebiologico, burbujas, cambioscolor, craqueladuras, cintasadhesivas, deformaciones,
                desprendimientos, desvanecimientos, huellasdigitales, hongos, manchas, raspaduras, ralladuras, retocado, roturas, sellosotinta,
                sulfuracion, alto, ancho, diametro, inspeccionesomarcas, caracteristicas, idpersonacaptura, fechacaptura, estado)
                VALUES
                ('5', '', '', '" . $row["COL 4"] . "', '', '0', '0',
                '', '', '0', '$idAlbum', '" . $row["COL 5"] . "', '', '', '', '',
                '', '', 'NO', 'NO', 'NO', 'NO', 'NO',
                'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO',
                'NO', 'NO', 'NO', 'NO', 'NO', 'NO', '', '', '',
                '', '', '2', '13/06/2018 @ 12:00:00', 'ACTIVO')";

            $con->query($sql);
            $idFichaFoto = $con->insert_id;

            $rutaImagen = "imagenesbienes/fotografias/". $row["COL 6"];

            $sql = "Insert Into fotografiaimagenes (idfotografia, idpersonatoma, rutaimagen, aprobada, fechatoma)
                    Values (" . $idFichaFoto . ", 0, '" . $rutaImagen . "', 'SI', '')";            
            
            $con->query($sql);
            /*
            if (!file_exists("fotografias/" . $idFichaFoto . "/")) {
                mkdir("fotografias/" . $idFichaFoto . "/", 0777, true);
            }
            */
        }

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>