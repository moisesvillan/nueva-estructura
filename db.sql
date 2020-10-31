-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-09-2020 a las 15:33:54
-- Versión del servidor: 10.3.22-MariaDB-1ubuntu1
-- Versión de PHP: 7.4.10

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
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'cedula',
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `Lnaciomiento` varchar(100) NOT NULL COMMENT 'Lugar de nacimiento',
  `fecha` date NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` int(11) NOT NULL COMMENT '0 MASCULINO 1 FEMENINO',
  `plantelAnterior` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombres`, `apellidos`, `nacionalidad`, `Lnaciomiento`, `fecha`, `edad`, `sexo`, `plantelAnterior`, `religion`, `correo`) VALUES
(11111, 'sdasda', 'adada', 'sadasdad', 'asdasdas', '2020-09-22', 1, 0, 'dasdasd', 'dasdas', 'sdasdasd'),
(2133123123, 'asdasdas', 'sdasdasd', 'adasdasdas', 'asdasdasda', '2020-09-18', 1, 1, 'asdasdas', 'asdasdasd', 'asdasdasd');

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
  `disponibilidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficio`
--

CREATE TABLE `beneficio` (
  `id` int(11) NOT NULL,
  `aula` int(11) NOT NULL,
  `alumno` int(11) NOT NULL,
  `tipo` tinyint(1) NOT NULL COMMENT '1 beca 2 cedulacion 3 uniforme 4 tecnologia 5 vacuna 6 salud'
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_emergencia`
--

CREATE TABLE `datos_emergencia` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(11111, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', '1231231231', 1, 'Posee todas las vacunas registradas'),
(2133123123, 0, 'No posee ninguna enfermedad', 0, 'No asiste a ninguna terapia', 0, 'No posee ninguna alergia', 'asdasdas', 1, 'Posee todas las vacunas registradas');

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
  `Parestesco` int(1) NOT NULL COMMENT '1 madre 2 padre 3 familiar a cargo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `familiares`
--

INSERT INTO `familiares` (`id`, `nombre`, `apellido`, `ocupacion`, `Dtrabajo`, `Tlftrabajo`, `DHogar`, `TlfHogar`, `Parestesco`) VALUES
(25326051, '', '', 'informatico', 'caracas', '00000000000', 'caracas', '00000000', 1);

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
(6, '6° GRADO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

CREATE TABLE `historico` (
  `id_his` int(11) NOT NULL,
  `accion` text NOT NULL,
  `type_his` tinyint(4) NOT NULL COMMENT '1 administracion 2 usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incripcion`
--

CREATE TABLE `incripcion` (
  `id` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `alumno` int(11) NOT NULL,
  `familiares` int(11) NOT NULL,
  `año_escolar` int(11) NOT NULL,
  `grado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 'prueba2', '2020-09-13', '2020-09-14', 0),
(5, 'prueba 3', '2020-09-19', '2020-09-20', 0),
(6, 'prueba 4', '2020-09-21', '2020-09-23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `permiso` int(11) NOT NULL,
  `persona` int(11) NOT NULL,
  `ruta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'alexander torres', 0, '25326051', 'caracas', '04123082432', 'alexander20012@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_incripcion`
--

CREATE TABLE `pre_incripcion` (
  `id` int(11) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `alumno` int(11) NOT NULL,
  `grado` int(11) NOT NULL,
  `representante` int(11) DEFAULT NULL,
  `statud` int(11) NOT NULL,
  `perido_escolar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pre_incripcion`
--

INSERT INTO `pre_incripcion` (`id`, `fecha`, `alumno`, `grado`, `representante`, `statud`, `perido_escolar`) VALUES
(3, '2020-09-19', 2133123123, 4, 25326051, 1, 5),
(4, '2020-09-21', 11111, 5, 25326051, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `persona` int(11) NOT NULL,
  `aula` int(11) DEFAULT NULL,
  `condicion` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Profesor', 'Profesor del sistema', 1),
(3, 'Alumno', 'Alumno del sistema', 1);

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
(1, 'mdi mdi-file', 'Pre-inscripcion', 0, '#'),
(2, 'mdi mdi-view-list', 'Listado', 1, 'list_pre_inscripcion.php'),
(3, 'mdi mdi-file', 'Datos', 1, 'pre_consulta.php'),
(4, 'mdi mdi-file', 'Formulario', 1, 'form_pre_inscripcion.php'),
(5, 'mdi mdi-file', 'Inscripcion', 0, '#'),
(6, 'mdi mdi-view-list', 'Grados', 5, 'grados.php'),
(7, 'mdi mdi-view-list', 'Secciones', 5, 'secciones.php'),
(9, 'mdi mdi-view-list', 'horarios', 5, 'horarios.php'),
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
(23, 'mdi mdi-archive', 'Expedientes', 0, '#'),
(24, 'mdi mdi-view-list', 'Listado por grado', 23, 'list-grado.php'),
(25, 'mdi mdi-folder-upload', 'Carga de archivo', 23, 'archivos.php'),
(26, 'mdi mdi-email', 'Correo', 0, '#'),
(27, 'mdi mdi-send', 'Envio', 26, 'email-send.php'),
(28, 'mdi mdi-email-alert', 'Inbox', 26, 'email-inbox.php'),
(29, 'mdi mdi-cube-send', 'Correo masivos', 26, 'email-masvio.php'),
(30, 'mdi mdi-file', 'Gestion escolar', 0, ''),
(31, 'mdi mdi-file', 'Nuevo año Escolar', 30, 'new-escolar.php'),
(32, 'mdi mdi-file', 'Cierre de año escolar', 30, 'close-escolar.php'),
(33, 'mdi mdi-file', 'Reporte de año', 30, 'Report-escolar.php'),
(34, 'mdi mdi-view-list', 'Aulas', 5, 'list-aulas.php');

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
(6, 'F', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `persona` int(11) NOT NULL,
  `rol` int(11) DEFAULT NULL,
  `nick` varchar(10) DEFAULT NULL,
  `clave` varchar(64) DEFAULT NULL,
  `avatar` varchar(25) NOT NULL,
  `forgot-pass` varchar(64) DEFAULT NULL,
  `condicion` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`persona`, `rol`, `nick`, `clave`, `avatar`, `forgot-pass`, `condicion`) VALUES
(1, 1, 'admin', '$2y$10$V52D/iyl4XMa2ZFrHQHL1.2.9gvuqfBgw3NzgNEDfYZGvYfCKzbke', '', 'admin', 1);

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
  ADD KEY `seccion` (`seccion`);

--
-- Indices de la tabla `beneficio`
--
ALTER TABLE `beneficio`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `persona` (`persona`,`ruta`),
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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'cedula', AUTO_INCREMENT=21312312313;

--
-- AUTO_INCREMENT de la tabla `beneficio`
--
ALTER TABLE `beneficio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `periodo_escolar`
--
ALTER TABLE `periodo_escolar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pre_incripcion`
--
ALTER TABLE `pre_incripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `aula_ibfk_2` FOREIGN KEY (`grado`) REFERENCES `grados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Correo`
--
ALTER TABLE `Correo`
  ADD CONSTRAINT `receptor` FOREIGN KEY (`para`) REFERENCES `usuario` (`persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `remitente` FOREIGN KEY (`de`) REFERENCES `usuario` (`persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`persona`) REFERENCES `usuario` (`persona`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`ruta`) REFERENCES `ruta` (`ruta`) ON DELETE CASCADE ON UPDATE CASCADE;

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
