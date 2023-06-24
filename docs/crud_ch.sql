-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2023 a las 09:08:54
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud_ch`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_bodega`
--

CREATE TABLE `tm_bodega` (
  `bod_id` int(11) NOT NULL,
  `enc_id` int(11) DEFAULT NULL,
  `bod_cod` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
  `bod_nom` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `bod_direcc` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `bod_dot` int(11) NOT NULL,
  `fech_crea` datetime NOT NULL,
  `est_id` int(11) NOT NULL,
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tm_bodega`
--

INSERT INTO `tm_bodega` (`bod_id`, `enc_id`, `bod_cod`, `bod_nom`, `bod_direcc`, `bod_dot`, `fech_crea`, `est_id`, `fech_modi`, `fech_elim`, `est`) VALUES
(1, 1, 'CHI01', 'BODEGA l', 'canal apiao 6051', 100, '2023-06-24 02:56:56', 1, '2023-06-24 02:57:17', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_encargado`
--

CREATE TABLE `tm_encargado` (
  `enc_id` int(11) NOT NULL,
  `rut` varchar(12) COLLATE utf8mb4_spanish_ci NOT NULL,
  `enc_nom` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `enc_direcc` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `enc_telf` varchar(12) COLLATE utf8mb4_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tm_encargado`
--

INSERT INTO `tm_encargado` (`enc_id`, `rut`, `enc_nom`, `enc_direcc`, `enc_telf`, `est`) VALUES
(1, '19058436-8', 'Cristian Hernandez Uribe', 'canal apiao 6051', '948784658', 1),
(2, '17532495-k', 'Alex Soto Ruiz', 'canal apiao 6051', '954861555', 1),
(3, '14932468-9', 'Jorge Gomez Ortiz', 'canal apiao 6051', '665489512', 1),
(4, '17956418-k', 'Andres Suarez Ruiz', 'Los Volcanes 195', '945184715', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_estado`
--

CREATE TABLE `tm_estado` (
  `est_id` int(11) NOT NULL,
  `est_nom` varchar(255) NOT NULL,
  `fech_crea` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tm_estado`
--

INSERT INTO `tm_estado` (`est_id`, `est_nom`, `fech_crea`) VALUES
(1, 'Activado', '2023-06-21 14:18:14'),
(2, 'Desactivada', '2023-06-21 14:18:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tm_bodega`
--
ALTER TABLE `tm_bodega`
  ADD PRIMARY KEY (`bod_id`);

--
-- Indices de la tabla `tm_encargado`
--
ALTER TABLE `tm_encargado`
  ADD PRIMARY KEY (`enc_id`);

--
-- Indices de la tabla `tm_estado`
--
ALTER TABLE `tm_estado`
  ADD PRIMARY KEY (`est_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tm_bodega`
--
ALTER TABLE `tm_bodega`
  MODIFY `bod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tm_encargado`
--
ALTER TABLE `tm_encargado`
  MODIFY `enc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tm_estado`
--
ALTER TABLE `tm_estado`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
