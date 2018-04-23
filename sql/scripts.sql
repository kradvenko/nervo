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

