-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-07-2020 a las 22:59:57
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bold`
--
CREATE DATABASE IF NOT EXISTS `bold` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bold`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `direccion` varchar(160) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `puesto` varchar(250) NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `pass` varchar(500) DEFAULT NULL,
  `creado` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`person_id`),
  KEY `rol` (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`person_id`, `nombre`, `email`, `direccion`, `telefono`, `puesto`, `rol_id`, `pass`, `creado`) VALUES
(5, 'nuevo3', 'correo', 'ciuadd', 'telefono', 'diseño', 2, '81dc9bdb52d04dc20036dbd8313ed055\r\n ', '2020-07-28 18:49:03'),
(12, 'oscar torres', 'correo@gmail.com', 'ciudad', '1234-5678', 'jefe', 1, '81dc9bdb52d04dc20036dbd8313ed055\r\n ', '2020-07-29 03:39:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(100) NOT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `rol`) VALUES
(1, 'admin'),
(2, 'empleado');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`rol_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
