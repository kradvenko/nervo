CREATE TABLE `ciudades` (
  `idciudad` int(11) NOT NULL AUTO_INCREMENT,
  `idpais` int(11) DEFAULT NULL,
  `idregion` int(11) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idciudad`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

CREATE TABLE `paises` (
  `idpais` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpais`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

CREATE TABLE `regiones` (
  `idregion` int(11) NOT NULL AUTO_INCREMENT,
  `idtiporegion` int(11) DEFAULT NULL,
  `idpais` int(11) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idregion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

CREATE TABLE `tiposregiones` (
  `idtiporegion` int(11) NOT NULL AUTO_INCREMENT,
  `tiporegion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idtiporegion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
<!--29/04/2018-->
CREATE TABLE `categoriasinstitucion` (
  `idcategoriainstitucion` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcategoriainstitucion`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `instituciones` (
  `idinstitucion` int(11) NOT NULL AUTO_INCREMENT,
  `nombreInstitucion` varchar(100) DEFAULT NULL,
  `sectorInstitucion` varchar(45) DEFAULT NULL,
  `tipoInstitucion` varchar(45) DEFAULT NULL,
  `sitioWeb` varchar(100) DEFAULT NULL,
  `correoElectronico` varchar(150) DEFAULT NULL,
  `telefonos` varchar(100) DEFAULT NULL,
  `extension` varchar(45) DEFAULT NULL,
  `domicilio` varchar(200) DEFAULT NULL,
  `colonia` varchar(100) DEFAULT NULL,
  `codigoPostal` varchar(45) DEFAULT NULL,
  `idpais` int(11) DEFAULT NULL,
  `idregion` int(11) DEFAULT NULL,
  `idciudad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idinstitucion`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `institucioncategorias` (
  `idinstitucioncategoria` int(11) NOT NULL AUTO_INCREMENT,
  `idinstitucion` int(11) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idinstitucioncategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
<!--07/05/2018-->
CREATE TABLE `contactos` (
  `idcontacto` int(11) NOT NULL AUTO_INCREMENT,
  `idinstitucion` varchar(45) DEFAULT NULL,
  `nombreContacto` varchar(250) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `telefonos` varchar(100) DEFAULT NULL,
  `extension` varchar(100) DEFAULT NULL,
  `correoElectronico` varchar(100) DEFAULT NULL,
  `notas` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idcontacto`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
<!--17/05/2018-->
CREATE TABLE `albumes` (
  `idalbum` int(11) NOT NULL AUTO_INCREMENT,
  `idinstitucion` int(11) DEFAULT NULL,
  `album` varchar(150) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `numerofotografias` int(11) DEFAULT NULL,
  PRIMARY KEY (`idalbum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `autores` (
  `idautor` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idautor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `estudiosfotograficos` (
  `idestudiofotografico` int(11) NOT NULL AUTO_INCREMENT,
  `estudio` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idestudiofotografico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `fotografiatemas` (
  `idfotografiatema` int(11) NOT NULL AUTO_INCREMENT,
  `idfotografia` int(11) DEFAULT NULL,
  `idtema` int(11) DEFAULT NULL,
  PRIMARY KEY (`idfotografiatema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `temas` (
  `idtema` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idtema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tecnicasfotograficas` (
  `idtecnicafotografica` int(11) NOT NULL AUTO_INCREMENT,
  `tecnica` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idtecnicafotografica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `soportesflexibles` (
  `idsoporteflexible` int(11) NOT NULL AUTO_INCREMENT,
  `soporte` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsoporteflexible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `soportesrigidos` (
  `idsoporterigido` int(11) NOT NULL AUTO_INCREMENT,
  `soporterigido` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsoporterigido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `generosfotografia` (
  `idgenerofotografia` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idgenerofotografia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
--//19/05/2018
--Notas de cambios en la base de datos
--Se ha cambiado la forma en la que funciona el guardado de
--el sitio web. Ahora se pueden tener varios sitios web y agregar
--una nota para cada sitio web
CREATE TABLE `institucionsitiosweb` (
  `idinstitucionsitioweb` int(11) NOT NULL AUTO_INCREMENT,
  `idinstitucion` int(11) DEFAULT NULL,
  `sitio` varchar(150) DEFAULT NULL,
  `notas` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idinstitucionsitioweb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `institucioncorreos` (
  `idinstitucioncorreo` int(11) NOT NULL AUTO_INCREMENT,
  `idinstitucion` int(11) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `notas` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idinstitucioncorreo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE `instituciontelefonos` (
  `idinstituciontelefono` int(11) NOT NULL AUTO_INCREMENT,
  `idinstitucion` int(11) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `extension` varchar(45) DEFAULT NULL,
  `notas` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idinstituciontelefono`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `institucionareas` (
  `idinstitucionarea` int(11) NOT NULL AUTO_INCREMENT,
  `idinstitucion` int(11) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `notas` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idinstitucionarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `contactos` (
  `idcontacto` int(11) NOT NULL AUTO_INCREMENT,
  `idinstitucion` varchar(45) DEFAULT NULL,
  `nombreContacto` varchar(250) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `telefonos` varchar(100) DEFAULT NULL,
  `extension` varchar(100) DEFAULT NULL,
  `correoElectronico` varchar(100) DEFAULT NULL,
  `notas` varchar(400) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcontacto`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `institucionpendientes` (
  `idinstitucionpendiente` int(11) NOT NULL AUTO_INCREMENT,
  `idinstitucion` int(11) DEFAULT NULL,
  `pendiente` varchar(300) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fechaInicio` varchar(45) DEFAULT NULL,
  `fechaFin` varchar(45) DEFAULT NULL,
  `resolucion` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idinstitucionpendiente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--30/05/2018
CREATE TABLE `fichasfotografia` (
  `idfichafotografia` int(11) NOT NULL AUTO_INCREMENT,
  `idinstitucion` int(11) DEFAULT NULL,
  `numeroregistrointerno` varchar(45) DEFAULT NULL,
  `numeroinventario` varchar(45) DEFAULT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `tituloserie` varchar(45) DEFAULT NULL,
  `idciudadasunto` int(11) DEFAULT NULL,
  `idciudadtoma` int(11) DEFAULT NULL,
  `fechaasunto` varchar(45) DEFAULT NULL,
  `fechatoma` varchar(45) DEFAULT NULL,
  `idestudio` int(11) DEFAULT NULL,
  `idalbum` int(11) DEFAULT NULL,
  `numerofotografia` varchar(45) DEFAULT NULL,
  `coleccion` varchar(45) DEFAULT NULL,
  `clavetecnica` varchar(45) DEFAULT NULL,
  `anotaciones` varchar(400) DEFAULT NULL,
  `estadoconservacion` varchar(45) DEFAULT NULL,
  `estadointegridad` varchar(45) DEFAULT NULL,
  `agrietamiento` varchar(5) DEFAULT NULL,
  `ataquebiologico` varchar(5) DEFAULT NULL,
  `burbujas` varchar(5) DEFAULT NULL,
  `cambioscolor` varchar(5) DEFAULT NULL,
  `craqueladuras` varchar(5) DEFAULT NULL,
  `cintasadhesivas` varchar(5) DEFAULT NULL,
  `deformaciones` varchar(5) DEFAULT NULL,
  `desprendimientos` varchar(5) DEFAULT NULL,
  `desvanecimientos` varchar(5) DEFAULT NULL,
  `huellasdigitales` varchar(5) DEFAULT NULL,
  `hongos` varchar(5) DEFAULT NULL,
  `manchas` varchar(5) DEFAULT NULL,
  `raspaduras` varchar(5) DEFAULT NULL,
  `ralladuras` varchar(5) DEFAULT NULL,
  `retocado` varchar(5) DEFAULT NULL,
  `roturas` varchar(5) DEFAULT NULL,
  `sellosotinta` varchar(5) DEFAULT NULL,
  `sulfuracion` varchar(5) DEFAULT NULL,
  `alto` varchar(45) DEFAULT NULL,
  `ancho` varchar(45) DEFAULT NULL,
  `diametro` varchar(45) DEFAULT NULL,
  `inspeccionesomarcas` varchar(400) DEFAULT NULL,
  `caracteristicas` varchar(400) DEFAULT NULL,
  `idpersonatomo` int(11) DEFAULT NULL,
  `fechatomapersona` varchar(45) DEFAULT NULL,
  `idpersonacaptura` int(11) DEFAULT NULL,
  `fechacaptura` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfichafotografia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `fotografiaautores` (
  `idfotografiaautor` int(11) NOT NULL AUTO_INCREMENT,
  `idfotografia` int(11) DEFAULT NULL,
  `idautor` int(11) DEFAULT NULL,
  PRIMARY KEY (`idfotografiaautor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `fotografiatecnica` (
  `idfotografiatecnica` int(11) NOT NULL AUTO_INCREMENT,
  `idfotografia` int(11) DEFAULT NULL,
  `idtecnica` int(11) DEFAULT NULL,
  PRIMARY KEY (`idfotografiatecnica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `fotografiasoportesflexibles` (
  `idfotografiasoporteflexible` int(11) NOT NULL AUTO_INCREMENT,
  `idfotografia` int(11) DEFAULT NULL,
  `idsoporteflexible` int(11) DEFAULT NULL,
  PRIMARY KEY (`idfotografiasoporteflexible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `fotografiasoportesrigidos` (
  `idfotografiasoporterigido` int(11) NOT NULL AUTO_INCREMENT,
  `idfotografia` int(11) DEFAULT NULL,
  `idsoporterigido` int(11) DEFAULT NULL,
  PRIMARY KEY (`idfotografiasoporterigido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `fotografiageneros` (
  `idfotografiagenero` int(11) NOT NULL AUTO_INCREMENT,
  `idfotografia` int(11) DEFAULT NULL,
  `idgenero` int(11) DEFAULT NULL,
  PRIMARY KEY (`idfotografiagenero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `fotografiapendientes` (
  `idfotografiapendiente` int(11) NOT NULL AUTO_INCREMENT,
  `idfotografia` int(11) DEFAULT NULL,
  `pendiente` varchar(300) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fechaInicio` varchar(45) DEFAULT NULL,
  `fechaFin` varchar(45) DEFAULT NULL,
  `resolucion` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idfotografiapendiente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `fotografiaimagenes` (
  `idfotografiaimagen` int(11) NOT NULL AUTO_INCREMENT,
  `idfotografia` int(11) DEFAULT NULL,
  `rutaimagen` varchar(200) DEFAULT NULL,
  `aprobada` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfotografiaimagen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--cambio tabla temas
CREATE TABLE `temas` (
  `idtema` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idtema`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
--01/06/2018
CREATE TABLE `fotografiaenlaces` (
  `idfotografiaenlace` int(11) NOT NULL AUTO_INCREMENT,
  `idfotografia` int(11) DEFAULT NULL,
  `enlace` varchar(150) DEFAULT NULL,
  `notas` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idfotografiaenlace`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--04/06/2018
--Cambio a tabla fichasfotografia
CREATE TABLE `fichasfotografia` (
  `idfichafotografia` int(11) NOT NULL AUTO_INCREMENT,
  `idinstitucion` int(11) DEFAULT NULL,
  `numeroregistrointerno` varchar(45) DEFAULT NULL,
  `numeroinventario` varchar(45) DEFAULT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `tituloserie` varchar(45) DEFAULT NULL,
  `idciudadasunto` int(11) DEFAULT NULL,
  `idciudadtoma` int(11) DEFAULT NULL,
  `fechaasunto` varchar(45) DEFAULT NULL,
  `fechatoma` varchar(45) DEFAULT NULL,
  `idestudio` int(11) DEFAULT NULL,
  `idalbum` int(11) DEFAULT NULL,
  `numerofotografia` varchar(45) DEFAULT NULL,
  `coleccion` varchar(45) DEFAULT NULL,
  `clavetecnica` varchar(45) DEFAULT NULL,
  `anotaciones` varchar(400) DEFAULT NULL,
  `estadoconservacion` varchar(45) DEFAULT NULL,
  `estadointegridad` varchar(45) DEFAULT NULL,
  `agrietamiento` varchar(5) DEFAULT NULL,
  `ataquebiologico` varchar(5) DEFAULT NULL,
  `burbujas` varchar(5) DEFAULT NULL,
  `cambioscolor` varchar(5) DEFAULT NULL,
  `craqueladuras` varchar(5) DEFAULT NULL,
  `cintasadhesivas` varchar(5) DEFAULT NULL,
  `deformaciones` varchar(5) DEFAULT NULL,
  `desprendimientos` varchar(5) DEFAULT NULL,
  `desvanecimientos` varchar(5) DEFAULT NULL,
  `huellasdigitales` varchar(5) DEFAULT NULL,
  `hongos` varchar(5) DEFAULT NULL,
  `manchas` varchar(5) DEFAULT NULL,
  `raspaduras` varchar(5) DEFAULT NULL,
  `ralladuras` varchar(5) DEFAULT NULL,
  `retocado` varchar(5) DEFAULT NULL,
  `roturas` varchar(5) DEFAULT NULL,
  `sellosotinta` varchar(5) DEFAULT NULL,
  `sulfuracion` varchar(5) DEFAULT NULL,
  `alto` varchar(45) DEFAULT NULL,
  `ancho` varchar(45) DEFAULT NULL,
  `diametro` varchar(45) DEFAULT NULL,
  `inspeccionesomarcas` varchar(400) DEFAULT NULL,
  `caracteristicas` varchar(400) DEFAULT NULL,
  `idpersonacaptura` int(11) DEFAULT NULL,
  `fechacaptura` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfichafotografia`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
--05/06/2018
CREATE TABLE `fotografiaenlacesweb` (
  `idfotografiaenlaceweb` int(11) NOT NULL AUTO_INCREMENT,
  `idfotografia` int(11) DEFAULT NULL,
  `sitio` varchar(150) DEFAULT NULL,
  `notas` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idfotografiaenlaceweb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--Cambio tabla fotografiaimagenes
  CREATE TABLE `fotografiaimagenes` (
    `idfotografiaimagen` int(11) NOT NULL AUTO_INCREMENT,
    `idfotografia` int(11) DEFAULT NULL,
    `idpersonatoma` int(11) DEFAULT NULL,
    `rutaimagen` varchar(200) DEFAULT NULL,
    `aprobada` varchar(45) DEFAULT NULL,
    `fechatoma` varchar(45) DEFAULT NULL,
    PRIMARY KEY (`idfotografiaimagen`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--08/06/2018
ALTER TABLE `acervonervo`.`albumes` 
ADD COLUMN `numeroalbum` VARCHAR(45) NULL AFTER `numerofotografias`;

ALTER TABLE `acervonervo`.`fichasfotografia` 
CHANGE COLUMN `titulo` `titulo` VARCHAR(150) NULL DEFAULT NULL ;

ALTER TABLE `acervonervo`.`fichasfotografia` 
ADD COLUMN `contextohistorico` VARCHAR(500) NULL AFTER `anotaciones`;
--09/06/2018
ALTER TABLE `albumes` 
ADD COLUMN `tipoficha` VARCHAR(45) NULL AFTER `numeroalbum`;

CREATE TABLE `publicaciones` (
  `idpublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `idpais` int(11) DEFAULT NULL,
  `idtipo` int(11) DEFAULT NULL,
  `publicacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idpublicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tipospublicacion` (
  `idtipopublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idtipopublicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `generosperiodisticos` (
  `idgeneroperiodistico` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idgeneroperiodistico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `generosliterarios` (
  `idgeneroliterario` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idgeneroliterario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `publicacionperiodicidades` (
  `idpublicacionperiodicidad` int(11) NOT NULL AUTO_INCREMENT,
  `periodicidad` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idpublicacionperiodicidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--11/06/2018
CREATE TABLE `tiposencuadernacion` (
  `idtipoencuadernacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipoencuadernacion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idtipoencuadernacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tecnicasimpresion` (
  `idtecnicaimpresion` int(11) NOT NULL AUTO_INCREMENT,
  `tecnicaimpresion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idtecnicaimpresion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tipospapel` (
  `idtipopapel` int(11) NOT NULL AUTO_INCREMENT,
  `tipopapel` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`idtipopapel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `fichaspublicacion` (
  `idfichapublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `idinstitucion` int(11) DEFAULT NULL,
  `idpublicacion` int(11) DEFAULT NULL,
  `numeroregistrointerno` varchar(45) DEFAULT NULL,
  `numeroinventario` varchar(45) DEFAULT NULL,
  `numeroedicion` varchar(45) DEFAULT NULL,
  `numeropublicacion` varchar(45) DEFAULT NULL,
  `numerototalpaginas` varchar(5) DEFAULT NULL,
  `fechapublicacion` varchar(45) DEFAULT NULL,
  `idalbum` int(11) DEFAULT NULL,
  `tituloseccion` varchar(60) DEFAULT NULL,
  `numeropaginaencuentra` varchar(45) DEFAULT NULL,
  `numerocolumnas` varchar(45) DEFAULT NULL,
  `hallazgo` varchar(4) DEFAULT NULL,
  `idperiodicidad` int(11) DEFAULT NULL,
  `issn` varchar(45) DEFAULT NULL,
  `anotaciones` varchar(400) DEFAULT NULL,
  `contextohistorico` varchar(500) DEFAULT NULL,
  `estadoconservacion` varchar(45) DEFAULT NULL,
  `estadointegridad` varchar(45) DEFAULT NULL,
  `arrugas` varchar(5) DEFAULT NULL,
  `ataquebiologico` varchar(5) DEFAULT NULL,
  `cintasadhesivas` varchar(5) DEFAULT NULL,
  `deshojado` varchar(5) DEFAULT NULL,
  `etiquetas` varchar(5) DEFAULT NULL,
  `huellasdigitales` varchar(5) DEFAULT NULL,
  `hongos` varchar(5) DEFAULT NULL,
  `manchas` varchar(5) DEFAULT NULL,
  `rasgaduras` varchar(5) DEFAULT NULL,
  `ralladuras` varchar(5) DEFAULT NULL,
  `retocado` varchar(5) DEFAULT NULL,
  `roturas` varchar(5) DEFAULT NULL,
  `sellosotinta` varchar(5) DEFAULT NULL,
  `otros` varchar(45) DEFAULT NULL,
  `numerofragmentos` varchar(5) DEFAULT NULL,
  `alto` varchar(45) DEFAULT NULL,
  `ancho` varchar(45) DEFAULT NULL,
  `profundidad` varchar(45) DEFAULT NULL,
  `pieimprenta` varchar(45) DEFAULT NULL,
  `inspeccionesomarcas` varchar(400) DEFAULT NULL,
  `caracteristicas` varchar(400) DEFAULT NULL,
  `idpersonacaptura` int(11) DEFAULT NULL,
  `fechacaptura` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfichapublicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `publicacionautores` (
  `idpublicacionautor` int(11) NOT NULL AUTO_INCREMENT,
  `idpublicacion` int(11) DEFAULT NULL,
  `idautor` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpublicacionautor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `publicaciontemas` (
  `idpublicaciontema` int(11) NOT NULL AUTO_INCREMENT,
  `idpublicacion` int(11) DEFAULT NULL,
  `idtema` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpublicaciontema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `publicaciongenerosperiodisticos` (
  `idpublicaciongeneroperiodistico` int(11) NOT NULL AUTO_INCREMENT,
  `idpublicacion` int(11) DEFAULT NULL,
  `idgeneroperiodistico` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpublicaciongeneroperiodistico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `publicaciongenerosliterarios` (
  `idpublicaciongeneroliterario` int(11) NOT NULL AUTO_INCREMENT,
  `idpublicacion` int(11) DEFAULT NULL,
  `idgeneroliterario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpublicaciongeneroliterario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `publicaciontiposencuadernacion` (
  `idpublicaciontipoencuadernacion` int(11) NOT NULL AUTO_INCREMENT,
  `idpublicacion` int(11) DEFAULT NULL,
  `idtipoencuadernacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpublicaciontipoencuadernacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `publicaciontecnicasimpresion` (
  `idpublicaciontecnicaimpresion` int(11) NOT NULL AUTO_INCREMENT,
  `idpublicacion` int(11) DEFAULT NULL,
  `idtecnicaimpresion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpublicaciontecnicaimpresion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `publicaciontipospapel` (
  `idpublicaciontipopapel` int(11) NOT NULL AUTO_INCREMENT,
  `idpublicacion` int(11) DEFAULT NULL,
  `idtipopapel` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpublicaciontipopapel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--12/06/2018
ALTER TABLE `albumes` 
ADD COLUMN `de` VARCHAR(20) NULL AFTER `tipoficha`,
ADD COLUMN `a` VARCHAR(20) NULL AFTER `de`;
