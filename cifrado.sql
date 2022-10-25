-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2022 a las 17:53:04
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
(21, 'Andrea Hernandez Lucero', 'andy1234', 'vivianajosemanuel3@gmail.com', '0987654321', 'i ?????鱲Q??s??????-`\Z|?g????8???s>z?nu???Xr?P?Bi??3?AhfXV/Y?a3??X?~W???|?=????N&? p?\"???ѾJ?kQ???Р?i???	??;Z{??0\0F??N?0O???Ov_?6???<???jd?b????\'?N?\\?~6??MHW???UDS?m?:?n@??>??!\"??6N?qJ\n?D?<O?ߴ\\:\'??Y?\r??I,??n҄F-O|g??\\?vu?S?9=/', '0987654321'),
(22, 'Julia Reyes Torres', 'juli123', 'julia@gmail.com', '1234567892', '6hE<?<?,֏4$?\r??Z@???yݹ?5H?9?2??o3Y??\Zh???<~;?+i????کW_?B?rq?M$`??ҝ????\',|?3???g1?r??NqAE?*?????Вr?՘H??=??f}ȅ?ED????kD????>?g\Z&!????f?uN?hX????Z	Bj????tyax?-?<\n\np??ia>Уqs1B|;{??\'???x?\'^YÅ+?z?????d??32??÷\0sS!q??ꖴ$????Wr?S', 'julia123\'\'.rt'),
(23, 'Lucia Reyes Reyes', 'lu242', 'lucero@gmail.com', '4444517467', 'y???????\'H?#?.??`?I<Rted,`Jt?{?9 ?3?6?d`?~Z?}??N?)j#?cW???B?6J!\\,c??⒩N????[?Jq-?Ew??bא???:g??󂓭Hۂ?|SgWR7?j?Pكb?t??Z?O????B8?=?+?>?(7?3?????I??Ë?\"7&???T1C????Z?Y?o̐\nZ??LJ	?????}@u??F3ۻԉ?{sǻ??Zl?\Z??X?[4???[\r?B0?', 'lucia34.90\'1');

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
(7, 'Viviana José Manuel', 'vivi123', 'vivianajosemanuel3@gmail.com', '4444517467', 'MGl0b0d0T1BLR0Z0ekJYTTNydk5VQT09OjpofJI3zQ6M8YBKvx+4aGFG', 'Viv34Jm.01'),
(8, 'Antonia Juarez Romero', 'antonia123', 'antonia@gmail.com', '1234567892', 'VDBkc1pMMHBlbFpPOWVsc3ZvT05OQT09Ojqj/l06OJP8NS9nTndItK76', 'antonia123.09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioscpropio`
--

CREATE TABLE `usuarioscpropio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `contra` varchar(100) NOT NULL,
  `contra_cif_propio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarioscpropio`
--

INSERT INTO `usuarioscpropio` (`id`, `nombre`, `usuario`, `email`, `telefono`, `contra`, `contra_cif_propio`) VALUES
(9, 'Liliana Lopez Cabrera', 'lili', 'liliana@gmail.com', '1234567890', '123Liliana.Cab', 'b1a2C3.Lainlai');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioshash1`
--

CREATE TABLE `usuarioshash1` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `contra_cif_hash1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarioshash1`
--

INSERT INTO `usuarioshash1` (`id`, `nombre`, `usuario`, `email`, `telefono`, `contra_cif_hash1`) VALUES
(1, 'Antonia Juarez Romero', 'vivi123', 'vivianajosemanuel3@gmail.com', '4444517467', '9adcb29710e807607b683f62e555c22dc5659713'),
(6, 'Karla Meraz Santos', 'karla123', 'karla@gmail.com', '0987654321', '1f6b8a5cb8d192f628f95569f7356ddcfab2e563');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioshash2`
--

CREATE TABLE `usuarioshash2` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `contra_cif_hash2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarioshash2`
--

INSERT INTO `usuarioshash2` (`id`, `nombre`, `usuario`, `email`, `telefono`, `contra_cif_hash2`) VALUES
(1, 'Lucia Reyes Reyes', 'lu123', 'lucero@gmail.com', '4444517467', '1427e53e158e100594266bc56f66646c2ead52cf2d646d782ab04a67f49337286136ae6630cb8807933d796788e3faceff82cc12bd4a19254220881f0e898764'),
(2, 'Karla Meraz Juarez', 'karla123', 'karla@gmail.com', '1234567892', 'f0b980c5ce702d3c2a87aa6c79dfa8ca8e163a023734dbf944c5c67ae7bdc041e997377ff2f720926bc045a33c4033ba35524511d6866acc7797a45462557e17');

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
-- Indices de la tabla `usuarioscpropio`
--
ALTER TABLE `usuarioscpropio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarioshash1`
--
ALTER TABLE `usuarioshash1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarioshash2`
--
ALTER TABLE `usuarioshash2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios2`
--
ALTER TABLE `usuarios2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarioscpropio`
--
ALTER TABLE `usuarioscpropio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarioshash1`
--
ALTER TABLE `usuarioshash1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarioshash2`
--
ALTER TABLE `usuarioshash2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
