-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2020 a las 17:12:15
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hardcore`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_ConsultarCliente` (IN `_cedula` INT)  NO SQL
SELECT * FROM clientes WHERE CedulaCliente=_cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_ConsultarEmpleado` (IN `_cedula` INT)  NO SQL
SELECT * FROM empleados WHERE CedulaEmpleado = _cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_ConsultarEmpleadoNomina` ()  NO SQL
SELECT CedulaEmpleado, Nombre, Apellido, n.DiasLaborados, n.HorasExtra, n.FechaPago, n.Pago, n.Retefuente, n.TotalExtra, n.RetefuenteDescont FROM empleados e JOIN nomina n
WHERE e.CedulaEmpleado = n.Empleado$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_ConsultarUsuario` (IN `_correo` INT)  NO SQL
SELECT * FROM usuario WHERE Correo = _correo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_EditarCliente` (IN `_cedula` INT, IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(100), IN `_edad` INT, IN `_direccion` VARCHAR(100), IN `_celular` INT(200), IN `_fechai` DATE, IN `_plan` INT)  NO SQL
UPDATE clientes SET CedulaCliente=_cedula, Nombre=_nombre, Apellido=_apellido, Edad=_edad, Direccion=_direccion, Celular=_celular, FechaIngreso=_fechai, Plan = _plan
WHERE CedulaCliente= _cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_EditarEmpleado` (IN `_cedula` INT, IN `_nombre` VARCHAR(45), IN `_apellido` VARCHAR(45), IN `_edad` INT, IN `_celular` INT)  NO SQL
UPDATE empleados SET CedulaEmpleado = _cedula, Nombre = _nombre,
Apellido = _apellido, Edad = _edad, Celular = _celular
WHERE CedulaEmpleado = _cedula$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_ListarClientes` ()  NO SQL
SELECT c.CedulaCliente, c.Nombre, c.Apellido, c.Edad, c.Direccion, c.Celular, c.FechaIngreso, p.Nombre NombrePlan FROM clientes c JOIN planes p
WHERE c.Plan = p.IdPlan$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_ListarEmpleados` ()  NO SQL
SELECT * FROM empleados$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_ListarGastos` ()  NO SQL
SELECT g.Precio, g.Fecha, tg.Nombre FROM egresos g JOIN tipoegresos tg WHERE g.IdTipoEgreso = tg.IdTipoEgreso$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_ListarIngresos` ()  NO SQL
SELECT i.Precio, i.Fecha, ti.Nombre FROM ingresos i JOIN tipoingresos ti WHERE i.IdTipoIngreso = ti.IdTipoIngreso$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_ListarNomina` ()  NO SQL
SELECT * FROM nomina$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_ListarPlanes` ()  NO SQL
SELECT * FROM planes$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_ListarTipoGastos` ()  NO SQL
SELECT * FROM tipoegresos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_ListarTipoIngresos` ()  NO SQL
SELECT * FROM tipoingresos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_RegistrarCliente` (IN `_cedula` INT, IN `_nombre` VARCHAR(50), IN `_apellido` VARCHAR(100), IN `_edad` INT, IN `_direccion` VARCHAR(200), IN `_celular` INT, IN `_fechai` DATE, IN `_plan` INT)  NO SQL
INSERT INTO clientes (CedulaCliente, Nombre, Apellido, Edad, Direccion, Celular, FechaIngreso, Plan) VALUES (_cedula, _nombre, _apellido, _edad, _direccion, _celular, _fechai, _plan )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_RegistrarEmpleado` (IN `_cedula` INT, IN `_nombre` VARCHAR(45), IN `_apellido` VARCHAR(45), IN `_edad` INT, IN `_celular` INT)  NO SQL
INSERT INTO empleados (CedulaEmpleado, Nombre, Apellido, Edad, Celular)
VALUES (_cedula, _nombre, _apellido, _edad, _celular)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_RegistrarGasto` (IN `_fecha` DATE, IN `_cantidad` INT, IN `_tipogasto` INT)  NO SQL
INSERT INTO egresos (Fecha, Precio, IdTipoEgreso) VALUES (_fecha,_cantidad ,_tipogasto )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_RegistrarIngreso` (IN `_fecha` DATE, IN `_cantidad` INT, IN `_tipoingreso` INT)  NO SQL
INSERT INTO ingresos (Fecha, Precio, IdTipoIngreso) VALUES (_fecha,_cantidad ,_tipoingreso )$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `HAR_RegistrarNomina` (IN `_dias` INT, IN `_horas` INT, IN `_empleado` INT, IN `_fecha` DATE, IN `_totalextra` INT, IN `_porcentaje` FLOAT, IN `_horaslab` INT)  NO SQL
INSERT INTO nomina (DiasLaborados, HorasExtra, Empleado, FechaPago,TotalExtra, Retefuente, Pago, RetefuenteDescont, HorasLaboradas) VALUES (_dias, _horas, _empleado, _fecha, _totalextra*_horas,((_dias*_horaslab)+(_horas*_totalextra))*_porcentaje, (_dias*_horaslab)+(_horas*_totalextra),((_dias*_horaslab)+(_horas*_totalextra))-(((_dias*_horaslab)+(_horas*_totalextra))*_porcentaje),_horaslab)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `CedulaCliente` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Celular` int(11) DEFAULT NULL,
  `FechaIngreso` date NOT NULL,
  `Plan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`CedulaCliente`, `Nombre`, `Apellido`, `Edad`, `Direccion`, `Celular`, `FechaIngreso`, `Plan`) VALUES
(1515, 'gggg', 'loo', 44, 'djdk', 26626, '2020-02-28', 3),
(2222, 'ee', 'ccc', 21, 'cra 2 7', 89064, '2020-02-10', 2),
(111111, 'PRUEBAREGISTRO', 'ASDASDSA', 23, 'ASDSADADSA', 324343, '2020-02-14', 2),
(10248605, 'ca', 'zuluaga', 33, 'ssdsd', 33211, '2020-02-06', 3),
(77777777, 'uuu', 'mmmmmm', 21, 'tyhy', 4455, '2020-02-09', 1),
(231231212, 'pruebaedit', 'pru', 22, 'sdjakldjlkasljk', 21321312, '2020-02-03', 0),
(999998888, 'Prueb', 'proced', 22, 'asadsad', 21312312, '2020-02-24', 1),
(1060655944, 'cami', 'zulu', 21, 'dsdd', 56546, '2020-02-06', 2),
(2147483647, 'asdsad', 'plannnnn', 22, 'asdsadasd', 21213123, '2020-02-08', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `IdEgreso` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Precio` int(11) NOT NULL,
  `IdTipoEgreso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `egresos`
--

INSERT INTO `egresos` (`IdEgreso`, `Fecha`, `Precio`, `IdTipoEgreso`) VALUES
(1, '2020-02-02', 3400, 2),
(2, '2019-07-22', 40000, 1),
(3, '2020-02-06', 90000000, 3),
(4, '2019-07-22', 30000, 1),
(5, '2019-07-22', 2211212, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `CedulaEmpleado` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Edad` varchar(45) DEFAULT NULL,
  `Celular` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`CedulaEmpleado`, `Nombre`, `Apellido`, `Edad`, `Celular`) VALUES
