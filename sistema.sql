-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2021 a las 22:34:15
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` bigint(20) NOT NULL COMMENT 'cedula',
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `Lnaciomiento` varchar(100) NOT NULL COMMENT 'Lugar de nacimiento',
  `fecha` date NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` tinyint(4) NOT NULL COMMENT '0 MASCULINO 1 FEMENINO',
  `plantelAnterior` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `statud` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombres`, `apellidos`, `nacionalidad`, `Lnaciomiento`, `fecha`, `edad`, `sexo`, `plantelAnterior`, `religion`, `correo`, `statud`) VALUES
(30569985, 'Derrinson Jose', 'Nieto Mejias', '1', 'Caracas', '2010-08-29', 10, 0, 'N/A', 'Catolico', 'harris@mail.com', 1),
(1686575915, 'Alejandro', 'Torres', '1', 'Caracas', '2015-08-04', 5, 0, 'N/A', 'catolico', 'mail@mail.com', 1),
(11234567818, 'Elena', 'Carrizal', '1', 'Caracas', '2018-08-29', 2, 0, 'N/A', 'N/A', 'maria@mail.com', 1),
(11533760507, 'anderlis', 'ortiz', '1', 'caracas', '2007-01-24', 13, 1, 'fuente jacob', 'catolico', 'yos_@gmail.com', 1),
(11602158820, 'Isaias', 'Nieto', '1', 'Caracas', '2020-08-23', 0, 1, 'No', 'Catolico', 'harri.nieto@gmail.com', 0),
(11687636207, 'Adrian', 'Ortiz', '1', 'Caracas', '2007-10-10', 13, 0, 'N/A', 'N/A', 'yos@mail.com', 1),
(11856936518, 'Rosmary', 'Liendo', '1', 'Caracas', '2018-10-10', 2, 1, 'N/A', 'Catolico', 'manuel@mail.com', 1),
(11856987518, 'Milena ', 'Suarez', '1', 'Caracas', '2018-03-30', 2, 1, 'N/A', 'catolico', 'manuel@mail.com', 1),
(11985185317, 'Miranda Isabelle', 'Villan chacón', '1', 'caracas', '2017-08-17', 3, 1, 'n/a', 'n/a', 'moises@mail.com', 1),
(12274876112, 'Yohanna', 'Gonzalez', '1', 'Caracas', '2012-05-15', 8, 1, 'N/A', 'N/A', 'cilia@mail.com', 1),
(12274876410, 'Yohanna', 'Gonzalez', '1', 'Caracas', '2010-04-15', 10, 1, 'N/A', 'N/A', 'cilia@mail.com', 1),
(12371071210, 'Douglita', 'Bauza', '1', 'Caracas', '2010-04-30', 10, 0, 'N/A', 'N/A', 'BAUZA@MAIL.COM', 1),
(12587212517, 'JOSE ', 'CHACON', '1', 'CARACAS', '2017-10-03', 3, 0, 'N/A', 'N/a', 'NATHACHA2000@GMAIL.COM', 1),
(12733366405, 'Jesusito', 'Aranguren', '1', 'Caracas', '2005-09-13', 15, 0, 'N/A', 'N/A', 'jesus@mail.com', 1),
(12787902316, 'Yanza Nazareth', 'Ballester', '1', 'Caracas', '2016-05-06', 4, 1, 'N/A', 'N/A', 'mail@mail.com', 1),
(21985185310, 'Deikelber Fabian', 'Villan Aguilera', '1', 'caracas', '2010-01-10', 10, 0, 'n/a', 'santero', 'moises@mail.com', 1),
(22202650206, 'Samuel', 'Gonzalez', '1', 'Caracas', '2015-04-24', 5, 1, 'N/A', 'N/A', 'kat@mail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id` int(11) NOT NULL,
  `aula` varchar(100) NOT NULL,
  `grado` int(11) NOT NULL,
  `seccion` int(11) NOT NULL,
  `cupos` int(11) NOT NULL,
  `disponibilidad` int(11) NOT NULL,
  `statud` tinyint(4) NOT NULL DEFAULT 1,
  `año_escolar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id`, `aula`, `grado`, `seccion`, `cupos`, `disponibilidad`, `statud`, `año_escolar`) VALUES
