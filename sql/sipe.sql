-- phpMyAdmin SQL Dump
-- version 4.4.7deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-07-2015 a las 12:00:57
-- Versión del servidor: 5.5.43-0+deb8u1
-- Versión de PHP: 5.6.9-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sipe`
--
CREATE DATABASE IF NOT EXISTS `sipe` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `sipe`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `danados`
--

CREATE TABLE IF NOT EXISTS `danados` (
  `id_da` int(11) NOT NULL,
  `id_eq` int(11) NOT NULL,
  `cantidad_da` char(4) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE IF NOT EXISTS `devolucion` (
  `id_dev` int(4) NOT NULL,
  `id_sol` int(4) NOT NULL,
  `fecha_dev` date NOT NULL,
  `observacion_dev` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`id_dev`, `id_sol`, `fecha_dev`, `observacion_dev`) VALUES
(1, 2, '2015-07-25', 'bien');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `id_eq` int(4) unsigned NOT NULL,
  `modelo_eq` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `marca_eq` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `serie_eq` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad_eq` char(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `detalle_eq` text COLLATE utf8_spanish_ci
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_eq`, `modelo_eq`, `marca_eq`, `serie_eq`, `cantidad_eq`, `detalle_eq`) VALUES
(6, 'Conetas', 'Genius', '555F47825', '21', 'Cornetas 2.0 de escritorio'),
(5, 'Mouse', 'Microsoft', 'FD448G9899', '11', 'Mouse Negro Inalambrico'),
(4, 'Teclado', 'Microsoft', 'D45WD47', '21', 'Teclado inalambrico'),
(3, 'CPU', 'Compaq', 'F588F1458', '18', 'CPU TIPO DESKTOP'),
(2, 'Monitor', 'Samsung', '8895A5D4', '15', 'Monitor LCD 15"'),
(1, 'CPU', 'Lenovo', '00158', '9', 'CPU LENOVO TIPO TORRE'),
(7, 'Laptop', 'VIT', '3651455F4', '7', 'Laptop de 15" negra'),
(8, 'Laptop', 'HP', '326F255D', '13', 'Laptop de 15" Negra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE IF NOT EXISTS `mantenimiento` (
  `id_man` int(4) unsigned NOT NULL,
  `id_eq` int(4) DEFAULT NULL,
  `id_tec` int(4) DEFAULT NULL,
  `cantidad_man` char(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `detalles_man` text COLLATE utf8_spanish_ci,
  `dias_man` char(4) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `id_sol` int(4) unsigned NOT NULL,
  `id_user` int(4) DEFAULT NULL,
  `fecha_sol` date DEFAULT NULL,
  `fecha_dev_sol` date DEFAULT NULL,
  `observacion_sol` text COLLATE utf8_spanish_ci,
  `aprobado_sol` tinyint(1) DEFAULT NULL,
  `departamento_sol` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `hora_sol` time NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_sol`, `id_user`, `fecha_sol`, `fecha_dev_sol`, `observacion_sol`, `aprobado_sol`, `departamento_sol`, `hora_sol`) VALUES
(2, 1, '2015-07-01', '2015-07-04', 'Nuevo Departamento', 0, '', '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_aprobada`
--

CREATE TABLE IF NOT EXISTS `solicitud_aprobada` (
  `id_sol_apr` int(4) NOT NULL,
  `id_sol_eq` int(4) NOT NULL,
  `cantidad_apr` char(4) NOT NULL,
  `hora_apr` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud_aprobada`
--

INSERT INTO `solicitud_aprobada` (`id_sol_apr`, `id_sol_eq`, `cantidad_apr`, `hora_apr`) VALUES
(1, 1, '2', '23:16:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_equipos`
--

CREATE TABLE IF NOT EXISTS `solicitud_equipos` (
  `id_sol_eq` int(4) NOT NULL,
  `id_sol` int(4) NOT NULL,
  `id_eq` int(4) NOT NULL,
  `cantidad_eq` char(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud_equipos`
--

INSERT INTO `solicitud_equipos` (`id_sol_eq`, `id_sol`, `id_eq`, `cantidad_eq`) VALUES
(1, 2, 6, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE IF NOT EXISTS `tecnico` (
  `id_tec` int(10) unsigned NOT NULL,
  `nombre_tec` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_tec` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cedula_tec` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_tec` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tecnico`
--

INSERT INTO `tecnico` (`id_tec`, `nombre_tec`, `apellido_tec`, `cedula_tec`, `telefono_tec`) VALUES
(2, 'Ernesto', 'Soco', '2559635', '041254888'),
(1, 'Jose', 'Maldonado', '995245', '041459985');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(4) unsigned NOT NULL,
  `usuario_user` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave_user` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombres_user` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos_user` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ci_user` int(10) DEFAULT NULL,
  `telefono_user` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email_user` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cargo_user` char(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `departamento_user` char(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `usuario_user`, `clave_user`, `nombres_user`, `apellidos_user`, `ci_user`, `telefono_user`, `email_user`, `cargo_user`, `departamento_user`) VALUES
(1, 'daniel', 'aa47f8215c6f30a0dcdb2a36a9f4168e', 'Daniel', 'Alarcon', 123456, '04144144144', 'danie@gmail.com', '1', '1'),
(2, 'rile', '4cf32e072699e85a0d5b90ec3ddfafc0', 'Rai', 'Nose', 788544788, '04125478989', 'rai@gmail.com', '2', '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `danados`
--
ALTER TABLE `danados`
  ADD PRIMARY KEY (`id_da`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`id_dev`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_eq`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id_man`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_sol`);

--
-- Indices de la tabla `solicitud_aprobada`
--
ALTER TABLE `solicitud_aprobada`
  ADD PRIMARY KEY (`id_sol_apr`);

--
-- Indices de la tabla `solicitud_equipos`
--
ALTER TABLE `solicitud_equipos`
  ADD PRIMARY KEY (`id_sol_eq`);

--
-- Indices de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`id_tec`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `danados`
--
ALTER TABLE `danados`
  MODIFY `id_da` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `id_dev` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_eq` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id_man` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_sol` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `solicitud_aprobada`
--
ALTER TABLE `solicitud_aprobada`
  MODIFY `id_sol_apr` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `solicitud_equipos`
--
ALTER TABLE `solicitud_equipos`
  MODIFY `id_sol_eq` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `id_tec` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
