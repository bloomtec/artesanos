-- phpMyAdmin SQL Dump
-- version 3.4.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2012 at 05:32 PM
-- Server version: 5.1.58
-- PHP Version: 5.3.6-13ubuntu3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `artesanos`
--
-- CREATE DATABASE `artesanos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jndagobe_artesanos`;

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=181 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 360),
(2, 1, NULL, NULL, 'Aprendices', 2, 17),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 2, NULL, NULL, 'CSVExport', 13, 14),
(9, 2, NULL, NULL, 'searchFilter', 15, 16),
(10, 1, NULL, NULL, 'Artesanos', 18, 39),
(11, 10, NULL, NULL, 'index', 19, 20),
(12, 10, NULL, NULL, 'view', 21, 22),
(13, 10, NULL, NULL, 'registroA', 23, 24),
(14, 10, NULL, NULL, 'registroB', 25, 26),
(15, 10, NULL, NULL, 'registroC', 27, 28),
(16, 10, NULL, NULL, 'add', 29, 30),
(17, 10, NULL, NULL, 'edit', 31, 32),
(18, 10, NULL, NULL, 'delete', 33, 34),
(19, 10, NULL, NULL, 'CSVExport', 35, 36),
(20, 10, NULL, NULL, 'searchFilter', 37, 38),
(21, 1, NULL, NULL, 'Auditorias', 40, 49),
(22, 21, NULL, NULL, 'index', 41, 42),
(23, 21, NULL, NULL, 'view', 43, 44),
(24, 21, NULL, NULL, 'CSVExport', 45, 46),
(25, 21, NULL, NULL, 'searchFilter', 47, 48),
(26, 1, NULL, NULL, 'Balances', 50, 65),
(27, 26, NULL, NULL, 'index', 51, 52),
(28, 26, NULL, NULL, 'view', 53, 54),
(29, 26, NULL, NULL, 'add', 55, 56),
(30, 26, NULL, NULL, 'edit', 57, 58),
(31, 26, NULL, NULL, 'delete', 59, 60),
(32, 26, NULL, NULL, 'CSVExport', 61, 62),
(33, 26, NULL, NULL, 'searchFilter', 63, 64),
(34, 1, NULL, NULL, 'Calificaciones', 66, 81),
(35, 34, NULL, NULL, 'index', 67, 68),
(36, 34, NULL, NULL, 'view', 69, 70),
(37, 34, NULL, NULL, 'add', 71, 72),
(38, 34, NULL, NULL, 'edit', 73, 74),
(39, 34, NULL, NULL, 'delete', 75, 76),
(40, 34, NULL, NULL, 'CSVExport', 77, 78),
(41, 34, NULL, NULL, 'searchFilter', 79, 80),
(42, 1, NULL, NULL, 'Cantones', 82, 97),
(43, 42, NULL, NULL, 'getCantones', 83, 84),
(44, 42, NULL, NULL, 'getNombre', 85, 86),
(45, 42, NULL, NULL, 'view', 87, 88),
(46, 42, NULL, NULL, 'add', 89, 90),
(47, 42, NULL, NULL, 'edit', 91, 92),
(48, 42, NULL, NULL, 'CSVExport', 93, 94),
(49, 42, NULL, NULL, 'searchFilter', 95, 96),
(50, 1, NULL, NULL, 'Ciudades', 98, 113),
(51, 50, NULL, NULL, 'getCiudades', 99, 100),
(52, 50, NULL, NULL, 'getNombre', 101, 102),
(53, 50, NULL, NULL, 'view', 103, 104),
(54, 50, NULL, NULL, 'add', 105, 106),
(55, 50, NULL, NULL, 'edit', 107, 108),
(56, 50, NULL, NULL, 'CSVExport', 109, 110),
(57, 50, NULL, NULL, 'searchFilter', 111, 112),
(58, 1, NULL, NULL, 'Configuraciones', 114, 123),
(59, 58, NULL, NULL, 'index', 115, 116),
(60, 58, NULL, NULL, 'edit', 117, 118),
(61, 58, NULL, NULL, 'CSVExport', 119, 120),
(62, 58, NULL, NULL, 'searchFilter', 121, 122),
(63, 1, NULL, NULL, 'DatosPersonales', 124, 139),
(64, 63, NULL, NULL, 'index', 125, 126),
(65, 63, NULL, NULL, 'view', 127, 128),
(66, 63, NULL, NULL, 'add', 129, 130),
(67, 63, NULL, NULL, 'edit', 131, 132),
(68, 63, NULL, NULL, 'delete', 133, 134),
(69, 63, NULL, NULL, 'CSVExport', 135, 136),
(70, 63, NULL, NULL, 'searchFilter', 137, 138),
(71, 1, NULL, NULL, 'EquiposDeTrabajos', 140, 155),
(72, 71, NULL, NULL, 'index', 141, 142),
(73, 71, NULL, NULL, 'view', 143, 144),
(74, 71, NULL, NULL, 'add', 145, 146),
(75, 71, NULL, NULL, 'edit', 147, 148),
(76, 71, NULL, NULL, 'delete', 149, 150),
(77, 71, NULL, NULL, 'CSVExport', 151, 152),
(78, 71, NULL, NULL, 'searchFilter', 153, 154),
(79, 1, NULL, NULL, 'Geograficos', 156, 163),
(80, 79, NULL, NULL, 'index', 157, 158),
(81, 79, NULL, NULL, 'CSVExport', 159, 160),
(82, 79, NULL, NULL, 'searchFilter', 161, 162),
(83, 1, NULL, NULL, 'Locales', 164, 179),
(84, 83, NULL, NULL, 'index', 165, 166),
(85, 83, NULL, NULL, 'view', 167, 168),
(86, 83, NULL, NULL, 'add', 169, 170),
(87, 83, NULL, NULL, 'edit', 171, 172),
(88, 83, NULL, NULL, 'delete', 173, 174),
(89, 83, NULL, NULL, 'CSVExport', 175, 176),
(90, 83, NULL, NULL, 'searchFilter', 177, 178),
(91, 1, NULL, NULL, 'MateriasPrimas', 180, 195),
(92, 91, NULL, NULL, 'index', 181, 182),
(93, 91, NULL, NULL, 'view', 183, 184),
(94, 91, NULL, NULL, 'add', 185, 186),
(95, 91, NULL, NULL, 'edit', 187, 188),
(96, 91, NULL, NULL, 'delete', 189, 190),
(97, 91, NULL, NULL, 'CSVExport', 191, 192),
(98, 91, NULL, NULL, 'searchFilter', 193, 194),
(99, 1, NULL, NULL, 'Operadores', 196, 211),
(100, 99, NULL, NULL, 'index', 197, 198),
(101, 99, NULL, NULL, 'view', 199, 200),
(102, 99, NULL, NULL, 'add', 201, 202),
(103, 99, NULL, NULL, 'edit', 203, 204),
(104, 99, NULL, NULL, 'delete', 205, 206),
(105, 99, NULL, NULL, 'CSVExport', 207, 208),
(106, 99, NULL, NULL, 'searchFilter', 209, 210),
(107, 1, NULL, NULL, 'Pages', 212, 219),
(108, 107, NULL, NULL, 'display', 213, 214),
(109, 107, NULL, NULL, 'CSVExport', 215, 216),
(110, 107, NULL, NULL, 'searchFilter', 217, 218),
(111, 1, NULL, NULL, 'ParametrosInformativos', 220, 231),
(112, 111, NULL, NULL, 'getNombre', 221, 222),
(113, 111, NULL, NULL, 'index', 223, 224),
(114, 111, NULL, NULL, 'view', 225, 226),
(115, 111, NULL, NULL, 'CSVExport', 227, 228),
(116, 111, NULL, NULL, 'searchFilter', 229, 230),
(117, 1, NULL, NULL, 'Parroquias', 232, 247),
(118, 117, NULL, NULL, 'getParroquias', 233, 234),
(119, 117, NULL, NULL, 'getNombre', 235, 236),
(120, 117, NULL, NULL, 'view', 237, 238),
(121, 117, NULL, NULL, 'add', 239, 240),
(122, 117, NULL, NULL, 'edit', 241, 242),
(123, 117, NULL, NULL, 'CSVExport', 243, 244),
(124, 117, NULL, NULL, 'searchFilter', 245, 246),
(125, 1, NULL, NULL, 'ProductosElaborados', 248, 263),
(126, 125, NULL, NULL, 'index', 249, 250),
(127, 125, NULL, NULL, 'view', 251, 252),
(128, 125, NULL, NULL, 'add', 253, 254),
(129, 125, NULL, NULL, 'edit', 255, 256),
(130, 125, NULL, NULL, 'delete', 257, 258),
(131, 125, NULL, NULL, 'CSVExport', 259, 260),
(132, 125, NULL, NULL, 'searchFilter', 261, 262),
(133, 1, NULL, NULL, 'Provincias', 264, 279),
(134, 133, NULL, NULL, 'getProvincias', 265, 266),
(135, 133, NULL, NULL, 'getNombre', 267, 268),
(136, 133, NULL, NULL, 'view', 269, 270),
(137, 133, NULL, NULL, 'add', 271, 272),
(138, 133, NULL, NULL, 'edit', 273, 274),
(139, 133, NULL, NULL, 'CSVExport', 275, 276),
(140, 133, NULL, NULL, 'searchFilter', 277, 278),
(141, 1, NULL, NULL, 'Sectores', 280, 295),
(142, 141, NULL, NULL, 'getSectores', 281, 282),
(143, 141, NULL, NULL, 'getNombre', 283, 284),
(144, 141, NULL, NULL, 'view', 285, 286),
(145, 141, NULL, NULL, 'add', 287, 288),
(146, 141, NULL, NULL, 'edit', 289, 290),
(147, 141, NULL, NULL, 'CSVExport', 291, 292),
(148, 141, NULL, NULL, 'searchFilter', 293, 294),
(149, 1, NULL, NULL, 'Talleres', 296, 311),
(150, 149, NULL, NULL, 'index', 297, 298),
(151, 149, NULL, NULL, 'view', 299, 300),
(152, 149, NULL, NULL, 'add', 301, 302),
(153, 149, NULL, NULL, 'edit', 303, 304),
(154, 149, NULL, NULL, 'delete', 305, 306),
(155, 149, NULL, NULL, 'CSVExport', 307, 308),
(156, 149, NULL, NULL, 'searchFilter', 309, 310),
(157, 1, NULL, NULL, 'Usuarios', 312, 341),
(158, 157, NULL, NULL, 'verificarAcceso', 313, 314),
(159, 157, NULL, NULL, 'getNombreDeUsuario', 315, 316),
(160, 157, NULL, NULL, 'login', 317, 318),
(161, 157, NULL, NULL, 'logout', 319, 320),
(162, 157, NULL, NULL, 'index', 321, 322),
(163, 157, NULL, NULL, 'view', 323, 324),
(164, 157, NULL, NULL, 'add', 325, 326),
(165, 157, NULL, NULL, 'edit', 327, 328),
(166, 157, NULL, NULL, 'getInfoPermisos', 329, 330),
(167, 157, NULL, NULL, 'getValoresPermisos', 331, 332),
(168, 157, NULL, NULL, 'setInfoPermisos', 333, 334),
(169, 157, NULL, NULL, 'inicializarAcl', 335, 336),
(170, 157, NULL, NULL, 'CSVExport', 337, 338),
(171, 157, NULL, NULL, 'searchFilter', 339, 340),
(172, 1, NULL, NULL, 'Valores', 342, 357),
(173, 172, NULL, NULL, 'getNombre', 343, 344),
(174, 172, NULL, NULL, 'view', 345, 346),
(175, 172, NULL, NULL, 'add', 347, 348),
(176, 172, NULL, NULL, 'edit', 349, 350),
(177, 172, NULL, NULL, 'delete', 351, 352),
(178, 172, NULL, NULL, 'CSVExport', 353, 354),
(179, 172, NULL, NULL, 'searchFilter', 355, 356),
(180, 1, NULL, NULL, 'AclExtras', 358, 359);