(45623, 'sdfsdfsd', 'sssss', '33', '23423423'),
(101023, 'PRUEBA', 'asddas', '21', '2321321'),
(2222222, 'e', 'ccc', '21', '44656'),
(10248605, 'car', 'zu', '34', '878969'),
(1037667610, 'Jhonatan', 'Florez', '20', '23121321'),
(1060655944, 'cami', 'zulu', '21', '89090'),
(2147483647, 'prueba', 'pruebita', '34', '2147483647');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `IdIngreso` int(11) NOT NULL,
  `Fecha` varchar(45) NOT NULL,
  `Precio` int(11) NOT NULL,
  `IdTipoIngreso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`IdIngreso`, `Fecha`, `Precio`, `IdTipoIngreso`) VALUES
(1, '2020-02-04', 20000, 1),
(2, '2020-02-19', 340000, 1),
(3, '2018', 23000, 2),
(4, '2019-07-22', 333333, 1),
(5, '2019-07-19', 8477777, 3),
(6, '2019-07-22', 6786899, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE `nomina` (
  `IdNomina` int(11) NOT NULL,
  `DiasLaborados` int(11) NOT NULL,
  `HorasExtra` varchar(45) NOT NULL,
  `Empleado` int(11) NOT NULL,
  `Pago` int(11) NOT NULL,
  `FechaPago` date NOT NULL,
  `Retefuente` int(11) DEFAULT NULL,
  `TotalExtra` int(11) NOT NULL,
  `RetefuenteDescont` int(11) DEFAULT NULL,
  `HorasLaboradas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`IdNomina`, `DiasLaborados`, `HorasExtra`, `Empleado`, `Pago`, `FechaPago`, `Retefuente`, `TotalExtra`, `RetefuenteDescont`, `HorasLaboradas`) VALUES
