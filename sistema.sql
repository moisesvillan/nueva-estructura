-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-11-2020 a las 15:23:23
-- Versión del servidor: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.12

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
CREATE DATABASE IF NOT EXISTS `sistema` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sistema`;

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
-- Truncar tablas antes de insertar `alumnos`
--

TRUNCATE TABLE `alumnos`;
--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombres`, `apellidos`, `nacionalidad`, `Lnaciomiento`, `fecha`, `edad`, `sexo`, `plantelAnterior`, `religion`, `correo`, `statud`) VALUES
(11111, 'sdasda', 'adada', '1', 'asdasdas', '2020-09-22', 1, 0, 'dasdasd', 'dasdas', 'sdasdasd', 1),
(30569985, 'Derrinson Jose', 'Nieto Mejias', '1', 'Caracas', '2010-08-29', 10, 0, 'N/A', 'Catolico', 'harris@mail.com', 1),
(1686575915, 'Alejandro', 'Torres', '1', 'Caracas', '2015-08-04', 5, 1, 'N/A', 'catolico', 'mail@mail.com', 1),
(2133123123, 'asdasdas', 'sdasdasd', '1', 'asdasdasda', '2020-09-18', 1, 1, 'asdasdas', 'asdasdasd', 'asdasdasd', 1),
(11234567818, 'asdasdas', 'asdasdas', '1', 'Caracas', '2018-08-29', 2, 1, 'N/A', 'N/A', 'maria@mail.com', 1),
(11687636207, 'Adrian', 'Ortiz', '1', 'Caracas', '2007-10-10', 13, 1, 'N/A', 'N/A', 'yos@mail.com', 1),
(11985185317, 'Miranda', 'Villan', '1', 'caracas', '2017-08-17', 3, 1, 'n/a', 'n/a', 'moises@mail.com', 1),
(21985185310, 'Fabian', 'Villan', '1', 'caracas', '2010-01-10', 10, 1, 'n/a', 'santero', 'moises@mail.com', 1),
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
-- Truncar tablas antes de insertar `aula`
--

TRUNCATE TABLE `aula`;
--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id`, `aula`, `grado`, `seccion`, `cupos`, `disponibilidad`, `statud`, `año_escolar`) VALUES
(1, 'simon bolivar', 1, 1, 30, 28, 1, 9),
(2, 'Andres bello', 2, 2, 30, 28, 1, 9),
(3, 'Manuela Saenz', 9, 1, 15, 15, 1, 9),
(4, 'Simoncito', 4, 1, 35, 34, 1, 9),
(5, 'Simon Rodriguez', 10, 1, 15, 15, 1, 9),
(6, 'Negro primero', 8, 1, 30, 29, 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficio`
--

