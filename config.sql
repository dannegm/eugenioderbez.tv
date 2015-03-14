-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2015 a las 09:14:04
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `derbez_anuncios`
--

CREATE TABLE IF NOT EXISTS `derbez_anuncios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `price` int(11) NOT NULL,
  `start` date NOT NULL,
  `duration` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `pic_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `description` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `derbez_clients`
--

CREATE TABLE IF NOT EXISTS `derbez_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` char(100) COLLATE utf8_spanish_ci NOT NULL,
  `company` char(100) COLLATE utf8_spanish_ci NOT NULL,
  `num_anuncios` int(11) NOT NULL,
  `invertido` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `derbez_clients`
--

INSERT INTO `derbez_clients` (`id`, `name`, `email`, `company`, `num_anuncios`, `invertido`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Guillermo', 'memoadian@gmail.com', 'manganimemas', 0, 0, 1, '2015-02-23', '2015-02-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `derbez_config`
--

CREATE TABLE IF NOT EXISTS `derbez_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` char(255) COLLATE utf8_spanish_ci NOT NULL,
  `data` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `derbez_config`
--

INSERT INTO `derbez_config` (`id`, `tipe`, `data`, `created_at`, `updated_at`) VALUES
(1, 'nota_destacados', '{"destacados":["16","15","14","15","12"]}', '0000-00-00', '2015-02-23'),
(2, 'video_destacados', '{"destacados":["15","16"]}', '0000-00-00', '2015-02-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `derbez_positions`
--

CREATE TABLE IF NOT EXISTS `derbez_positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) COLLATE utf8_spanish_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
