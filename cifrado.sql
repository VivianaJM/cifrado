-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2022 a las 05:27:23
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cifrado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `contra_cif_rsa` varchar(500) NOT NULL,
  `contra_descifrada` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `email`, `telefono`, `contra_cif_rsa`, `contra_descifrada`) VALUES
(21, 'Andrea Hernandez Lucero', 'andy1234', 'vivianajosemanuel3@gmail.com', '0987654321', 'i ?????鱲Q??s??????-`\Z|?g????8???s>z?nu???Xr?P?Bi??3?AhfXV/Y?a3??X?~W???|?=????N&? p?\"???ѾJ?kQ???Р?i???	??;Z{??0\0F??N?0O???Ov_?6???<???jd?b????\'?N?\\?~6??MHW???UDS?m?:?n@??>??!\"??6N?qJ\n?D?<O?ߴ\\:\'??Y?\r??I,??n҄F-O|g??\\?vu?S?9=/', '0987654321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios2`
--

CREATE TABLE `usuarios2` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `contra_cif_aes` varchar(500) NOT NULL,
  `contra_descifrada` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios2`
--

INSERT INTO `usuarios2` (`id`, `nombre`, `usuario`, `email`, `telefono`, `contra_cif_aes`, `contra_descifrada`) VALUES
(7, 'Viviana José Manuel', 'vivi123', 'vivianajosemanuel3@gmail.com', '4444517467', 'MGl0b0d0T1BLR0Z0ekJYTTNydk5VQT09OjpofJI3zQ6M8YBKvx+4aGFG', 'Viv34Jm.01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios2`
--
ALTER TABLE `usuarios2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios2`
--
ALTER TABLE `usuarios2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
