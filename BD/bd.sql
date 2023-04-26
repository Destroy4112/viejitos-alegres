-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.27-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla bancoa.beneficiarios
CREATE TABLE IF NOT EXISTS `beneficiarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `cedula` varchar(15) DEFAULT NULL,
  `fechaNa` varchar(20) DEFAULT NULL,
  `fechaExp` varchar(20) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `barrio` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `puntajeSis` varchar(10) DEFAULT NULL,
  `edad` varchar(10) DEFAULT NULL,
  `sede` varchar(50) DEFAULT NULL,
  `estadoVuln` varchar(50) DEFAULT NULL,
  `eps` varchar(500) DEFAULT NULL,
  `observaciones` varchar(500) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bancoa.beneficiarios: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bancoa.eps
CREATE TABLE IF NOT EXISTS `eps` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bancoa.eps: ~7 rows (aproximadamente)
INSERT INTO `eps` (`Id`, `Nombre`) VALUES
	(1, 'NUEVA EPS'),
	(2, 'MUTUAL SER'),
	(3, 'CAFAM'),
	(4, 'CAJACOPI'),
	(5, 'FAMISANAR'),
	(6, 'SANITAS'),
	(7, 'SANIDAD');

-- Volcando estructura para tabla bancoa.estadovul
CREATE TABLE IF NOT EXISTS `estadovul` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bancoa.estadovul: ~4 rows (aproximadamente)
INSERT INTO `estadovul` (`Id`, `Nombre`) VALUES
	(1, 'INDIGENA'),
	(2, 'AFROCOLOMBIANO'),
	(3, 'DESPLAZADO'),
	(4, 'RAIZAL');

-- Volcando estructura para tabla bancoa.inactivos
CREATE TABLE IF NOT EXISTS `inactivos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `cedula` int(12) DEFAULT NULL,
  `fechaNa` varchar(50) DEFAULT NULL,
  `fechaExp` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `barrio` varchar(50) DEFAULT NULL,
  `telefono` int(10) unsigned zerofill DEFAULT NULL,
  `puntajeSis` int(11) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sede` varchar(50) DEFAULT NULL,
  `estadoVuln` varchar(50) DEFAULT NULL,
  `eps` varchar(50) DEFAULT NULL,
  `observaciones` varchar(500) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bancoa.inactivos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bancoa.sede
CREATE TABLE IF NOT EXISTS `sede` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bancoa.sede: ~6 rows (aproximadamente)
INSERT INTO `sede` (`Id`, `Nombre`) VALUES
	(1, 'ATLANTICO'),
	(2, 'BOLIVAR'),
	(3, 'CESAR'),
	(4, 'CORDOBA'),
	(5, 'MAGDALENA'),
	(6, 'SUCRE');

-- Volcando estructura para tabla bancoa.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `Clave` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla bancoa.usuarios: ~1 rows (aproximadamente)
INSERT INTO `usuarios` (`Id`, `Nombre`, `Usuario`, `Clave`) VALUES
	(1, 'Juan Felipe', 'JuanFe', 'aDBLaTJCNzJEam0zV090K3ZrcVlkdz09');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
