-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generaciÃ³n: 10-09-2019 a las 21:53:50
-- VersiÃ³n del servidor: 5.7.26
-- VersiÃ³n de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_articulos`
--

DROP TABLE IF EXISTS `tbl_articulos`;
CREATE TABLE IF NOT EXISTS `tbl_articulos` (
  `id_articulos` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado_articulo` int(11) NOT NULL,
  `id_persona_usuario_registra` int(11) NOT NULL,
  `id_categoria_articulos` int(11) NOT NULL,
  `id_ubicacion_articulo` int(11) NOT NULL,
  `nombre_articulo` varchar(45) NOT NULL,
  `precio_articulo` float DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_registro_art` date NOT NULL,
  `fecha_salida_art` date DEFAULT NULL,
  `descripcion_articulo` varchar(500) DEFAULT NULL,
  `Observacion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_articulos`),
  KEY `fk_tbl_articulos_tbl_estado_articulos1_idx` (`id_estado_articulo`),
  KEY `fk_tbl_articulos_tbl_usuarios1_idx` (`id_persona_usuario_registra`),
  KEY `fk_tbl_articulos_tbl_categoria_articulos1_idx` (`id_categoria_articulos`),
  KEY `fk_tbl_articulos_tbl_ubicacion_articulos1_idx` (`id_ubicacion_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_articulos`
--

INSERT INTO `tbl_articulos` (`id_articulos`, `id_estado_articulo`, `id_persona_usuario_registra`, `id_categoria_articulos`, `id_ubicacion_articulo`, `nombre_articulo`, `precio_articulo`, `cantidad`, `fecha_registro_art`, `fecha_salida_art`, `descripcion_articulo`, `Observacion`) VALUES
(1, 2, 1, 1, 1, 'Computadora de Escritorio DELL ', 8500, 1, '2019-08-07', NULL, 'computadoras ubicadas en el laboratorio1 para impartir clases, marca DELL core i7', NULL),
(2, 2, 1, 1, 5, 'Computadora portatil marca DELL', 12500, 1, '2019-08-08', NULL, 'Laptop Dell core i7, para uso exclusivo de los instructores de laboratorio', NULL),
(3, 2, 1, 1, 1, 'Computadora de Escritorio DELL ', 8500, 1, '2019-08-07', NULL, 'computadoras ubicadas en el laboratorio1 para impartir clases, marca DELL core i7', NULL),
(4, 2, 1, 1, 5, 'Computadora portatil marca DELL', 12500, 1, '2019-08-08', NULL, 'Laptop Dell core i7, para uso exclusivo de los instructores de laboratorio', NULL),
(5, 2, 1, 1, 3, 'Computadora de Escritorio', NULL, 2, '2019-08-05', NULL, 'Computadora de escritorio marca DELL para uso exclusivo de laboratorios', NULL),
(6, 2, 1, 1, 1, 'Computadora de Escritorio DELL ', 8500, 1, '2019-08-07', NULL, 'computadoras ubicadas en el laboratorio1 para impartir clases, marca DELL core i7', NULL),
(7, 2, 1, 1, 5, 'Computadora portatil marca DELL', 12500, 1, '2019-08-08', NULL, 'Laptop Dell core i7, para uso exclusivo de los instructores de laboratorio', NULL),
(8, 2, 1, 1, 3, 'Computadora de Escritorio', NULL, 2, '2019-08-05', NULL, 'Computadora de escritorio marca DELL para uso exclusivo de laboratorios', NULL),
(9, 2, 1, 1, 1, 'Computadora de Escritorio DELL ', 8500, 1, '2019-08-07', NULL, 'computadoras ubicadas en el laboratorio1 para impartir clases, marca DELL core i7', NULL),
(10, 2, 1, 1, 5, 'Computadora portatil marca DELL', 12500, 1, '2019-08-08', NULL, 'Laptop Dell core i7, para uso exclusivo de los instructores de laboratorio', NULL),
(11, 2, 1, 1, 3, 'Computadora de Escritorio', NULL, 2, '2019-08-05', NULL, 'Computadora de escritorio marca DELL para uso exclusivo de laboratorios', NULL),
(12, 2, 1, 1, 1, 'Computadora de Escritorio DELL ', 8500, 1, '2019-08-07', NULL, 'computadoras ubicadas en el laboratorio1 para impartir clases, marca DELL core i7', NULL),
(13, 2, 1, 1, 5, 'Computadora portatil marca DELL', 12500, 1, '2019-08-08', NULL, 'Laptop Dell core i7, para uso exclusivo de los instructores de laboratorio', NULL),
(14, 2, 1, 1, 3, 'Computadora de Escritorio', NULL, 2, '2019-08-05', NULL, 'Computadora de escritorio marca DELL para uso exclusivo de laboratorios', NULL),
(15, 2, 1, 1, 1, 'Computadora de Escritorio DELL ', 8500, 1, '2019-08-07', NULL, 'computadoras ubicadas en el laboratorio1 para impartir clases, marca DELL core i7', NULL),
(16, 2, 1, 1, 5, 'Computadora portatil marca DELL', 12500, 1, '2019-08-08', NULL, 'Laptop Dell core i7, para uso exclusivo de los instructores de laboratorio', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bitacora_actualizacion_articulos`
--

