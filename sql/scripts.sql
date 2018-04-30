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
