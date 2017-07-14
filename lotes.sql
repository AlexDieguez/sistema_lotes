-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2017 a las 06:20:06
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lotes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono`
--

CREATE TABLE `abono` (
  `id_abono` varchar(20) NOT NULL,
  `fecha_abono` date NOT NULL,
  `concepto` varchar(150) NOT NULL,
  `debe` float NOT NULL,
  `haber` float NOT NULL,
  `saldo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono_id`
--

CREATE TABLE `abono_id` (
  `id_lote` varchar(20) NOT NULL,
  `id_comprador` varchar(20) NOT NULL,
  `id_abono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alta_compradores`
--

CREATE TABLE `alta_compradores` (
  `id_comprador` varchar(20) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido_paterno` varchar(30) NOT NULL,
  `Apellido_Materno` varchar(30) NOT NULL,
  `CURP` varchar(20) NOT NULL,
  `Clave_INE` varchar(20) NOT NULL,
  `RFC` varchar(15) NOT NULL,
  `Domicilio` varchar(50) NOT NULL,
  `Telefono_casa` varchar(15) NOT NULL,
  `Telefono_celular` varchar(15) NOT NULL,
  `correo_electronico` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alta_usuario`
--

CREATE TABLE `alta_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `a_paterno` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `a_materno` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `prioridad` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `token` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `request_token` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp(6) NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Volcado de datos para la tabla `alta_usuario`
--

INSERT INTO `alta_usuario` (`id_usuario`, `nombre`, `a_paterno`, `a_materno`, `email`, `prioridad`, `username`, `password`, `token`, `request_token`, `created_at`, `status`) VALUES
(1, 'Joel', 'Alvarez', 'Garcia', 'softcodec@gmail.com', 1, 'joel', '4816dabf8db1bc6cac35b3a24cab2ff844b5b0c7', 'ee977806d7286510da8b9a7492ba58e2484c0ecc', '2017-07-13 05:00:00', '2017-07-13 05:00:00.000000', 1),
(2, 'Alex', 'Dieguez', 'Otro', 'falexdg09@gmail.com', 2, 'alex', '60c6d277a8bd81de7fdde19201bf9c58a3df08f4', '4662abffddbc65e20a0df2f17048f0d09cf1e6ea', '2017-07-13 05:00:00', '2017-07-13 05:00:00.000000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_lotes`
--

CREATE TABLE `info_lotes` (
  `id_lote` varchar(20) NOT NULL,
  `precio` float NOT NULL,
  `Medidas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

CREATE TABLE `lotes` (
  `id_lote` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE `recibo` (
  `id_lote` varchar(20) NOT NULL,
  `haber` float NOT NULL,
  `saldo_por_pagar` float NOT NULL,
  `concepto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abono`
--
ALTER TABLE `abono`
  ADD PRIMARY KEY (`id_abono`);

--
-- Indices de la tabla `abono_id`
--
ALTER TABLE `abono_id`
  ADD PRIMARY KEY (`id_lote`,`id_comprador`,`id_abono`),
  ADD KEY `id_comprador` (`id_comprador`),
  ADD KEY `id_abono` (`id_abono`);

--
-- Indices de la tabla `alta_compradores`
--
ALTER TABLE `alta_compradores`
  ADD PRIMARY KEY (`id_comprador`);

--
-- Indices de la tabla `info_lotes`
--
ALTER TABLE `info_lotes`
  ADD PRIMARY KEY (`id_lote`);

--
-- Indices de la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`id_lote`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abono_id`
--
ALTER TABLE `abono_id`
  ADD CONSTRAINT `abono_id_ibfk_1` FOREIGN KEY (`id_lote`) REFERENCES `info_lotes` (`id_lote`),
  ADD CONSTRAINT `abono_id_ibfk_2` FOREIGN KEY (`id_comprador`) REFERENCES `alta_compradores` (`id_comprador`),
  ADD CONSTRAINT `abono_id_ibfk_3` FOREIGN KEY (`id_abono`) REFERENCES `abono` (`id_abono`);

--
-- Filtros para la tabla `info_lotes`
--
ALTER TABLE `info_lotes`
  ADD CONSTRAINT `info_lotes_ibfk_1` FOREIGN KEY (`id_lote`) REFERENCES `lotes` (`id_lote`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
