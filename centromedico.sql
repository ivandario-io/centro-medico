-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2017 a las 04:22:35
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `centromedico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `idCita` int(11) NOT NULL,
  `citFecha` date NOT NULL,
  `citHora` int(11) NOT NULL,
  `citPaciente` int(11) NOT NULL,
  `citMedico` int(11) NOT NULL,
  `citConsultorio` int(11) NOT NULL,
  `citEstado` enum('Asiganado','Atendido','','') COLLATE utf8_spanish_ci NOT NULL,
  `citObservaciones` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorios`
--

CREATE TABLE `consultorios` (
  `idConsultorio` int(11) NOT NULL,
  `conNombre` char(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `idMedico` int(11) NOT NULL,
  `medIdentificacion` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `medNombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `medApellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `medEspecialidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `medTelefono` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `medCorreo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`idMedico`, `medIdentificacion`, `medNombres`, `medApellidos`, `medEspecialidad`, `medTelefono`, `medCorreo`) VALUES
(2, '1047408220', 'jorge enrique', 'alvez del valle', 'Neurologo', '3005637535', 'jorgealvez@gmail.com'),
(3, '1067898654', 'Francisco Jose ', 'Alvarado Martinez', 'Ortopedista', '3007658965', 'franciscoalvarado@gmail.com'),
(5, '1066896543', 'Armando David', 'Galeano Rivera', 'Dermatologo', '3216784321', 'armandogaleano@gmail.com'),
(6, '1066689123', 'chapatin', 'chapulin', 'sin titulo', '555555', 'no tiene'),
(7, '121212312', '12asasas', 'asasas', 'asas', 'asas', 'asas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `idPaciente` int(11) NOT NULL,
  `pacIdentificacion` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `pacNombres` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `PacApellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `PacFechaNacimiento` date NOT NULL,
  `PacSexo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`idPaciente`, `pacIdentificacion`, `pacNombres`, `PacApellidos`, `PacFechaNacimiento`, `PacSexo`) VALUES
(1, '123456789', 'andres', 'perez', '0012-02-12', 'corrreo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuLogin` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `usuPassword` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `usuEstado` enum('Activo','Inactivo','','') COLLATE utf8_spanish_ci NOT NULL,
  `usuTipo` enum('Administrador','Asistente','Medico','Paciente') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuLogin`, `usuPassword`, `usuEstado`, `usuTipo`) VALUES
(1, 'admin', '123456', 'Activo', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `citPaciente` (`citPaciente`),
  ADD KEY `citMedico` (`citMedico`),
  ADD KEY `citConsultorio` (`citConsultorio`);

--
-- Indices de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  ADD PRIMARY KEY (`idConsultorio`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`idMedico`),
  ADD UNIQUE KEY `medIdentificacion` (`medIdentificacion`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idPaciente`),
  ADD UNIQUE KEY `pacIdentificacion` (`pacIdentificacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  MODIFY `idConsultorio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `idMedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`citPaciente`) REFERENCES `pacientes` (`idPaciente`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`citMedico`) REFERENCES `medicos` (`idMedico`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`citConsultorio`) REFERENCES `consultorios` (`idConsultorio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
