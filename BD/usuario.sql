-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2022 a las 21:26:35
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `distribuidora_nelly`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod_usu` int(11) NOT NULL,
  `nom_usu` char(200) DEFAULT NULL,
  `car_usu` char(100) DEFAULT NULL COMMENT 'cargo',
  `cc_usu` int(11) DEFAULT NULL,
  `tel_usu` varchar(50) DEFAULT NULL,
  `dir_usu` varchar(50) DEFAULT NULL,
  `log_usu` char(20) DEFAULT NULL,
  `pas_usu` char(20) DEFAULT NULL,
  `ciu_usu` int(11) NOT NULL COMMENT 'codigo de la surcusal',
  `codig_usu` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'codigo del usuario',
  `cod_rol_usu` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1 COMMENT 'Estado en sistema del registro'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usu`, `nom_usu`, `car_usu`, `cc_usu`, `tel_usu`, `dir_usu`, `log_usu`, `pas_usu`, `ciu_usu`, `codig_usu`, `cod_rol_usu`, `estado`) VALUES
(124, ' Soporte', '1', 2185100, '2185100', 'kronossolucionestic@gmail.com', 'soporte', '123456', 0, 'KM', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
