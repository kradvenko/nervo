<?php
    try
    {
        require_once('connection.php');
        
        $idInstitucion = $_POST["idInstitucion"];
        $numeroRegistroInterno = $_POST["numeroRegistroInterno"];
        $numeroInventario = $_POST["numeroInventario"];
        $titulo = $_POST["titulo"];
        $tituloSerie = $_POST["tituloSerie"];
        $idCiudadAsunto = $_POST["idCiudadAsunto"];
        $idCiudadToma = $_POST["idCiudadToma"];
        $fechaAsunto = $_POST["fechaAsunto"];
        $fechaToma = $_POST["fechaToma"];
        $idEstudio = $_POST["idEstudio"];
        $idAlbum = $_POST["idAlbum"];
        $numeroFotografia = $_POST["numeroFotografia"];
        $coleccion = $_POST["coleccion"];
        $claveTecnica = $_POST["claveTecnica"];
        $anotaciones = $_POST["anotaciones"];
        $contextoHistorico = $_POST["contextoHistorico"];
        $estadoConservacion = $_POST["estadoConservacion"];
        $estadoIntegridad = $_POST["estadoIntegridad"];
        $agrietamiento = $_POST["agrietamiento"];
        $ataqueBiologico = $_POST["ataqueBiologico"];
        $burbujas = $_POST["burbujas"];
        $cambiosColor = $_POST["cambiosColor"];
        $craqueladuras = $_POST["craqueladuras"];
        $cintasAdhesivas = $_POST["cintasAdhesivas"];
        $deformaciones = $_POST["deformaciones"];
        $desvanecimientos = $_POST["desvanecimientos"];
        $desprendimientos = $_POST["desprendimientos"];
        $huellasDigitales = $_POST["huellasDigitales"];
        $hongos = $_POST["hongos"];
        $manchas = $_POST["manchas"];
        $raspaduras = $_POST["raspaduras"];
        $ralladuras = $_POST["ralladuras"];
        $retocado = $_POST["retocado"];
        $roturas = $_POST["roturas"];
        $sellosTinta = $_POST["sellosTinta"];
        $sulfuracion = $_POST["sulfuracion"];
        $alto = $_POST["alto"];
        $ancho = $_POST["ancho"];
        $diametro = $_POST["diametro"];
        $inspeccionesOMarcas = $_POST["inspeccionesOMarcas"];
        $caracteristicas = $_POST["caracteristicas"];
        $idPersonaCaptura = $_POST["idPersonaCaptura"];
        $fechaCaptura = $_POST["fechaCaptura"];
        $estado = $_POST["estado"]; 
        $autores = (isset($_POST["autores"]) ? $_POST["autores"] : []);
        $temas = (isset($_POST["temas"]) ? $_POST["temas"] : []);
        $tecnicas = (isset($_POST["tecnicas"]) ? $_POST["tecnicas"] : []);
        $soportesFlexibles = (isset($_POST["soportesFlexibles"]) ? $_POST["soportesFlexibles"] : []);
        $soportesRigidos = (isset($_POST["soportesRigidos"]) ? $_POST["soportesRigidos"] : []);
        $generos = (isset($_POST["generos"]) ? $_POST["generos"] : []);

        /*
        if (!$nombreInstitucion || !$sectorInstitucion || !$tipoInstitucion || !$sitioWeb || !$correoElectronico || !$telefonos 
            || !$extension || !$domicilio || !$colonia || !$codigoPostal || !$idpais || !$idregion || !$idciudad || !$categorias) {
            echo "Error. Faltan variables.";
            exit(1);
        }
        */
        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "INSERT INTO fichasfotografia
                (idinstitucion, numeroregistrointerno, numeroinventario, titulo, tituloserie, idciudadasunto, idciudadtoma,
                fechaasunto, fechatoma, idestudio, idalbum, numerofotografia, coleccion, clavetecnica, anotaciones, contextohistorico, estadoconservacion,
                estadointegridad, agrietamiento, ataquebiologico, burbujas, cambioscolor, craqueladuras, cintasadhesivas, deformaciones,
                desprendimientos, desvanecimientos, huellasdigitales, hongos, manchas, raspaduras, ralladuras, retocado, roturas, sellosotinta,
                sulfuracion, alto, ancho, diametro, inspeccionesomarcas, caracteristicas, idpersonacaptura, fechacaptura, estado)
                VALUES
                ('$idInstitucion', '$numeroRegistroInterno', '$numeroInventario', '$titulo', '$tituloSerie', '$idCiudadAsunto', '$idCiudadToma',
                '$fechaAsunto', '$fechaToma', '$idEstudio', '$idAlbum', '$numeroFotografia', '$coleccion', '$claveTecnica', '$anotaciones', '$contextoHistorico',
                '$estadoConservacion', '$estadoIntegridad', '$agrietamiento', '$ataqueBiologico', '$burbujas', '$cambiosColor', '$craqueladuras',
                '$cintasAdhesivas', '$deformaciones', '$desprendimientos', '$desvanecimientos', '$huellasDigitales', '$hongos', '$manchas',
                '$raspaduras', '$ralladuras', '$retocado', '$roturas', '$sellosTinta', '$sulfuracion', '$alto', '$ancho', '$diametro',
                '$inspeccionesOMarcas', '$caracteristicas', '$idPersonaCaptura', '$fechaCaptura', '$estado')";
        

        $con->query($sql);

        $idFichaFoto = $con->insert_id;

        
        for ($i = 0; $i < sizeof($autores); $i++) {
            $sql = "Insert Into fotografiaautores (idfotografia, idautor) " .
            "Values ('$idFichaFoto', " . $autores[$i]["id"] . ")";
            $con->query($sql);
        }
        
        for ($i = 0; $i < sizeof($temas); $i++) {
            $sql = "Insert Into fotografiatemas (idfotografia, idtema) " .
            "Values ('$idFichaFoto', " . $temas[$i]["id"] . ")";
            $con->query($sql);
        }

        for ($i = 0; $i < sizeof($tecnicas); $i++) {
            $sql = "Insert Into fotografiatecnica (idfotografia, idtecnica) " .
            "Values ('$idFichaFoto', " . $tecnicas[$i]["id"] . ")";
            $con->query($sql);
        }        
        
        for ($i = 0; $i < sizeof($soportesFlexibles); $i++) {
            $sql = "Insert Into fotografiasoportesflexibles (idfotografia, idsoporteflexible) " .
            "Values ('$idFichaFoto', " . $soportesFlexibles[$i]["id"] . ")";
            $con->query($sql);
        }

        for ($i = 0; $i < sizeof($soportesRigidos); $i++) {
            $sql = "Insert Into fotografiasoportesrigidos (idfotografia, idsoporterigido) " .
            "Values ('$idFichaFoto', " . $soportesRigidos[$i]["id"] . ")";
            $con->query($sql);
        }
        
        for ($i = 0; $i < sizeof($generos); $i++) {
            $sql = "Insert Into fotografiageneros (idfotografia, idgenero) " .
            "Values ('$idFichaFoto', " . $generos[$i]["id"] . ")";
            $con->query($sql);
        }
        

        //echo $idFichaFoto;
        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>