DROP TABLE IF EXISTS `tbl_bitacora_actualizacion_articulos`;
CREATE TABLE IF NOT EXISTS `tbl_bitacora_actualizacion_articulos` (
  `id_bitacora_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `id_articulos` int(11) NOT NULL,
  `id_persona_usuario_anterior` int(11) NOT NULL,
  `id_persona_usuario_actual` int(11) NOT NULL,
  `id_ubicacion_articulo_anterior` int(11) NOT NULL,
  `id_ubicacion_articulo_actual` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `fecha_actualizacion` date NOT NULL,
  PRIMARY KEY (`id_bitacora_articulo`),
  KEY `fk_tbl_bitacora_actualizacion_articulos_tbl_articulos1_idx` (`id_articulos`),
  KEY `fk_tbl_bitacora_actualizacion_articulos_tbl_usuarios1_idx` (`id_persona_usuario_anterior`),
  KEY `fk_tbl_bitacora_articulos_tbl_usuarios1_idx` (`id_persona_usuario_actual`),
  KEY `fk_tbl_bitacora_articulos_tbl_ubicacion_articulos1_idx` (`id_ubicacion_articulo_anterior`),
  KEY `fk_tbl_bitacora_articulos_tbl_ubicacion_articulos2_idx` (`id_ubicacion_articulo_actual`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bitacora_reportes`
--

DROP TABLE IF EXISTS `tbl_bitacora_reportes`;
CREATE TABLE IF NOT EXISTS `tbl_bitacora_reportes` (
  `id_bitacora_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `id_reportes` int(11) NOT NULL,
  `id_persona_usuario_creo_reporte` int(11) NOT NULL,
  `fecha_reporte` varchar(45) DEFAULT NULL,
  `contenido_reporte` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_bitacora_reporte`),
  KEY `fk_tbl_bitacora_reportes_tbl_reportes1_idx` (`id_reportes`),
  KEY `fk_tbl_bitacora_reportes_tbl_usuarios1_idx` (`id_persona_usuario_creo_reporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria_articulos`
--

DROP TABLE IF EXISTS `tbl_categoria_articulos`;
CREATE TABLE IF NOT EXISTS `tbl_categoria_articulos` (
  `id_categoria_articulos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categoria_articulos`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_categoria_articulos`
--

INSERT INTO `tbl_categoria_articulos` (`id_categoria_articulos`, `nombre_categoria`) VALUES
(1, 'Computadoras'),
(2, 'Proyectores'),
(3, 'Cables'),
(4, 'Mobiliario y Equipos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_articulos`
--

DROP TABLE IF EXISTS `tbl_estado_articulos`;
CREATE TABLE IF NOT EXISTS `tbl_estado_articulos` (
  `id_estado_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `estado_articulo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estado_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_estado_articulos`
--

INSERT INTO `tbl_estado_articulos` (`id_estado_articulo`, `estado_articulo`) VALUES
(1, 'Disponible'),
(2, 'No Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_mensajes`
--

DROP TABLE IF EXISTS `tbl_estado_mensajes`;
CREATE TABLE IF NOT EXISTS `tbl_estado_mensajes` (
  `id_estado_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `estado_mensaje` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estado_mensaje`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_estado_mensajes`
--

INSERT INTO `tbl_estado_mensajes` (`id_estado_mensaje`, `estado_mensaje`) VALUES
(1, 'recibido'),
(2, 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_reporte`
--

DROP TABLE IF EXISTS `tbl_estado_reporte`;
CREATE TABLE IF NOT EXISTS `tbl_estado_reporte` (
  `id_estado_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `estado_reporte` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estado_reporte`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_estado_reporte`
--

INSERT INTO `tbl_estado_reporte` (`id_estado_reporte`, `estado_reporte`) VALUES
(1, 'En revision'),
(2, 'Aceptado'),
(3, 'Rechazado'),
(4, 'En revision');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_solicitudes`
--

DROP TABLE IF EXISTS `tbl_estado_solicitudes`;
CREATE TABLE IF NOT EXISTS `tbl_estado_solicitudes` (
  `id_estado_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `estado_solicitud` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estado_solicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_estado_solicitudes`
--

INSERT INTO `tbl_estado_solicitudes` (`id_estado_solicitud`, `estado_solicitud`) VALUES
(1, 'Aceptada'),
(2, 'En espera'),
(3, 'Rechazada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_generos`
--

DROP TABLE IF EXISTS `tbl_generos`;
CREATE TABLE IF NOT EXISTS `tbl_generos` (
  `id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(45) NOT NULL,
  `abreviatura` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_generos`
--

INSERT INTO `tbl_generos` (`id_genero`, `genero`, `abreviatura`) VALUES
(1, 'Femenino', 'F'),
(2, 'Masculino', 'M'),
(3, 'Otro', 'O');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_lugares`
--

DROP TABLE IF EXISTS `tbl_lugares`;
CREATE TABLE IF NOT EXISTS `tbl_lugares` (
  `id_lugar` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_lugar` int(11) NOT NULL,
  `id_lugar_padre` int(11) DEFAULT NULL,
  `nombre_lugar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_lugar`),
  KEY `fk_tbl_lugares_tbl_tipo_lugares_idx` (`id_tipo_lugar`),
  KEY `fk_tbl_lugares_tbl_lugares1_idx` (`id_lugar_padre`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_lugares`
--

INSERT INTO `tbl_lugares` (`id_lugar`, `id_tipo_lugar`, `id_lugar_padre`, `nombre_lugar`) VALUES
(1, 1, NULL, 'Honduras'),
(2, 2, 1, 'Francisco Morazan'),
(3, 3, 2, 'Tegucigalpa'),
(4, 2, 1, 'Cortes'),
(5, 3, 2, 'San Pedro Sula'),
(6, 2, 1, 'La Esperanza'),
(7, 3, 2, 'Intibuca'),
(8, 1, NULL, 'Guatemala'),
(9, 2, 1, 'Esquipulas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mensajes`
--

DROP TABLE IF EXISTS `tbl_mensajes`;
CREATE TABLE IF NOT EXISTS `tbl_mensajes` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado_mensaje` int(11) NOT NULL,
  `id_persona_usuario_envia` int(11) NOT NULL,
  `id_persona_usuario_recibe` int(11) NOT NULL,
  `contenido_mensaje` varchar(200) NOT NULL,
  `asunto_mensaje` varchar(45) DEFAULT NULL,
  `fecha_mensaje` date NOT NULL,
  PRIMARY KEY (`id_mensaje`),
  KEY `fk_tbl_mensajes_tbl_estado_mensajes1_idx` (`id_estado_mensaje`),
  KEY `fk_tbl_mensajes_tbl_usuarios1_idx` (`id_persona_usuario_envia`),
  KEY `fk_tbl_mensajes_tbl_usuarios2_idx` (`id_persona_usuario_recibe`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_personas`
--

DROP TABLE IF EXISTS `tbl_personas`;
CREATE TABLE IF NOT EXISTS `tbl_personas` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `id_lugar_nacimiento` int(11) NOT NULL,
  `id_lugar_residencia` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) DEFAULT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(45) DEFAULT NULL,
  `identidad` varchar(15) NOT NULL,
  `telefono` decimal(10,0) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `numero_cuenta` decimal(11,0) DEFAULT NULL,
  `CONOCIMIENTOS` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `fk_tbl_Personas_tbl_generos1_idx` (`id_genero`),
  KEY `fk_tbl_Personas_tbl_lugares1_idx` (`id_lugar_nacimiento`),
  KEY `fk_tbl_Personas_tbl_lugares2_idx` (`id_lugar_residencia`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_personas`
--

INSERT INTO `tbl_personas` (`id_persona`, `id_lugar_nacimiento`, `id_lugar_residencia`, `id_genero`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `identidad`, `telefono`, `email`, `fecha_nacimiento`, `numero_cuenta`, `CONOCIMIENTOS`) VALUES
(1, 1, 1, 2, 'Pedro', 'fernandez', 'Perez', 'flores', '0801199500045', '33167345', 'pedrop@gmail.com', '1980-10-05', '20161999223', ''),
(2, 1, 1, 1, 'alex', 'francisco', 'vulnez', 'perez', '0801-1980-19992', '33165271', 'alexmidence02@yahoo.com', '1999-12-12', '20131087123', ''),
(3, 1, 1, 1, 'jony', 'alexander', 'ochoa', 'midence', '0801-1980-19992', '33125372', 'alexmidence02@yahoo.com', '1999-03-12', '2013199912', ''),
(4, 1, 1, 1, 'alex', 'alexander', 'ochoa', 'midence', '0801-1980-19992', '33244532', 'alexmidence02@yahoo.com', '1998-02-02', '20139917212', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reportes`
--

DROP TABLE IF EXISTS `tbl_reportes`;
CREATE TABLE IF NOT EXISTS `tbl_reportes` (
  `id_reportes` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona_usuario` int(11) NOT NULL,
  `id_tipo_reporte` int(11) NOT NULL,
  `id_estado_reporte` int(11) NOT NULL,
  `fecha_reporte` date DEFAULT NULL,
  `contenido_reporte` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`id_reportes`),
  KEY `fk_tbl_reportes_tbl_usuarios1_idx` (`id_persona_usuario`),
  KEY `fk_tbl_reportes_tbl_tipo_reportes1_idx` (`id_tipo_reporte`),
  KEY `fk_tbl_reportes_tbl_estado_reporte1_idx` (`id_estado_reporte`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_reportes`
--

INSERT INTO `tbl_reportes` (`id_reportes`, `id_persona_usuario`, `id_tipo_reporte`, `id_estado_reporte`, `fecha_reporte`, `contenido_reporte`) VALUES
(1, 1, 2, 2, '2019-09-04', 'Los articulos seleccionados son: <br> Computadora de Escritorio, <br>reporte'),
(2, 1, 1, 2, '2019-09-04', 'Los articulos seleccionados son: <br><br>erw'),
(5, 2, 1, 2, '2019-09-10', 'Los articulos seleccionados son: <br><br>kasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_solicitudes`
--

DROP TABLE IF EXISTS `tbl_solicitudes`;
CREATE TABLE IF NOT EXISTS `tbl_solicitudes` (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona_usuario` int(11) DEFAULT NULL,
  `id_estado_solicitud` int(11) NOT NULL,
  `id_tipo_solicitud` int(11) NOT NULL,
  `id_articulo_solicitado` int(11) NOT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `numero_cuenta` varchar(15) DEFAULT NULL,
  `detalle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_solicitud`),
  KEY `fk_tbl_solicitudes_tbl_estado_solicitudes1_idx` (`id_estado_solicitud`),
  KEY `fk_tbl_solicitudes_tbl_tipo_solicitudes1_idx` (`id_tipo_solicitud`),
  KEY `fk_tbl_solicitudes_tbl_usuarios1_idx` (`id_persona_usuario`),
  KEY `fk_tbl_solicitudes_tbl_articulos1_idx` (`id_articulo_solicitado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_lugares`
--

DROP TABLE IF EXISTS `tbl_tipo_lugares`;
CREATE TABLE IF NOT EXISTS `tbl_tipo_lugares` (
  `id_tipo_lugar` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_lugar` varchar(65) NOT NULL,
  PRIMARY KEY (`id_tipo_lugar`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_lugares`
--

INSERT INTO `tbl_tipo_lugares` (`id_tipo_lugar`, `tipo_lugar`) VALUES
(1, 'Pais'),
(2, 'Departamento'),
(3, 'Municipio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_reportes`
--

DROP TABLE IF EXISTS `tbl_tipo_reportes`;
CREATE TABLE IF NOT EXISTS `tbl_tipo_reportes` (
  `id_tipo_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_reporte` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_reporte`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_reportes`
--

INSERT INTO `tbl_tipo_reportes` (`id_tipo_reporte`, `tipo_reporte`) VALUES
(1, 'Estado de Equipos'),
(2, 'Solicitudes de Equipo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_solicitudes`
--

DROP TABLE IF EXISTS `tbl_tipo_solicitudes`;
CREATE TABLE IF NOT EXISTS `tbl_tipo_solicitudes` (
  `id_tipo_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_solicitud` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_solicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_solicitudes`
--

INSERT INTO `tbl_tipo_solicitudes` (`id_tipo_solicitud`, `nombre_solicitud`) VALUES
(1, 'Prestamos Articulos'),
(2, 'Reserva Laboratorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_usuarios`
--

DROP TABLE IF EXISTS `tbl_tipo_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_tipo_usuarios` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_usuarios`
--

INSERT INTO `tbl_tipo_usuarios` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(1, 'Administrador'),
(2, 'Instructor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ubicacion_articulos`
--

DROP TABLE IF EXISTS `tbl_ubicacion_articulos`;
CREATE TABLE IF NOT EXISTS `tbl_ubicacion_articulos` (
  `id_ubicacion_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `ubicacion_articulo` varchar(100) NOT NULL,
  `Abreviatura` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_ubicacion_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_ubicacion_articulos`
--

INSERT INTO `tbl_ubicacion_articulos` (`id_ubicacion_articulo`, `ubicacion_articulo`, `Abreviatura`) VALUES
(1, 'Laboratorio1', 'Lab-1'),
(2, 'Laboratorio2', 'Lab-2'),
(3, 'Laboratorio3', 'Lab-3'),
(4, 'Laboratorio4', 'Lab-4'),
(5, 'Laboratorio de InvestigaciÃ³n', 'Lab-InvestigaciÃ³n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `id_persona_usuario` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(12) NOT NULL,
  `clave_usuario` varbinary(12) NOT NULL,
  `fotografia` blob,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`id_persona_usuario`),
  KEY `fk_tbl_usuarios_tbl_Personas1_idx` (`id_persona_usuario`),
  KEY `fk_tbl_usuarios_tbl_tipo_usuarios1_idx` (`id_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_persona_usuario`, `id_tipo_usuario`, `nombre_usuario`, `clave_usuario`, `fotografia`, `fecha_registro`) VALUES
(1, 1, 'pedro1', 0x313233343536, NULL, '2019-07-25'),
(2, 2, 'AlexM', 0x313233343536, NULL, '2019-09-04'),
(3, 2, 'jony2', 0x313233343536, NULL, '2019-09-05'),
(4, 2, 'don3', 0x313233343536, NULL, '2019-09-06');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_articulos`
--
ALTER TABLE `tbl_articulos`
  ADD CONSTRAINT `fk_tbl_articulos_tbl_categoria_articulos1` FOREIGN KEY (`id_categoria_articulos`) REFERENCES `tbl_categoria_articulos` (`id_categoria_articulos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_articulos_tbl_estado_articulos1` FOREIGN KEY (`id_estado_articulo`) REFERENCES `tbl_estado_articulos` (`id_estado_articulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_articulos_tbl_ubicacion_articulos1` FOREIGN KEY (`id_ubicacion_articulo`) REFERENCES `tbl_ubicacion_articulos` (`id_ubicacion_articulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_articulos_tbl_usuarios1` FOREIGN KEY (`id_persona_usuario_registra`) REFERENCES `tbl_usuarios` (`id_persona_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_bitacora_actualizacion_articulos`
--
ALTER TABLE `tbl_bitacora_actualizacion_articulos`
  ADD CONSTRAINT `fk_tbl_bitacora_actualizacion_articulos_tbl_articulos1` FOREIGN KEY (`id_articulos`) REFERENCES `tbl_articulos` (`id_articulos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_bitacora_actualizacion_articulos_tbl_usuarios1` FOREIGN KEY (`id_persona_usuario_anterior`) REFERENCES `tbl_usuarios` (`id_persona_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_bitacora_articulos_tbl_ubicacion_articulos1` FOREIGN KEY (`id_ubicacion_articulo_anterior`) REFERENCES `tbl_ubicacion_articulos` (`id_ubicacion_articulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_bitacora_articulos_tbl_ubicacion_articulos2` FOREIGN KEY (`id_ubicacion_articulo_actual`) REFERENCES `tbl_ubicacion_articulos` (`id_ubicacion_articulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_bitacora_articulos_tbl_usuarios1` FOREIGN KEY (`id_persona_usuario_actual`) REFERENCES `tbl_usuarios` (`id_persona_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_bitacora_reportes`
--
ALTER TABLE `tbl_bitacora_reportes`
  ADD CONSTRAINT `fk_tbl_bitacora_reportes_tbl_reportes1` FOREIGN KEY (`id_reportes`) REFERENCES `tbl_reportes` (`id_reportes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_bitacora_reportes_tbl_usuarios1` FOREIGN KEY (`id_persona_usuario_creo_reporte`) REFERENCES `tbl_usuarios` (`id_persona_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_lugares`
--
ALTER TABLE `tbl_lugares`
  ADD CONSTRAINT `fk_tbl_lugares_tbl_lugares1` FOREIGN KEY (`id_lugar_padre`) REFERENCES `tbl_lugares` (`id_lugar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_lugares_tbl_tipo_lugares` FOREIGN KEY (`id_tipo_lugar`) REFERENCES `tbl_tipo_lugares` (`id_tipo_lugar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_mensajes`
--
ALTER TABLE `tbl_mensajes`
  ADD CONSTRAINT `fk_tbl_mensajes_tbl_estado_mensajes1` FOREIGN KEY (`id_estado_mensaje`) REFERENCES `tbl_estado_mensajes` (`id_estado_mensaje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_mensajes_tbl_usuarios1` FOREIGN KEY (`id_persona_usuario_envia`) REFERENCES `tbl_usuarios` (`id_persona_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_mensajes_tbl_usuarios2` FOREIGN KEY (`id_persona_usuario_recibe`) REFERENCES `tbl_usuarios` (`id_persona_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD CONSTRAINT `fk_tbl_Personas_tbl_generos1` FOREIGN KEY (`id_genero`) REFERENCES `tbl_generos` (`id_genero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_Personas_tbl_lugares1` FOREIGN KEY (`id_lugar_nacimiento`) REFERENCES `tbl_lugares` (`id_lugar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_Personas_tbl_lugares2` FOREIGN KEY (`id_lugar_residencia`) REFERENCES `tbl_lugares` (`id_lugar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_reportes`
--
ALTER TABLE `tbl_reportes`
  ADD CONSTRAINT `fk_tbl_reportes_tbl_estado_reporte1` FOREIGN KEY (`id_estado_reporte`) REFERENCES `tbl_estado_reporte` (`id_estado_reporte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_reportes_tbl_tipo_reportes1` FOREIGN KEY (`id_tipo_reporte`) REFERENCES `tbl_tipo_reportes` (`id_tipo_reporte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_reportes_tbl_usuarios1` FOREIGN KEY (`id_persona_usuario`) REFERENCES `tbl_usuarios` (`id_persona_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_solicitudes`
--
ALTER TABLE `tbl_solicitudes`
  ADD CONSTRAINT `fk_tbl_solicitudes_tbl_articulos1` FOREIGN KEY (`id_articulo_solicitado`) REFERENCES `tbl_articulos` (`id_articulos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_solicitudes_tbl_estado_solicitudes1` FOREIGN KEY (`id_estado_solicitud`) REFERENCES `tbl_estado_solicitudes` (`id_estado_solicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_solicitudes_tbl_tipo_solicitudes1` FOREIGN KEY (`id_tipo_solicitud`) REFERENCES `tbl_tipo_solicitudes` (`id_tipo_solicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_solicitudes_tbl_usuarios1` FOREIGN KEY (`id_persona_usuario`) REFERENCES `tbl_usuarios` (`id_persona_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `fk_tbl_usuarios_tbl_Personas1` FOREIGN KEY (`id_persona_usuario`) REFERENCES `tbl_personas` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_usuarios_tbl_tipo_usuarios1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tbl_tipo_usuarios` (`id_tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
