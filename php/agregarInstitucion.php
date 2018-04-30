<?php
    try
    {
        require_once('connection.php');
        
        $nombreInstitucion = $_POST["nombreInstitucion"];
        $sectorInstitucion = $_POST["sectorInstitucion"];
        $tipoInstitucion = $_POST["tipoInstitucion"];
        $sitioWeb = $_POST["sitioWeb"];
        $correoElectronico = $_POST["correoElectronico"];
        $telefonos = $_POST["telefonos"];
        $extension = $_POST["extension"];
        $domicilio = $_POST["domicilio"];
        $colonia = $_POST["colonia"];
        $codigoPostal = $_POST["codigoPostal"];
        $idpais = $_POST["idPais"];
        $idregion = $_POST["idRegion"];
        $idciudad = $_POST["idCiudad"];
        $categorias = $_POST["categorias"];

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into instituciones (nombreInstitucion, sectorInstitucion, tipoInstitucion, sitioWeb, correoElectronico, telefonos, extension, domicilio, colonia, codigoPostal, idpais, idregion, idciudad) " . 
        " Values ('$nombreInstitucion', '$sectorInstitucion', '$tipoInstitucion', '$sitioWeb', '$correoElectronico', '$telefonos', '$extension', '$domicilio', '$colonia', '$codigoPostal', '$idpais', '$idregion', '$idciudad')";

        $con->query($sql);

        $idInstitucion = $con->insert_id;

        for ($i = 0; $i < sizeof($categorias); $i++) {
            $sql = "Insert Into institucioncategorias (idinstitucion, idcategoria, categoria) " .
            "Values ('$idInstitucion', " . $categorias[$i]["id"] . ", '" . $categorias[$i]["categoria"] . "')";

            $con->query($sql);
        }

        echo $idInstitucion . " " . $sql;

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>