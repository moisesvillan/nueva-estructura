CREATE DATABASE IF NOT EXISTS `clientes`;

CREATE TABLE `personas` (
  `id_persona` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `cedula` int(11) NOT NULL,
  `primer_apellido` varchar(30) DEFAULT NULL,
  `segundo_apellido` varchar(30) DEFAULT NULL,
  `primer_nombre` varchar(30) DEFAULT NULL,
  `segundo_nombre` varchar(30) DEFAULT NULL,
  `sexo` varchar(1) NOT NULL,
  `fecha_de_nacimiento` date DEFAULT NULL,
  `lugar_de_nacimiento` varchar(35) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `roles` (
  `id_roles` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `roles` (`id_roles`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Profesor'),
(3, 'Alumnos');

CREATE TABLE `usuario` (
  `id_user` int(11) PRIMARY KEY AUTO_INCREMENT  NOT NULL,
  `persona` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `rol_id` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inicio`
--

INSERT INTO `usuario` (`id_user`, `usuario`, `clave`, `rol_id`) VALUES
(1, 'mvillan', '19851853', 1),
(2, 'nachacon', '25872125', 2);
