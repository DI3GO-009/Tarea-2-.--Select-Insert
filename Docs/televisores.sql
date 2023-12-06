-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2023 a las 23:48:17
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sexto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `televisores`
--

CREATE TABLE `televisores` (
  `televisorId` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `pulgadas` varchar(50) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `tasaRefresco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `televisores`
--

INSERT INTO `televisores` (`televisorId`, `marca`, `pulgadas`, `cantidad`, `tasaRefresco`) VALUES
(1, 'Sony', '40', '15', '120 hz'),
(2, 'Samsung', '50', '15', '120');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `televisores`
--
ALTER TABLE `televisores`
  ADD PRIMARY KEY (`televisorId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `televisores`
--
ALTER TABLE `televisores`
  MODIFY `televisorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