CREATE TABLE `beneficio` (
  `id` int(11) NOT NULL,
  `aula` int(11) NOT NULL,
  `alumno` bigint(20) NOT NULL,
  `tipo` tinyint(1) NOT NULL COMMENT '1 beca 2 cedulacion 3 uniforme 4 tecnologia 5 vacuna 6 salud',
  `año_escolar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `beneficio`
--

TRUNCATE TABLE `beneficio`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `categorias`
--

TRUNCATE TABLE `categorias`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Correo`
--

CREATE TABLE `Correo` (
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
-- Truncar tablas antes de insertar `Correo`
--

TRUNCATE TABLE `Correo`;
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
-- Truncar tablas antes de insertar `datos_emergencia`
--

TRUNCATE TABLE `datos_emergencia`;
--
-- Volcado de datos para la tabla `datos_emergencia`
--

INSERT INTO `datos_emergencia` (`id`, `enfermedad`, `detalle_enfermedad`, `terapia`, `detalle_terapia`, `alergia`, `detalle_alergia`, `tlfemerg`, `vacunas`, `detalle_vacunas`) VALUES
(11111, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '1231231231', 1, 'Posee todas las vacunas registradas'),
(30569985, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '04269045197', 1, 'Posee todas las vacunas registradas'),
(1686575915, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '000000000000', 1, 'Posee todas las vacunas registradas'),
(2133123123, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', 'asdasdas', 1, 'Posee todas las vacunas registradas'),
(11234567818, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '1234567', 1, 'Posee todas las vacunas registradas'),
(11687636207, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '02127633642', 1, 'Posee todas las vacunas registradas'),
(11985185317, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '04142902549', 1, 'Posee todas las vacunas registradas'),
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
-- Truncar tablas antes de insertar `familiares`
--

TRUNCATE TABLE `familiares`;
--
-- Volcado de datos para la tabla `familiares`
--

INSERT INTO `familiares` (`id`, `nombre`, `apellido`, `ocupacion`, `Dtrabajo`, `Tlftrabajo`, `DHogar`, `TlfHogar`, `Parestesco`, `nacionalidad`) VALUES
(6865759, 'Alexis', 'Torres', 'Obrero', 'Sabana Grande', '000000', 'EL valle', '0000000', 2, 'V'),
(12345678, 'asdad', 'asdasd', 'asdasd', 'asdasda', '00000', 'asdad', '000000', 2, 'V'),
(16021589, 'Harrinson', 'Nieto', 'Obrero', 'Las Adjuntas', '04269207616', 'Las Nieves', '04269207616', 2, 'V'),
(16876362, 'Yosmar', 'Ortiz', 'Administrador', 'Capitolio', '04123089604', 'Catia', '02128632625', 2, 'V'),
(19851853, 'Moises', 'Villan', 'informatica', 'plaza venezuela', '4128002911', 'las acacias', '02127633642', 2, 'V'),
(22026502, 'Katherine', 'Gutierrez', 'Ast.Adm', 'El recreo', '04128888888', 'Antimano', '04126655896', 1, 'V'),
(25326051, 'alexander', 'torres', 'informatico', 'caracas', '00000000000', 'caracas', '00000000', 2, 'V');

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
-- Truncar tablas antes de insertar `grados`
--

TRUNCATE TABLE `grados`;
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
(9, '1° Grupo-M', 1),
(10, '2° Grupo-M', 1),
(11, '3° Grupo-M', 1),
(12, 'prueba-1', 1);

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
-- Truncar tablas antes de insertar `historico`
--

TRUNCATE TABLE `historico`;
--
-- Volcado de datos para la tabla `historico`
--

INSERT INTO `historico` (`id_his`, `accion`, `type_his`) VALUES
(1, 'el usuario admin a iniciado session el dia 2020-10-12 09:08:44', 1),
(2, 'el usuario admin a iniciado session el dia 2020-10-13 08:36:41', 1),
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
(45, 'el usuario admin a iniciado session el dia 2020-11-20 08:27:02', 1),
(46, 'el usuario admin a iniciado session el dia 2020-11-20 08:27:23', 1),
(47, 'el usuario admin a iniciado session el dia 2020-11-20 01:31:19', 1);

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
-- Truncar tablas antes de insertar `horario`
--

TRUNCATE TABLE `horario`;
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
  `statud` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `incripcion`
--

TRUNCATE TABLE `incripcion`;
--
-- Volcado de datos para la tabla `incripcion`
--

INSERT INTO `incripcion` (`id`, `alumno`, `año_escolar`, `aula`, `representante`, `statud`) VALUES
(1, 11985185317, 9, 1, 19851853, 1),
(12, 21985185310, 9, 2, 19851853, 1),
(13, 22202650206, 9, 4, 22026502, 1),
(14, 1686575915, 9, 1, 6865759, 1),
(15, 30569985, 9, 4, 16021589, 1),
(16, 11687636207, 9, 6, 16876362, 1),
(17, 11234567818, 9, 1, 12345678, 1);

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
-- Truncar tablas antes de insertar `periodo_escolar`
--

TRUNCATE TABLE `periodo_escolar`;
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
-- Truncar tablas antes de insertar `permisos`
--

TRUNCATE TABLE `permisos`;
--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`permiso`, `usuario`, `ruta`) VALUES
(1, 21, 1),
(2, 21, 5),
(3, 21, 15),
(4, 21, 26);

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
-- Truncar tablas antes de insertar `persona`
--

TRUNCATE TABLE `persona`;
--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES
(1, 'usuario', 0, '25326051', 'caracas', '04123082432', 'usuarios@hotmail.com'),
(21, 'alexis torres', 1, '6865759', 'caracas', '04120000000', 'admin@admin.com');

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
-- Truncar tablas antes de insertar `pre_incripcion`
--

TRUNCATE TABLE `pre_incripcion`;
--
-- Volcado de datos para la tabla `pre_incripcion`
--

INSERT INTO `pre_incripcion` (`id`, `fecha`, `alumno`, `grado`, `representante`, `statud`, `perido_escolar`) VALUES
(3, '2020-09-19', 2133123123, 4, 25326051, 1, 5),
(4, '2020-09-21', 11111, 5, 25326051, 1, 6),
(5, '2020-10-17', 1686575915, 1, 6865759, 0, 9),
(6, '2020-10-15', 11985185317, 1, 19851853, 0, 9),
(7, '2020-10-17', 21985185310, 2, 19851853, 0, 9),
(8, '2020-10-17', 11687636207, 8, 16876362, 0, 9),
(9, '2020-10-17', 22202650206, 2, 22026502, 0, 9),
(10, '2020-10-17', 30569985, 4, 16021589, 0, 9),
(11, '2020-10-30', 11234567818, 1, 12345678, 0, 9);

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
-- Truncar tablas antes de insertar `profesor`
--

TRUNCATE TABLE `profesor`;
--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`persona`, `aula`, `condicion`) VALUES
(1, 1, 1);

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
-- Truncar tablas antes de insertar `rol`
--

TRUNCATE TABLE `rol`;
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
-- Truncar tablas antes de insertar `ruta`
--

TRUNCATE TABLE `ruta`;
--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`ruta`, `icon`, `modulo`, `Padre`, `url`) VALUES
(1, 'mdi mdi-file', 'Pre-inscripcion', 0, '#'),
(2, 'mdi mdi-view-list', 'lst. de pre-inscrito', 1, 'list_pre_inscripcion.php'),
(3, 'mdi mdi-file', 'Plla. de pre-inscrito', 1, 'pre_consulta.php'),
(4, 'mdi mdi-file', 'Form. de pre-incrito', 1, 'form_pre_inscripcion.php'),
(5, 'mdi mdi-file', 'Inscripcion', 0, '#'),
(6, 'mdi mdi-view-list', 'Grados', 5, 'grados.php'),
(7, 'mdi mdi-view-list', 'Secciones', 5, 'secciones.php'),
(9, 'mdi mdi-view-list', 'Calendario', 5, 'horarios.php'),
(10, 'mdi mdi-file', 'Registro', 0, '#'),
(11, 'mdi mdi-file', 'Registrar Profesor', 10, 'form-prof.php'),
(12, 'mdi mdi-file', 'Registrar Usuario', 10, 'form-user.php'),
(13, 'mdi mdi-view-list', 'Lista de profesor', 10, 'list-prof.php'),
(14, 'mdi mdi-view-list', 'Lista de Usuario', 10, 'list-user.php'),
(15, 'mdi mdi-at', 'Bienestar social', 0, '#'),
(16, 'mdi mdi-laptop', 'Tecnologia', 15, 'Tecnologia.php'),
(17, 'mdi mdi-ambulance', 'Vacunas', 15, 'Vacunas.php'),
(18, 'mdi mdi-ambulance', 'Salud', 15, 'Salud.php'),
(19, 'mdi mdi-shopping', 'Uniforme', 15, 'Uniforme.php'),
(20, 'mdi mdi-account-card-details', 'Cedulacion', 15, 'Cedulacion.php'),
(21, 'mdi mdi-account-check', 'Becas', 15, 'Becas.php'),
(26, 'mdi mdi-email', 'Correo', 0, '#'),
(27, 'mdi mdi-send', 'Envio', 26, 'email-send.php'),
(28, 'mdi mdi-email-alert', 'Inbox', 26, 'email-inbox.php'),
(29, 'mdi mdi-cube-send', 'Correo masivos', 26, 'email-masvio.php'),
(30, 'mdi mdi-file', 'Gestion escolar', 0, ''),
(31, 'mdi mdi-file', 'Nuevo año Escolar', 30, 'new-escolar.php'),
(32, 'mdi mdi-file', 'Cierre de año escolar', 30, 'close-escolar.php'),
(33, 'mdi mdi-file', 'Reporte de año', 30, 'Report-escolar.php'),
(34, 'mdi mdi-view-list', 'Aulas', 5, 'list-aulas.php'),
(35, 'mdi mdi-file', 'Inscripcion', 5, 'inscripcion.php'),
(36, 'mdi mdi-view-list', 'Permiso de usuario', 10, 'permiso_user.php');

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
-- Truncar tablas antes de insertar `secciones`
--

