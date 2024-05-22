-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2024 a las 19:03:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `integrador_sexto`
--
CREATE DATABASE IF NOT EXISTS `integrador_sexto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `integrador_sexto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_compras`
--

DROP TABLE IF EXISTS `carrito_compras`;
CREATE TABLE `carrito_compras` (
  `carritoID` int(11) NOT NULL,
  `ClienteID` int(11) DEFAULT NULL,
  `ProductoID` int(11) DEFAULT NULL,
  `carrito_cantidad` int(11) DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `carrito_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `carrito_compras`:
--   `ClienteID`
--       `clientes` -> `ClienteID`
--   `ProductoID`
--       `productos` -> `ProductoID`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `CategoriaID` int(11) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `Estado` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `categorias`:
--

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`CategoriaID`, `Nombre`, `Descripcion`, `Estado`) VALUES
(1, 'Procesadores', 'Componentes que procesan datos en una computadora.', 'Activo'),
(2, 'Tarjetas gráficas', 'Componentes que procesan imágenes en una computadora.', 'Activo'),
(3, 'Memoria RAM', 'Componentes que almacenan datos temporalmente para acceso rápido.', 'Activo'),
(4, 'Almacenamiento', 'Dispositivos de almacenamiento de datos en una computadora.', 'Activo'),
(5, 'Placas base', 'Componente principal de una computadora que conecta todos los demás componentes.', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `ClienteID` int(11) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Contrasena` varchar(100) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `Pais` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `clientes`:
--

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ClienteID`, `Correo`, `Contrasena`, `Nombre`, `Ciudad`, `Pais`, `Direccion`, `Telefono`) VALUES
(1, 'cliente1@gmail.com', '$2y$10$TL3YFjWmLPyG0w24m8ZUdO6xMt3smV4yVE5rTGUZpJ/bSKLtAC4y6', 'Juan Perez', 'Quito', 'Ecuador', 'Av. Principal #123', '0987654321'),
(2, 'cliente2@gmail.com', '$2y$10$O5D2Xf4O6kGqom/RJ.H9X.bP9IvyY1kW3BtG5.s4f0up23Fc/Rha2W', 'Maria Rodriguez', 'Guayaquil', 'Ecuador', 'Calle Principal #456', '0987654322'),
(3, 'cliente3@gmail.com', '$2y$10$/lKhKbn1DkM7wqUW4.DZ2ujpMhTPR3nRmNCGzisZjIL5bkZ3OyOGe', 'Pedro Sanchez', 'Santo Domingo de los Tsáchilas', 'Ecuador', 'Av. Central #789', '0987654323'),
(4, 'cliente4@gmail.com', '$2y$10$ZDn56mj2ct0gt8qoU4nRi.dLsXTGQGVOH6iMUN3QogLMwPr/IReAa', 'Ana Garcia', 'Guayaquil', 'Ecuador', 'Calle Secundaria #1011', '0987654324'),
(5, 'cliente5@gmail.com', '$2y$10$wvFfbZt/qBV7S6vB0KjJwOhC0FVQxySjT7vR2g4K2rC9WCCDb16Tu', 'Carlos Martinez', 'Santo Domingo de los Tsáchilas', 'Ecuador', 'Av. Norte #1213', '0987654325'),
(6, 'cliente6@gmail.com', '$2y$10$yjLzHSCjvAPUqFqaNf2Zj.rDDfLS8Nc9c0rF5vSwqMmiEaSbLpzWq', 'Laura Castro', 'Riobamba', 'Ecuador', 'Calle Este #1415', '0987654326'),
(7, 'cliente7@gmail.com', '$2y$10$9vdeirUa4i1ay3VTmEzAtOtTl/wnOZRTMq5i4cy5DtZ8SbT8DMQK2', 'Diego Gonzalez', 'Quito', 'Ecuador', 'Av. Sur #1617', '0987654327'),
(8, 'cliente8@gmail.com', '$2y$10$k0EHPnZ6tFEFvHjxMdd2Kevk9WQNsQGBkFLeCqZmjH62/85Gh3TJq', 'Fernanda Morales', 'Santo Domingo de los Tsáchilas', 'Ecuador', 'Calle Oeste #1819', '0987654328'),
(9, 'cliente9@gmail.com', '$2y$10$6JGbDofhDWQl2wwuGZXcyebZuyhsB2l3l4xyfPKyYZnLXJ1vq7Bu2', 'Javier Diaz', 'Quito', 'Ecuador', 'Av. Este #2021', '0987654329'),
(10, 'cliente10@gmail.com', '$2y$10$zy5gPLZ9ziMKHrC2nB6oKu2CwQf/z.lh0jY9hBKXZ2zVVHo9n1YLe', 'Paola Suarez', 'Esmeraldas', 'Ecuador', 'Calle Sur #2223', '0987654330');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

