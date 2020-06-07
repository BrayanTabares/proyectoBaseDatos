-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-06-2020 a las 18:54:19
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebida`
--

CREATE TABLE `bebida` (
  `idbebida` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bebida`
--

INSERT INTO `bebida` (`idbebida`, `nombre`) VALUES
(1, 'Limonada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cedula`, `nombre`, `direccion`, `email`) VALUES
(675857, 'Antonio Caballero Gil', 'Calle 9 # 23 a 33 B/cecilia', 'antonio69@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallebebida`
--

CREATE TABLE `detallebebida` (
  `pedido_fecha` datetime NOT NULL,
  `cantidad` int(11) DEFAULT 1,
  `bebida_idbebida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `pedido_fecha` datetime NOT NULL,
  `plato_idplato` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `tipoempleado` int(11) DEFAULT NULL,
  `campo` varchar(20) DEFAULT NULL,
  `zona` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`cedula`, `nombre`, `tipoempleado`, `campo`, `zona`) VALUES
(1097651211, 'María del Carmen Gómez ', 0, 'Atención al cliente', 'Salón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idfactura` int(11) NOT NULL,
   `fecha` datetime DEFAULT current_timestamp(),
  `empleado_cedula` int(11) NOT NULL,
  `cliente_cedula` int(11) NOT NULL,
  `precio` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idfactura`, `fecha`, `empleado_cedula`, `cliente_cedula`, `precio`) VALUES
(1, '2020-06-05', 1097651211, 675857, 0),
(2, '2020-06-05', 1097651211, 675857, 0),
(6, '2020-06-06', 1097651211, 675857, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `idmesa` int(11) NOT NULL,
  `disponible` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`idmesa`, `disponible`) VALUES
(1, 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `empleado_cedula` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `precio` double DEFAULT 0,
  `mesa_idmesa` int(11) DEFAULT NULL,
  `factura_idfactura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`empleado_cedula`, `fecha`, `precio`, `mesa_idmesa`, `factura_idfactura`) VALUES
(1097651211, '2020-06-05 13:17:17', 0, 1, 1),
(1097651211, '2020-06-05 23:40:18', 0, 1, 1),
(1097651211, '2020-06-06 02:56:44', 0, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `idplato` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `tipoPlato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`idplato`, `nombre`, `descripcion`, `precio`, `tipoPlato`) VALUES
(1, 'Sopa sabanera', 'Sopa con sabanitas de huevo', 4000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `fechareserva` date NOT NULL,
  `mesa_idmesa` int(11) NOT NULL,
  `factura_idfactura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonocliente`
--

CREATE TABLE `telefonocliente` (
  `numero` varchar(20) NOT NULL,
  `cliente_cedula` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `telefonocliente`
--

INSERT INTO `telefonocliente` (`numero`, `cliente_cedula`, `descripcion`) VALUES
('76551722', 675857, 'Un señor mayor que pide almuerzos los jueves');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonoempleado`
--

CREATE TABLE `telefonoempleado` (
  `numero` varchar(20) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `empleado_cedula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `telefonoempleado`
--

INSERT INTO `telefonoempleado` (`numero`, `descripcion`, `empleado_cedula`) VALUES
('3018976533', 'Buena atendiendo, pero muy grosera.', 1097651211);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`idbebida`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `detallebebida`
--
ALTER TABLE `detallebebida`
  ADD PRIMARY KEY (`pedido_fecha`,`bebida_idbebida`),
  ADD KEY `detallepedidov1_bebida_fk` (`bebida_idbebida`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`plato_idplato`,`pedido_fecha`),
  ADD KEY `comida_pedido_fk` (`pedido_fecha`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idfactura`),
  ADD KEY `factura_cliente_fk` (`cliente_cedula`),
  ADD KEY `factura_empleado_fk` (`empleado_cedula`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`idmesa`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`fecha`),
  ADD KEY `pedido_empleado_fk` (`empleado_cedula`),
  ADD KEY `pedido_factura_fk` (`factura_idfactura`),
  ADD KEY `pedido_mesa_fk` (`mesa_idmesa`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`idplato`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`mesa_idmesa`,`fechareserva`,`factura_idfactura`),
  ADD KEY `reserva_factura_fk` (`factura_idfactura`);

--
-- Indices de la tabla `telefonocliente`
--
ALTER TABLE `telefonocliente`
  ADD PRIMARY KEY (`numero`,`cliente_cedula`),
  ADD KEY `telefonocliente_cliente_fk` (`cliente_cedula`);

--
-- Indices de la tabla `telefonoempleado`
--
ALTER TABLE `telefonoempleado`
  ADD PRIMARY KEY (`numero`,`empleado_cedula`),
  ADD KEY `telefonoempleado_empleado_fk` (`empleado_cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bebida`
--
ALTER TABLE `bebida`
  MODIFY `idbebida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idfactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `idmesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `idplato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallebebida`
--
ALTER TABLE `detallebebida`
  ADD CONSTRAINT `detallepedidov1_bebida_fk` FOREIGN KEY (`bebida_idbebida`) REFERENCES `bebida` (`idbebida`),
  ADD CONSTRAINT `detallepedidov1_pedido_fk` FOREIGN KEY (`pedido_fecha`) REFERENCES `pedido` (`fecha`);

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `comida_pedido_fk` FOREIGN KEY (`pedido_fecha`) REFERENCES `pedido` (`fecha`),
  ADD CONSTRAINT `comida_plato_fk` FOREIGN KEY (`plato_idplato`) REFERENCES `plato` (`idplato`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_cliente_fk` FOREIGN KEY (`cliente_cedula`) REFERENCES `cliente` (`cedula`),
  ADD CONSTRAINT `factura_empleado_fk` FOREIGN KEY (`empleado_cedula`) REFERENCES `empleado` (`cedula`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_empleado_fk` FOREIGN KEY (`empleado_cedula`) REFERENCES `empleado` (`cedula`),
  ADD CONSTRAINT `pedido_factura_fk` FOREIGN KEY (`factura_idfactura`) REFERENCES `factura` (`idfactura`),
  ADD CONSTRAINT `pedido_mesa_fk` FOREIGN KEY (`mesa_idmesa`) REFERENCES `mesa` (`idmesa`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_factura_fk` FOREIGN KEY (`factura_idfactura`) REFERENCES `factura` (`idfactura`),
  ADD CONSTRAINT `reserva_mesa_fk` FOREIGN KEY (`mesa_idmesa`) REFERENCES `mesa` (`idmesa`);

--
-- Filtros para la tabla `telefonocliente`
--
ALTER TABLE `telefonocliente`
  ADD CONSTRAINT `telefonocliente_cliente_fk` FOREIGN KEY (`cliente_cedula`) REFERENCES `cliente` (`cedula`);

--
-- Filtros para la tabla `telefonoempleado`
--
ALTER TABLE `telefonoempleado`
  ADD CONSTRAINT `telefonoempleado_empleado_fk` FOREIGN KEY (`empleado_cedula`) REFERENCES `empleado` (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
