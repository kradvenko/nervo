<?php
    try
    {
        require_once('connection.php');
        
        $idInstitucion = $_POST["idInstitucion"];
        $numeroRegistroInterno = $_POST["numeroRegistroInterno"];
        $numeroInventario = $_POST["numeroInventario"];
        $tituloPublicacion = $_POST["tituloPublicacion"];
        $subtitulo = $_POST["subTitulo"];
        $imprenta = $_POST["imprenta"];
        $prologo = $_POST["prologo"];
        $compiladores = $_POST["compiladores"];
        $editorial = $_POST["editorial"];
        $lugarEdicion = $_POST["lugarEdicion"];
        $idioma = $_POST["idioma"];
        $fechaEdicion = $_POST["fechaEdicion"];
        $fechaImpresion = $_POST["fechaImpresion"];
        $fechaReimpresion = $_POST["fechaReimpresion"];
        $isbn = $_POST["isbn"];
        $volumen = $_POST["volumen"];
        $tomo = $_POST["tomo"];
        $tiraje = $_POST["tiraje"];
        $ejemplares = $_POST["ejemplares"];
        $ciudad = $_POST["ciudad"];
        $coleccion = $_POST["coleccion"];
        $numeroTotalColeccion = $_POST["numeroTotalColeccion"];
        $anotaciones = $_POST["anotaciones"];
        $contextoHistorico = $_POST["contextoHistorico"];
        $estadoConservacion = $_POST["estadoConservacion"];
        $estadoIntegridad = $_POST["estadoIntegridad"];        
        $idPersonaCaptura = $_POST["idPersonaCaptura"];
        $fechaCaptura = $_POST["fechaCaptura"];
        $estado = $_POST["estado"]; 
        $autores = (isset($_POST["autores"]) ? $_POST["autores"] : []);
        $ilustradores = (isset($_POST["ilustradores"]) ? $_POST["ilustradores"] : []);
        $temas = (isset($_POST["temas"]) ? $_POST["temas"] : []);
        $generosLiterarios = (isset($_POST["generosLiterarios"]) ? $_POST["generosLiterarios"] : []);
        $tiposEncuadernacion = (isset($_POST["tiposEncuadernacion"]) ? $_POST["tiposEncuadernacion"] : []);
        $tecnicasImpresion = (isset($_POST["tecnicasImpresion"]) ? $_POST["tecnicasImpresion"] : []);
        $tiposPapel = (isset($_POST["tiposPapel"]) ? $_POST["tiposPapel"] : []);

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "INSERT INTO fichaslibro
        (idinstitucion, numeroregistrointerno, numeroinventario, titulo, subtitulo, imprenta, prologo, compiladores, editorial,
        lugaredicion, ididioma, fechaedicion, fechaimpresion, fechareimpresion, isbn, volumen, tomo, tiraje, ejemplares, ciudad,
        coleccion, numerototalcoleccion, anotaciones, contextohistorico, estadoconservacion, estadointegridad, idpersonacaptura,
        fechacaptura, estado)
        VALUES
        ($idInstitucion, '$numeroRegistroInterno', '$numeroInventario', '$tituloPublicacion', '$subtitulo', '$imprenta', '$prologo', 
        '$compiladores', '$editorial', '$lugarEdicion', '$idioma', '$fechaEdicion', '$fechaImpresion', '$fechaReimpresion',
        '$isbn', '$volumen', '$tomo', '$tiraje', '$ejemplares', '$ciudad', '$coleccion', '$numeroTotalColeccion', '$anotaciones',
        '$contextoHistorico', '$estadoConservacion', '$estadoIntegridad', '$idPersonaCaptura', '$fechaCaptura', '$estado')";

        $con->query($sql);

        $idFichaLibro = $con->insert_id;
        
        for ($i = 0; $i < sizeof($autores); $i++) {
            $sql = "Insert Into libroautores (idlibro, idautor) " .
            "Values ('$idFichaLibro', " . $autores[$i]["id"] . ")";
            $con->query($sql);
        }

        for ($i = 0; $i < sizeof($ilustradores); $i++) {
            $sql = "Insert Into libroilustradores (idlibro, idautor) " .
            "Values ('$idFichaLibro', " . $ilustradores[$i]["id"] . ")";
            $con->query($sql);
        }
        
        for ($i = 0; $i < sizeof($temas); $i++) {
            $sql = "Insert Into librotemas (idlibro, idtema) " .
            "Values ('$idFichaLibro', " . $temas[$i]["id"] . ")";
            $con->query($sql);
        }
        
        for ($i = 0; $i < sizeof($generosLiterarios); $i++) {
            $sql = "Insert Into librogenerosliterarios (idlibro, idgeneroliterario) " .
            "Values ('$idFichaLibro', " . $generosLiterarios[$i]["id"] . ")";
            $con->query($sql);
        }

        for ($i = 0; $i < sizeof($tiposEncuadernacion); $i++) {
            $sql = "Insert Into librotiposencuadernacion (idlibro, idtipoencuadernacion) " .
            "Values ('$idFichaLibro', " . $tiposEncuadernacion[$i]["id"] . ")";
            $con->query($sql);
        }
        
        for ($i = 0; $i < sizeof($tecnicasImpresion); $i++) {
            $sql = "Insert Into librotecnicasimpresion (idlibro, idtecnicaimpresion) " .
            "Values ('$idFichaLibro', " . $tecnicasImpresion[$i]["id"] . ")";
            $con->query($sql);
        }
        
        for ($i = 0; $i < sizeof($tiposPapel); $i++) {
            $sql = "Insert Into librotipospapel (idlibro, idtipopapel) " .
            "Values ('$idFichaLibro', " . $tiposPapel[$i]["id"] . ")";
            $con->query($sql);
        }

        echo $idFichaLibro;
        //echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>