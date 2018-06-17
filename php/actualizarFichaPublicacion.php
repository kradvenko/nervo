<?php
    try
    {
        require_once('connection.php');
        
        $idFichaPublicacion = $_POST["idFichaPublicacion"];
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

        $sql = "UPDATE fichaspublicacion
                SET
                    idinstitucion = $idInstitucion,
                    idpublicacion = $idPublicacion,
                    numeroregistrointerno = '$numeroRegistroInterno',
                    numeroinventario = '$numeroInventario',
                    numeroedicion = '$numeroEdicion',
                    numeropublicacion = '$numeroPublicacion',
                    numerototalpaginas = '$numeroTotalPaginas',
                    fechapublicacion = '$fechaPublicacion',
                    idalbum = $idAlbum,
                    tituloseccion = '$tituloSeccion',
                    numeropaginaencuentra = '$numeroPaginaEncuentra',
                    numerocolumnas = '$numeroColumnas',
                    hallazgo = '$hallazgo',
                    idperiodicidad = $idPeriodicidad,
                    issn = '$issn',
                    anotaciones = '$anotaciones',
                    contextohistorico = '$contextoHistorico',
                    estadoconservacion = '$estadoConservacion',
                    estadointegridad = '$estadoIntegridad',
                    arrugas = '$arrugas',
                    ataquebiologico = '$ataqueBiologico',
                    cintasadhesivas = '$cintasAdhesivas',
                    deformaciones = '$deformaciones',
                    deshojado = '$deshojado',
                    etiquetas = '$etiquetas',
                    huellasdigitales = '$huellasDigitales',
                    hongos = '$hongos',
                    manchas = '$manchas',
                    rasgaduras = '$rasgaduras',
                    ralladuras = '$ralladuras',
                    retocado = '$retocado',
                    roturas = '$roturas',
                    sellosotinta = '$sellosTinta',
                    otros = '$otros',
                    numerofragmentos = '$numeroFragmentos',
                    alto = '$alto',
                    ancho = '$ancho',
                    profundidad = '$profundidad',
                    pieimprenta = '$pieImprenta',
                    inspeccionesomarcas = '$inspeccionesOMarcas',
                    caracteristicas = '$caracteristicas',
                    idpersonacaptura = $idPersonaCaptura,
                    fechacaptura = '$fechaCaptura',
                    estado = '$estado'
                WHERE idfichapublicacion = $idFichaPublicacion";

        $con->query($sql);

        $sql = "Delete From publicacionautores Where idpublicacion = $idFichaPublicacion";
        $con->query($sql);
        
        for ($i = 0; $i < sizeof($autores); $i++) {
            $sql = "Insert Into publicacionautores (idpublicacion, idautor) " .
            "Values ('$idFichaPublicacion', " . $autores[$i]["id"] . ")";
            $con->query($sql);
        }
        
        $sql = "Delete From publicaciontemas Where idpublicacion = $idFichaPublicacion";
        $con->query($sql);

        for ($i = 0; $i < sizeof($temas); $i++) {
            $sql = "Insert Into publicaciontemas (idpublicacion, idtema) " .
            "Values ('$idFichaPublicacion', " . $temas[$i]["id"] . ")";
            $con->query($sql);
        }

        $sql = "Delete From publicaciongenerosperiodisticos Where idpublicacion = $idFichaPublicacion";
        $con->query($sql);

        for ($i = 0; $i < sizeof($generosPeriodisticos); $i++) {
            $sql = "Insert Into publicaciongenerosperiodisticos (idpublicacion, idgeneroperiodistico) " .
            "Values ('$idFichaPublicacion', " . $generosPeriodisticos[$i]["id"] . ")";
            $con->query($sql);
        }

        $sql = "Delete From publicaciongenerosliterarios Where idpublicacion = $idFichaPublicacion";
        $con->query($sql);
        
        for ($i = 0; $i < sizeof($generosLiterarios); $i++) {
            $sql = "Insert Into publicaciongenerosliterarios (idpublicacion, idgeneroliterario) " .
            "Values ('$idFichaPublicacion', " . $generosLiterarios[$i]["id"] . ")";
            $con->query($sql);
        }

        $sql = "Delete From publicaciontiposencuadernacion Where idpublicacion = $idFichaPublicacion";
        $con->query($sql);

        for ($i = 0; $i < sizeof($tiposEncuadernacion); $i++) {
            $sql = "Insert Into publicaciontiposencuadernacion (idpublicacion, idtipoencuadernacion) " .
            "Values ('$idFichaPublicacion', " . $tiposEncuadernacion[$i]["id"] . ")";
            $con->query($sql);
        }

        $sql = "Delete From publicaciontecnicasimpresion Where idpublicacion = $idFichaPublicacion";
        $con->query($sql);
        
        for ($i = 0; $i < sizeof($tecnicasImpresion); $i++) {
            $sql = "Insert Into publicaciontecnicasimpresion (idpublicacion, idtecnicaimpresion) " .
            "Values ('$idFichaPublicacion', " . $tecnicasImpresion[$i]["id"] . ")";
            $con->query($sql);
        }

        $sql = "Delete From publicaciontipospapel Where idpublicacion = $idFichaPublicacion";
        $con->query($sql);
        
        for ($i = 0; $i < sizeof($tiposPapel); $i++) {
            $sql = "Insert Into publicaciontipospapel (idpublicacion, idtipopapel) " .
            "Values ('$idFichaPublicacion', " . $tiposPapel[$i]["id"] . ")";
            $con->query($sql);
        }

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>