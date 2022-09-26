-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2022 a las 07:50:36
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_castillonahir`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `nombre_consulta` varchar(50) NOT NULL,
  `email_consulta` varchar(50) NOT NULL,
  `motivo_consulta` varchar(50) NOT NULL,
  `mensaje_consulta` text NOT NULL,
  `estado_consulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `nombre_consulta`, `email_consulta`, `motivo_consulta`, `mensaje_consulta`, `estado_consulta`) VALUES
(1, 'Theodoro', 'toro@gmail.com', 'Hola', 'Acá probando', 1),
(4, 'Theodoro', 'toro@gmail.com', 'Prueba2', 'Acá probando de nuevo', 1),
(5, 'Mia', 'mia@gmail.com', 'Cambio', 'Acá probando de nuevo', 1),
(6, 'Olivia', 'oli@gmail.com', 'Prueba', 'Acá probando de nuevo', 1),
(7, 'Olivia', 'oli@gmail.com', 'Prueba', 'Acá probando de nuevo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_venta` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `detalle_cantidad` int(11) NOT NULL,
  `detalle_precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_venta`, `producto_id`, `detalle_cantidad`, `detalle_precio`) VALUES
(142, 5, 2, '10500'),
(142, 6, 2, '9200'),
(143, 8, 3, '3400'),
(143, 12, 1, '2100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `descripcion_perfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `descripcion_perfil`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_p` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `estado_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_p`, `descripcion`, `precio`, `stock`, `categoria_id`, `imagen`, `estado_p`) VALUES
(5, 'Stanley', 'Clásico de 1litro', '10500.00', 20, 3, '1655322790_59961fcf42bc39518fa4.png', 1),
(6, 'Contigo', 'Pico cebador 360°', '9200.00', 20, 3, '1655525663_43c52cd650967d90d94f.jpg', 1),
(7, 'Lumilagro', 'De acero inoxidable', '8400.00', 20, 3, '1655523688_10efab743ccdd05c8ce0.jpg', 1),
(8, 'Camionero', 'Calabaza de cuero y acero cincelado', '3400.00', 20, 1, '1655701152_4e008f9043f012881fc0.jpg', 1),
(9, 'Imperial', 'Calabaza lisa de cuero y alpaca con diseño', '4600.00', 20, 1, '1655613616_fc2d1c6d292ba2e1d76b.jpg', 1),
(10, 'Torpedo', 'Calabaza de cuero y baqueta con virola', '2900.00', 20, 1, '1655524806_2affa98606f473d1b033.jpg', 1),
(11, 'Pico de loro', 'De alpaca', '1700.00', 20, 2, '1655525121_1bd2f2a82aa8a50dffe6.jpg', 1),
(12, 'Artesanal', 'De alpaca fina', '2100.00', 20, 2, '1655525137_4bf625f52565e9b19da4.jpg', 1),
(17, 'Hexagonal', 'Desarmable con filtro removible', '2600.00', 20, 2, '1655072507_56b3a1ffac0a5ae720c2.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_categoria`
--

CREATE TABLE `producto_categoria` (
  `id_categoria` int(11) NOT NULL,
  `descripcion_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto_categoria`
--

INSERT INTO `producto_categoria` (`id_categoria`, `descripcion_categoria`) VALUES
(1, 'Mates'),
(2, 'Bombillas'),
(3, 'Termos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `dni` int(11) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `estado_u` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `dni`, `provincia`, `direccion`, `email`, `pass`, `perfil_id`, `estado_u`) VALUES
(25, 'Nahir', 'Castillo', 39188472, 'Corrientes', 'Lavalle 2000', 'nahir@gmail.com', '$2y$10$YGqx.LmKxDdiU5Pk.h6OZOTl2g/DoO5/DEE.4T/52/takGmrTiuCW', 1, 1),
(26, 'Ezequiel', 'Zabala', 38315788, 'Corrientes', 'General Paz 500', 'eze@gmail.com', '$2y$10$0j36I4fGRbP8OhKI/KBCYOsmPqeAXBMQKs0oCi85M1MRq50wFLbGa', 2, 1),
(35, 'Zaira', 'Castillo', 39877456, 'Corrientes', 'Uruguay 1000', 'zai@gmail.com', '$2y$10$ICSM13jnhJVcvXSHdLFBY.2nRDn.IwAPxVfVj6QaQcrevLOIg/tu6', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `venta_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `venta_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`venta_id`, `usuarios_id`, `venta_fecha`) VALUES
(142, 26, '2022-06-19'),
(143, 26, '2022-06-19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD KEY `orden_id` (`id_venta`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`venta_id`),
  ADD KEY `usuarios_id` (`usuarios_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`venta_id`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `producto_categoria` (`id_categoria`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id_perfil`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
