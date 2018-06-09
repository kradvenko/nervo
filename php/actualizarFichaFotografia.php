<?php
    try
    {
        require_once('connection.php');
        
        $idFichaFotografia = $_POST["idFichaFotografia"];
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

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Update fichasfotografia
                SET
                    idinstitucion = $idInstitucion,
                    numeroregistrointerno = '$numeroRegistroInterno',
                    numeroinventario = '$numeroInventario',
                    titulo = '$titulo',
                    tituloserie = '$tituloSerie',
                    idciudadasunto = $idCiudadAsunto,
                    idciudadtoma = $idCiudadToma,
                    fechaasunto = '$fechaAsunto',
                    fechatoma = '$fechaToma',
                    idestudio = $idEstudio,
                    idalbum = $idAlbum,
                    numerofotografia = '$numeroFotografia',
                    coleccion = '$coleccion',
                    clavetecnica = '$claveTecnica',
                    anotaciones = '$anotaciones',
                    contextohistorico = '$contextoHistorico',
                    estadoconservacion = '$estadoConservacion',
                    estadointegridad = '$estadoIntegridad',
                    agrietamiento = '$agrietamiento',
                    ataquebiologico = '$ataqueBiologico',
                    burbujas = '$burbujas',
                    cambioscolor = '$cambiosColor',
                    craqueladuras = '$craqueladuras',
                    cintasadhesivas = '$cintasAdhesivas',
                    deformaciones = '$deformaciones',
                    desprendimientos = '$desprendimientos',
                    desvanecimientos = '$desvanecimientos',
                    huellasdigitales = '$huellasDigitales',
                    hongos = '$hongos',
                    manchas = '$manchas',
                    raspaduras = '$raspaduras',
                    ralladuras = '$ralladuras',
                    retocado = '$retocado',
                    roturas = '$roturas',
                    sellosotinta = '$sellosTinta',
                    sulfuracion = '$sulfuracion',
                    alto = '$alto',
                    ancho = '$ancho',
                    diametro = '$diametro',
                    inspeccionesomarcas = '$inspeccionesOMarcas',
                    caracteristicas = '$caracteristicas',                
                    estado = '$estado'
                    WHERE idfichafotografia = $idFichaFotografia";

        $con->query($sql);

        $sql = "Delete From fotografiaautores Where idfotografia = $idFichaFotografia";
        $con->query($sql);
        
        for ($i = 0; $i < sizeof($autores); $i++) {
            $sql = "Insert Into fotografiaautores (idfotografia, idautor) " .
            "Values ('$idFichaFotografia', " . $autores[$i]["id"] . ")";
            $con->query($sql);
        }
        
        $sql = "Delete From fotografiatemas Where idfotografia = $idFichaFotografia";
        $con->query($sql);

        for ($i = 0; $i < sizeof($temas); $i++) {
            $sql = "Insert Into fotografiatemas (idfotografia, idtema) " .
            "Values ('$idFichaFotografia', " . $temas[$i]["id"] . ")";
            $con->query($sql);
        }

        $sql = "Delete From fotografiatecnica Where idfotografia = $idFichaFotografia";
        $con->query($sql);

        for ($i = 0; $i < sizeof($tecnicas); $i++) {
            $sql = "Insert Into fotografiatecnica (idfotografia, idtecnica) " .
            "Values ('$idFichaFotografia', " . $tecnicas[$i]["id"] . ")";
            $con->query($sql);
        }

        $sql = "Delete From fotografiasoportesflexibles Where idfotografia = $idFichaFotografia";
        $con->query($sql);
        
        for ($i = 0; $i < sizeof($soportesFlexibles); $i++) {
            $sql = "Insert Into fotografiasoportesflexibles (idfotografia, idsoporteflexible) " .
            "Values ('$idFichaFotografia', " . $soportesFlexibles[$i]["id"] . ")";
            $con->query($sql);
        }

        $sql = "Delete From fotografiasoportesrigidos Where idfotografia = $idFichaFotografia";
        $con->query($sql);

        for ($i = 0; $i < sizeof($soportesRigidos); $i++) {
            $sql = "Insert Into fotografiasoportesrigidos (idfotografia, idsoporterigido) " .
            "Values ('$idFichaFotografia', " . $soportesRigidos[$i]["id"] . ")";
            $con->query($sql);
        }

        $sql = "Delete From fotografiageneros Where idfotografia = $idFichaFotografia";
        $con->query($sql);
        
        for ($i = 0; $i < sizeof($generos); $i++) {
            $sql = "Insert Into fotografiageneros (idfotografia, idgenero) " .
            "Values ('$idFichaFotografia', " . $generos[$i]["id"] . ")";
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