TRUNCATE TABLE `secciones`;
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
(7, 'G', 1);

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
-- Truncar tablas antes de insertar `usuario`
--

TRUNCATE TABLE `usuario`;
--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`persona`, `rol`, `nick`, `clave`, `forgot_pass`, `condicion`) VALUES
(1, 1, 'admin', '$2y$10$V52D/iyl4XMa2ZFrHQHL1.2.9gvuqfBgw3NzgNEDfYZGvYfCKzbke', 'admin', 1),
(21, 2, 'root', '$2y$10$JZW4pkFayvtPa7yFLbSqdeBglzH3IDNVyCLWkK5Dozbf4kM7Qwua.', 'root', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE `vacunas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `vacunas`
--

TRUNCATE TABLE `vacunas`;
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
-- Indices de la tabla `Correo`
--
ALTER TABLE `Correo`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `beneficio`
--
ALTER TABLE `beneficio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Correo`
--
ALTER TABLE `Correo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `historico`
--
ALTER TABLE `historico`
  MODIFY `id_his` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `incripcion`
--
ALTER TABLE `incripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `periodo_escolar`
--
ALTER TABLE `periodo_escolar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `pre_incripcion`
--
ALTER TABLE `pre_incripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
-- Filtros para la tabla `Correo`
--
ALTER TABLE `Correo`
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
