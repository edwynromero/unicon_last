-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-05-2014 a las 14:54:12
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sidepo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
  `id_bit` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario_bit` int(11) NOT NULL,
  `usuario_bit` varchar(100) NOT NULL,
  `modulo_bit` varchar(100) NOT NULL,
  `accion_bit` varchar(100) NOT NULL,
  `informacion_bit` varchar(300) NOT NULL,
  `fecha_bit` date NOT NULL,
  `hora_bit` varchar(100) NOT NULL,
  `estado_bit` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_bit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Volcar la base de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id_bit`, `id_usuario_bit`, `usuario_bit`, `modulo_bit`, `accion_bit`, `informacion_bit`, `fecha_bit`, `hora_bit`, `estado_bit`) VALUES
(11, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-26', '06:03:22-AM', 1),
(12, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-26', '06:14:14-AM', 1),
(13, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-26', '06:20:28-AM', 1),
(14, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-27', '04:44:00-PM', 1),
(15, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-28', '12:39:19-AM', 1),
(16, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-28', '01:38:00-PM', 1),
(17, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-28', '04:19:45-PM', 1),
(18, 0, 'elvis', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: elvis', '2014-05-28', '04:21:35-PM', 1),
(19, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-28', '09:21:41-PM', 1),
(20, 0, '', 'Registro', 'Registro Personal', 'Nuevo Registro Personal: ewe', '2014-05-29', '11:53:07-AM', 1),
(21, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-29', '04:16:57-PM', 1),
(22, 0, 'new', 'Registro', 'Registro Personal', 'Nuevo Registro Personal: edwyn', '2014-05-29', '04:18:29-PM', 1),
(23, 0, 'edwyn', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: edwyn', '2014-05-29', '04:18:59-PM', 1),
(24, 0, 'edwyn', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: edwyn', '2014-05-29', '05:58:43-PM', 1),
(25, 0, '', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: ', '2014-05-29', '06:02:49-PM', 1),
(26, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-29', '06:02:57-PM', 1),
(27, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-29', '10:08:55-PM', 1),
(28, 0, 'edwyn', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: edwyn', '2014-05-30', '10:34:25-AM', 1),
(29, 0, 'edwyn', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: edwyn', '2014-05-30', '12:10:22-PM', 1),
(30, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:10:31-PM', 1),
(31, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:10:46-PM', 1),
(32, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:15:35-PM', 1),
(33, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:15:48-PM', 1),
(34, 0, '', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: ', '2014-05-30', '12:16:40-PM', 1),
(35, 0, '', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: ', '2014-05-30', '12:17:26-PM', 1),
(36, 0, '', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: ', '2014-05-30', '12:18:41-PM', 1),
(37, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:18:57-PM', 1),
(38, 0, '', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: ', '2014-05-30', '12:19:19-PM', 1),
(39, 0, '', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: ', '2014-05-30', '12:20:45-PM', 1),
(40, 0, '', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: ', '2014-05-30', '12:20:55-PM', 1),
(41, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:21:09-PM', 1),
(42, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:21:18-PM', 1),
(43, 0, '', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: ', '2014-05-30', '12:24:24-PM', 1),
(44, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:24:34-PM', 1),
(45, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:24:47-PM', 1),
(46, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:25:01-PM', 1),
(47, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:25:30-PM', 1),
(48, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:26:52-PM', 1),
(49, 0, '', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: ', '2014-05-30', '12:27:00-PM', 1),
(50, 0, '', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: ', '2014-05-30', '12:30:19-PM', 1),
(51, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:30:28-PM', 1),
(52, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:31:12-PM', 1),
(53, 0, '', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: ', '2014-05-30', '12:31:18-PM', 1),
(54, 0, '', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: ', '2014-05-30', '12:31:58-PM', 1),
(55, 0, '', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: ', '2014-05-30', '12:32:35-PM', 1),
(56, 0, '', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: ', '2014-05-30', '12:33:45-PM', 1),
(57, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:33:52-PM', 1),
(58, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:36:14-PM', 1),
(59, 0, '', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: ', '2014-05-30', '12:38:13-PM', 1),
(60, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:38:23-PM', 1),
(61, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:40:56-PM', 1),
(62, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:41:47-PM', 1),
(63, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:44:22-PM', 1),
(64, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:45:22-PM', 1),
(65, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:46:49-PM', 1),
(66, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:49:34-PM', 1),
(67, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:50:10-PM', 1),
(68, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '12:51:24-PM', 1),
(69, 0, 'edwyn', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: edwyn', '2014-05-30', '02:15:03-PM', 1),
(70, 0, 'edwyn', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: edwyn', '2014-05-30', '03:32:53-PM', 1),
(71, 0, 'edwyn', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: edwyn', '2014-05-30', '04:14:07-PM', 1),
(72, 0, 'edwyn', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: edwyn', '2014-05-30', '04:14:48-PM', 1),
(73, 0, 'edwyb', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: edwyb', '2014-05-30', '05:47:30-PM', 1),
(74, 0, 'edwyn', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: edwyn', '2014-05-30', '05:47:41-PM', 1),
(75, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '05:48:29-PM', 1),
(76, 0, 'new', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: new', '2014-05-30', '06:43:05-PM', 1),
(77, 0, '', 'Registro', 'Registro Personal', 'Nuevo Registro Personal: hector', '2014-05-30', '08:09:11-PM', 1),
(78, 0, 'edwyn', 'Login', 'Inicio Sesion', 'Inicio Sesion el Usuario: edwyn', '2014-05-30', '08:22:11-PM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigosparadas`
--

CREATE TABLE IF NOT EXISTS `codigosparadas` (
  `idparada` int(11) NOT NULL AUTO_INCREMENT,
  `codigoPar` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idparada`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `codigosparadas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eficiencia`
--

CREATE TABLE IF NOT EXISTS `eficiencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproduccion` int(11) NOT NULL,
  `tonEstim` double NOT NULL,
  `tonReal` double NOT NULL,
  `eficiencia` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Volcar la base de datos para la tabla `eficiencia`
--

INSERT INTO `eficiencia` (`id`, `idproduccion`, `tonEstim`, `tonReal`, `eficiencia`) VALUES
(60, 9, 323, 232, 100),
(61, 9, 232, 22, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

CREATE TABLE IF NOT EXISTS `maquina` (
  `idmaquina` int(11) NOT NULL AUTO_INCREMENT,
  `numeroMaq` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmaquina`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcar la base de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`idmaquina`, `numeroMaq`, `descripcion`) VALUES
(19, '9', '      moldeadora'),
(23, '5', '  fresadora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paproduccion`
--

CREATE TABLE IF NOT EXISTS `paproduccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproduccion` int(11) NOT NULL,
  `tiempo` decimal(10,0) NOT NULL,
  `idparadas` int(11) NOT NULL,
  `idsub_equipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=325 ;

--
-- Volcar la base de datos para la tabla `paproduccion`
--

INSERT INTO `paproduccion` (`id`, `idproduccion`, `tiempo`, `idparadas`, `idsub_equipo`) VALUES
(287, 2, '3', 0, 0),
(288, 6, '12', 11, 9),
(289, 6, '78', 12, 8),
(290, 6, '56', 11, 8),
(291, 6, '78', 12, 8),
(292, 6, '56', 11, 8),
(293, 6, '78', 12, 8),
(294, 6, '56', 11, 8),
(295, 6, '78', 12, 8),
(296, 6, '56', 11, 8),
(297, 6, '78', 12, 8),
(298, 6, '56', 11, 8),
(299, 6, '78', 12, 8),
(300, 6, '56', 11, 8),
(301, 6, '78', 12, 8),
(302, 6, '56', 11, 8),
(303, 6, '78', 12, 8),
(304, 6, '56', 11, 8),
(305, 6, '78', 12, 8),
(306, 6, '56', 11, 8),
(307, 6, '78', 12, 8),
(308, 6, '56', 11, 8),
(309, 6, '78', 12, 8),
(310, 6, '56', 11, 8),
(311, 6, '78', 12, 8),
(312, 6, '56', 11, 8),
(313, 6, '78', 12, 8),
(314, 6, '56', 11, 8),
(315, 6, '78', 12, 8),
(316, 6, '56', 11, 8),
(317, 6, '12', 14, 9),
(318, 6, '3', 16, 12),
(319, 0, '212', 12, 3),
(320, 0, '78', 19, 3),
(321, 0, '77', 9, 3),
(322, 1, '78', 44, 55),
(323, 0, '7', 12, 3),
(324, 0, '7', 12, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paradas`
--

CREATE TABLE IF NOT EXISTS `paradas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_parada` varchar(30) NOT NULL,
  `idproduccion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

--
-- Volcar la base de datos para la tabla `paradas`
--

INSERT INTO `paradas` (`id`, `nombre_parada`, `idproduccion`) VALUES
(9, '01P_LIMPIEZA', 0),
(12, '02P_INSPECCION', 0),
(13, '03P_OPERACION_DEFECTUOSA', 0),
(14, '04_PROGRAMACION_VISITA', 0),
(15, '05P_CONTROL_DE_CALIDAD', 0),
(16, '07P_MANTENIMIENTO_PREVENTIVO', 0),
(17, '08P_COMIDA', 0),
(18, '09P_EMPATE_LAMINA', 0),
(19, '10P_AJUSTE_DE_PRODUCCION', 0),
(20, '11P_AJUSTE_MECANICO', 0),
(21, '12P_AJUSTE_ELECTRICO', 0),
(22, '13P_AJUSTE_ELECTRONICO', 0),
(23, '14P_AJUSTE_HIDRAULICO', 0),
(24, '15P_AJUSTE_DE_HERRAMIENTAS', 0),
(25, '16P_PRO._(O/F,_OTRAS_CAUSAS)', 0),
(26, '17P_AJUSTE_CAMBIO_DE_MEDIDA', 0),
(27, '19P_Giro_de_costura_en_tuberia', 0),
(28, '20P_FALLA_EMPATE', 0),
(29, '21P_FALLA_MECANICA', 0),
(30, '22P_FALLA_ELECTRICA', 0),
(31, '23P_FALLA_ELECTRONICA', 0),
(32, '24P_FALLA_HERRAMIENTAS', 0),
(33, '25P_FALLA_CORTE_(SLITTER)', 0),
(34, '26P_FALLA_MATERIA_PRIMA', 0),
(35, '27P_CALENTAMIENTO_DE_RESISTENC', 0),
(36, '30P_FALTA_HERRAMIENTAS', 0),
(37, '31P_FALTA_ELECTRICIDAD', 0),
(38, '32P_FALTA_AIRE_COMPRIMIDO', 0),
(39, '33P_FALTA_GAS_NATURAL', 0),
(40, '34P_FALTA_NITROGENO', 0),
(41, '35P_FALTA_AGUA', 0),
(42, '36P_FALTA_ACEITE', 0),
(43, '37P_FALTA_LUBRICACION', 0),
(44, '38P_FALTA_VAPOR', 0),
(45, '39P_FALTA_REPUESTO', 0),
(46, '40P_FALTA_INSUMO', 0),
(47, '41P_FALTA_MATERIA_PRIMA ', 0),
(48, '42P_FALTA_TUBERIA_OPER._DEFECT', 0),
(49, '43P_FALTA_PERSONAL', 0),
(50, '44P_FALTA_ORDEN_DE_FABRICACION', 0),
(51, '01P_LIMPIEZA', 0),
(52, '02P_INSPECCION', 0),
(53, '03P_OPERACION_DEFECTUOSA', 0),
(54, '04_PROGRAMACION_VISITA', 0),
(55, '05P_CONTROL_DE_CALIDAD', 0),
(56, '07P_MANTENIMIENTO_PREVENTIVO', 0),
(57, '08P_COMIDA', 0),
(58, '09P_EMPATE_LAMINA', 0),
(59, '10P_AJUSTE_DE_PRODUCCION', 0),
(60, '11P_AJUSTE_MECANICO', 0),
(61, '12P_AJUSTE_ELECTRICO', 0),
(62, '13P_AJUSTE_ELECTRONICO', 0),
(63, '14P_AJUSTE_HIDRAULICO', 0),
(64, '15P_AJUSTE_DE_HERRAMIENTAS', 0),
(65, '16P_PRO._(O/F,_OTRAS_CAUSAS)', 0),
(66, '17P_AJUSTE_CAMBIO_DE_MEDIDA', 0),
(67, '19P_Giro_de_costura_en_tubería', 0),
(68, '20P_FALLA_EMPATE', 0),
(69, '21P_FALLA_MECANICA', 0),
(70, '22P_FALLA_ELECTRICA', 0),
(71, '23P_FALLA_ELECTRONICA', 0),
(72, '24P_FALLA_HERRAMIENTAS', 0),
(73, '25P_FALLA_CORTE_(SLITTER)', 0),
(74, '26P_FALLA_MATERIA_PRIMA', 0),
(75, '27P_CALENTAMIENTO_DE_RESISTENC', 0),
(76, '30P_FALTA_HERRAMIENTAS', 0),
(77, '31P_FALTA_ELECTRICIDAD', 0),
(78, '32P_FALTA_AIRE_COMPRIMIDO', 0),
(79, '33P_FALTA_GAS_NATURAL', 0),
(80, '34P_FALTA_NITROGENO', 0),
(81, '35P_FALTA_AGUA', 0),
(82, '36P_FALTA_ACEITE', 0),
(83, '37P_FALTA_LUBRICACION', 0),
(84, '38P_FALTA_VAPOR', 0),
(85, '39P_FALTA_REPUESTO', 0),
(86, '40P_FALTA_INSUMO', 0),
(87, '41P_FALTA_MATERIA_PRIMA ', 0),
(88, '42P_FALTA_TUBERIA_OPER._DEFECT', 0),
(89, '43P_FALTA_PERSONAL', 0),
(90, '44P_FALTA_ORDEN_DE_FABRICACION', 0),
(91, '01P_LIMPIEZA', 0),
(92, '02P_INSPECCION', 0),
(93, '03P_OPERACION_DEFECTUOSA', 0),
(94, '04_PROGRAMACION_VISITA', 0),
(95, '05P_CONTROL_DE_CALIDAD', 0),
(96, '07P_MANTENIMIENTO_PREVENTIVO', 0),
(97, '08P_COMIDA', 0),
(98, '09P_EMPATE_LAMINA', 0),
(99, '10P_AJUSTE_DE_PRODUCCION', 0),
(100, '11P_AJUSTE_MECANICO', 0),
(101, '12P_AJUSTE_ELECTRICO', 0),
(102, '13P_AJUSTE_ELECTRONICO', 0),
(103, '14P_AJUSTE_HIDRAULICO', 0),
(104, '15P_AJUSTE_DE_HERRAMIENTAS', 0),
(105, '16P_PRO._(O/F,_OTRAS_CAUSAS)', 0),
(106, '17P_AJUSTE_CAMBIO_DE_MEDIDA', 0),
(107, '19P_Giro_de_costura_en_tubería', 0),
(108, '20P_FALLA_EMPATE', 0),
(109, '21P_FALLA_MECANICA', 0),
(110, '22P_FALLA_ELECTRICA', 0),
(111, '23P_FALLA_ELECTRONICA', 0),
(112, '24P_FALLA_HERRAMIENTAS', 0),
(113, '25P_FALLA_CORTE_(SLITTER)', 0),
(114, '26P_FALLA_MATERIA_PRIMA', 0),
(115, '27P_CALENTAMIENTO_DE_RESISTENC', 0),
(116, '30P_FALTA_HERRAMIENTAS', 0),
(117, '31P_FALTA_ELECTRICIDAD', 0),
(118, '32P_FALTA_AIRE_COMPRIMIDO', 0),
(119, '33P_FALTA_GAS_NATURAL', 0),
(120, '34P_FALTA_NITROGENO', 0),
(121, '35P_FALTA_AGUA', 0),
(122, '36P_FALTA_ACEITE', 0),
(123, '37P_FALTA_LUBRICACION', 0),
(124, '38P_FALTA_VAPOR', 0),
(125, '39P_FALTA_REPUESTO', 0),
(126, '40P_FALTA_INSUMO', 0),
(127, '41P_FALTA_MATERIA_PRIMA ', 0),
(128, '42P_FALTA_TUBERIA_OPER._DEFECT', 0),
(129, '43P_FALTA_PERSONAL', 0),
(130, '44P_FALTA_ORDEN_DE_FABRICACION', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `idpersonal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `NFicha` int(11) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `nivel` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(15) DEFAULT NULL,
  `idmaquina` int(11) NOT NULL,
  `idturno` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idpersonal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Volcar la base de datos para la tabla `personal`
--

INSERT INTO `personal` (`idpersonal`, `nombre`, `apellido`, `NFicha`, `cargo`, `nivel`, `usuario`, `clave`, `idmaquina`, `idturno`, `estado`) VALUES
(79, 'elvi', 'romero', 34, 'Obrero', 'B', 'elvis', 'romero', 16, 16, 1),
(88, 'juan roman', 'ramirez ramirez', 45, 'Supervisor', 'A', 'new', '21212121', 16, 16, 1),
(89, 'edwyn', 'romero', 202188, 'SUPERVISOR', 'A', 'edwyn', '20218', 18, 17, 1),
(90, 'hector', 'gonzalez', 67, 'SUPERVISOR', 'A', 'ee', '2222', 19, 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE IF NOT EXISTS `produccion` (
  `idproduccion` int(11) NOT NULL AUTO_INCREMENT,
  `idpersonal` int(11) NOT NULL,
  `persAuse` varchar(45) DEFAULT NULL,
  `ordenFabric` varchar(45) DEFAULT NULL,
  `tirasAProce` decimal(7,0) DEFAULT NULL,
  `tiraProc` decimal(7,0) NOT NULL,
  `tirasRest` decimal(7,0) NOT NULL,
  `fechaPro` date DEFAULT NULL,
  `idmaquina` int(11) NOT NULL,
  `idturno` int(11) NOT NULL,
  `idproductos` int(11) NOT NULL,
  `descripcion_asistencia` text NOT NULL,
  `cali1` decimal(10,0) NOT NULL,
  `cali2` decimal(10,0) NOT NULL,
  `cali_a2` decimal(10,0) NOT NULL,
  `cali3` decimal(10,0) NOT NULL,
  `tpa` decimal(10,0) NOT NULL,
  `tca` decimal(10,0) NOT NULL,
  `tmu` decimal(10,0) NOT NULL,
  `tt` decimal(10,0) NOT NULL,
  PRIMARY KEY (`idproduccion`),
  KEY `fk_produccion_maquina1` (`idmaquina`),
  KEY `fk_produccion_turno1` (`idturno`),
  KEY `fk_produccion_productos1` (`idproductos`),
  KEY `fk_produccion_personal1` (`idpersonal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `produccion`
--

INSERT INTO `produccion` (`idproduccion`, `idpersonal`, `persAuse`, `ordenFabric`, `tirasAProce`, `tiraProc`, `tirasRest`, `fechaPro`, `idmaquina`, `idturno`, `idproductos`, `descripcion_asistencia`, `cali1`, `cali2`, `cali_a2`, `cali3`, `tpa`, `tca`, `tmu`, `tt`) VALUES
(1, 67, NULL, '89', '12', '12', '12', '0000-00-00', 2, 11, 111, '', '11', '11', '11', '11', '0', '0', '0', '11'),
(2, 77, NULL, '', '0', '9', '0', '0000-00-00', 16, 16, 28, '', '0', '0', '9', '9', '9', '8', '6', '0'),
(3, 77, NULL, '', '0', '2', '0', '2014-05-01', 16, 16, 44, '', '0', '0', '2', '2', '2', '2', '2', '0'),
(4, 90, NULL, '', '0', '3', '0', '0000-00-00', 23, 16, 28, '', '0', '0', '2', '2', '3', '3', '3', '0'),
(5, 0, NULL, '', '0', '0', '0', '0000-00-00', 0, 0, 0, '', '0', '0', '0', '0', '0', '0', '0', '0'),
(6, 0, NULL, '', '0', '0', '0', '0000-00-00', 0, 0, 0, '', '0', '0', '0', '0', '0', '0', '0', '0'),
(7, 0, NULL, '', '0', '0', '0', '0000-00-00', 0, 0, 0, '', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idproductos` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) DEFAULT NULL,
  `codigoPrd` varchar(20) DEFAULT NULL,
  `pesoProd` decimal(10,0) NOT NULL,
  PRIMARY KEY (`idproductos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcar la base de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproductos`, `descripcion`, `codigoPrd`, `pesoProd`) VALUES
(28, 'RECTANGULAR 2X1X090', '23232000', '90'),
(29, 'grapa 11/4" 0,90 GALV ', '78627', '30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_equipo`
--

CREATE TABLE IF NOT EXISTS `sub_equipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_subequipo` varchar(50) NOT NULL,
  `idproduccion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcar la base de datos para la tabla `sub_equipo`
--

INSERT INTO `sub_equipo` (`id`, `nombre_subequipo`, `idproduccion`) VALUES
(3, '4_SIST_ELECTRICO', 0),
(9, '5_SIST_NEUMATICO', 0),
(10, '6_SIST_HIDRAULICO', 0),
(11, '7_SIST_DE_AGUA', 0),
(12, '10_LOOPER/FLOOPER/ACUMULADOR_DE_TIRAS', 0),
(13, '11_FORMACION', 0),
(14, '12	THERMATOOL/SOLDADURA', 0),
(15, '4_SIST_ELECTRICO', 0),
(16, '5_SIST_NEUMATICO', 0),
(17, '6_SIST_HIDRAULICO', 0),
(18, '7_SIST_DE_AGUA', 0),
(19, '10_LOOPER/FLOOPER/ACUMULADOR_DE_TIRAS', 0),
(20, '11_FORMACION', 0),
(21, '12_THERMATOOL/SOLDADURA', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempos`
--

CREATE TABLE IF NOT EXISTS `tiempos` (
  `idtiempos` int(11) NOT NULL AUTO_INCREMENT,
  `tiempoParada` varchar(5) DEFAULT NULL,
  `tiempoCambio` varchar(5) DEFAULT NULL,
  `tiempoMuerto` varchar(5) DEFAULT NULL,
  `idproduccion` int(11) NOT NULL,
  `idparada` int(11) NOT NULL,
  PRIMARY KEY (`idtiempos`),
  KEY `fk_tiempos_produccion1` (`idproduccion`),
  KEY `fk_tiempos_codigosParadas1` (`idparada`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tiempos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE IF NOT EXISTS `turno` (
  `idturno` int(11) NOT NULL AUTO_INCREMENT,
  `numTurno` varchar(45) DEFAULT NULL,
  `tiempoTurno` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idturno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcar la base de datos para la tabla `turno`
--

INSERT INTO `turno` (`idturno`, `numTurno`, `tiempoTurno`) VALUES
(16, '8', '410'),
(17, '2', '450'),
(18, '9', '490'),
(19, '4', '231');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `tiempos`
--
ALTER TABLE `tiempos`
  ADD CONSTRAINT `fk_tiempos_codigosParadas1` FOREIGN KEY (`idparada`) REFERENCES `codigosparadas` (`idparada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tiempos_produccion1` FOREIGN KEY (`idproduccion`) REFERENCES `produccion` (`idproduccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;