(1, '1° GRADO A', 1, 1, 30, 27, 1, 9),
(2, '2° GRADO B', 2, 2, 30, 29, 1, 9),
(4, '4° GRADO D', 4, 4, 30, 26, 1, 9),
(5, '2° GRUPO MATERNAL A', 10, 1, 15, 13, 1, 9),
(6, '7° GRADO E', 8, 5, 30, 29, 1, 9),
(7, '3° GRADO C', 3, 3, 15, 14, 1, 9),
(8, '8° GRADO G', 13, 7, 15, 14, 1, 9),
(9, '1° GRADO B', 1, 2, 30, 28, 1, 9),
(10, '1° GRUPO MATERNAL B', 9, 2, 15, 15, 1, 9),
(11, '3° GRADO D', 3, 4, 30, 29, 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficio`
--

CREATE TABLE `beneficio` (
  `id` int(11) NOT NULL,
  `aula` int(11) NOT NULL,
  `alumno` bigint(20) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `categoria_beneficio` int(11) NOT NULL,
  `año_escolar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_beneficio`
--

CREATE TABLE `categoria_beneficio` (
  `id` int(11) NOT NULL,
  `beneficio` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria_beneficio`
--

INSERT INTO `categoria_beneficio` (`id`, `beneficio`, `descripcion`) VALUES
(1, 4, 'Laptop Canaima'),
(2, 4, 'Tablet canaima'),
(3, 4, 'Computador VIT'),
(5, 4, 'telefono');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo`
--

CREATE TABLE `correo` (
  `id` int(11) NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `asunto` text NOT NULL,
  `mensaje` text NOT NULL,
  `adjunto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `importante` tinyint(1) NOT NULL,
  `statud` tinyint(1) NOT NULL,
  `borrado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `correo`
--

INSERT INTO `correo` (`id`, `de`, `para`, `asunto`, `mensaje`, `adjunto`, `fecha`, `importante`, `statud`, `borrado`) VALUES
(1, 1, 26, 'prueba', '', 0, '0000-00-00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_emergencia`
--

CREATE TABLE `datos_emergencia` (
  `id` bigint(20) NOT NULL,
  `enfermedad` tinyint(1) DEFAULT NULL,
  `detalle_enfermedad` text DEFAULT NULL,
  `terapia` tinyint(1) DEFAULT NULL,
  `detalle_terapia` varchar(100) NOT NULL,
  `alergia` tinyint(1) DEFAULT NULL,
  `detalle_alergia` text DEFAULT NULL,
  `tlfemerg` varchar(100) NOT NULL COMMENT 'Telefono de emergencia',
  `vacunas` tinyint(1) DEFAULT NULL,
  `detalle_vacunas` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_emergencia`
--

INSERT INTO `datos_emergencia` (`id`, `enfermedad`, `detalle_enfermedad`, `terapia`, `detalle_terapia`, `alergia`, `detalle_alergia`, `tlfemerg`, `vacunas`, `detalle_vacunas`) VALUES
(30569985, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '04269045197', 1, 'Posee todas las vacunas registradas'),
(1686575915, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '000000000000', 1, 'Posee todas las vacunas registradas'),
(2133123123, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', 'asdasdas', 1, 'Posee todas las vacunas registradas'),
(11234567818, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '1234567', 1, 'Posee todas las vacunas registradas'),
(11533760507, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '04123089604', 0, '[]'),
(11602158820, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '04269207617', 1, 'Posee todas las vacunas registradas'),
(11687636207, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '02127633642', 1, 'Posee todas las vacunas registradas'),
(11856936518, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '04128596354', 1, 'Posee todas las vacunas registradas'),
(11856987518, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '02125896345', 1, 'Posee todas las vacunas registradas'),
(11985185317, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '04142902549', 1, 'Posee todas las vacunas registradas'),
(12274876112, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '04142902549', 1, 'Posee todas las vacunas registradas'),
(12274876410, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '04142902549', 1, 'Posee todas las vacunas registradas'),
(12371071210, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '02128755441', 1, 'Posee todas las vacunas registradas'),
(12587212517, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '04128763076', 1, 'Posee todas las vacunas registradas'),
(12733366405, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '04148569635', 1, 'Posee todas las vacunas registradas'),
(12787902316, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '04263589647', 1, 'Posee todas las vacunas registradas'),
(21985185310, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '4120000000', 1, 'Posee todas las vacunas registradas'),
(22202650206, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '02127633642', 1, 'Posee todas las vacunas registradas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiares`
--

CREATE TABLE `familiares` (
  `id` int(11) NOT NULL COMMENT 'cedula',
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `ocupacion` varchar(100) NOT NULL,
  `Dtrabajo` varchar(100) NOT NULL COMMENT 'Direccion de trabajo',
  `Tlftrabajo` varchar(100) NOT NULL COMMENT 'Telefono de trabajo',
  `DHogar` varchar(100) NOT NULL COMMENT 'Direccion',
  `TlfHogar` varchar(100) NOT NULL COMMENT 'Telefono del hogar',
  `Parestesco` int(1) NOT NULL COMMENT '1 madre 2 padre 3 familiar a cargo',
  `nacionalidad` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `familiares`
--

INSERT INTO `familiares` (`id`, `nombre`, `apellido`, `ocupacion`, `Dtrabajo`, `Tlftrabajo`, `DHogar`, `TlfHogar`, `Parestesco`, `nacionalidad`) VALUES
(6865759, 'Alexis', 'Torres', 'Obrero', 'Sabana Grande', '000000', 'EL valle', '0000000', 2, 'V'),
(12345678, 'Josefina', 'Carrizal', 'Tesorera', 'Los Teques', '04129658775', 'Los Teques', '02129635478', 1, 'V'),
(15337605, 'lisbebeth', 'pinedo', 'asistente ', 'catia', '04123089604', 'catia', '02128632625', 1, 'V'),
(16021588, 'Harrinson', 'Nieto', 'comerciante', 'Las Adjuntas', '04269207616', 'Las Nieves', '04269207616', 2, 'V'),
(16021589, 'Harrinson', 'Nieto', 'Obrero', 'Las Adjuntas', '04269207616', 'Las Nieves', '04269207616', 2, 'V'),
(16876362, 'Yosmar', 'Ortiz', 'Administrador', 'Capitolio', '04123089604', 'Catia', '02128632625', 2, 'V'),
(18569875, 'Manuel', 'Gonzalez', 'Carpintero', 'Petare', '02126536985', 'Macarao', '02125896345', 2, 'V'),
(19851853, 'Moises', 'Villan Gonzalez', 'Informatica', 'Av las Acacias, Resd la Orquidea , torre A , piso 5 , Apto 505 ,Plaza Venezuela', '04128002911', 'La Candelaria , Edf Banco Latino , piso 13 ,Ofc 2 ,Piso 13', '02127633642', 2, 'V'),
(22026502, 'Katherine', 'Gutierrez', 'Ast.Adm', 'El recreo', '04128888888', 'Antimano', '04126655896', 1, 'V'),
(22748764, 'Cilia ', 'Gonzalez', 'Ama de Casa', 'Sabana Grande', '04142902549', 'Plaza Venezuela', '02127633642', 1, 'V'),
(23710712, 'Douglas', 'Bauza', 'Director', 'Min Aguas', '02125966587', 'Catia', '04142589875', 2, 'V'),
(25326051, 'alexander', 'torres', 'informatico', 'caracas', '00000000000', 'caracas', '00000000', 1, 'E'),
(25872125, 'NATHACHA', 'CHACON', 'AMA DE CASA', 'PLAZA VENEZUELA', '04128763076', 'CARICUAO', '04128763076', 1, 'V'),
(27333664, 'Jesus', 'Aranguren', 'Progrmador', 'Fuerte Tiuna', '04149177038', 'Caricuao', '02128544796', 2, 'V'),
(27879023, 'Nazareth ', 'Plazola', 'Ama de Casa', 'Las Adjuntas', '04242327553', 'Las Adjuntas', '04242327553', 1, 'V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id` int(11) NOT NULL,
  `grado` varchar(50) NOT NULL,
  `statud` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `grado`, `statud`) VALUES
(1, '1° GRADO', 1),
(2, '2° GRADO', 1),
(3, '3° GRADO', 1),
(4, '4° GRADO', 1),
(5, '5° GRADO', 1),
(6, '6° GRADO', 1),
(8, '7° GRADO', 1),
(9, '1° Grupo Maternal', 1),
(10, '2° Grupo Maternal', 1),
(11, '3° Grupo Maternal', 1),
(13, '8° GRADO', 1),
(14, 'primer grado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

CREATE TABLE `historico` (
  `id_his` int(11) NOT NULL,
  `accion` text NOT NULL,
  `type_his` tinyint(4) NOT NULL COMMENT '1 administracion 2 usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historico`
--

INSERT INTO `historico` (`id_his`, `accion`, `type_his`) VALUES
(1, 'el usuario admin a iniciado session el dia 2020-10-12 09:08:44', 1),
(2, 'el usuario admin a iniciado session el dia 2020-10-13 08:36:41', 2),
(3, 'el usuario admin a iniciado session el dia 2020-10-13 10:30:26', 1),
(4, 'el usuario admin a iniciado session el dia 2020-10-13 01:09:39', 1),
(5, 'el usuario admin a iniciado session el dia 2020-10-13 03:55:04', 1),
(6, 'el usuario admin a iniciado session el dia 2020-10-13 06:06:52', 1),
(7, 'el usuario admin a iniciado session el dia 2020-10-13 07:07:34', 1),
(8, 'el usuario admin a iniciado session el dia 2020-10-13 07:09:20', 1),
(9, 'el usuario admin a iniciado session el dia 2020-10-14 11:29:19', 1),
(10, 'el usuario admin a iniciado session el dia 2020-10-14 01:46:15', 1),
(11, 'el usuario admin a iniciado session el dia 2020-10-14 03:44:23', 1),
(12, 'el usuario admin a iniciado session el dia 2020-10-14 03:44:29', 1),
(13, 'el usuario admin a iniciado session el dia 2020-10-14 03:44:40', 1),
(14, 'el usuario admin a iniciado session el dia 2020-10-14 03:44:44', 1),
(15, 'el usuario admin a iniciado session el dia 2020-10-14 03:45:01', 1),
(16, 'el usuario admin a iniciado session el dia 2020-10-14 04:57:47', 1),
(17, 'el usuario admin a iniciado session el dia 2020-10-14 07:05:08', 1),
(18, 'el usuario admin a iniciado session el dia 2020-10-15 08:46:38', 1),
(19, 'el usuario admin a iniciado session el dia 2020-10-15 09:41:18', 1),
(20, 'el usuario admin a iniciado session el dia 2020-10-15 10:36:29', 1),
(21, 'el usuario admin a iniciado session el dia 2020-10-15 12:52:32', 1),
(22, 'el usuario admin a iniciado session el dia 2020-10-15 03:09:40', 1),
(23, 'el usuario admin a iniciado session el dia 2020-10-15 04:50:17', 1),
(24, 'el usuario admin a iniciado session el dia 2020-10-15 07:37:22', 1),
(25, 'el usuario admin a iniciado session el dia 2020-10-17 09:07:00', 1),
(26, 'el usuario admin a iniciado session el dia 2020-10-17 11:51:48', 1),
(27, 'el usuario admin a iniciado session el dia 2020-10-17 03:44:16', 1),
(28, 'el usuario admin a iniciado session el dia 2020-10-17 03:48:23', 1),
(29, 'el usuario admin a iniciado session el dia 2020-10-17 03:49:57', 1),
(30, 'el usuario admin a iniciado session el dia 2020-10-17 04:16:32', 1),
(31, 'el usuario admin a iniciado session el dia 2020-10-17 04:18:27', 1),
(32, 'el usuario admin a iniciado session el dia 2020-10-17 04:39:21', 1),
(33, 'el usuario admin a iniciado session el dia 2020-10-17 05:43:48', 1),
(34, 'el usuario admin a iniciado session el dia 2020-10-29 07:22:07', 1),
(35, 'el usuario admin a iniciado session el dia 2020-10-29 08:10:23', 1),
(36, 'el usuario admin a iniciado session el dia 2020-10-29 08:44:32', 1),
(37, 'el usuario admin a iniciado session el dia 2020-10-30 09:32:11', 1),
(38, 'el usuario admin a iniciado session el dia 2020-10-30 06:58:41', 1),
(39, 'el usuario root a iniciado session el dia 2020-10-30 07:29:20', 2),
(40, 'el usuario root a iniciado session el dia 2020-10-30 07:29:29', 2),
(41, 'el usuario admin a iniciado session el dia 2020-10-30 07:33:10', 1),
(42, 'el usuario root a iniciado session el dia 2020-10-30 07:35:02', 2),
(43, 'el usuario admin a iniciado session el dia 2020-10-30 07:35:28', 1),
(44, 'el usuario admin a iniciado session el dia 2020-10-30 07:35:54', 1),
(45, 'el usuario mvillan a iniciado session el dia 2020-10-30 08:53:17', 2),
(46, 'el usuario admin a iniciado session el dia 2020-10-30 08:53:45', 1),
(47, 'el usuario mvillan a iniciado session el dia 2020-10-30 08:54:10', 2),
(48, 'el usuario mvillan a iniciado session el dia 2020-10-30 08:54:10', 2),
(49, 'el usuario admin a iniciado session el dia 2020-10-30 09:37:00', 1),
(50, 'el usuario admin a iniciado session el dia 2020-10-30 09:37:53', 1),
(51, 'el usuario mvillan a iniciado session el dia 2020-10-30 09:38:45', 2),
(52, 'el usuario admin a iniciado session el dia 2020-10-30 09:53:00', 1),
(53, 'el usuario admin a iniciado session el dia 2020-10-30 09:53:33', 1),
(54, 'el usuario admin a iniciado session el dia 2020-10-31 12:03:03', 1),
(55, 'el usuario admin a iniciado session el dia 2020-10-31 12:05:58', 1),
(56, 'el usuario admin a iniciado session el dia 2020-10-31 12:11:35', 1),
(57, 'el usuario admin a iniciado session el dia 2020-10-31 09:42:21', 1),
(58, 'el usuario mvillan a iniciado session el dia 2020-10-31 09:44:55', 2),
(59, 'el usuario root a iniciado session el dia 2020-10-31 09:48:48', 2),
(60, 'el usuario admin a iniciado session el dia 2020-10-31 09:52:34', 1),
(61, 'el usuario admin a iniciado session el dia 2020-10-31 09:54:41', 1),
(62, 'el usuario admin a iniciado session el dia 2020-10-31 10:01:41', 1),
(63, 'el usuario admin a iniciado session el dia 2020-10-31 10:46:24', 1),
(64, 'el usuario admin a iniciado session el dia 2020-10-31 10:46:43', 1),
(65, 'el usuario admin a iniciado session el dia 2020-10-31 10:47:03', 1),
(66, 'el usuario admin a iniciado session el dia 2020-10-31 12:08:43', 1),
(67, 'el usuario admin a iniciado session el dia 2020-10-31 12:28:18', 1),
(68, 'el usuario admin a iniciado session el dia 2020-10-31 12:52:22', 1),
(69, 'el usuario root a iniciado session el dia 2020-10-31 01:25:39', 2),
(70, 'el usuario admin a iniciado session el dia 2020-10-31 04:26:31', 1),
(71, 'el usuario admin a iniciado session el dia 2020-10-31 04:28:14', 1),
(72, 'el usuario admin a iniciado session el dia 2020-10-31 05:30:18', 1),
(73, 'el usuario mvillan a iniciado session el dia 2020-10-31 05:42:20', 2),
(74, 'el usuario admin a iniciado session el dia 2020-10-31 05:43:54', 1),
(75, 'el usuario admin a iniciado session el dia 2020-10-31 06:32:45', 1),
(76, 'el usuario admin a iniciado session el dia 2020-11-11 03:06:47', 1),
(77, 'el usuario admin a iniciado session el dia 2020-11-22 10:31:24', 1),
(78, 'el usuario admin a iniciado session el dia 2020-11-25 06:31:29', 1),
(79, 'el usuario admin a iniciado session el dia 2020-11-25 08:36:18', 1),
(80, 'el usuario admin a iniciado session el dia 2020-11-25 08:40:18', 1),
(81, 'el usuario mvillan a iniciado session el dia 2020-11-25 08:41:21', 2),
(82, 'el usuario mvillan a iniciado session el dia 2020-11-25 08:50:08', 2),
(83, 'el usuario root a iniciado session el dia 2020-11-25 08:51:07', 2),
(84, 'el usuario admin a iniciado session el dia 2020-11-25 08:52:17', 1),
(85, 'el usuario admin a iniciado session el dia 2020-11-25 08:55:10', 1),
(86, 'el usuario admin a iniciado session el dia 2020-11-28 10:51:17', 1),
(87, 'el usuario mvillan a iniciado session el dia 2020-11-28 10:55:39', 2),
(88, 'el usuario admin a iniciado session el dia 2020-11-28 10:55:54', 1),
(89, 'el usuario admin a iniciado session el dia 2020-12-07 05:05:00', 1),
(90, 'el usuario admin a iniciado session el dia 2020-12-08 01:02:23', 1),
(91, 'el usuario mvillan a iniciado session el dia 2020-12-08 02:10:38', 2),
(92, 'el usuario admin a iniciado session el dia 2020-12-08 02:11:54', 1),
(93, 'el usuario admin a iniciado session el dia 2021-01-11 05:07:39', 1),
(94, 'el usuario admin a iniciado session el dia 2021-01-13 09:56:59', 1),
(95, 'el usuario mvillan a iniciado session el dia 2021-01-13 10:00:12', 2),
(96, 'el usuario admin a iniciado session el dia 2021-01-13 10:00:26', 1),
(97, 'el usuario admin a iniciado session el dia 2021-01-13 11:09:41', 1),
(98, 'el usuario admin a iniciado session el dia 2021-01-13 02:32:49', 1),
(99, 'el usuario admin a iniciado session el dia 2021-01-13 04:47:23', 1),
(100, 'el usuario admin a iniciado session el dia 2021-01-16 12:34:38', 1),
(101, 'el usuario admin a iniciado session el dia 2021-01-16 03:06:52', 1),
(102, 'el usuario admin a iniciado session el dia 2021-01-16 03:51:32', 1),
(103, 'el usuario admin a iniciado session el dia 2021-01-16 04:06:14', 1),
(104, 'el usuario admin a iniciado session el dia 2021-01-16 07:59:58', 1),
(105, 'el usuario admin a iniciado session el dia 2021-01-16 10:26:31', 1),
(106, 'el usuario admin a iniciado session el dia 2021-01-17 09:33:07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `start` varchar(200) NOT NULL,
  `end` varchar(200) NOT NULL,
  `className` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id`, `title`, `start`, `end`, `className`) VALUES
(5, 'INGLES', 'Tue Dec 15 2020 20:00:00 GMT-0400 (hora de Venezuela)', 'Wed Dec 16 2020 20:00:00 GMT-0400 (hora de Venezuela)', 'bg-danger'),
(6, 'FUTBOL', 'Tue Dec 15 2020 20:00:00 GMT-0400 (hora de Venezuela)', 'Wed Dec 16 2020 20:00:00 GMT-0400 (hora de Venezuela)', 'bg-success'),
(7, 'Matemática', 'Tue Jan 05 2021 20:00:00 GMT-0400 (hora de Venezuela)', 'Wed Jan 06 2021 20:00:00 GMT-0400 (hora de Venezuela)', 'bg-danger');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incripcion`
--

CREATE TABLE `incripcion` (
  `id` int(11) NOT NULL,
  `alumno` bigint(11) NOT NULL,
  `año_escolar` int(11) NOT NULL,
  `aula` int(11) NOT NULL,
  `representante` int(11) NOT NULL,
  `statud` tinyint(4) NOT NULL,
  `fecha_inscrip` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incripcion`
--

INSERT INTO `incripcion` (`id`, `alumno`, `año_escolar`, `aula`, `representante`, `statud`, `fecha_inscrip`) VALUES
(1, 11985185317, 9, 10, 19851853, 1, '2021-01-13'),
(12, 21985185310, 9, 5, 19851853, 1, '2021-01-13'),
(14, 1686575915, 9, 2, 6865759, 1, '2021-01-13'),
(15, 30569985, 9, 4, 16021589, 1, '2021-01-13'),
(16, 11687636207, 9, 6, 16876362, 1, '2021-01-13'),
(17, 11234567818, 9, 1, 12345678, 1, '2021-01-13'),
(20, 12274876410, 9, 7, 22748764, 1, '2021-01-13'),
(21, 12787902316, 9, 5, 27879023, 1, '2021-01-13'),
(22, 11533760507, 9, 1, 15337605, 1, '2021-01-13'),
(23, 11856987518, 9, 9, 18569875, 1, '2021-01-13'),
(24, 12371071210, 9, 11, 23710712, 1, '2021-01-13'),
(25, 12587212517, 9, 9, 25872125, 1, '2021-01-13'),
(26, 12733366405, 9, 8, 27333664, 1, '2021-01-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_escolar`
--

CREATE TABLE `periodo_escolar` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fecha_inicial` date NOT NULL,
  `fecha_final` date NOT NULL,
  `statud` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodo_escolar`
--

INSERT INTO `periodo_escolar` (`id`, `titulo`, `fecha_inicial`, `fecha_final`, `statud`) VALUES
(4, 'Escolar_2014_2015', '2014-09-13', '2015-09-14', 0),
(5, 'Escolar_2015_2016', '2015-09-19', '2016-09-20', 0),
(6, 'Escolar_2016_2017', '2016-09-21', '2017-09-23', 0),
(7, 'Escolar_2017_2018', '2017-09-23', '2018-09-26', 0),
(8, 'Escolar_2018_2019', '2018-09-27', '2019-10-03', 0),
(9, 'Escolar_2019_2020', '2020-10-05', '2021-07-16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `permiso` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `ruta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`permiso`, `usuario`, `ruta`) VALUES
(1, 21, 1),
(5, 21, 30),
(8, 26, 1),
(7, 26, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `tipo_documento` tinyint(1) DEFAULT NULL COMMENT '0 Venezolano 1 extrajero ',
  `num_documento` varchar(20) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES
(1, 'Sistema', 0, '25326051', 'caracas', '04123082432', 'usuarios@hotmail.com'),
(21, 'alexis torres', 0, '6865759', 'caracas', '04120000000', 'admin@admin.com'),
(26, 'Moises Villan', 0, '19851853', 'Plaza Venezuela', '04128002911', 'moisesvillan@hotmail.com'),
(28, 'Edwuard Castañeda', 1, '30254896', 'Las Adjuntas', '04128563548', 'Edwuardc@mail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_incripcion`
--

CREATE TABLE `pre_incripcion` (
  `id` int(11) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `alumno` bigint(20) NOT NULL,
  `grado` int(11) NOT NULL,
  `representante` int(11) DEFAULT NULL,
  `statud` int(11) NOT NULL,
  `perido_escolar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pre_incripcion`
--

INSERT INTO `pre_incripcion` (`id`, `fecha`, `alumno`, `grado`, `representante`, `statud`, `perido_escolar`) VALUES
(5, '2020-10-17', 1686575915, 1, 6865759, 0, 9),
(6, '2020-10-15', 11985185317, 1, 19851853, 0, 9),
(7, '2020-10-17', 21985185310, 2, 19851853, 0, 9),
(8, '2020-10-17', 11687636207, 8, 16876362, 0, 9),
(10, '2020-10-17', 30569985, 4, 16021589, 0, 9),
(13, '2020-10-30', 12274876410, 3, 22748764, 0, 9),
(14, '2020-10-31', 12787902316, 10, 27879023, 0, 9),
(15, '2020-10-31', 11533760507, 1, 15337605, 0, 9),
(18, '2020-12-08', 11856987518, 1, 18569875, 0, 9),
(19, '2020-12-08', 12371071210, 3, 23710712, 0, 9),
(20, '2020-12-12', 12587212517, 1, 25872125, 0, 9),
(21, '2021-01-13', 12733366405, 13, 27333664, 0, 9),
(22, '2021-01-13', 11602158820, 1, 16021588, 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `persona` int(11) NOT NULL,
  `aula` int(11) DEFAULT NULL,
  `condicion` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`persona`, `aula`, `condicion`) VALUES
(28, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Administrador', 'Administrador del sistema', 1),
(2, 'Profesor', 'Profesor del sistema', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `ruta` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `modulo` varchar(45) NOT NULL,
  `Padre` int(11) DEFAULT NULL,
  `url` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`ruta`, `icon`, `modulo`, `Padre`, `url`) VALUES
(1, 'mdi mdi-account-card-details', 'Pre-Inscripción', 0, '#'),
(2, 'mdi mdi-account-card-details', 'Formulario Preinscripción ', 1, 'form_pre_inscripcion.php'),
(3, 'mdi mdi-account-card-details', 'Consulta Preinscripción', 1, 'pre_consulta.php'),
(4, 'mdi mdi-account-card-details', 'Listado Preinscripción ', 1, 'list_pre_inscripcion.php'),
(5, 'mdi mdi-account-check', 'Admisión', 0, '#'),
(6, 'mdi mdi-view-list', 'Grados', 5, 'grados.php'),
(7, 'mdi mdi-view-list', 'Secciones', 5, 'secciones.php'),
(9, 'mdi mdi-view-list', 'Inscripción', 5, 'inscripcion.php'),
(10, 'mdi mdi-account-multiple', 'Control Usuarios', 0, '#'),
(11, 'mdi mdi-account-circle', 'Registrar Profesor', 10, 'form-prof.php'),
(12, 'mdi mdi-account-circle', 'Registrar Usuario', 10, 'form-user.php'),
(13, 'mdi mdi-view-list', 'Lista de profesor', 10, 'list-prof.php'),
(14, 'mdi mdi-view-list', 'Lista de Usuario', 10, 'list-user.php'),
(15, 'mdi mdi-at', 'Bienestar Social', 0, '#'),
(16, 'mdi mdi-laptop', 'Tecnologia', 15, 'Tecnologia.php'),
(17, 'mdi mdi-ambulance', 'Vacunas', 15, 'Vacunas.php'),
(18, 'mdi mdi-ambulance', 'Salud', 15, 'Salud.php'),
(19, 'mdi mdi-shopping', 'Uniforme', 15, 'Uniforme.php'),
(30, 'mdi mdi-box-shadow', 'Gestión Escolar', 0, ''),
(31, 'mdi mdi-box-shadow', 'Nuevo año Escolar', 30, 'new-escolar.php'),
(32, 'mdi mdi-box-shadow', 'Cierre de año escolar', 30, 'close-escolar.php'),
(33, 'mdi mdi-box-shadow', 'Reporte de año', 30, 'Report-escolar.php'),
(34, 'mdi mdi-view-list', 'Aulas', 5, 'list-aulas.php'),
(35, 'mdi mdi-calendar-multiple', 'Agenda Escolar', 0, '#'),
(36, 'mdi mdi-account-key', 'Permiso de Usuario', 10, 'permiso_user.php'),
(37, 'mdi mdi-calendar-clock', 'Calendario', 35, 'horarios.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `seccion` varchar(50) NOT NULL,
  `statud` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `seccion`, `statud`) VALUES
(1, 'A', 1),
(2, 'B', 1),
(3, 'C', 1),
(4, 'D', 1),
(5, 'E', 1),
(6, 'F', 1),
(7, 'G', 1),
(8, 'simon bolivar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_beneficio`
--

CREATE TABLE `tipo_beneficio` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_beneficio`
--

INSERT INTO `tipo_beneficio` (`id`, `descripcion`) VALUES
(1, 'Beca'),
(2, 'cedulacion'),
(3, 'uniforme'),
(4, 'tecnologia'),
(5, 'vacuna'),
(6, 'salud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `persona` int(11) NOT NULL,
  `rol` int(11) DEFAULT NULL,
  `nick` varchar(10) DEFAULT NULL,
  `clave` varchar(64) DEFAULT NULL,
  `forgot_pass` varchar(64) DEFAULT NULL,
  `condicion` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`persona`, `rol`, `nick`, `clave`, `forgot_pass`, `condicion`) VALUES
(1, 1, 'admin', '$2y$10$V52D/iyl4XMa2ZFrHQHL1.2.9gvuqfBgw3NzgNEDfYZGvYfCKzbke', 'admin', 1),
(21, 2, 'root', '$2y$10$JZW4pkFayvtPa7yFLbSqdeBglzH3IDNVyCLWkK5Dozbf4kM7Qwua.', 'root', 1),
(26, 2, 'mvillan', '$2y$10$ayVmCmIdyihbkec8eiw9EutOBgCSGyhO8g/n4SVEmfwSbQVYRH2eO', '1234', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE `vacunas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vacunas`
--

INSERT INTO `vacunas` (`id`, `nombre`) VALUES
(1, 'tosferina'),
(2, 'Difteria'),
(3, 'Tetanos'),
(4, 'Pertussis'),
(5, 'Poliomielitis'),
(6, 'haemophilus influenzae b'),
(7, 'Hepatistis b'),
(8, 'Meningococica C'),
(9, 'Varicela'),
(10, 'Papiloma humano'),
(11, 'Neumococica'),
(12, 'BCG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grado` (`grado`,`seccion`),
  ADD KEY `seccion` (`seccion`),
  ADD KEY `año_escolar` (`año_escolar`);

--
-- Indices de la tabla `beneficio`
--
ALTER TABLE `beneficio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aula` (`aula`,`alumno`,`año_escolar`),
  ADD KEY `beneficio_ibfk_1` (`alumno`),
  ADD KEY `beneficio_ibfk_3` (`año_escolar`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_beneficio`
--
ALTER TABLE `categoria_beneficio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_beneficio_fk` (`beneficio`);

--
-- Indices de la tabla `correo`
--
ALTER TABLE `correo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `de` (`de`,`para`),
  ADD KEY `receptor` (`para`);

--
-- Indices de la tabla `datos_emergencia`
--
ALTER TABLE `datos_emergencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familiares`
--
ALTER TABLE `familiares`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id_his`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incripcion`
--
ALTER TABLE `incripcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno` (`alumno`,`año_escolar`,`aula`),
  ADD KEY `año_escolar` (`año_escolar`),
  ADD KEY `aula` (`aula`),
  ADD KEY `representante` (`representante`);

--
-- Indices de la tabla `periodo_escolar`
--
ALTER TABLE `periodo_escolar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`permiso`),
  ADD KEY `persona` (`usuario`,`ruta`),
  ADD KEY `ruta` (`ruta`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pre_incripcion`
--
ALTER TABLE `pre_incripcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno` (`alumno`,`grado`,`representante`,`perido_escolar`),
  ADD KEY `grado` (`grado`),
  ADD KEY `pre_incripcion_ibfk_3` (`representante`),
  ADD KEY `pre_incripcion_ibfk_4` (`perido_escolar`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`persona`),
  ADD KEY `aula_profesor` (`aula`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`ruta`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_beneficio`
--
ALTER TABLE `tipo_beneficio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`persona`),
  ADD KEY `rol` (`rol`);

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `beneficio`
--
ALTER TABLE `beneficio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria_beneficio`
--
ALTER TABLE `categoria_beneficio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `correo`
--
ALTER TABLE `correo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `historico`
--
ALTER TABLE `historico`
  MODIFY `id_his` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `incripcion`
--
ALTER TABLE `incripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `periodo_escolar`
--
ALTER TABLE `periodo_escolar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `pre_incripcion`
--
ALTER TABLE `pre_incripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_beneficio`
--
ALTER TABLE `tipo_beneficio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `aula_ibfk_1` FOREIGN KEY (`seccion`) REFERENCES `secciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `aula_ibfk_2` FOREIGN KEY (`grado`) REFERENCES `grados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `aula_ibfk_3` FOREIGN KEY (`año_escolar`) REFERENCES `periodo_escolar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `beneficio`
--
ALTER TABLE `beneficio`
  ADD CONSTRAINT `beneficio_ibfk_1` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `beneficio_ibfk_2` FOREIGN KEY (`aula`) REFERENCES `aula` (`id`),
  ADD CONSTRAINT `beneficio_ibfk_3` FOREIGN KEY (`año_escolar`) REFERENCES `periodo_escolar` (`id`);

--
-- Filtros para la tabla `categoria_beneficio`
--
ALTER TABLE `categoria_beneficio`
  ADD CONSTRAINT `tipo_beneficio_fk` FOREIGN KEY (`beneficio`) REFERENCES `tipo_beneficio` (`id`);

--
-- Filtros para la tabla `correo`
--
ALTER TABLE `correo`
  ADD CONSTRAINT `receptor` FOREIGN KEY (`para`) REFERENCES `usuario` (`persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `remitente` FOREIGN KEY (`de`) REFERENCES `usuario` (`persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `incripcion`
--
ALTER TABLE `incripcion`
  ADD CONSTRAINT `incripcion_ibfk_1` FOREIGN KEY (`año_escolar`) REFERENCES `periodo_escolar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `incripcion_ibfk_2` FOREIGN KEY (`aula`) REFERENCES `aula` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `incripcion_ibfk_3` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `incripcion_ibfk_4` FOREIGN KEY (`representante`) REFERENCES `familiares` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`persona`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`ruta`) REFERENCES `ruta` (`ruta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pre_incripcion`
--
ALTER TABLE `pre_incripcion`
  ADD CONSTRAINT `pre_incripcion_ibfk_1` FOREIGN KEY (`grado`) REFERENCES `grados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pre_incripcion_ibfk_2` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pre_incripcion_ibfk_3` FOREIGN KEY (`representante`) REFERENCES `familiares` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pre_incripcion_ibfk_4` FOREIGN KEY (`perido_escolar`) REFERENCES `periodo_escolar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `aula_profesor` FOREIGN KEY (`aula`) REFERENCES `aula` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `persona_profesor` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `persona` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
