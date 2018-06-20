<?php
    try
    {
        require_once('connection.php');
        
        $idInstitucion = $_POST["idInstitucion"];
        $idPublicacion = $_POST["idPublicacion"];
        $numeroRegistroInterno = $_POST["numeroRegistroInterno"];
        $numeroInventario = $_POST["numeroInventario"];
        $numeroEdicion = $_POST["numeroEdicion"];
        $numeroPublicacion = $_POST["numeroPublicacion"];
        $numeroTotalPaginas = $_POST["numeroTotalPaginas"];
        $fechaPublicacion = $_POST["fechaPublicacion"];
        $tituloSeccion = $_POST["tituloSeccion"];
        $numeroPaginaEncuentra = $_POST["numeroPaginaEncuentra"];
        $numeroColumnas = $_POST["numeroColumnas"];
        $hallazgo = $_POST["hallazgo"];
        $idPeriodicidad = $_POST["idPeriodicidad"];
        $issn = $_POST["issn"];
        $idAlbum = $_POST["idAlbum"];
        $anotaciones = $_POST["anotaciones"];
        $contextoHistorico = $_POST["contextoHistorico"];
        $estadoConservacion = $_POST["estadoConservacion"];
        $estadoIntegridad = $_POST["estadoIntegridad"];
        $arrugas = $_POST["arrugas"];
        $ataqueBiologico = $_POST["ataqueBiologico"];
        $cintasAdhesivas = $_POST["cintasAdhesivas"];
        $deformaciones = $_POST["deformaciones"];
        $deshojado = $_POST["deshojado"];
        $etiquetas = $_POST["etiquetas"];
        $huellasDigitales = $_POST["huellasDigitales"];
        $hongos = $_POST["hongos"];
        $manchas = $_POST["manchas"];
        $rasgaduras = $_POST["rasgaduras"];
        $ralladuras = $_POST["ralladuras"];
        $retocado = $_POST["retocado"];
        $roturas = $_POST["roturas"];
        $sellosTinta = $_POST["sellosTinta"];
        $alto = $_POST["alto"];
        $ancho = $_POST["ancho"];
        $profundidad = $_POST["profundidad"];
        $otros = $_POST["otros"];
        $numeroFragmentos = $_POST["numeroFragmentos"];
        $pieImprenta = $_POST["pieImprenta"];
        $inspeccionesOMarcas = $_POST["inspeccionesOMarcas"];
        $caracteristicas = $_POST["caracteristicas"];
        $idPersonaCaptura = $_POST["idPersonaCaptura"];
        $fechaCaptura = $_POST["fechaCaptura"];
        $estado = $_POST["estado"]; 
        $autores = (isset($_POST["autores"]) ? $_POST["autores"] : []);
        $temas = (isset($_POST["temas"]) ? $_POST["temas"] : []);
        $generosPeriodisticos = (isset($_POST["generosPeriodisticos"]) ? $_POST["generosPeriodisticos"] : []);
        $generosLiterarios = (isset($_POST["generosLiterarios"]) ? $_POST["generosLiterarios"] : []);
        $tiposEncuadernacion = (isset($_POST["tiposEncuadernacion"]) ? $_POST["tiposEncuadernacion"] : []);
        $tecnicasImpresion = (isset($_POST["tecnicasImpresion"]) ? $_POST["tecnicasImpresion"] : []);
        $tiposPapel = (isset($_POST["tiposPapel"]) ? $_POST["tiposPapel"] : []);

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "INSERT INTO fichaspublicacion
        (idinstitucion, idpublicacion, numeroregistrointerno, numeroinventario, numeroedicion, numeropublicacion, numerototalpaginas,
        fechapublicacion, idalbum, tituloseccion, numeropaginaencuentra, numerocolumnas, hallazgo, idperiodicidad, issn, anotaciones,
        contextohistorico, estadoconservacion, estadointegridad, arrugas, ataquebiologico, cintasadhesivas, deshojado, etiquetas,
        huellasdigitales, hongos, manchas, rasgaduras, ralladuras, retocado, roturas, sellosotinta, otros, numerofragmentos, alto,
        ancho, profundidad, pieimprenta, inspeccionesomarcas, caracteristicas, idpersonacaptura, fechacaptura, estado)
        VALUES
        ($idInstitucion, $idPublicacion, '$numeroRegistroInterno', '$numeroInventario', '$numeroEdicion', '$numeroPublicacion',
        '$numeroTotalPaginas', '$fechaPublicacion', $idAlbum, '$tituloSeccion', '$numeroPaginaEncuentra', '$numeroColumnas', '$hallazgo', $idPeriodicidad,
        '$issn', '$anotaciones', '$contextoHistorico', '$estadoConservacion', '$estadoIntegridad', '$arrugas',
        '$ataqueBiologico', '$cintasAdhesivas', '$deshojado', '$etiquetas', '$huellasDigitales', '$hongos', '$manchas', '$rasgaduras',
        '$ralladuras', '$retocado', '$roturas', '$sellosTinta', '$otros', '$numeroFragmentos', '$alto', '$ancho', '$profundidad',
        '$pieImprenta', '$inspeccionesOMarcas', '$caracteristicas', $idPersonaCaptura, '$fechaCaptura', '$estado');";

        $con->query($sql);
        
        $idFichaPublicacion = $con->insert_id;
        
        for ($i = 0; $i < sizeof($autores); $i++) {
            $sql = "Insert Into publicacionautores (idpublicacion, idautor) " .
            "Values ('$idFichaPublicacion', " . $autores[$i]["id"] . ")";
            $con->query($sql);
        }
        
        for ($i = 0; $i < sizeof($temas); $i++) {
            $sql = "Insert Into publicaciontemas (idpublicacion, idtema) " .
            "Values ('$idFichaPublicacion', " . $temas[$i]["id"] . ")";
            $con->query($sql);
        }

        for ($i = 0; $i < sizeof($generosPeriodisticos); $i++) {
            $sql = "Insert Into publicaciongenerosperiodisticos (idpublicacion, idgeneroperiodistico) " .
            "Values ('$idFichaPublicacion', " . $generosPeriodisticos[$i]["id"] . ")";
            $con->query($sql);
        }        
        
        for ($i = 0; $i < sizeof($generosLiterarios); $i++) {
            $sql = "Insert Into publicaciongenerosliterarios (idpublicacion, idgeneroliterario) " .
            "Values ('$idFichaPublicacion', " . $generosLiterarios[$i]["id"] . ")";
            $con->query($sql);
        }

        for ($i = 0; $i < sizeof($tiposEncuadernacion); $i++) {
            $sql = "Insert Into publicaciontiposencuadernacion (idpublicacion, idtipoencuadernacion) " .
            "Values ('$idFichaPublicacion', " . $tiposEncuadernacion[$i]["id"] . ")";
            $con->query($sql);
        }
        
        for ($i = 0; $i < sizeof($tecnicasImpresion); $i++) {
            $sql = "Insert Into publicaciontecnicasimpresion (idpublicacion, idtecnicaimpresion) " .
            "Values ('$idFichaPublicacion', " . $tecnicasImpresion[$i]["id"] . ")";
            $con->query($sql);
        }
        
        for ($i = 0; $i < sizeof($tiposPapel); $i++) {
            $sql = "Insert Into publicaciontipospapel (idpublicacion, idtipopapel) " .
            "Values ('$idFichaPublicacion', " . $tiposPapel[$i]["id"] . ")";
            $con->query($sql);
        }

        echo $idFichaPublicacion;
        //echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>