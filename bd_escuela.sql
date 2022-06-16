-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-11-2021 a las 01:47:54
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergias`
--

CREATE TABLE IF NOT EXISTS `alergias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_inscripcion`
--

CREATE TABLE IF NOT EXISTS `estado_inscripcion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE IF NOT EXISTS `estudiantes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `grupo_sanguineo` varchar(10) NOT NULL,
  `id_representante` int(10) NOT NULL,
  `parentesco_representante` varchar(100) NOT NULL,
  `id_seccion` int(10) NOT NULL,
  `eliminado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombre`, `apellido`, `cedula`, `fecha_nacimiento`, `sexo`, `direccion`, `grupo_sanguineo`, `id_representante`, `parentesco_representante`, `id_seccion`, `eliminado`) VALUES
(1, 'Omar Jose', 'Gomez Sanchez', '34157953', '2014-08-19', 'Masculino', 'El Poblado', 'O+', 1, 'Madre', 4, 0),
(2, 'Roxana Gabriela', 'Gonzalez Nieto', '35153759', '2015-02-07', 'Femenino', 'El Poblado', 'O+', 2, 'Madre', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE IF NOT EXISTS `grados` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `nombre`, `descripcion`) VALUES
(1, '1', 'Grado'),
(2, '2', 'Grado'),
(3, '3', 'Grado'),
(4, '4', 'Grado'),
(5, '5', 'Grado'),
(6, '6', 'Grado'),
(7, '1', 'Año'),
(8, '2', 'Año'),
(9, '3', 'Año'),
(10, '4', 'Año'),
(11, '5', 'Año');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_estudiantes`
--

CREATE TABLE IF NOT EXISTS `inscripcion_estudiantes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_estudiante` int(10) NOT NULL,
  `id_estado` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `id_grado` int(10) NOT NULL,
  `eliminado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `nombre`, `id_grado`, `eliminado`) VALUES
(1, 'Matemáticas', 1, 0),
(2, 'Ciencias Naturales', 1, 0),
(3, 'Lenguaje y Literatura', 1, 0),
(4, 'Lenguaje y Literatura', 2, 0),
(5, 'Matemáticas', 2, 0),
(6, 'Educación Física', 2, 0),
(7, 'Ciencias Sociales', 2, 0),
(8, 'Historia', 7, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_profesor`
--

CREATE TABLE IF NOT EXISTS `materia_profesor` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_profesor` int(10) NOT NULL,
  `id_materia` int(10) NOT NULL,
  `id_seccion` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `materia_profesor`
--

INSERT INTO `materia_profesor` (`id`, `id_profesor`, `id_materia`, `id_seccion`) VALUES
(1, 2, 3, 1),
(3, 2, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE IF NOT EXISTS `profesores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `otro_telefono` varchar(15) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `eliminado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nombre`, `apellido`, `cedula`, `fecha_nacimiento`, `sexo`, `telefono`, `otro_telefono`, `direccion`, `eliminado`) VALUES
(1, 'Laura Angelina', 'Diaz Quintero', '16789456', '1992-10-18', 'Femenino', '04267894561', '04245546465', 'El Poblado', 0),
(2, 'Nestor Jesus', 'Torres Ramirez', '18258369', '1994-10-10', 'Masculino', '04167894562', '', 'El Poblado', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representantes`
--

CREATE TABLE IF NOT EXISTS `representantes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `otro_telefono` varchar(15) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `representantes`
--

INSERT INTO `representantes` (`id`, `nombre`, `apellido`, `cedula`, `fecha_nacimiento`, `sexo`, `telefono`, `otro_telefono`, `direccion`) VALUES
(1, 'Ana Maria', 'Sanchez Espinoza', '26456123', '1998-03-11', 'Femenino', '04142345678', '', 'El Poblado'),
(2, 'Genesis Gabriela', 'Nieto Ortiz', '19123456', '1993-06-24', 'Femenino', '04147894561', '', 'El Poblado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE IF NOT EXISTS `secciones` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  `id_grado` int(10) NOT NULL,
  `eliminado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `nombre`, `id_grado`, `eliminado`) VALUES
(1, 'A', 1, 0),
(2, 'B', 1, 0),
(3, 'A', 2, 0),
(4, 'B', 2, 0),
(5, 'C', 1, 0),
(6, 'A', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `nivel` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `nivel`) VALUES
(1, 'administrador', '123', 1),
(3, 'asistente', '123', 2),
(4, 'v34157953', 'v34157953', 3),
(5, 'v35153759', 'v35153759', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_estudiante`
--

CREATE TABLE IF NOT EXISTS `usuario_estudiante` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
