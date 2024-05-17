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

        $sql = "Select fichaspublicacion.*, instituciones.nombreInstitucion,
                P.idpublicacionperiodicidad, P.periodicidad, Concat(Pu.publicacion,' - ', Pa.pais) As publicacion,
                albumes.album, C.nombre
                From fichaspublicacion
                Left Join instituciones
                On fichaspublicacion.idinstitucion = instituciones.idinstitucion
                Left Join publicaciones Pu
                On Pu.idpublicacion = fichaspublicacion.idpublicacion
                Left Join publicacionperiodicidades P
                On P.idpublicacionperiodicidad = fichaspublicacion.idperiodicidad
                Left Join paises Pa
                On Pa.idpais = Pu.idpais
                Left Join albumes
                On fichaspublicacion.idalbum = albumes.idalbum
                Left Join usuarios C
                On fichaspublicacion.idpersonacaptura = C.idusuario
                Where fichaspublicacion.idfichapublicacion = $idFichaPublicacion";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<idfichapublicacion>" . $row['idfichapublicacion'] . "</idfichapublicacion>\n";
            echo "<idinstitucion>" . $row['idinstitucion'] . "</idinstitucion>\n";
            echo "<idpublicacion>" . $row['idpublicacion'] . "</idpublicacion>\n";
            echo "<publicacion>" . utf8_decode($row['publicacion']) . "</publicacion>\n";
            echo "<numeroregistrointerno>" . $row['numeroregistrointerno'] . "</numeroregistrointerno>\n";
            echo "<numeroinventario>" . $row['numeroinventario'] . "</numeroinventario>\n";
            echo "<numeroedicion>" . $row['numeroedicion'] . "</numeroedicion>\n";
            echo "<numeropublicacion>" . $row['numeropublicacion'] . "</numeropublicacion>\n";
            echo "<numerototalpaginas>" . $row['numerototalpaginas'] . "</numerototalpaginas>\n";
            echo "<fechapublicacion>" . $row['fechapublicacion'] . "</fechapublicacion>\n";
            echo "<idalbum>" . $row['idalbum'] . "</idalbum>\n";
            echo "<tituloseccion>" . utf8_decode($row['tituloseccion']) . "</tituloseccion>\n";
            echo "<numeropaginaencuentra>" . $row['numeropaginaencuentra'] . "</numeropaginaencuentra>\n";
            echo "<numerocolumnas>" . $row['numerocolumnas'] . "</numerocolumnas>\n";
            echo "<hallazgo>" . utf8_decode($row['hallazgo']) . "</hallazgo>\n";
            echo "<idperiodicidad>" . $row['idperiodicidad'] . "</idperiodicidad>\n";
            echo "<periodicidad>" . $row['periodicidad'] . "</periodicidad>\n";
            echo "<issn>" . $row['issn'] . "</issn>\n";
            echo "<anotaciones>" . $row['anotaciones'] . "</anotaciones>\n";
            echo "<contextohistorico>" . $row['contextohistorico'] . "</contextohistorico>\n";
            echo "<estadoconservacion>" . $row['estadoconservacion'] . "</estadoconservacion>\n";
            echo "<estadointegridad>" . $row['estadointegridad'] . "</estadointegridad>\n";
            echo "<arrugas>" . $row['arrugas'] . "</arrugas>\n";
            echo "<ataquebiologico>" . $row['ataquebiologico'] . "</ataquebiologico>\n";
            echo "<cintasadhesivas>" . $row['cintasadhesivas'] . "</cintasadhesivas>\n";
            echo "<deformaciones>" . $row['deformaciones'] . "</deformaciones>\n";
            echo "<deshojado>" . $row['deshojado'] . "</deshojado>\n";
            echo "<etiquetas>" . $row['etiquetas'] . "</etiquetas>\n";
            echo "<huellasdigitales>" . $row['huellasdigitales'] . "</huellasdigitales>\n";
            echo "<hongos>" . $row['hongos'] . "</hongos>\n";
            echo "<manchas>" . $row['manchas'] . "</manchas>\n";
            echo "<rasgaduras>" . $row['rasgaduras'] . "</rasgaduras>\n";
            echo "<ralladuras>" . $row['ralladuras'] . "</ralladuras>\n";
            echo "<retocado>" . $row['retocado'] . "</retocado>\n";
            echo "<roturas>" . $row['roturas'] . "</roturas>\n";
            echo "<sellosotinta>" . $row['sellosotinta'] . "</sellosotinta>\n";
            echo "<alto>" . $row['alto'] . "</alto>\n";
            echo "<ancho>" . $row['ancho'] . "</ancho>\n";
            echo "<profundidad>" . $row['profundidad'] . "</profundidad>\n";
            echo "<otros>" . $row['otros'] . "</otros>\n";
            echo "<pieimprenta>" . $row['pieimprenta'] . "</pieimprenta>\n";
            echo "<numerofragmentos>" . $row['numerofragmentos'] . "</numerofragmentos>\n";
            echo "<inspeccionesomarcas>" . $row['inspeccionesomarcas'] . "</inspeccionesomarcas>\n";
            echo "<caracteristicas>" . $row['caracteristicas'] . "</caracteristicas>\n";
            echo "<idpersonacaptura>" . $row['idpersonacaptura'] . "</idpersonacaptura>\n";
            echo "<fechacaptura>" . $row['fechacaptura'] . "</fechacaptura>\n";
            echo "<estado>" . $row['estado'] . "</estado>\n";
            echo "<nombreInstitucion>" . $row['nombreInstitucion'] . "</nombreInstitucion>\n";
            echo "<album>" . $row['album'] . "</album>\n";
            echo "<nombre>" . $row['nombre'] . "</nombre>\n";
        }

        echo "</resultado>\n";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>