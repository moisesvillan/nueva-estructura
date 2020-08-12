CREATE DATABASE IF NOT EXISTS `sistema`;
USE `sistema`;

CREATE TABLE IF NOT EXISTS `persona` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `tipo_documento` tinyint(1) DEFAULT NULL COMMENT '0 Venezolano 1 extrajero ',
  `num_documento` varchar(20) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `rol` (
  `rol` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `ruta` (
  `ruta` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `icon` varchar(15) NOT NULL,
  `modulo` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `permisos` (
  `permiso` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `persona` int(11) NOT NULL,
  `ruta` int(11) NOT NULL,
  CONSTRAINT `persona_permiso` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ruta_permiso` FOREIGN KEY (`ruta`) REFERENCES `ruta` (`ruta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `vacunas` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `grados` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `grado` int(11) NOT NULL,
  `statud` boolean NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `secciones` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `seccion` int(11) NOT NULL,
  `statud` boolean NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  CREATE TABLE IF NOT EXISTS `aula` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `grado` int(11) NOT NULL,
    `seccion` int(11) NOT NULL,
    `cupos` int(11) NOT NULL,
    `disponibilidad` int(11) NOT NULL,
    INDEX(`grado`, `seccion`),
    CONSTRAINT `grado_aula` FOREIGN KEY (`grado`) REFERENCES `grados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `seccion_aula` FOREIGN KEY (`seccion`) REFERENCES `secciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `pre_incripcion` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `alumno` int(11) NOT NULL,
  `representante_m` int(11) NULL,
  `representante_p` int(11) NULL,
  `representante_f` int(11) NULL,
  `d_emergencia` int(11) NULL,
  INDEX(`alumno`, `d_emergencia`),
  CONSTRAINT `alumno_preincripcion` FOREIGN KEY (`alumno`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `datos_emergencia_FK` FOREIGN KEY (`d_emergencia`) REFERENCES `datos_emergencia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `datos_emergencia` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `alumno` int(11) NOT NULL,
  `enfermedad` boolean NULL,
  `detalle_enfermedad` text NULL,
  `terapia` boolean NULL,
  `alergia` boolean NULL,
  `detalle_alergia` text NULL,
  `tlfemerg` varchar(100) NOT NULL COMMENT 'Telefono de emergencia',
  `vacunas` boolean NULL,
  `detalle_vacunas` int(11) NULL
  # CONSTRAINT `alumno_emergencia` FOREIGN KEY (`alumno`) REFERENCES `alumno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;  

CREATE TABLE IF NOT EXISTS `incripcion` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(11) NOT NULL COMMENT 'cedula' PRIMARY KEY,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `Lnaciomiento` varchar(100) NOT NULL COMMENT 'Lugar de nacimiento',
  `fecha` date NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` int(11) NOT NULL COMMENT '0 MASCULINO 1 FEMENINO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `familiares` (
  `id` int(11) NOT NULL COMMENT 'cedula' PRIMARY KEY,
  `edad` int(11) NOT NULL,
  `ocupacion` varchar(100) NOT NULL,
  `Dtrabajo` varchar(100) NOT NULL COMMENT 'Direccion de trabajo',
  `Tlftrabajo` varchar(100) NOT NULL COMMENT 'Telefono de trabajo',
  `DHogar` varchar(100) NOT NULL COMMENT 'Direccion',
  `TlfHogar` varchar(100) NOT NULL COMMENT 'Telefono del hogar',
  `Parestesco` int(1) NOT NULL COMMENT '0 madre 1 padre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `correos` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `adjunto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `usuario` (
  `persona` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `rol` int(11) DEFAULT NULL,
  `nick` varchar(10) DEFAULT NULL,
  `clave` varchar(64) DEFAULT NULL,
  `forgot-pass` varchar(64) DEFAULT NULL,
  `condicion` tinyint(4) DEFAULT NULL,
  CONSTRAINT `persona` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `profesor` ( 
  `persona` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `aula` int(11) DEFAULT NULL,
  `condicion` tinyint(4) DEFAULT NULL, 
  CONSTRAINT `persona_profesor` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `aula_profesor` FOREIGN KEY (`aula`) REFERENCES `aula` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
--
-- Borrado de datos 
--
TRUNCATE `persona`;
TRUNCATE `rol`;
TRUNCATE `ruta`;
TRUNCATE `permisos`;
TRUNCATE `usuario`;
TRUNCATE `alumnos`;
TRUNCATE `vacunas`;
TRUNCATE `familiares`;
TRUNCATE `usuario`;
TRUNCATE `correos`;
TRUNCATE `grados`;
TRUNCATE `secciones`;
TRUNCATE `aula`;
TRUNCATE `pre_incripcion`;
TRUNCATE `datos_emergencia`;
TRUNCATE `incripcion`;
--
-- Volcado de datos
--
INSERT INTO `rol` (`rol`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Administrador', 'Administrador del sistema', 1),
(2, 'Profesor', 'Profesor del sistema', 1),
(3, 'Alumno', 'Alumno del sistema', 1);

INSERT INTO `persona` (`id`,`nombre`,`tipo_documento`,`num_documento`,`direccion`,`telefono`,`email`) VALUES
(1, 'admin', '0','12345678','admin','00000000000','admin@admin.com', 1);

INSERT INTO `usuario` (`persona`,`rol`,`nick`,`clave`,`forgot-pass`,`condicion`) VALUES
(1,1,'admin','$2y$10$V52D/iyl4XMa2ZFrHQHL1.2.9gvuqfBgw3NzgNEDfYZGvYfCKzbke','admin',1);

INSERT INTO `ruta` (`ruta`, `icon`, `modulo`,`url`) VALUES
(1 , 'mdi mdi-file', 'Pre-inscripcion', '0', '#'),
(2 , 'mdi mdi-view-list', 'Listado', '1', 'list_pre_inscripcion.php'),
(3 , 'mdi mdi-file', 'Datos', '1', 'pre_consulta.php'),
(4 , 'mdi mdi-file', 'Formulario', '1', 'form_pre_inscripcion.php'),
(5 , 'mdi mdi-file', 'Inscripcion', '10', '#'),
(6 , 'mdi mdi-view-list', 'Grados', '5', 'grados.php'),
(7 , 'mdi mdi-view-list', 'Secciones', '5', 'secciones.php'),
(8 , 'mdi mdi-view-list', 'Profesores', '5', 'profesores.php'),
(9 , 'mdi mdi-view-list', 'horarios', '5', 'horarios.php'),
(10, 'mdi mdi-file', 'Registro', '0', '#'),
(11, 'mdi mdi-file', 'Registrar Docente', '10', 'form-prof.php'),
(12, 'mdi mdi-file', 'Registrar Usuario', '10', 'form-user.php'),
(13, 'mdi mdi-view-list', 'Lista de Docente', '10', 'list-prof.php'),
(14, 'mdi mdi-view-list', 'Lista de Usuario', '10', 'list-user.php'),
(15, 'mdi mdi-at', 'Bienestar social', '0', '#'),
(16, 'mdi mdi-laptop', 'Tecnologia', '15', 'Tecnologia.php'),
(17, 'mdi mdi-ambulance', 'Vacunas', '15', 'Vacunas.php'),
(18, 'mdi mdi-ambulance', 'Salud', '15', 'Salud.php'),
(19, 'mdi mdi-shopping', 'Uniforme', '15', 'Uniforme.php'),
(20, 'mdi mdi-account-card-details', 'Cedulacion', '15', 'Cedulacion.php'),
(21, 'mdi mdi-account-check ', 'Becas', '15', 'Becas.php'),
(23, 'mdi mdi-archive', 'Expedientes', '0', '#'),
(24, 'mdi mdi-view-list', 'Listado por grado', '23','list-grado.php'),
(25, 'mdi mdi-folder-upload', 'Carga de archivo', '23','archivos.php'),
(26, 'mdi mdi-email', 'Correo', '0', '#'),
(27, 'mdi mdi-send', 'Envio', '26','email-send.php'),
(28, 'mdi mdi-email-alert', 'Inbox', '26','email-inbox.php'),
(29, 'mdi mdi-cube-send', 'Correo masivos', '26','email-masvio.php'),
(30, 'mdi mdi-file', 'Gestion de usuario', '0', '#'),
(31, 'mdi mdi-file', 'Nuevo año Escolar', '30', 'new-escolar.php'),
(32, 'mdi mdi-file', 'Cierre de año escolar', '30', 'close-escolar.php'),
(33, 'mdi mdi-file', 'Reporte de año', '30', 'Report-escolar.php');

INSERT INTO `grados` (`id`, `grado`, `statud`) VALUES
(1, '1° GRADO', 1),
(2, '2° GRADO', 1),
(3, '3° GRADO', 1),
(4, '4° GRADO', 1),
(5, '5° GRADO', 1),
(6, '6° GRADO', 1);

INSERT INTO `secciones` (`id`, `seccion`, `statud`) VALUES
(1, 'A', 1),
(2, 'B', 1),
(3, 'C', 1),
(4, 'D', 1),
(5, 'E', 1),
(6, 'F', 1);