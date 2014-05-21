-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-05-2014 a las 18:36:51
-- Versión del servidor: 5.5.37
-- Versión de PHP: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bonavall`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancdeltemps`
--

CREATE TABLE IF NOT EXISTS `bancdeltemps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `saldo_minim` int(11) NOT NULL,
  `temps_inactivitat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom_UNIQUE` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `bancdeltemps`
--

INSERT INTO `bancdeltemps` (`id`, `nom`, `saldo_minim`, `temps_inactivitat`) VALUES
(1, 'Banc del Temps', 100, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estat_servei`
--

CREATE TABLE IF NOT EXISTS `estat_servei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcio` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `estat_servei`
--

INSERT INTO `estat_servei` (`id`, `descripcio`) VALUES
(1, 'Actiu'),
(2, 'Innactiu'),
(3, 'Congelat'),
(4, 'Pendent de revisio'),
(5, 'Bannejat');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EvaluacioServei`
--

CREATE TABLE IF NOT EXISTS `EvaluacioServei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuari_id` int(11) DEFAULT NULL,
  `serveis_id` int(11) DEFAULT NULL,
  `serveis_tipus_servei_id` int(11) NOT NULL,
  `serveis_estat_servei_id` int(11) NOT NULL,
  `valoracioServei` int(11) NOT NULL,
  `Comentari` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuari_has_serveis_serveis2` (`serveis_id`,`serveis_tipus_servei_id`,`serveis_estat_servei_id`),
  KEY `fk_usuari_has_serveis_usuari2` (`usuari_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `missatges`
--

CREATE TABLE IF NOT EXISTS `missatges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `missatge` text COLLATE utf8_spanish_ci NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `autor` int(11) NOT NULL,
  `Solicituts_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_missatges_Solicituts1` (`Solicituts_id`),
  KEY `autor` (`autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `missatges`
--

INSERT INTO `missatges` (`id`, `missatge`, `data`, `hora`, `autor`, `Solicituts_id`) VALUES
(7, 'srthsrthsrth', '2009-01-01', '00:00:00', 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Persona`
--

CREATE TABLE IF NOT EXISTS `Persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salt` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `actiu` tinyint(1) NOT NULL,
  `discr` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nom` varchar(55) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cognom` varchar(55) COLLATE utf8_spanish_ci DEFAULT NULL,
  `adreca` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefon` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fotografia` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `presentacio` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `punts` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `Persona`
--

INSERT INTO `Persona` (`id`, `salt`, `email`, `password`, `actiu`, `discr`, `nom`, `cognom`, `adreca`, `telefon`, `fotografia`, `presentacio`, `punts`) VALUES
(1, NULL, 'carles.puerto@gmail.com', 'carlespass', 1, 'persona', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'e2a11a29e8e9ce3fd09643b2f363beb8', 'rita@rita.com', 'rita', 1, 'persona', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'ebeef9d36da7a4566aaa0eaeaf87dd13', 'argagr', 'agraeg', 0, 'usuari', 'aegraeg', 'agage', 'aregag', 'aegraegr', 'argaegr', 'aregagr', 5),
(5, NULL, 'admin@admin.com', 'admin', 0, 'persona', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_rol`
--

CREATE TABLE IF NOT EXISTS `persona_rol` (
  `persona_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  PRIMARY KEY (`persona_id`,`rol_id`),
  KEY `IDX_D7C9A401F5F88DB9` (`persona_id`),
  KEY `IDX_D7C9A4014BAB96C` (`rol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona_rol`
--

INSERT INTO `persona_rol` (`persona_id`, `rol_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nom`) VALUES
(1, 'ROLE_USER'),
(2, 'ROLE_ADMIN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serveis`
--

CREATE TABLE IF NOT EXISTS `serveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDonant` int(11) NOT NULL,
  `punts` int(11) NOT NULL,
  `descripcioServei` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `CodiPostal` int(11) NOT NULL,
  `data_inici` date NOT NULL,
  `durada` int(11) NOT NULL,
  `data_final` date DEFAULT NULL,
  `tipus_servei_id1` int(11) DEFAULT NULL,
  `estat_servei_id` int(11) DEFAULT NULL,
  `nomServei` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idusuari_iddonant` (`idDonant`),
  KEY `fk_serveis_tipus_servei1` (`tipus_servei_id1`),
  KEY `fk_serveis_estat_servei1` (`estat_servei_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `serveis`
--

INSERT INTO `serveis` (`id`, `idDonant`, `punts`, `descripcioServei`, `CodiPostal`, `data_inici`, `durada`, `data_final`, `tipus_servei_id1`, `estat_servei_id`, `nomServei`) VALUES
(1, 1, 25, 'Descripcio servei', 4525, '2009-01-01', 56, '2009-02-03', 1, 1, ''),
(2, 2, 200, 'El servei de la rita', 8440, '2014-05-14', 10, '2014-05-31', 1, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serveisconsumits`
--

CREATE TABLE IF NOT EXISTS `serveisconsumits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentaris` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idUsuari` int(11) DEFAULT NULL,
  `idServei` int(11) DEFAULT NULL,
  `valoracio_servei_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idservei_oferit` (`idServei`),
  KEY `fk_serveisconsumits_valoracio_servei1` (`valoracio_servei_id`),
  KEY `FK_FB978542BDD3C65` (`idUsuari`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Solicituts`
--

CREATE TABLE IF NOT EXISTS `Solicituts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `solicitant_id` int(11) DEFAULT NULL,
  `ofertant_id` int(11) NOT NULL,
  `servei_solicitat_id` int(11) DEFAULT NULL,
  `data_solicitut` datetime NOT NULL,
  `estatSolicitut` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuari_has_serveis_usuari1` (`solicitant_id`),
  KEY `fk_Solicituts_serveis1` (`servei_solicitat_id`),
  KEY `estatSolicitut` (`estatSolicitut`),
  KEY `ofertant_id` (`ofertant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `Solicituts`
--

INSERT INTO `Solicituts` (`id`, `solicitant_id`, `ofertant_id`, `servei_solicitat_id`, `data_solicitut`, `estatSolicitut`) VALUES
(8, 2, 2, 2, '2014-05-16 00:00:00', 1),
(10, 1, 2, 1, '2009-01-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipus_servei`
--

CREATE TABLE IF NOT EXISTS `tipus_servei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `descripcio` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tipus_servei`
--

INSERT INTO `tipus_servei` (`id`, `nom`, `descripcio`) VALUES
(1, 'Informàtic', 'Quàlsevol tipus de servei relacionat amb la informàtica.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE IF NOT EXISTS `usuari` (
  `id` int(11) NOT NULL,
  `nom` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `cognom` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `adreca` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fotografia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `presentacio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `punts` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracio_servei`
--

CREATE TABLE IF NOT EXISTS `valoracio_servei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `valoracio_servei`
--

INSERT INTO `valoracio_servei` (`id`, `nom`) VALUES
(1, 'bò');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `EvaluacioServei`
--
ALTER TABLE `EvaluacioServei`
  ADD CONSTRAINT `FK_C2BD0F3D5F263030` FOREIGN KEY (`usuari_id`) REFERENCES `Persona` (`id`),
  ADD CONSTRAINT `fk_usuari_has_serveis_serveis2` FOREIGN KEY (`serveis_id`) REFERENCES `serveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuari_has_serveis_usuari2` FOREIGN KEY (`usuari_id`) REFERENCES `usuari` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `missatges`
--
ALTER TABLE `missatges`
  ADD CONSTRAINT `missatges_ibfk_5` FOREIGN KEY (`Solicituts_id`) REFERENCES `Solicituts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `missatges_ibfk_4` FOREIGN KEY (`autor`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona_rol`
--
ALTER TABLE `persona_rol`
  ADD CONSTRAINT `persona_rol_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `Persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_rol_ibfk_3` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `serveis`
--
ALTER TABLE `serveis`
  ADD CONSTRAINT `fk_serveis_estat_servei1` FOREIGN KEY (`estat_servei_id`) REFERENCES `estat_servei` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_serveis_tipus_servei1` FOREIGN KEY (`tipus_servei_id1`) REFERENCES `tipus_servei` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `serveis_ibfk_2` FOREIGN KEY (`idDonant`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `serveisconsumits`
--
ALTER TABLE `serveisconsumits`
  ADD CONSTRAINT `FK_FB978542BDD3C65` FOREIGN KEY (`idUsuari`) REFERENCES `Persona` (`id`),
  ADD CONSTRAINT `fk_idservei_oferit` FOREIGN KEY (`idServei`) REFERENCES `serveis` (`id`),
  ADD CONSTRAINT `fk_idusuari_consumidor` FOREIGN KEY (`idUsuari`) REFERENCES `usuari` (`id`),
  ADD CONSTRAINT `fk_serveisconsumits_valoracio_servei1` FOREIGN KEY (`valoracio_servei_id`) REFERENCES `valoracio_servei` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Solicituts`
--
ALTER TABLE `Solicituts`
  ADD CONSTRAINT `Solicituts_ibfk_13` FOREIGN KEY (`ofertant_id`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_8563CE46F2A4207` FOREIGN KEY (`solicitant_id`) REFERENCES `Persona` (`id`),
  ADD CONSTRAINT `Solicituts_ibfk_10` FOREIGN KEY (`solicitant_id`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Solicituts_ibfk_11` FOREIGN KEY (`servei_solicitat_id`) REFERENCES `serveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Solicituts_ibfk_12` FOREIGN KEY (`estatSolicitut`) REFERENCES `estat_servei` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuari`
--
ALTER TABLE `usuari`
  ADD CONSTRAINT `FK_68CC94FFBF396750` FOREIGN KEY (`id`) REFERENCES `Persona` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
