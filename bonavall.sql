-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-05-2014 a las 13:06:35
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estat_servei`
--

CREATE TABLE IF NOT EXISTS `estat_servei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcio` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

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
  `autor` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `Solicituts_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_missatges_Solicituts1` (`Solicituts_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Persona`
--

CREATE TABLE IF NOT EXISTS `Persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salt` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Persona`
--

INSERT INTO `Persona` (`id`, `salt`, `email`, `password`) VALUES
(1, NULL, 'carles.puerto@gmail.com', 'calespass');

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
(1, 2);

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
  `preu` int(11) NOT NULL,
  `data_inici` date NOT NULL,
  `durada` date NOT NULL,
  `data_final` date DEFAULT NULL,
  `usuari_ofertant_id` int(11) DEFAULT NULL,
  `tipus_servei_id1` int(11) DEFAULT NULL,
  `estat_servei_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idusuari_iddonant` (`idDonant`),
  KEY `fk_serveis_usuari1` (`usuari_ofertant_id`),
  KEY `fk_serveis_tipus_servei1` (`tipus_servei_id1`),
  KEY `fk_serveis_estat_servei1` (`estat_servei_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

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
  KEY `fk_idusuari_consumidor` (`idUsuari`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serveisoferts`
--

CREATE TABLE IF NOT EXISTS `serveisoferts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idServei` int(11) DEFAULT NULL,
  `idUsuari` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D770FEE9B319B480` (`idServei`),
  KEY `IDX_D770FEE9BDD3C65` (`idUsuari`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Solicituts`
--

CREATE TABLE IF NOT EXISTS `Solicituts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `solicitant_id` int(11) DEFAULT NULL,
  `servei_solicitat_id` int(11) DEFAULT NULL,
  `estatSolicitut` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuari_has_serveis_usuari1` (`solicitant_id`),
  KEY `fk_Solicituts_serveis1` (`servei_solicitat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipus_servei`
--

CREATE TABLE IF NOT EXISTS `tipus_servei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `descripcio` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE IF NOT EXISTS `usuari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `cognom` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `adreca` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fotografia` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `presentacio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `punts` int(11) NOT NULL,
  `Persona_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuari_Persona1` (`Persona_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracio_servei`
--

CREATE TABLE IF NOT EXISTS `valoracio_servei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `EvaluacioServei`
--
ALTER TABLE `EvaluacioServei`
  ADD CONSTRAINT `fk_usuari_has_serveis_serveis2` FOREIGN KEY (`serveis_id`) REFERENCES `serveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuari_has_serveis_usuari2` FOREIGN KEY (`usuari_id`) REFERENCES `usuari` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `missatges`
--
ALTER TABLE `missatges`
  ADD CONSTRAINT `fk_missatges_Solicituts1` FOREIGN KEY (`Solicituts_id`) REFERENCES `Solicituts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona_rol`
--
ALTER TABLE `persona_rol`
  ADD CONSTRAINT `FK_D7C9A4014BAB96C` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`),
  ADD CONSTRAINT `FK_D7C9A401F5F88DB9` FOREIGN KEY (`persona_id`) REFERENCES `Persona` (`id`);

--
-- Filtros para la tabla `serveis`
--
ALTER TABLE `serveis`
  ADD CONSTRAINT `fk_serveis_estat_servei1` FOREIGN KEY (`estat_servei_id`) REFERENCES `estat_servei` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_serveis_tipus_servei1` FOREIGN KEY (`tipus_servei_id1`) REFERENCES `tipus_servei` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_serveis_usuari1` FOREIGN KEY (`usuari_ofertant_id`) REFERENCES `usuari` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `serveisconsumits`
--
ALTER TABLE `serveisconsumits`
  ADD CONSTRAINT `fk_idservei_oferit` FOREIGN KEY (`idServei`) REFERENCES `serveis` (`id`),
  ADD CONSTRAINT `fk_idusuari_consumidor` FOREIGN KEY (`idUsuari`) REFERENCES `usuari` (`id`),
  ADD CONSTRAINT `fk_serveisconsumits_valoracio_servei1` FOREIGN KEY (`valoracio_servei_id`) REFERENCES `valoracio_servei` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `serveisoferts`
--
ALTER TABLE `serveisoferts`
  ADD CONSTRAINT `FK_D770FEE9BDD3C65` FOREIGN KEY (`idUsuari`) REFERENCES `usuari` (`id`),
  ADD CONSTRAINT `FK_D770FEE9B319B480` FOREIGN KEY (`idServei`) REFERENCES `serveis` (`id`);

--
-- Filtros para la tabla `Solicituts`
--
ALTER TABLE `Solicituts`
  ADD CONSTRAINT `fk_Solicituts_serveis1` FOREIGN KEY (`servei_solicitat_id`) REFERENCES `serveis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuari_has_serveis_usuari1` FOREIGN KEY (`solicitant_id`) REFERENCES `usuari` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuari`
--
ALTER TABLE `usuari`
  ADD CONSTRAINT `fk_usuari_Persona1` FOREIGN KEY (`Persona_id`) REFERENCES `Persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