-- --------------------------------------------------------

--
-- Table structure for table `aprendices`
--

CREATE TABLE IF NOT EXISTS `aprendices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taller_id` int(11) NOT NULL,
  `apr_cedula` varchar(40) DEFAULT NULL,
  `apr_nombres_y_apellidos` varchar(100) DEFAULT NULL,
  `apr_sexo` tinyint(1) DEFAULT NULL,
  `apr_fecha_ingreso` date DEFAULT NULL,
  `apr_afiliado_seguro` tinyint(1) DEFAULT NULL,
  `apr_fecha_nacimiento` date DEFAULT NULL,
  `apr_pago_mensual` double DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aprendices_talleres_INDEX` (`taller_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Rol', 1, 'Administrador', 1, 4),
(2, NULL, 'Rol', 2, 'Operador', 5, 6),
(3, 1, 'Usuario', 1, 'admin', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aco_id` int(11) NOT NULL,
  `aro_id` int(11) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aco_id`, `aro_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 1, 2, '-1', '-1', '-1', '-1'),
(3, 108, 2, '1', '1', '1', '1'),
(4, 161, 2, '1', '1', '1', '1'),
(5, 158, 2, '1', '1', '1', '1'),
(6, 159, 2, '1', '1', '1', '1'),
(7, 166, 2, '1', '1', '1', '1'),
(8, 167, 2, '1', '1', '1', '1'),
(9, 168, 2, '1', '1', '1', '1'),
(10, 135, 2, '1', '1', '1', '1'),
(11, 134, 2, '1', '1', '1', '1'),
(12, 44, 2, '1', '1', '1', '1'),
(13, 43, 2, '1', '1', '1', '1'),
(14, 52, 2, '1', '1', '1', '1'),
(15, 51, 2, '1', '1', '1', '1'),
(16, 143, 2, '1', '1', '1', '1'),
(17, 142, 2, '1', '1', '1', '1'),
(18, 119, 2, '1', '1', '1', '1'),
(19, 118, 2, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `artesanos`
--

CREATE TABLE IF NOT EXISTS `artesanos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `art_cedula` varchar(40) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `art_cedula_UNIQUE` (`art_cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `auditorias`
--

CREATE TABLE IF NOT EXISTS `auditorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `aud_nombre_modelo` varchar(100) NOT NULL,
  `aud_llave_foranea` int(11) NOT NULL,
  `aud_datos_previos` longtext,
  `aud_datos_nuevos` longtext NOT NULL,
  `aud_add` tinyint(1) NOT NULL DEFAULT '0',
  `aud_edit` tinyint(1) NOT NULL DEFAULT '0',
  `aud_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auditorias_usuarios_INDEX` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `auditorias`
--

INSERT INTO `auditorias` (`id`, `usuario_id`, `aud_nombre_modelo`, `aud_llave_foranea`, `aud_datos_previos`, `aud_datos_nuevos`, `aud_add`, `aud_edit`, `aud_delete`, `created`, `modified`) VALUES
(1, 1, 'Usuario', 1, '', '<table class="audit-table"><caption>Datos Del Usuario</caption><tr class="igual"><td class="audit-value">Nombre De Usuario</td><td class="audit-data">admin</td></tr><tr class="igual"><td class="audit-value">Rol</td><td class="audit-data">Administrador</td></tr><tr class="igual"><td class="audit-value">Unidad</td><td class="audit-data"></td></tr><tr class="igual"><td class="audit-value">CÃ©dula</td><td class="audit-data">admin</td></tr><tr class="igual"><td class="audit-value">Nombres Y Apellidos</td><td class="audit-data">admin</td></tr><caption>Permisos Del Usuario</caption></table>', 1, 0, 0, '2012-02-08 17:31:56', '2012-02-08 17:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE IF NOT EXISTS `balances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calificacion_id` int(11) NOT NULL,
  `bal_domicilio_propio` tinyint(1) DEFAULT NULL,
  `bal_domicilio_valor` double DEFAULT NULL,
  `bal_taller_propio` tinyint(1) DEFAULT NULL,
  `bal_taller_valor` double DEFAULT NULL,
  `bal_agua` tinyint(1) DEFAULT NULL,
  `bal_luz` tinyint(1) DEFAULT NULL,
  `bal_telefono` tinyint(1) DEFAULT NULL,
  `bal_servicios_basicos` double DEFAULT NULL,
  `bal_compras_de_materia_prima_mensuales` double DEFAULT NULL,
  `bal_salario_operarios` double DEFAULT NULL,
  `bal_salario_aprendices` double DEFAULT NULL,
  `bal_otros_salarios` double DEFAULT NULL,
  `bal_maquinas_y_herramientas` double DEFAULT NULL,
  `bal_materia_prima` double DEFAULT NULL,
  `bal_elaborados` double DEFAULT NULL,
  `bal_ingresos_por_ventas` double DEFAULT NULL,
  `bal_otros_ingresos` double DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `balances_calificaciones_INDEX` (`calificacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `calificaciones`
--

CREATE TABLE IF NOT EXISTS `calificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rama_id` int(11) NOT NULL,
  `artesano_id` int(11) NOT NULL,
  `cal_inspector_encargado` int(11) DEFAULT NULL,
  `cal_fecha_inspeccion` datetime DEFAULT NULL,
  `cal_fecha_expiracion` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `calificaciones_ramas_INDEX` (`rama_id`),
  KEY `calificaciones_artesanos_INDEX` (`artesano_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cantones`
--

CREATE TABLE IF NOT EXISTS `cantones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provincia_id` int(11) NOT NULL,
  `can_nombre` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cantones_provincias_INDEX` (`provincia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ciudades`
--

CREATE TABLE IF NOT EXISTS `ciudades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `canton_id` int(11) NOT NULL,
  `ciu_nombre` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ciudades_cantones_INDEX` (`canton_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `configuraciones`
--

CREATE TABLE IF NOT EXISTS `configuraciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `con_capital_maximo_de_inversion` double NOT NULL DEFAULT '0',
  `con_salario_basico_unificado` double NOT NULL DEFAULT '0',
  `con_anos_renovacion_artesanos_autonomos` int(11) NOT NULL DEFAULT '0',
  `con_anos_renovacion_artesanos_normales` int(11) NOT NULL DEFAULT '0',
  `con_anos_pasar_de_aprendiz_a_operario` int(11) NOT NULL DEFAULT '0',
  `con_anos_operario_se_pueda_calificar` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `configuraciones`
--

INSERT INTO `configuraciones` (`id`, `con_capital_maximo_de_inversion`, `con_salario_basico_unificado`, `con_anos_renovacion_artesanos_autonomos`, `con_anos_renovacion_artesanos_normales`, `con_anos_pasar_de_aprendiz_a_operario`, `con_anos_operario_se_pueda_calificar`, `created`, `modified`) VALUES
(1, 0, 0, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `datos_personales`
--

CREATE TABLE IF NOT EXISTS `datos_personales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calificacion_id` int(11) NOT NULL,
  `dat_apellido_paterno` varchar(45) DEFAULT NULL,
  `dat_apellido_materno` varchar(45) DEFAULT NULL,
  `dat_nombres` varchar(45) DEFAULT NULL,
  `dat_nacionalidad` varchar(45) DEFAULT NULL,
  `dat_fecha_nacimiento` date DEFAULT NULL,
  `dat_tipo_de_sangre` varchar(4) DEFAULT NULL,
  `dat_estado_civil` varchar(45) DEFAULT NULL,
  `dat_grado_estudio` varchar(45) DEFAULT NULL,
  `dat_sexo` varchar(45) DEFAULT NULL,
  `dat_hijos_mayores` int(11) DEFAULT NULL,
  `dat_hijos_menores` int(11) DEFAULT NULL,
  `dat_tipo_discapacidad` int(11) DEFAULT NULL,
  `dat_porcentaje_de_discapacidad` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `datos_personales_calificaciones_INDEX` (`calificacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `equipos_de_trabajo`
--

CREATE TABLE IF NOT EXISTS `equipos_de_trabajo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taller_id` int(11) NOT NULL,
  `equ_cantidad` int(11) DEFAULT NULL,
  `equ_maquinaria_y_herramientas` varchar(255) DEFAULT NULL,
  `equ_tipo_de_adquisicion` varchar(255) DEFAULT NULL,
  `equ_fecha_de_adquisicion` date DEFAULT NULL,
  `equ_valor_comercial` double DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `equipos_de_trabajo_talleres_INDEX` (`taller_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `locales`
--

CREATE TABLE IF NOT EXISTS `locales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calificacion_id` int(11) NOT NULL,
  `provincia_id` int(11) DEFAULT NULL,
  `canton_id` int(11) DEFAULT NULL,
  `ciudad_id` int(11) DEFAULT NULL,
  `sector_id` int(11) DEFAULT NULL,
  `parroquia_id` int(11) DEFAULT NULL,
  `loc_calle_o_avenida` varchar(100) DEFAULT NULL,
  `loc_numero` varchar(100) DEFAULT NULL,
  `loc_interseccion` varchar(100) DEFAULT NULL,
  `loc_barrio` varchar(100) DEFAULT NULL,
  `loc_telefono_celular` varchar(20) DEFAULT NULL,
  `loc_telefono_convencional` varchar(20) DEFAULT NULL,
  `loc_referencia` varchar(100) DEFAULT NULL,
  `loc_email` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locales_calificaciones_INDEX` (`calificacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `materias_primas`
--

CREATE TABLE IF NOT EXISTS `materias_primas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taller_id` int(11) NOT NULL,
  `mat_cantidad` int(11) DEFAULT NULL,
  `mat_tipo_de_materia_prima` varchar(255) DEFAULT NULL,
  `mat_procedencia` varchar(255) DEFAULT NULL,
  `mat_valor_comercial` double DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materias_primas_talleres_INDEX` (`taller_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `operadores`
--

CREATE TABLE IF NOT EXISTS `operadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taller_id` int(11) NOT NULL,
  `ope_cedula` varchar(40) DEFAULT NULL,
  `ope_nombres_y_apellidos` varchar(100) DEFAULT NULL,
  `ope_sexo` tinyint(1) DEFAULT NULL,
  `ope_fecha_ingreso` date DEFAULT NULL,
  `ope_afiliado_seguro` tinyint(1) DEFAULT NULL,
  `ope_fecha_nacimiento` date DEFAULT NULL,
  `ope_pago_mensual` double DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `operadores_talleres_INDEX` (`taller_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `parametros_informativos`
--

CREATE TABLE IF NOT EXISTS `parametros_informativos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `par_nombre` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `par_nombre_UNIQUE` (`par_nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `parametros_informativos`
--

INSERT INTO `parametros_informativos` (`id`, `par_nombre`, `created`, `modified`) VALUES
(1, 'Nacionalidades', NULL, NULL),
(2, 'Tipos De Sangre', NULL, NULL),
(3, 'Estados Civiles', NULL, NULL),
(4, 'Grados De Estudio', NULL, NULL),
(5, 'Sexos', NULL, NULL),
(6, 'Tipos De Discapacidad', NULL, NULL),
(7, 'Maquinarias Y Herramientas', NULL, NULL),
(8, 'Tipo De Adquisicion (Maquinaria)', NULL, NULL),
(9, 'Tipo De Materia Prima', NULL, NULL),
(10, 'Procedencia (Materia Prima)', NULL, NULL),
(11, 'Detalle (Productos Elaborados)', NULL, NULL),
(12, 'Procedencia (Productos Elaborados)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parroquias`
--

CREATE TABLE IF NOT EXISTS `parroquias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sector_id` int(11) NOT NULL,
  `par_nombre` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parroquias_sectores_INDEX` (`sector_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productos_elaborados`
--

CREATE TABLE IF NOT EXISTS `productos_elaborados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taller_id` int(11) NOT NULL,
  `pro_cantidad` int(11) DEFAULT NULL,
  `pro_detalle` varchar(255) DEFAULT NULL,
  `pro_procedencia` varchar(255) DEFAULT NULL,
  `pro_valor_comercial` double DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_elaborados_talleres_INDEX` (`taller_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_nombre` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ramas`
--

CREATE TABLE IF NOT EXISTS `ramas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulacion_id` int(11) NOT NULL,
  `ram_nombre` varchar(100) NOT NULL,
  `ram_descripcion` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ram_nombre_UNIQUE` (`ram_nombre`),
  KEY `ramas_titulaciones_INDEX` (`titulacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`rol_nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rol_nombre`, `created`, `modified`) VALUES
(1, 'Administrador', NULL, NULL),
(2, 'Operador', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sectores`
--

CREATE TABLE IF NOT EXISTS `sectores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad_id` int(11) NOT NULL,
  `sec_nombre` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sectores_ciudades_INDEX` (`ciudad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `talleres`
--

CREATE TABLE IF NOT EXISTS `talleres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calificacion_id` int(11) NOT NULL,
  `tal_razon_social_o_nombre_comercial` varchar(100) NOT NULL,
  `provincia_id` int(11) DEFAULT NULL,
  `canton_id` int(11) DEFAULT NULL,
  `ciudad_id` int(11) DEFAULT NULL,
  `sector_id` int(11) DEFAULT NULL,
  `parroquia_id` int(11) DEFAULT NULL,
  `tal_calle_o_avenida` varchar(100) DEFAULT NULL,
  `tal_numero` varchar(100) DEFAULT NULL,
  `tal_interseccion` varchar(100) DEFAULT NULL,
  `tal_barrio` varchar(100) DEFAULT NULL,
  `tal_telefono_celular` varchar(20) DEFAULT NULL,
  `tal_telefono_convencional` varchar(20) DEFAULT NULL,
  `tal_referencia` varchar(100) DEFAULT NULL,
  `tal_email` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tal_razon_social_o_nombre_comercial_UNIQUE` (`tal_razon_social_o_nombre_comercial`),
  KEY `talleres_calificaciones_INDEX` (`calificacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tipos_de_calificaciones`
--

CREATE TABLE IF NOT EXISTS `tipos_de_calificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tip_nombre` varchar(100) NOT NULL,
  `tip_descripcion` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tip_nombre_UNIQUE` (`tip_nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `titulaciones`
--

CREATE TABLE IF NOT EXISTS `titulaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipos_de_calificacion_id` int(11) NOT NULL,
  `tit_nombre` varchar(100) NOT NULL,
  `tit_descipcion` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `titulaciones_tipos_de_calificaciones_INDEX` (`tipos_de_calificacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_id` int(11) NOT NULL,
  `usu_nombre_de_usuario` varchar(100) NOT NULL,
  `usu_contrasena` varchar(40) NOT NULL,
  `usu_cedula` varchar(40) NOT NULL,
  `usu_nombres_y_apellidos` varchar(100) NOT NULL,
  `usu_unidad` varchar(100) DEFAULT NULL,
  `usu_activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_de_usuario_UNIQUE` (`usu_nombre_de_usuario`),
  UNIQUE KEY `cedula_UNIQUE` (`usu_cedula`),
  KEY `usuarios_roles_INDEX` (`rol_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `rol_id`, `usu_nombre_de_usuario`, `usu_contrasena`, `usu_cedula`, `usu_nombres_y_apellidos`, `usu_unidad`, `usu_activo`, `created`, `modified`) VALUES
(1, 1, 'admin', '7352301957a84132f7bd7626740fb8a60e68dad8', 'admin', 'admin', '', 1, '2012-02-08 17:31:56', '2012-02-08 17:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `valores`
--

CREATE TABLE IF NOT EXISTS `valores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parametros_informativo_id` int(11) NOT NULL,
  `val_nombre` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `para_info_id_val_nombre_UNIQUE` (`parametros_informativo_id`,`val_nombre`),
  KEY `valores_parametros_informativos_INDEX` (`parametros_informativo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aprendices`
--
ALTER TABLE `aprendices`
  ADD CONSTRAINT `fk_aprendices_talleres` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `auditorias`
--
ALTER TABLE `auditorias`
  ADD CONSTRAINT `fk_auditorias_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `balances`
--
ALTER TABLE `balances`
  ADD CONSTRAINT `fk_balances_calificaciones` FOREIGN KEY (`calificacion_id`) REFERENCES `calificaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `fk_calificaciones_artesanos` FOREIGN KEY (`artesano_id`) REFERENCES `artesanos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calificaciones_ramas` FOREIGN KEY (`rama_id`) REFERENCES `ramas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cantones`
--
ALTER TABLE `cantones`
  ADD CONSTRAINT `fk_cantones_provincias` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `fk_ciudades_cantones` FOREIGN KEY (`canton_id`) REFERENCES `cantones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD CONSTRAINT `fk_datos_personales_calificaciones` FOREIGN KEY (`calificacion_id`) REFERENCES `calificaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `equipos_de_trabajo`
--
ALTER TABLE `equipos_de_trabajo`
  ADD CONSTRAINT `fk_equipos_de_trabajo_talleres` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `locales`
--
ALTER TABLE `locales`
  ADD CONSTRAINT `fk_locales_calificaciones` FOREIGN KEY (`calificacion_id`) REFERENCES `calificaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `materias_primas`
--
ALTER TABLE `materias_primas`
  ADD CONSTRAINT `fk_materias_primas_talleres` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `operadores`
--
ALTER TABLE `operadores`
  ADD CONSTRAINT `fk_operadores_talleres` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `parroquias`
--
ALTER TABLE `parroquias`
  ADD CONSTRAINT `fk_parroquias_sectores` FOREIGN KEY (`sector_id`) REFERENCES `sectores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `productos_elaborados`
--
ALTER TABLE `productos_elaborados`
  ADD CONSTRAINT `fk_productos_elaborados_talleres` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ramas`
--
ALTER TABLE `ramas`
  ADD CONSTRAINT `fk_ramas_titulaciones` FOREIGN KEY (`titulacion_id`) REFERENCES `titulaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sectores`
--
ALTER TABLE `sectores`
  ADD CONSTRAINT `fk_sectores_ciudades` FOREIGN KEY (`ciudad_id`) REFERENCES `ciudades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `talleres`
--
ALTER TABLE `talleres`
  ADD CONSTRAINT `fk_talleres_calificaciones` FOREIGN KEY (`calificacion_id`) REFERENCES `calificaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `titulaciones`
--
ALTER TABLE `titulaciones`
  ADD CONSTRAINT `fk_titulaciones_tipos_de_calificaciones` FOREIGN KEY (`tipos_de_calificacion_id`) REFERENCES `tipos_de_calificaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `valores`
--
ALTER TABLE `valores`
  ADD CONSTRAINT `fk_valores_parametros_informativos` FOREIGN KEY (`parametros_informativo_id`) REFERENCES `parametros_informativos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
