-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2020 a las 19:31:52
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `moligol`
--
DROP DATABASE IF EXISTS `moligol`;
CREATE DATABASE IF NOT EXISTS `moligol` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `moligol`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `botas`
--

CREATE TABLE `botas` (
  `idBo` int(11) NOT NULL,
  `idMar` int(11) NOT NULL,
  `precio` varchar(32) COLLATE utf8_spanish_ci DEFAULT NULL,
  `info` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `botas`
--

INSERT INTO `botas` (`idBo`, `idMar`, `precio`, `info`, `foto`) VALUES
(1, 4, '55€', 'bota con acabado en piel, optima para terrenos firmes. Suela Ag.', 'https://www.futbolemotion.com/imagesarticulos/112303/grandes/bota-adidas-jr-ace-17-purecontrol-fg-core-black-white-2.jpg'),
(2, 5, '55€', 'Bota de futbol para aquellos jugadores mas veloces, con una gran precision y un acabado en piel sintetica para un gran agarre.', 'https://contents.mediadecathlon.com/p1671449/k$4ae32604ea6490e69de604a6a6ed7d63/sq/Botas+de+F+tbol+Adidas+X+19+3+FG+ni+os+azul.jpg?f=700x700'),
(3, 4, '25€', 'bota de futbol especifica para aquellos futbolistas clasicos, suela AG para cesped natural', 'https://sgfm.elcorteingles.es/SGFM/dctm/MEDIA03/201901/16/00117726106341____11__640x640.jpg'),
(4, 6, '65€', 'bota de fubol profesional, de alta calidad. Tacos recambiables', 'https://contents.mediadecathlon.com/p1671483/k$19632482e1425e354d6627348b26136b/sq/Botas+de+f+tbol+j+nior+Predator+19+3+FG+azul.jpg'),
(5, 4, '120€', 'Bota de futbol junior, esta constituida por un material impermeable y muy duradero. Especifica para aquellos jugadores mas guerreros', 'https://images-na.ssl-images-amazon.com/images/I/71VFJz%2BJgYL._UY500_.jpg'),
(6, 6, '90€', 'Bota de futbol de samuel etoo, para buscar la maxima velocidad y precision', 'https://media.futbolmania.com/media/catalog/product/cache/1/image/0f330055bc18e2dda592b4a7c3a0ea22/1/0/104812-02_imagen-de-la-bota-de-futbol-Puma-Future-2.1-Netfit-FG-AG--2018-naranjas_1_pie-derecho.jpg'),
(7, 4, '60€', 'bota con acabado en piel, optima para terrenos firmes. Suela Ag.', 'https://www.futbolemotion.com/imagesarticulos/112303/grandes/bota-adidas-jr-ace-17-purecontrol-fg-core-black-white-2.jpg'),
(9, 6, '70€', 'Acabado en piel de vacuno, para jugadores que busquen la mayor comodidad.', 'https://www.prodirectsoccer.com/productimages/V3_1_Gallery_5/205983_Gallery_5_0572909.jpg'),
(12, 8, '80€', 'Constituida de un material artificial muy resistente, precisa una cómoda adaptación y además cuenta con gran ligereza.', 'https://images-na.ssl-images-amazon.com/images/I/515GMaIElhL._UX500_.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idCar`) VALUES
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93),
(94),
(95),
(96),
(97),
(98),
(99),
(100),
(101),
(102),
(103),
(104),
(105),
(106),
(107),
(108),
(109),
(110),
(111),
(112),
(113),
(114),
(115),
(116),
(117),
(118),
(119),
(120);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `car_bot`
--

CREATE TABLE `car_bot` (
  `idCar` int(11) NOT NULL,
  `idBo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `car_bot`
--

INSERT INTO `car_bot` (`idCar`, `idBo`, `cantidad`) VALUES
(79, 1, 5),
(80, 2, 2),
(95, 2, 1),
(104, 1, 1),
(105, 1, 1),
(105, 1, 1),
(107, 1, 1),
(107, 6, 1),
(107, 5, 1),
(114, 2, 1),
(116, 2, 1),
(116, 3, 2),
(119, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idUsu` int(11) NOT NULL,
  `idCar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`idUsu`, `idCar`) VALUES
(5, 119);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idMar` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMar`, `nombre`) VALUES
(4, 'Nike'),
(5, 'Adidas'),
(6, 'Puma'),
(8, 'Kappa'),
(9, 'acliclas'),
(10, 'nikelao');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsu` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `api_key` varchar(33) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsu`, `nombre`, `apellidos`, `email`, `pass`, `admin`, `api_key`) VALUES
(5, 'jacobo', 'semedo', 'javi@ies.es', 'c4ca4238a0b923820dcc509a6f75849b', 0, NULL),
(6, 'admin', 'admin', 'admin@admin', '21232f297a57a5a743894a0e4a801fc3', 1, NULL),
(9, 'Javier', 'Molina', 'ja@ja.es', 'c4ca4238a0b923820dcc509a6f75849b', 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `botas`
--
ALTER TABLE `botas`
  ADD PRIMARY KEY (`idBo`),
  ADD KEY `idMar` (`idMar`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`idCar`);

--
-- Indices de la tabla `car_bot`
--
ALTER TABLE `car_bot`
  ADD KEY `idCar` (`idCar`,`idBo`),
  ADD KEY `idBo` (`idBo`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`idUsu`,`idCar`),
  ADD KEY `fk_fk2` (`idCar`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMar`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsu`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `botas`
--
ALTER TABLE `botas`
  MODIFY `idBo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `idCar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idMar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `botas`
--
ALTER TABLE `botas`
  ADD CONSTRAINT `botas_ibfk_1` FOREIGN KEY (`idMar`) REFERENCES `marca` (`idMar`);

--
-- Filtros para la tabla `car_bot`
--
ALTER TABLE `car_bot`
  ADD CONSTRAINT `car_bot_ibfk_1` FOREIGN KEY (`idBo`) REFERENCES `botas` (`idBo`),
  ADD CONSTRAINT `car_bot_ibfk_2` FOREIGN KEY (`idCar`) REFERENCES `carrito` (`idCar`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_fk` FOREIGN KEY (`idUsu`) REFERENCES `usuario` (`idUsu`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_fk2` FOREIGN KEY (`idCar`) REFERENCES `carrito` (`idCar`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