DROP TABLE IF EXISTS `iva`;
CREATE TABLE `iva` (
  `id_iva` int(11) NOT NULL,
  `porcentaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `iva`:
--

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`id_iva`, `porcentaje`) VALUES
(1, 12),
(2, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordendetalle`
--

DROP TABLE IF EXISTS `ordendetalle`;
CREATE TABLE `ordendetalle` (
  `OrdenDetalleID` int(11) NOT NULL,
  `ProductoID` int(11) NOT NULL,
  `OrdenID` int(11) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `ordendetalle`:
--   `OrdenID`
--       `ordenes` -> `OrdenID`
--   `ProductoID`
--       `productos` -> `ProductoID`
--

--
-- Volcado de datos para la tabla `ordendetalle`
--

INSERT INTO `ordendetalle` (`OrdenDetalleID`, `ProductoID`, `OrdenID`, `Precio`, `Cantidad`) VALUES
(1, 1, 1, 250.00, 1),
(2, 2, 1, 100.00, 2),
(3, 3, 2, 300.00, 1),
(4, 4, 2, 200.00, 1),
(5, 5, 3, 100.00, 1),
(6, 6, 4, 500.00, 3),
(7, 7, 5, 400.00, 3),
(8, 8, 6, 200.00, 2),
(9, 9, 6, 200.00, 4),
(10, 10, 7, 300.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

DROP TABLE IF EXISTS `ordenes`;
CREATE TABLE `ordenes` (
  `OrdenID` int(11) NOT NULL,
  `ClienteID` int(11) NOT NULL,
  `Total` decimal(10,2) NOT NULL COMMENT 'Este se calcula Orden detalle con precio y cantidad',
  `FormaEnvio` varchar(100) NOT NULL,
  `DireccionEnvio` varchar(100) NOT NULL,
  `FechaOrden` datetime NOT NULL,
  `Estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `ordenes`:
--   `ClienteID`
--       `clientes` -> `ClienteID`
--

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`OrdenID`, `ClienteID`, `Total`, `FormaEnvio`, `DireccionEnvio`, `FechaOrden`, `Estado`) VALUES
(1, 1, 350.00, 'Envío exprés', 'Av. Principal #123, Quito, Ecuador', '2024-01-18 00:00:00', 'Enviado'),
(2, 2, 500.00, 'Envío estándar', 'Calle Principal #456, Guayaquil, Ecuador', '2024-01-19 00:00:00', 'Enviado'),
(3, 3, 200.00, 'Envío estándar', 'Av. Central #789, Cuenca, Ecuador', '2024-02-03 00:00:00', 'Enviado'),
(4, 4, 750.00, 'Envío exprés', 'Calle Secundaria #1011, Machala, Ecuador', '2024-02-21 00:00:00', 'Enviado'),
(5, 5, 400.00, 'Envío exprés', 'Av. Norte #1213, Santo Domingo, Ecuador', '2024-03-01 00:00:00', 'Enviado'),
(6, 6, 600.00, 'Envío estándar', 'Calle Este #1415, Portoviejo, Ecuador', '2024-03-15 00:00:00', 'Enviado'),
(7, 7, 300.00, 'Envío exprés', 'Av. Sur #1617, Ambato, Ecuador', '2024-03-24 00:00:00', 'Enviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabrasia`
--

DROP TABLE IF EXISTS `palabrasia`;
CREATE TABLE `palabrasia` (
  `codigo` int(11) NOT NULL,
  `palabras` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `palabrasia`:
--

--
-- Volcado de datos para la tabla `palabrasia`
--

INSERT INTO `palabrasia` (`codigo`, `palabras`) VALUES
(2, 'modelo\r\n'),
(3, 'ram'),
(4, 'procesador'),
(5, 'Procesadores'),
(6, 'RAM'),
(7, 'Tarjetas gráficas'),
(8, 'Memoria RAM'),
(9, 'Almacenamiento'),
(10, 'motherboard');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `ProductoID` int(11) NOT NULL COMMENT 'ID TABLA',
  `CodigoReferencia` varchar(20) NOT NULL COMMENT 'CODIGO_REFERENCIA_PRODUCTOS',
  `Nombre` varchar(100) NOT NULL COMMENT 'NOMBRE_PRODCUTO',
  `Precio` decimal(10,2) NOT NULL COMMENT 'PRECIO_PRODUCTO',
  `Descripcion` text NOT NULL COMMENT 'DESCRIPCION_PRODUCTO',
  `Imagen` text NOT NULL COMMENT 'IMAGEN_PRODUCTO',
  `CategoriaID` int(11) NOT NULL COMMENT 'CATEGORIA_PRODUCTO',
  `FechaIngreso` datetime NOT NULL COMMENT 'FECHA_QUE_INGRESO_PRODCUCTO',
  `Stock` int(11) NOT NULL COMMENT 'CANTIDAD_PRODUCTO',
  `Iva` int(11) NOT NULL COMMENT 'ID DEL IVA ASOCIADO AL PRODUCTO',
  `Descuento` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `productos`:
--   `CategoriaID`
--       `categorias` -> `CategoriaID`
--   `Iva`
--       `iva` -> `id_iva`
--

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ProductoID`, `CodigoReferencia`, `Nombre`, `Precio`, `Descripcion`, `Imagen`, `CategoriaID`, `FechaIngreso`, `Stock`, `Iva`, `Descuento`) VALUES
(1, 'REF001', 'Procesador Intel Core i7', 250.00, 'Potente procesador para computadoras de alto rendimiento.', 'imagen1.jpg', 1, '2024-01-05 00:00:00', 5, 1, 0),
(2, 'REF002', 'Tarjeta gráfica NVIDIA GeForce RTX 3080', 700.00, 'Potente tarjeta gráfica para juegos y diseño.', 'imagen2.jpg', 2, '2024-01-06 00:00:00', 6, 1, 0),
(3, 'REF003', 'Memoria RAM Corsair Vengeance LPX 16GB', 80.00, 'Módulo de memoria RAM de alta velocidad para mejorar el rendimiento del sistema.', 'imagen3.jpg', 3, '2024-01-07 00:00:00', 4, 1, 0),
(4, 'REF004', 'SSD Samsung 1TB', 120.00, 'Unidad de estado sólido de alta capacidad para almacenamiento rápido.', 'imagen4.jpg', 4, '2024-01-08 00:00:00', 7, 1, 0),
(5, 'REF005', 'Placa base ASUS ROG Strix Z590-E Gaming', 300.00, 'Placa base de alta gama con características avanzadas para entusiastas.', 'imagen5.jpg', 5, '2024-01-09 00:00:00', 3, 1, 0),
(6, 'REF006', 'Procesador AMD Ryzen 9 5900X', 450.00, 'Potente procesador de la serie Ryzen para computadoras de alto rendimiento.', 'imagen6.jpg', 1, '2024-01-10 00:00:00', 5, 2, 0),
(7, 'REF007', 'Tarjeta gráfica AMD Radeon RX 6800 XT', 650.00, 'Tarjeta gráfica de AMD para juegos de última generación y renderizado.', 'imagen7.jpg', 2, '2024-01-11 00:00:00', 4, 2, 0),
(8, 'REF008', 'Memoria RAM G.Skill Trident Z RGB 32GB', 150.00, 'Módulo de memoria RAM con iluminación RGB para personalizar el aspecto de tu PC.', 'imagen8.jpg', 3, '2024-01-12 00:00:00', 6, 2, 0),
(9, 'REF009', 'SSD NVMe Western Digital Black SN850 500GB', 100.00, 'Unidad SSD NVMe ultrarrápida para cargas y transferencias de datos rápidas.', 'imagen9.jpg', 4, '2024-01-13 00:00:00', 2, 2, 0),
(10, 'REF010', 'Placa base MSI MPG B550 Gaming Edge WiFi', 200.00, 'Placa base con conectividad WiFi y características para juegos.', 'imagen10.jpg', 5, '2024-01-14 00:00:00', 5, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productospago`
--

DROP TABLE IF EXISTS `productospago`;
CREATE TABLE `productospago` (
  `id` int(11) NOT NULL,
  `id_transaccion` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ClienteID` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `productospago`:
--   `ClienteID`
--       `clientes` -> `ClienteID`
--

--
-- Volcado de datos para la tabla `productospago`
--

INSERT INTO `productospago` (`id`, `id_transaccion`, `fecha`, `status`, `email`, `ClienteID`, `total`) VALUES
(1, '1', '2024-04-01 00:00:00', 'Completado', 'cliente1@gmail.com', 1, 350),
(2, '2', '2024-04-02 00:00:00', 'Completado', 'cliente2@gmail.com', 2, 500),
(3, '3', '2024-04-03 00:00:00', 'Completado', 'cliente3@gmail.com', 3, 200),
(4, '4', '2024-04-04 00:00:00', 'Completado', 'cliente4@gmail.com', 4, 750),
(5, '5', '2024-04-05 00:00:00', 'Completado', 'cliente5@gmail.com', 5, 400),
(6, '6', '2024-04-06 00:00:00', 'Completado', 'cliente6@gmail.com', 6, 600),
(7, '7', '2024-04-07 00:00:00', 'Completado', 'cliente7@gmail.com', 7, 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `UsuarioId` int(11) NOT NULL,
  `Cedula` varchar(17) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Telefono` varchar(17) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Contrasenia` text NOT NULL,
  `Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `usuarios`:
--

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioId`, `Cedula`, `Nombres`, `Apellidos`, `Telefono`, `Correo`, `Contrasenia`, `Rol`) VALUES
(1, '2300035421', 'Jhonny ', 'Miranda', '023791167', 'm@g.com', '202cb962ac59075b964b07152d234b70', 'Administrador'),
(2, '0604899732', 'Rafael', 'Sanchez', '0998272313', 'keevsanchez37@gmail.com', '8451caaf4db27f8362f25fb351ea81b4', 'Empleado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD PRIMARY KEY (`carritoID`),
  ADD KEY `ClienteID` (`ClienteID`),
  ADD KEY `ProductoID` (`ProductoID`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`CategoriaID`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ClienteID`),
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- Indices de la tabla `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id_iva`);

--
-- Indices de la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  ADD PRIMARY KEY (`OrdenDetalleID`),
  ADD KEY `OrdenID` (`OrdenID`),
  ADD KEY `ProductoID` (`ProductoID`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`OrdenID`),
  ADD KEY `ClienteID` (`ClienteID`);

--
-- Indices de la tabla `palabrasia`
--
ALTER TABLE `palabrasia`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ProductoID`),
  ADD KEY `CategoriaID` (`CategoriaID`),
  ADD KEY `Iva` (`Iva`);

--
-- Indices de la tabla `productospago`
--
ALTER TABLE `productospago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ClienteID` (`ClienteID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  MODIFY `carritoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `CategoriaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ClienteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `iva`
--
ALTER TABLE `iva`
  MODIFY `id_iva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  MODIFY `OrdenDetalleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `OrdenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `palabrasia`
--
ALTER TABLE `palabrasia`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ProductoID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID TABLA', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productospago`
--
ALTER TABLE `productospago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD CONSTRAINT `carrito_compras_ibfk_1` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`),
  ADD CONSTRAINT `carrito_compras_ibfk_2` FOREIGN KEY (`ProductoID`) REFERENCES `productos` (`ProductoID`);

--
-- Filtros para la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  ADD CONSTRAINT `ordendetalle_ibfk_1` FOREIGN KEY (`OrdenID`) REFERENCES `ordenes` (`OrdenID`),
  ADD CONSTRAINT `ordendetalle_ibfk_2` FOREIGN KEY (`ProductoID`) REFERENCES `productos` (`ProductoID`);

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`CategoriaID`) REFERENCES `categorias` (`CategoriaID`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`Iva`) REFERENCES `iva` (`id_iva`);

--
-- Filtros para la tabla `productospago`
--
ALTER TABLE `productospago`
  ADD CONSTRAINT `productospago_ibfk_1` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ClienteID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
