-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2022 a las 21:25:30
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
-- Estructura de tabla para la tabla `interfaz`
--

CREATE TABLE `interfaz` (
  `cod_int` int(11) NOT NULL,
  `nom_int` char(100) DEFAULT NULL,
  `rut_int` char(200) DEFAULT NULL,
  `cod_mod_int` int(11) DEFAULT NULL,
  `cod_per` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `interfaz`
--

INSERT INTO `interfaz` (`cod_int`, `nom_int`, `rut_int`, `cod_mod_int`, `cod_per`) VALUES
(1, 'Producto', 'http://localhost/DistribuidoraNelly/vista/producto/index.php', 1, 1),
(2, 'Cliente', 'http://localhost/DistribuidoraNelly/vista/cliente/index.php', 2, 1),
(3, 'Inventario', 'http://localhost/DistribuidoraNelly/vista/inventario/index.php', 3, 1),
(4, 'Venta', 'http://localhost/DistribuidoraNelly/vista/venta/index.php', 4, 1),
(5, 'Informe ventas total', 'http://localhost/DistribuidoraNelly/vista/informe/index.php', 5, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `interfaz`
--
ALTER TABLE `interfaz`
  ADD PRIMARY KEY (`cod_int`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `interfaz`
--
ALTER TABLE `interfaz`
  MODIFY `cod_int` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
