-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2016 a las 04:53:07
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wedding`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BorrarInvitado`(IN `ddn` INT(20))
    NO SQL
delete from invitado where dni=ddn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarCliente`(IN `usu` VARCHAR(50), IN `clav` VARCHAR(50), IN `nom` VARCHAR(50), IN `tel` INT(20), IN `emm` VARCHAR(50), IN `prov` VARCHAR(50), IN `dir` VARCHAR(50), IN `loc` VARCHAR(50))
    NO SQL
insert into cliente(usuario,clave,nombre,telefono,email,provincia,direccion,localidad) values(usu,clav,nom,tel,emm,prov,dir,loc)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarInvitado`(IN `usu` VARCHAR(50), IN `ddn` INT(10), IN `nomm` VARCHAR(50), IN `parr` VARCHAR(50), IN `nm` VARCHAR(5))
    NO SQL
insert into invitado(user,dni,nomyape,pariente,nromesa) values(usu,ddn,nomm,parr,nm)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ModificarInvitado`(IN `ddn` INT(10), IN `nya` VARCHAR(50), IN `paa` VARCHAR(50), IN `nrme` VARCHAR(20))
    NO SQL
UPDATE invitado set nomyape=nya, pariente=paa, nromesa=nrme WHERE dni=ddn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `retornoID`(IN `usu` VARCHAR(50))
    NO SQL
select id from cliente where usuario=usu$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerInvitados`(IN `usu` VARCHAR(50))
    NO SQL
select dni,nomyape,pariente,nromesa from invitado where user=usu$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TraerInvitadosDNI`(IN `ddn` INT(10))
    NO SQL
SELECT dni, nomyape, pariente, nromesa from invitado where dni=ddn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `validarCliente`(IN `usu` VARCHAR(50), IN `clav` VARCHAR(50))
    NO SQL
select usuario, clave from cliente where usuario=usu and clave=clav$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `validarRegistro`(IN `usu` VARCHAR(50))
    NO SQL
select usuario from cliente where usuario=usu$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` int(20) NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `localidad` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `usuario`, `clave`, `nombre`, `telefono`, `email`, `provincia`, `direccion`, `localidad`) VALUES
(1, 'jenn', '1234', 'jja', 12345678, 'j@j.com', NULL, NULL, NULL),
(2, 'lala', '12', 'lala', 123456, 'l@l.com', 'Buenos Aires', 'Alsina 600', 'Avellaneda'),
(3, 'p123', '345', 'pepe p', 74125896, 'pepe@pee.com', 'Buenos Aires', 'Andres Baranda 200', 'Quilmes'),
(4, 'aa', 'aa1234', 'ameba b', 4567321, 'am@laala.com', 'Buenos Aires', 'Juncal 2020', 'Capital Federal'),
(5, 'pepita12', 'lala12', 'pepita pink', 45612389, 'pep@p.com', 'Buenos Aires', 'Avenida Paseo colon 645', 'Capital Federal'),
(6, 'mia_lu', 'c632a6e0a5238669aa0a4cc8ce56944e', 'mia mlq', 34560765, 'mm@m.com', 'Buenos Aires', 'Avenida Santa Fe 3002', 'Capital Federal'),
(7, 'lilo', '81dc9bdb52d04dc20036dbd8313ed055', 'lilo y s', 78912356, 'lilo@l.com', 'null', '', ''),
(9, 'jj', '81dc9bdb52d04dc20036dbd8313ed055', 'JJ', 12345678, 'killingsicname@gmail.com', 'Buenos Aires', 'Avenida Bartolome Mitre 3800', 'Sarandi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitado`
--

CREATE TABLE IF NOT EXISTS `invitado` (
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'usuario del cliente',
  `dni` int(10) NOT NULL COMMENT 'dni para identificar a los invitados',
  `nomyape` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `pariente` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nromesa` varchar(5) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `invitado`
--

INSERT INTO `invitado` (`user`, `dni`, `nomyape`, `pariente`, `nromesa`) VALUES
('jj', 30000151, 'leia', 'cuniado-a', 'm2'),
('mia_lu', 1000054, 'pepi', 'tio-a', 'm3'),
('mia_lu', 1000083, 'pepe pe', 'tio-a', 'm2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `invitado`
--
ALTER TABLE `invitado`
  ADD PRIMARY KEY (`user`,`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
