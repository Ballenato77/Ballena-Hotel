-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2019 a las 07:52:02
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id` int(11) NOT NULL,
  `id_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id`, `id_Persona`) VALUES
(4321, 22638);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hosts`
--

CREATE TABLE `hosts` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `room` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `apellido_p` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `apellido_m` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `calle` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `num` int(11) NOT NULL,
  `numInt` int(11) NOT NULL,
  `colonia` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `curp` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `clave_e` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `day_r` int(11) NOT NULL,
  `cant_child` int(11) NOT NULL,
  `cant_adult` int(11) NOT NULL,
  `cant_total` int(11) NOT NULL,
  `room_type` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `fecha_ini` timestamp NULL DEFAULT NULL,
  `fecha_fin` timestamp NULL DEFAULT NULL,
  `costo_room` int(11) NOT NULL,
  `costo_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Volcado de datos para la tabla `hosts`
--

INSERT INTO `hosts` (`id`, `usuario`, `contrasena`, `room`, `nombre`, `apellido_p`, `apellido_m`, `calle`, `num`, `numInt`, `colonia`, `cp`, `curp`, `clave_e`, `day_r`, `cant_child`, `cant_adult`, `cant_total`, `room_type`, `fecha_ini`, `fecha_fin`, `costo_room`, `costo_total`) VALUES
(22638, 'Frida77', '1q2w3e4r5t6y', 4321, 'Frida', 'Navarro', 'Navarro', 'Paris', 65, 4, 'Doctors', 20245, 'NAGF981005FASVRR71', 'NGFM6712480', 10, 5, 3, 8, 'Ejecutiva', '2019-12-05 09:52:23', '2019-12-15 09:52:23', 500, 5000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`user`, `active`) VALUES
('Frida77', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `permisos` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `user`, `pass`, `permisos`) VALUES
(22638, 'Frida77', '1q2w3e4r5t6y', 'Cliente'),
(111111, 'Admin', 'Frida', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hosts`
--
ALTER TABLE `hosts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