(57, 200, '2', 101023, 5814400, '2020-02-20', 581440, 14400, 5232960, 0),
(58, 15, '8', 1037667610, 492600, '2020-02-15', 49260, 57600, 443340, 0),
(59, 3, '4', 1060655944, 91000, '2020-02-11', 9100, 4000, 81900, 0),
(60, 100, '3', 1060655944, 2909000, '2020-02-15', 290900, 9000, 2618100, 0),
(61, 150, '4', 1060655944, 4370000, '2020-02-11', 437000, 20000, 3933000, 0),
(62, 149, '3', 1037667610, 4321600, '2020-02-07', 432160, 600, 3889440, 0),
(63, 222, '32', 101023, 6457200, '2020-02-13', 645720, 19200, 5811480, 0),
(64, 150, '5', 2147483647, 4375000, '2020-02-11', 437500, 25000, 3937500, 0),
(65, 150, '3', 1060655944, 4362000, '2020-02-12', 436200, 12000, 3925800, 0),
(66, 400, '2', 1060655944, 11602000, '2020-02-12', 1160200, 2000, 10441800, 0),
(67, 99, '90', 45623, 5571000, '2020-02-13', 557100, 2700000, 5013900, 0),
(68, 5000, '0', 1037667610, 40000, '2020-02-18', 4000, 0, 36000, 8),
(69, 1000, '2', 1037667610, 7000, '2020-02-12', 700, 2000, 6300, 5),
(70, 1000, '3', 101023, 11000, '2020-02-12', 1100, 3000, 9900, 8),
(71, 5000, '0', 1060655944, 40000, '2020-02-26', 4000, 0, 36000, 8),
(72, 200, '2', 1060655944, 2400, '2020-02-12', 240, 2000, 2160, 2),
(73, 200, '2', 10248605, 2400, '2020-02-13', 240, 2000, 2160, 2),
(74, 100000, '200', 45623, 31000000, '2020-02-16', 3100000, 30000000, 27900000, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `IdPlan` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`IdPlan`, `Nombre`) VALUES
(1, 'Normal'),
(2, 'Personalizado'),
(3, 'Intensivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoegresos`
--

CREATE TABLE `tipoegresos` (
  `IdTipoEgreso` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoegresos`
--

INSERT INTO `tipoegresos` (`IdTipoEgreso`, `Nombre`) VALUES
(1, 'Reparacion'),
(2, 'Compra'),
(3, 'Arriendo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoingresos`
--

CREATE TABLE `tipoingresos` (
  `IdTipoIngreso` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoingresos`
--

INSERT INTO `tipoingresos` (`IdTipoIngreso`, `Nombre`) VALUES
(1, 'Mensualidad'),
(2, 'Venta'),
(3, 'Patrocinio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Idusuario` int(11) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Contrasena` varchar(200) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Idusuario`, `Correo`, `Contrasena`, `Nombre`, `Apellido`) VALUES
(1, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'Camila', 'Zuluaga');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`CedulaCliente`),
  ADD KEY `fk_clientes_Planes1_idx` (`Plan`);

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`IdEgreso`),
  ADD KEY `fk_Egresos_TipoEgresos1_idx` (`IdTipoEgreso`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`CedulaEmpleado`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`IdIngreso`),
  ADD KEY `fk_Ingresos_TipoIngresos_idx` (`IdTipoIngreso`);

--
-- Indices de la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD PRIMARY KEY (`IdNomina`),
  ADD KEY `fk_Nomina_empleados1_idx` (`Empleado`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`IdPlan`);

--
-- Indices de la tabla `tipoegresos`
--
ALTER TABLE `tipoegresos`
  ADD PRIMARY KEY (`IdTipoEgreso`);

--
-- Indices de la tabla `tipoingresos`
--
ALTER TABLE `tipoingresos`
  ADD PRIMARY KEY (`IdTipoIngreso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `CedulaCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;

--
-- AUTO_INCREMENT de la tabla `egresos`
--
ALTER TABLE `egresos`
  MODIFY `IdEgreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `CedulaEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `IdIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `nomina`
--
ALTER TABLE `nomina`
  MODIFY `IdNomina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `IdPlan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipoegresos`
--
ALTER TABLE `tipoegresos`
  MODIFY `IdTipoEgreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipoingresos`
--
ALTER TABLE `tipoingresos`
  MODIFY `IdTipoIngreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD CONSTRAINT `fk_Egresos_TipoEgresos1` FOREIGN KEY (`IdTipoEgreso`) REFERENCES `tipoegresos` (`IdTipoEgreso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD CONSTRAINT `fk_Ingresos_TipoIngresos` FOREIGN KEY (`IdTipoIngreso`) REFERENCES `tipoingresos` (`IdTipoIngreso`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
