-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2022 a las 00:44:21
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `williamson`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admon_interfaz`
--

CREATE TABLE `admon_interfaz` (
  `cod_ai` int(11) NOT NULL,
  `nom_tabla` varchar(100) NOT NULL,
  `nom_interfaz` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `cod_aud` int(11) NOT NULL,
  `cod_usu_aud` int(11) DEFAULT NULL,
  `nom_tab_aud` char(100) DEFAULT NULL,
  `fec_aud` datetime DEFAULT NULL,
  `transaccion` int(11) DEFAULT NULL,
  `cod_pro` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bajas`
--

CREATE TABLE `bajas` (
  `cod_baja` int(11) NOT NULL COMMENT 'Codigo de la baja',
  `equipo_baja` int(11) DEFAULT NULL COMMENT 'Coidgo del equipo de baja',
  `fecha_baja` date DEFAULT NULL COMMENT 'Fecha de la baja',
  `tipo_baja` int(11) DEFAULT NULL COMMENT 'Codigo del tipo de la baja',
  `observaciones_baja` varchar(200) DEFAULT NULL COMMENT 'Observaciones de la baja'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `cod_carac` int(11) NOT NULL COMMENT 'Codigo de la caracteristica',
  `desc_carac` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Descripcion de la caracteristica'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `cod_car` int(11) NOT NULL,
  `nom_car` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nombre del cargo'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabla de cargos de la empresa';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `cod_ciu` int(11) NOT NULL COMMENT 'Codigo de la ciudad',
  `nom_ciu` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'nombre de la ciudad',
  `cod_dptos` int(11) DEFAULT NULL COMMENT 'codigo del departamento'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_equipos`
--

CREATE TABLE `clase_equipos` (
  `cod_clase` int(11) NOT NULL COMMENT 'Codigo de la clase del equipo',
  `nom_clase` varchar(100) DEFAULT NULL COMMENT 'Descripcion de la clase del equipo'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion_cliente`
--

CREATE TABLE `clasificacion_cliente` (
  `cod_clacli` int(11) NOT NULL,
  `nom_clacli` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nombre del tipo de clasificacion'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cod_cli` int(11) NOT NULL COMMENT 'Codigo del cliente solicitante',
  `apel1_cli` varchar(200) DEFAULT NULL COMMENT 'Primer apellido del cliente solicitante',
  `apel2_cli` varchar(200) DEFAULT NULL COMMENT 'Segundo apellido del cliente solicitante',
  `nom1_cli` varchar(200) NOT NULL COMMENT 'Primer nombre del cliente solicitante',
  `nom2_cli` varchar(200) NOT NULL COMMENT 'Segundo nombre del cliente solicitante',
  `cedula_cli` double NOT NULL COMMENT 'Cedula del cliente solicitante',
  `tipo_empleo_cli` int(11) DEFAULT NULL COMMENT 'Tipo de empleo del cliente solicitante',
  `direccion_cli` varchar(200) NOT NULL COMMENT 'Dirreción del cliente solicitante',
  `telefono_cli` varchar(200) NOT NULL COMMENT 'telefono del cliente solicitante',
  `ciudad_cli` int(11) DEFAULT NULL,
  `barrio_cli` varchar(50) DEFAULT NULL COMMENT 'Barrio del cliente',
  `celular_cli` varchar(100) DEFAULT NULL,
  `email_cli` varchar(100) NOT NULL COMMENT 'Email del cliente solicitante',
  `repre_legal` varchar(100) DEFAULT NULL,
  `cedula_representante` double DEFAULT NULL,
  `direccion_repre` varchar(100) DEFAULT NULL,
  `ciudad_repre` int(11) DEFAULT NULL,
  `tel_repre` varchar(100) DEFAULT NULL,
  `celu_repre` varchar(100) DEFAULT NULL,
  `email_repres` varchar(100) DEFAULT NULL,
  `tipo_persona` int(11) DEFAULT NULL,
  `tipo_cliente` int(11) DEFAULT NULL COMMENT 'Coidgo del tipo de cliente',
  `fecha_ingreso` date DEFAULT NULL,
  `cod_mismo_paciente` int(11) NOT NULL COMMENT 'Codigo si es mismo paciente o no'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consecutivo`
--

CREATE TABLE `consecutivo` (
  `cod_cons` int(11) NOT NULL,
  `letra_cons` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Codigo en letras del consecutivo',
  `num_cons` int(11) NOT NULL COMMENT 'codigo en numero del consecutivo',
  `form_cons` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Tipo de formato q aplica',
  `cod_clase_equipo` int(11) NOT NULL COMMENT 'Codigo de la clase del equipo',
  `codigo_actual_cons` int(11) NOT NULL COMMENT 'codigo actual del formato'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Formato de consecutivo';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato_alquiler`
--

CREATE TABLE `contrato_alquiler` (
  `cod_calc` int(11) NOT NULL,
  `consecutivo` varchar(100) DEFAULT NULL,
  `cod_cliente` int(11) DEFAULT NULL COMMENT 'Codigo del cliente ',
  `fecha_ini_contrato` date DEFAULT NULL COMMENT 'Fecha de inicio del contrato',
  `meses` varchar(100) DEFAULT NULL,
  `adjunto` varchar(150) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_fin_contrato` date NOT NULL COMMENT 'Fecha del fin del contrato',
  `cod_paciente` int(11) DEFAULT NULL COMMENT 'Codigo del paciente',
  `cod_responsable` int(11) DEFAULT NULL COMMENT 'Codigo del responsable',
  `observ_contrato` varchar(80) NOT NULL COMMENT 'Observaciones del contrato',
  `estado_contrato` int(11) NOT NULL COMMENT 'Codigo del estado del contrato',
  `tipo_contrato` int(11) DEFAULT NULL COMMENT 'Codigo del tipo de contrato',
  `fecha_mod_contrato` date DEFAULT NULL COMMENT 'Fecha de modificacion del contrato'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d_estado_civil`
--

CREATE TABLE `d_estado_civil` (
  `cod_estado_civil` int(11) NOT NULL COMMENT 'codigo del estado civil',
  `nom_estado_civil` varchar(100) DEFAULT NULL COMMENT 'nombre del estado civil'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d_factura`
--

CREATE TABLE `d_factura` (
  `cod_d_factura` int(11) NOT NULL COMMENT 'Codigo de la desc de la factura',
  `factura` int(11) DEFAULT NULL COMMENT 'Codigo de la factura',
  `contrato` int(11) DEFAULT NULL COMMENT 'Codigo del contrato',
  `cod_equipo` int(11) DEFAULT NULL COMMENT 'Codigo del equipo',
  `fecha_ini_pago` date DEFAULT NULL COMMENT 'Fecha inicio de pago',
  `fecha_fin_pago` date DEFAULT NULL COMMENT 'Fecha fin del contrato',
  `valor_pago` int(11) NOT NULL COMMENT 'Valor que debe pagar',
  `valor_descuento` double NOT NULL COMMENT 'Valor del descuento',
  `valor_con_descuento` double NOT NULL COMMENT 'Valor a pagar con descuento',
  `valor_recibido` int(11) NOT NULL COMMENT 'Valor recibido',
  `saldo` int(11) NOT NULL COMMENT 'Saldo '
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `cod_jmc` int(11) NOT NULL,
  `nom_jmc` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre de la empresa',
  `nit_jmc` varchar(50) DEFAULT NULL COMMENT 'nit de la empresa',
  `dir_jmc` varchar(50) DEFAULT NULL COMMENT 'direccion',
  `tel_jmc` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'telefono',
  `fax_jmc` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'fax de la empresa',
  `pag_jmc` varchar(100) DEFAULT NULL COMMENT 'pagina',
  `mail_jmc` longtext DEFAULT NULL COMMENT 'mail de la empresa',
  `logo_jmc` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'logo de la empresa',
  `lugar_jmc` varchar(100) NOT NULL COMMENT 'lugar de la empresa'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas`
--

CREATE TABLE `entregas` (
  `cod_entrega` int(11) NOT NULL COMMENT 'Codigo de la entrega',
  `cod_contrato` int(11) DEFAULT NULL COMMENT 'Codigo del contrato',
  `fecha_entrega` date DEFAULT NULL COMMENT 'Fecha de la entrega',
  `tipo_entrega` int(11) DEFAULT NULL COMMENT 'Codigo del tipo de entrega',
  `saldo_deuda` double NOT NULL COMMENT 'Saldo de deuda',
  `observaciones` longtext DEFAULT NULL COMMENT 'Observaciones de la entrega'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas_equipos`
--

CREATE TABLE `entregas_equipos` (
  `cod_entregas_equipos` int(11) NOT NULL COMMENT 'Codigo del registro equipos entrega',
  `cod_entrega` int(11) DEFAULT NULL COMMENT 'Codigo de la entrega',
  `cod_equipo` int(11) DEFAULT NULL COMMENT 'Codigo del equipo que entrega'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `cod_equipo` int(11) NOT NULL COMMENT 'Codigo del equipo',
  `ref_equipo` int(11) NOT NULL COMMENT 'Referencia del equipo',
  `nom_equipo` varchar(50) DEFAULT NULL COMMENT 'Nombre del equipo',
  `tamano_equipo` int(11) NOT NULL COMMENT 'Tamaño del equipo',
  `estado_arrend_equipo` int(11) DEFAULT NULL COMMENT 'Codigo del estado de arrendamiento del equipo',
  `estado_equipo` int(11) DEFAULT NULL COMMENT 'Codigo del estado del equipo',
  `tipo_equipo` int(11) DEFAULT NULL COMMENT 'Codigo del tipo del equipo',
  `clase_equipo` int(11) DEFAULT NULL COMMENT 'Codigo de la clase del equipo',
  `desc_equipo` varchar(50) DEFAULT NULL COMMENT 'Descripcion del equipo',
  `fecha_ingreso` date DEFAULT NULL COMMENT 'Fecha de ingreso del equipo',
  `canon_arrend_equipo` double DEFAULT NULL COMMENT 'Canon de arrendamiento del equipo',
  `garantia_equipo` int(11) DEFAULT NULL COMMENT 'Codigo de la garantia del equipo',
  `consecutivo_equipo` varchar(50) DEFAULT NULL COMMENT 'Consecutivo del equipo',
  `valor_deposito` int(11) DEFAULT NULL COMMENT 'Valor del deposito del equipo',
  `img_equipo` varchar(200) DEFAULT NULL COMMENT 'Imagen 1 del equipo',
  `img_equipo2` varchar(200) DEFAULT NULL COMMENT 'Imagen2 del equipo',
  `estado` int(1) NOT NULL DEFAULT 1 COMMENT 'Estado en sistema del registro'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_arrend_equipo`
--

CREATE TABLE `estado_arrend_equipo` (
  `cod_est_arrend_equipo` int(11) NOT NULL COMMENT 'Codigo del estado de arrendamiento del equipo',
  `desc_est_arrend_equipo` varchar(50) DEFAULT NULL COMMENT 'Descripcion del estado de arrendamiento del equipo'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_contrato`
--

CREATE TABLE `estado_contrato` (
  `cod_estado_contrato` int(11) NOT NULL COMMENT 'Codigo del estado del contrato',
  `desc_estado_contrato` varchar(50) NOT NULL COMMENT 'Descripcion del estado del contrato'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_equipo`
--

CREATE TABLE `estado_equipo` (
  `cod_est_equipo` int(11) NOT NULL COMMENT 'Codigo del estado del equipo',
  `desc_est_equipo` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Descripcion del estado del equipo'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_pago`
--

CREATE TABLE `estado_pago` (
  `cod_estado_pago` int(11) NOT NULL COMMENT 'Codigo del estado del pago',
  `desc_estado_pago` varchar(50) NOT NULL COMMENT 'Descripcion del estado del contrato'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `cod_fac` int(11) NOT NULL,
  `fech_factura` date DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `total_deuda` double NOT NULL COMMENT 'Valor total de la deuda',
  `total_calculado` double NOT NULL COMMENT 'Total con descuento',
  `descuento` double NOT NULL COMMENT 'Valor del descuento',
  `total_factura` double NOT NULL COMMENT 'Total recibido',
  `tipo_factura` int(11) NOT NULL,
  `estado_factura` int(11) NOT NULL,
  `saldo_deuda` double NOT NULL COMMENT 'Saldo de la deuda',
  `forma_pago` int(11) NOT NULL COMMENT 'Codigo de la forma de pago',
  `cliente` int(11) NOT NULL COMMENT 'Codigo del cliente'
) ENGINE=MyISAM AVG_ROW_LENGTH=56 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `cod_funciones` int(11) NOT NULL COMMENT 'Codigo de las funciones',
  `desc_funciones` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Descripcion de las funciones'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantias`
--

CREATE TABLE `garantias` (
  `cod_garantia` int(11) NOT NULL COMMENT 'Codigo de la garantia del equipo',
  `cod_equipo_garantia` int(11) DEFAULT NULL COMMENT 'Codigo del equipo de la garantia',
  `fecha_ini_garantia` date NOT NULL COMMENT 'Fecha de inicio de la garantia',
  `fecha_fin_garantia` date NOT NULL COMMENT 'Fecha fin de la garantia',
  `cant_garantia` int(11) NOT NULL COMMENT 'Cantidad de tiempo de la garantia',
  `unid_garantia` int(11) NOT NULL COMMENT 'Unidad en tiempo de la garantia'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantia_motor`
--

CREATE TABLE `garantia_motor` (
  `cod_garantia_motor` int(11) NOT NULL COMMENT 'Codigo de la garantia del motor',
  `marca_motor` varchar(50) DEFAULT NULL COMMENT 'Marca del motor',
  `numero_motor` int(11) DEFAULT NULL COMMENT 'Numero del motor',
  `fecha_motor` date DEFAULT NULL COMMENT 'Fecha del motor',
  `cod_equipo` int(11) DEFAULT NULL COMMENT 'Codigo del equipo del motor'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interfaz`
--

CREATE TABLE `interfaz` (
  `cod_int` int(11) NOT NULL,
  `nom_int` char(100) DEFAULT NULL,
  `rut_int` char(200) DEFAULT NULL,
  `cod_mod_int` int(11) DEFAULT NULL,
  `cod_per` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listado_equipos`
--

CREATE TABLE `listado_equipos` (
  `cod_listado_equipos` int(11) NOT NULL COMMENT 'Codigo del listado de equipos',
  `cod_contrato` int(11) DEFAULT NULL COMMENT 'Codigo del contrato',
  `cod_equipo` int(11) DEFAULT NULL COMMENT 'Codigo del equipo del contrato',
  `canon_equipo` double DEFAULT NULL COMMENT 'Canon del equipo',
  `deposito_equipo` double DEFAULT NULL COMMENT 'Deposito del equipo',
  `total_equipo` double DEFAULT NULL COMMENT 'Total del equipo'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listado_partes`
--

CREATE TABLE `listado_partes` (
  `cod_list_partes` int(11) NOT NULL COMMENT 'Codigo del listado de las partes',
  `cod_equipo_parte` int(11) DEFAULT NULL COMMENT 'Codigo del equipo de la parte',
  `cod_parte` int(11) DEFAULT NULL COMMENT 'Codigo de la parte',
  `cod_tipo_parte` int(11) DEFAULT NULL COMMENT 'Codigo del tipo de la parte',
  `cod_caracteristica` int(11) DEFAULT NULL COMMENT 'Codigo de la caracteristica de la parte',
  `valor_propiedad` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Valor de la propiedad de la parte',
  `cod_funcion` int(11) DEFAULT NULL COMMENT 'Codigo de la funcion de la parte'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos`
--

CREATE TABLE `mantenimientos` (
  `cod_mantenimientos` int(11) NOT NULL COMMENT 'Codigo del mantenimiento del equipo',
  `equipo_mantenimientos` int(11) DEFAULT NULL COMMENT 'Codigo del equipo del mantenimiento',
  `fecha_mantenimientos` date DEFAULT NULL COMMENT 'Fecha del mantenimiento del equipo',
  `valor_mantenimientos` int(11) DEFAULT NULL COMMENT 'Valor del mantenimiento',
  `estado` int(1) NOT NULL DEFAULT 1 COMMENT 'Estado en sistema del registro'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `cod_modelos` int(11) NOT NULL COMMENT 'Codigo del modelo del equipo o partes',
  `desc_modelos` varchar(25) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Descripcion del modelo del equipo o partes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `cod_mod` int(11) NOT NULL,
  `nom_mod` char(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `no_aplica`
--

CREATE TABLE `no_aplica` (
  `cod_no_aplica` int(11) NOT NULL COMMENT 'Codigo de no aplica',
  `desc_no_aplica` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'descripcion de no aplica'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otro_si`
--

CREATE TABLE `otro_si` (
  `cod_otro_si` int(11) NOT NULL COMMENT 'Codigo del otro si',
  `fecha_otro_si` date DEFAULT NULL COMMENT 'Fecha del otro si',
  `contrato_otro_si` int(11) DEFAULT NULL COMMENT 'Codigo del contrato del otro si',
  `entrega_otro_si` int(11) DEFAULT NULL COMMENT 'Codigo de la entrega',
  `tipo_otro_si` int(11) DEFAULT NULL COMMENT 'Tipo del otro si',
  `observaciones` varchar(200) DEFAULT NULL COMMENT 'Observaciones del otro si'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otro_si_equipos`
--

CREATE TABLE `otro_si_equipos` (
  `cod_otro_si_equipos` int(11) NOT NULL COMMENT 'Codigo del otro si equipos',
  `equipo_otro_si` int(11) DEFAULT NULL COMMENT 'Codigo del equipo del otro si equipos',
  `otro_si` int(11) DEFAULT NULL COMMENT 'Codigo del otro si'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `cod_pac` int(11) NOT NULL COMMENT 'Codigo del paciente solicitante',
  `apel1_pac` varchar(200) DEFAULT NULL COMMENT 'Primer apellido del paciente solicitante',
  `apel2_pac` varchar(200) DEFAULT NULL COMMENT 'Segundo apellido del paciente solicitante',
  `nom1_pac` varchar(200) NOT NULL COMMENT 'Primer nombre del paciente solicitante',
  `nom2_pac` varchar(200) NOT NULL COMMENT 'Segundo nombre del paciente solicitante',
  `cedula_pac` double NOT NULL COMMENT 'Cedula del paciente solicitante',
  `tipo_empleo_pac` int(11) DEFAULT NULL COMMENT 'Tipo de empleo del paciente solicitante',
  `direccion_pac` varchar(200) NOT NULL COMMENT 'Dirreción del paciente solicitante',
  `telefono_pac` varchar(200) NOT NULL COMMENT 'telefono del paciente solicitante',
  `ciudad_pac` int(11) DEFAULT NULL COMMENT 'Cuidad del paciente solicitante',
  `celular_pac` varchar(100) DEFAULT NULL COMMENT 'Celular del paciente solicitante',
  `edad_pac` int(11) NOT NULL COMMENT 'Edad del paciente solicitante',
  `cod_tipo_edad` int(11) DEFAULT NULL COMMENT 'Codigo de tipo de edad del paciente',
  `fecha_ingreso` date DEFAULT NULL,
  `tipo_deud` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL COMMENT 'Codigo del cliente asociado',
  `cod_parentesco` int(11) NOT NULL COMMENT 'Codigo del parentesco con el cliente'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `cod_pago` int(11) NOT NULL COMMENT 'Codigo del pago',
  `fecha_ini_pago` date DEFAULT NULL COMMENT 'Fecha inicio del pago',
  `fecha_fin_pago` date DEFAULT NULL COMMENT 'Fecha fin del pago',
  `valor_tot_pago` double DEFAULT NULL COMMENT 'Valor total del pago',
  `valor_descuento` double NOT NULL COMMENT 'Valor del descuento',
  `valor_calculado` double NOT NULL COMMENT 'Valor total con descuento',
  `valor_recibido` double DEFAULT NULL COMMENT 'Valor recibido del pago',
  `saldo_pago` double DEFAULT NULL COMMENT 'Saldo del pago',
  `estado_pago` varchar(50) DEFAULT NULL COMMENT 'Estado del pago',
  `cod_equipo` int(11) DEFAULT NULL COMMENT 'Codigo del equipo',
  `cod_contrato` int(11) DEFAULT NULL COMMENT 'Codigo del contrato'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parentesco`
--

CREATE TABLE `parentesco` (
  `cod_parent` int(11) NOT NULL COMMENT 'Codigo del parentesco',
  `desc_parent` varchar(50) NOT NULL COMMENT 'Descripción del parentesco'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Parentesco paciente';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partes`
--

CREATE TABLE `partes` (
  `cod_partes` int(11) NOT NULL COMMENT 'Codigo de la parte del equipo',
  `desc_partes` varchar(50) NOT NULL COMMENT 'Descripcion de la parte del equipo',
  `clase_parte` int(11) DEFAULT NULL COMMENT 'Codigo de la clase',
  `chequeo_inv` int(11) DEFAULT NULL COMMENT 'parte que va en el anexo',
  `estado` int(1) NOT NULL DEFAULT 1 COMMENT 'Estado en sistema del registro'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `cod_usu_per` int(11) NOT NULL,
  `cod_int_per` int(11) NOT NULL,
  `con_per` int(11) NOT NULL,
  `edi_per` int(11) DEFAULT NULL,
  `ins_per` int(11) DEFAULT NULL,
  `eli_per` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `cod_precios` int(11) NOT NULL COMMENT 'Codigo del precio',
  `clase_precios` int(11) DEFAULT NULL COMMENT 'Coidgo de la clase',
  `valor_precios` double DEFAULT NULL COMMENT 'Valor del precio',
  `fecha_precios` date DEFAULT NULL COMMENT 'Fecha de ingreso del precio'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `cod_cli` int(11) NOT NULL COMMENT 'Codigo del cliente solicitante',
  `apel1_cli` varchar(200) DEFAULT NULL COMMENT 'Primer apellido del cliente solicitante',
  `apel2_cli` varchar(200) DEFAULT NULL COMMENT 'Segundo apellido del cliente solicitante',
  `nom1_cli` varchar(200) NOT NULL COMMENT 'Primer nombre del cliente solicitante',
  `nom2_cli` varchar(200) NOT NULL COMMENT 'Segundo nombre del cliente solicitante',
  `cedula_cli` double NOT NULL COMMENT 'Cedula del cliente solicitante',
  `tipo_empleo_cli` int(11) DEFAULT NULL COMMENT 'Tipo de empleo del cliente solicitante',
  `direccion_cli` varchar(200) NOT NULL COMMENT 'Dirreción del cliente solicitante',
  `telefono_cli` varchar(200) NOT NULL COMMENT 'telefono del cliente solicitante',
  `ciudad_cli` int(11) DEFAULT NULL,
  `barrio_cli` varchar(50) DEFAULT NULL COMMENT 'Barrio del cliente',
  `celular_cli` varchar(100) DEFAULT NULL,
  `email_cli` varchar(100) NOT NULL COMMENT 'Email del cliente solicitante',
  `repre_legal` varchar(100) DEFAULT NULL,
  `cedula_representante` double DEFAULT NULL,
  `direccion_repre` varchar(100) DEFAULT NULL,
  `ciudad_repre` int(11) DEFAULT NULL,
  `tel_repre` varchar(100) DEFAULT NULL,
  `celu_repre` varchar(100) DEFAULT NULL,
  `email_repres` varchar(100) DEFAULT NULL,
  `tipo_persona` int(11) DEFAULT NULL,
  `tipo_cliente` int(11) DEFAULT NULL COMMENT 'Coidgo del tipo de cliente',
  `fecha_ingreso` date DEFAULT NULL,
  `cod_mismo_paciente` int(11) NOT NULL COMMENT 'Codigo si es mismo paciente o no'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `cod_rol` int(11) NOT NULL,
  `nom_rol` varchar(100) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1 COMMENT 'Estado en sistema del registro'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `si_no`
--

CREATE TABLE `si_no` (
  `cod_si_no` varchar(10) NOT NULL COMMENT 'codigo del si no',
  `nom_si_no` varchar(10) NOT NULL COMMENT 'nombre'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamano_equipos`
--

CREATE TABLE `tamano_equipos` (
  `cod_tam_equipos` int(11) NOT NULL COMMENT 'Codigo del tamaño de los equipos',
  `desc_tam_equipos` varchar(50) DEFAULT NULL COMMENT 'Descripcion del tamaño de los equipos',
  `cod_unidad` int(11) DEFAULT NULL COMMENT 'Codigo de la unidad de medida',
  `cod_clase_equipos` int(11) DEFAULT NULL COMMENT 'Codigo de la clase del equipo',
  `estado` int(1) DEFAULT 1 COMMENT 'Estado en sistema del registro'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_baja`
--

CREATE TABLE `tipo_baja` (
  `cod_tipo_baja` int(11) NOT NULL COMMENT 'Codigo de baja',
  `desc_tipo_baja` varchar(30) DEFAULT NULL COMMENT 'Descripcion del tipo de baja'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente`
--

CREATE TABLE `tipo_cliente` (
  `cod_tipo_cliente` int(11) NOT NULL COMMENT 'Codigo del tipo de cliente',
  `desc_tipo_cliente` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL COMMENT 'Descripcion del tipo de cliente'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contrato`
--

CREATE TABLE `tipo_contrato` (
  `cod_tipo_contrato` int(11) NOT NULL COMMENT 'Codigo del tipo de contrato',
  `desc_tipo_contrato` varchar(25) DEFAULT NULL COMMENT 'Descripcion del tipo de contrato'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_edad`
--

CREATE TABLE `tipo_edad` (
  `cod_tipo_edad` int(11) NOT NULL COMMENT 'Codigo del tipo de edad',
  `desc_tipo_edad` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_empleado`
--

CREATE TABLE `tipo_empleado` (
  `cod_tipo_empleado` varchar(10) NOT NULL COMMENT 'codifo del tipo empleado u oficio',
  `nom_tipo_empleado` varchar(100) NOT NULL COMMENT 'nombre del tipo empleado u oficio'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_empresa`
--

CREATE TABLE `tipo_empresa` (
  `cod_tipo_empresa` int(11) NOT NULL,
  `desc_tipo_empresa` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_entrega`
--

CREATE TABLE `tipo_entrega` (
  `cod_tipo_entrega` int(11) NOT NULL COMMENT 'Codigo del tipo de entrega',
  `desc_tipo_entrega` varchar(50) DEFAULT NULL COMMENT 'Descripcion del tipo de entrega'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipos`
--

CREATE TABLE `tipo_equipos` (
  `cod_tipo_equipos` int(11) NOT NULL COMMENT 'Codigo del tipo de equipos',
  `desc_tipo_equipos` varchar(50) DEFAULT NULL COMMENT 'Descripcion del tipo de equipos',
  `clase_equipo` int(11) DEFAULT NULL COMMENT 'Codigo de la clase del equipo'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_medida`
--

CREATE TABLE `tipo_medida` (
  `cod_medida` int(11) NOT NULL COMMENT 'Codigo del tipo de medida',
  `desc_medida` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Descripcion del tipo de medida'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_otro_si`
--

CREATE TABLE `tipo_otro_si` (
  `cod_tipo_otro_si` int(11) NOT NULL COMMENT 'Codigo del tipo de otro si',
  `desc_tipo_otro_si` varchar(25) DEFAULT NULL COMMENT 'Descripcion del tipo de otro si'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `cod_tipo_pago` int(11) NOT NULL COMMENT 'Codigo del tipo de pago',
  `desc_tipo_pago` varchar(50) NOT NULL COMMENT 'Descripcion del tipo de pago'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_partes`
--

CREATE TABLE `tipo_partes` (
  `cod_tipo_partes` int(11) NOT NULL COMMENT 'Codigo del tipo de las partes',
  `desc_tipo_partes` varchar(50) DEFAULT NULL COMMENT 'Descripcion del tipo de las partes',
  `cod_parte` int(11) DEFAULT NULL COMMENT 'Codigo de la parte',
  `estado` int(1) NOT NULL DEFAULT 1 COMMENT 'Estado en sistema del registro'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `cod_tipo_persona` int(11) NOT NULL COMMENT 'Codigo del tipo de persona',
  `desc_tipo_persona` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Descripcion del tipo de persona'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `cod_unidades` int(11) NOT NULL COMMENT 'Codigo del tipo de unidad',
  `desc_unidades` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT 'Descripcion de la unidad',
  `cod_med_unidades` int(11) NOT NULL COMMENT 'Codigo del tipo de la medida'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod_usu` int(11) NOT NULL,
  `nom_usu` char(200) DEFAULT NULL,
  `car_usu` char(100) DEFAULT NULL COMMENT 'cargo',
  `cc_usu` int(11) DEFAULT NULL,
  `tel_usu` varchar(50) DEFAULT NULL,
  `dir_usu` varchar(50) DEFAULT NULL,
  `log_usu` char(20) DEFAULT NULL,
  `pas_usu` char(20) DEFAULT NULL,
  `ciu_usu` int(11) NOT NULL COMMENT 'codigo de la surcusal',
  `codig_usu` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'codigo del usuario',
  `cod_rol_usu` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT 1 COMMENT 'Estado en sistema del registro'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admon_interfaz`
--
ALTER TABLE `admon_interfaz`
  ADD PRIMARY KEY (`cod_ai`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`cod_aud`);

--
-- Indices de la tabla `bajas`
--
ALTER TABLE `bajas`
  ADD PRIMARY KEY (`cod_baja`);

--
-- Indices de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`cod_carac`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`cod_car`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`cod_ciu`);

--
-- Indices de la tabla `clase_equipos`
--
ALTER TABLE `clase_equipos`
  ADD PRIMARY KEY (`cod_clase`);

--
-- Indices de la tabla `clasificacion_cliente`
--
ALTER TABLE `clasificacion_cliente`
  ADD PRIMARY KEY (`cod_clacli`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cli`);

--
-- Indices de la tabla `consecutivo`
--
ALTER TABLE `consecutivo`
  ADD PRIMARY KEY (`cod_cons`);

--
-- Indices de la tabla `contrato_alquiler`
--
ALTER TABLE `contrato_alquiler`
  ADD PRIMARY KEY (`cod_calc`);

--
-- Indices de la tabla `d_estado_civil`
--
ALTER TABLE `d_estado_civil`
  ADD PRIMARY KEY (`cod_estado_civil`);

--
-- Indices de la tabla `d_factura`
--
ALTER TABLE `d_factura`
  ADD PRIMARY KEY (`cod_d_factura`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`cod_jmc`);

--
-- Indices de la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`cod_entrega`);

--
-- Indices de la tabla `entregas_equipos`
--
ALTER TABLE `entregas_equipos`
  ADD PRIMARY KEY (`cod_entregas_equipos`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`cod_equipo`);

--
-- Indices de la tabla `estado_arrend_equipo`
--
ALTER TABLE `estado_arrend_equipo`
  ADD PRIMARY KEY (`cod_est_arrend_equipo`);

--
-- Indices de la tabla `estado_contrato`
--
ALTER TABLE `estado_contrato`
  ADD PRIMARY KEY (`cod_estado_contrato`);

--
-- Indices de la tabla `estado_equipo`
--
ALTER TABLE `estado_equipo`
  ADD PRIMARY KEY (`cod_est_equipo`);

--
-- Indices de la tabla `estado_pago`
--
ALTER TABLE `estado_pago`
  ADD PRIMARY KEY (`cod_estado_pago`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`cod_fac`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`cod_funciones`);

--
-- Indices de la tabla `garantias`
--
ALTER TABLE `garantias`
  ADD PRIMARY KEY (`cod_garantia`);

--
-- Indices de la tabla `garantia_motor`
--
ALTER TABLE `garantia_motor`
  ADD PRIMARY KEY (`cod_garantia_motor`);

--
-- Indices de la tabla `interfaz`
--
ALTER TABLE `interfaz`
  ADD PRIMARY KEY (`cod_int`);

--
-- Indices de la tabla `listado_equipos`
--
ALTER TABLE `listado_equipos`
  ADD PRIMARY KEY (`cod_listado_equipos`);

--
-- Indices de la tabla `listado_partes`
--
ALTER TABLE `listado_partes`
  ADD PRIMARY KEY (`cod_list_partes`);

--
-- Indices de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  ADD PRIMARY KEY (`cod_mantenimientos`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`cod_modelos`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`cod_mod`);

--
-- Indices de la tabla `no_aplica`
--
ALTER TABLE `no_aplica`
  ADD PRIMARY KEY (`cod_no_aplica`);

--
-- Indices de la tabla `otro_si`
--
ALTER TABLE `otro_si`
  ADD PRIMARY KEY (`cod_otro_si`);

--
-- Indices de la tabla `otro_si_equipos`
--
ALTER TABLE `otro_si_equipos`
  ADD PRIMARY KEY (`cod_otro_si_equipos`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`cod_pac`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`cod_pago`);

--
-- Indices de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  ADD PRIMARY KEY (`cod_parent`);

--
-- Indices de la tabla `partes`
--
ALTER TABLE `partes`
  ADD PRIMARY KEY (`cod_partes`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`cod_usu_per`,`cod_int_per`,`con_per`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`cod_precios`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`cod_cli`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`cod_rol`);

--
-- Indices de la tabla `si_no`
--
ALTER TABLE `si_no`
  ADD PRIMARY KEY (`cod_si_no`);

--
-- Indices de la tabla `tamano_equipos`
--
ALTER TABLE `tamano_equipos`
  ADD PRIMARY KEY (`cod_tam_equipos`);

--
-- Indices de la tabla `tipo_baja`
--
ALTER TABLE `tipo_baja`
  ADD PRIMARY KEY (`cod_tipo_baja`);

--
-- Indices de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
  ADD PRIMARY KEY (`cod_tipo_cliente`);

--
-- Indices de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  ADD PRIMARY KEY (`cod_tipo_contrato`);

--
-- Indices de la tabla `tipo_edad`
--
ALTER TABLE `tipo_edad`
  ADD PRIMARY KEY (`cod_tipo_edad`);

--
-- Indices de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  ADD PRIMARY KEY (`cod_tipo_empleado`);

--
-- Indices de la tabla `tipo_empresa`
--
ALTER TABLE `tipo_empresa`
  ADD PRIMARY KEY (`cod_tipo_empresa`);

--
-- Indices de la tabla `tipo_entrega`
--
ALTER TABLE `tipo_entrega`
  ADD PRIMARY KEY (`cod_tipo_entrega`);

--
-- Indices de la tabla `tipo_equipos`
--
ALTER TABLE `tipo_equipos`
  ADD PRIMARY KEY (`cod_tipo_equipos`);

--
-- Indices de la tabla `tipo_medida`
--
ALTER TABLE `tipo_medida`
  ADD PRIMARY KEY (`cod_medida`);

--
-- Indices de la tabla `tipo_otro_si`
--
ALTER TABLE `tipo_otro_si`
  ADD PRIMARY KEY (`cod_tipo_otro_si`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`cod_tipo_pago`);

--
-- Indices de la tabla `tipo_partes`
--
ALTER TABLE `tipo_partes`
  ADD PRIMARY KEY (`cod_tipo_partes`);

--
-- Indices de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD PRIMARY KEY (`cod_tipo_persona`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`cod_unidades`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admon_interfaz`
--
ALTER TABLE `admon_interfaz`
  MODIFY `cod_ai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `cod_aud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bajas`
--
ALTER TABLE `bajas`
  MODIFY `cod_baja` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la baja';

--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `cod_carac` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la caracteristica';

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `cod_car` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `cod_ciu` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la ciudad';

--
-- AUTO_INCREMENT de la tabla `clase_equipos`
--
ALTER TABLE `clase_equipos`
  MODIFY `cod_clase` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la clase del equipo';

--
-- AUTO_INCREMENT de la tabla `clasificacion_cliente`
--
ALTER TABLE `clasificacion_cliente`
  MODIFY `cod_clacli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cli` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del cliente solicitante';

--
-- AUTO_INCREMENT de la tabla `consecutivo`
--
ALTER TABLE `consecutivo`
  MODIFY `cod_cons` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contrato_alquiler`
--
ALTER TABLE `contrato_alquiler`
  MODIFY `cod_calc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `d_estado_civil`
--
ALTER TABLE `d_estado_civil`
  MODIFY `cod_estado_civil` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo del estado civil';

--
-- AUTO_INCREMENT de la tabla `d_factura`
--
ALTER TABLE `d_factura`
  MODIFY `cod_d_factura` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la desc de la factura';

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `cod_jmc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `cod_entrega` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la entrega';

--
-- AUTO_INCREMENT de la tabla `entregas_equipos`
--
ALTER TABLE `entregas_equipos`
  MODIFY `cod_entregas_equipos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del registro equipos entrega';

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `cod_equipo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del equipo';

--
-- AUTO_INCREMENT de la tabla `estado_arrend_equipo`
--
ALTER TABLE `estado_arrend_equipo`
  MODIFY `cod_est_arrend_equipo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del estado de arrendamiento del equipo';

--
-- AUTO_INCREMENT de la tabla `estado_contrato`
--
ALTER TABLE `estado_contrato`
  MODIFY `cod_estado_contrato` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del estado del contrato';

--
-- AUTO_INCREMENT de la tabla `estado_equipo`
--
ALTER TABLE `estado_equipo`
  MODIFY `cod_est_equipo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del estado del equipo';

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `cod_fac` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `cod_funciones` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de las funciones';

--
-- AUTO_INCREMENT de la tabla `garantias`
--
ALTER TABLE `garantias`
  MODIFY `cod_garantia` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la garantia del equipo';

--
-- AUTO_INCREMENT de la tabla `garantia_motor`
--
ALTER TABLE `garantia_motor`
  MODIFY `cod_garantia_motor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la garantia del motor';

--
-- AUTO_INCREMENT de la tabla `interfaz`
--
ALTER TABLE `interfaz`
  MODIFY `cod_int` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `listado_equipos`
--
ALTER TABLE `listado_equipos`
  MODIFY `cod_listado_equipos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del listado de equipos';

--
-- AUTO_INCREMENT de la tabla `listado_partes`
--
ALTER TABLE `listado_partes`
  MODIFY `cod_list_partes` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del listado de las partes';

--
-- AUTO_INCREMENT de la tabla `mantenimientos`
--
ALTER TABLE `mantenimientos`
  MODIFY `cod_mantenimientos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del mantenimiento del equipo';

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `cod_modelos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del modelo del equipo o partes';

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `cod_mod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `no_aplica`
--
ALTER TABLE `no_aplica`
  MODIFY `cod_no_aplica` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de no aplica';

--
-- AUTO_INCREMENT de la tabla `otro_si`
--
ALTER TABLE `otro_si`
  MODIFY `cod_otro_si` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del otro si';

--
-- AUTO_INCREMENT de la tabla `otro_si_equipos`
--
ALTER TABLE `otro_si_equipos`
  MODIFY `cod_otro_si_equipos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del otro si equipos';

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `cod_pac` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del paciente solicitante';

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `cod_pago` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del pago';

--
-- AUTO_INCREMENT de la tabla `parentesco`
--
ALTER TABLE `parentesco`
  MODIFY `cod_parent` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del parentesco';

--
-- AUTO_INCREMENT de la tabla `partes`
--
ALTER TABLE `partes`
  MODIFY `cod_partes` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la parte del equipo';

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `cod_precios` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del precio';

--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
  MODIFY `cod_cli` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del cliente solicitante';

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `cod_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tamano_equipos`
--
ALTER TABLE `tamano_equipos`
  MODIFY `cod_tam_equipos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tamaño de los equipos';

--
-- AUTO_INCREMENT de la tabla `tipo_baja`
--
ALTER TABLE `tipo_baja`
  MODIFY `cod_tipo_baja` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de baja';

--
-- AUTO_INCREMENT de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
  MODIFY `cod_tipo_cliente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de cliente';

--
-- AUTO_INCREMENT de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  MODIFY `cod_tipo_contrato` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de contrato';

--
-- AUTO_INCREMENT de la tabla `tipo_edad`
--
ALTER TABLE `tipo_edad`
  MODIFY `cod_tipo_edad` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de edad';

--
-- AUTO_INCREMENT de la tabla `tipo_empresa`
--
ALTER TABLE `tipo_empresa`
  MODIFY `cod_tipo_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_entrega`
--
ALTER TABLE `tipo_entrega`
  MODIFY `cod_tipo_entrega` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de entrega';

--
-- AUTO_INCREMENT de la tabla `tipo_equipos`
--
ALTER TABLE `tipo_equipos`
  MODIFY `cod_tipo_equipos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de equipos';

--
-- AUTO_INCREMENT de la tabla `tipo_medida`
--
ALTER TABLE `tipo_medida`
  MODIFY `cod_medida` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de medida';

--
-- AUTO_INCREMENT de la tabla `tipo_otro_si`
--
ALTER TABLE `tipo_otro_si`
  MODIFY `cod_tipo_otro_si` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de otro si';

--
-- AUTO_INCREMENT de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  MODIFY `cod_tipo_pago` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de pago';

--
-- AUTO_INCREMENT de la tabla `tipo_partes`
--
ALTER TABLE `tipo_partes`
  MODIFY `cod_tipo_partes` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de las partes';

--
-- AUTO_INCREMENT de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  MODIFY `cod_tipo_persona` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de persona';

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `cod_unidades` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del tipo de unidad';

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
