-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2023 a las 07:08:17
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
-- Base de datos: `videojuegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id` int(11) NOT NULL,
  `consola` varchar(50) NOT NULL,
  `precio_min` int(30) NOT NULL,
  `precio_max` int(30) NOT NULL,
  `valor_descuento` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`id`, `consola`, `precio_min`, `precio_max`, `valor_descuento`) VALUES
(1, 'PS4', 100000, 700000, 5),
(4, 'XBOX', 100001, 150000, 7),
(5, 'PC', 150000, 400000, 15),
(6, 'OTRA', 500000, 1000000, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `consola` varchar(100) NOT NULL,
  `valor_videojuego` int(20) NOT NULL,
  `valor_pagar_cliente` int(20) NOT NULL,
  `valor_descontado` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `consola`, `valor_videojuego`, `valor_pagar_cliente`, `valor_descontado`) VALUES
(19, 'xbox', 100001, 93001, 7000),
(20, 'xbox', 100001, 93001, 7000),
(21, 'ps4', 100000, 95000, 5000),
(28, 'xbox', 12, 12, 0),
(29, 'xbox', 100001, 93001, 7000),
(35, 'xbox', 10002, 10002, 0),
(36, 'xbox', 100002, 93002, 7000),
(37, 'xbox', 500, 500, 0),
(38, 'xbox', 100022, 93020, 7002),
(39, 'PS4', 13456, 13456, 0),
(40, 'PS4', 134565, 127837, 6728),
(41, 'xbox', 12, 12, 0),
(42, 'xbox', 12, 12, 0),
(43, 'xbox', 234, 234, 0),
(44, 'ps4', 1, 1, 0),
(45, 'xbox', 1, 1, 0),
(46, 'ps4', 435, 435, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
