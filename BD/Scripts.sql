ALTER TABLE `usuario` ADD `estado` INT(1) NOT NULL DEFAULT '1' COMMENT 'Estado en sistema del registro' AFTER `cod_rol_usu`;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/usuarios/index.php' WHERE `interfaz`.`cod_int` = 1;
DELETE FROM interfaz WHERE `interfaz`.`cod_int` = 2;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/permisos/index.php' WHERE `interfaz`.`cod_int` = 3;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/rol/index.php' WHERE `interfaz`.`cod_int` = 12;
ALTER TABLE `rol` ADD `estado` INT(1) NOT NULL DEFAULT '1' COMMENT 'Estado en sistema del registro' AFTER `nom_rol`;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/empresa/index.php' WHERE `interfaz`.`cod_int` = 4;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/consecutivo/index.php' WHERE `interfaz`.`cod_int` = 17;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/partes/index.php' WHERE `interfaz`.`cod_int` = 16;
ALTER TABLE `partes` ADD `estado` INT(1) NOT NULL DEFAULT '1' COMMENT 'Estado en sistema del registro' AFTER `chequeo_inv`;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/tipo_partes/index.php' WHERE `interfaz`.`cod_int` = 65;
ALTER TABLE `tipo_partes` ADD `estado` INT(1) NOT NULL DEFAULT '1' COMMENT 'Estado en sistema del registro' AFTER `cod_parte`;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/tamanos/index.php' WHERE `interfaz`.`cod_int` = 67;
ALTER TABLE `tamano_equipos` ADD `estado` INT(1) NULL DEFAULT '1' COMMENT 'Estado en sistema del registro' AFTER `cod_clase_equipos`;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/equipos/index.php' WHERE `interfaz`.`cod_int` = 14;
ALTER TABLE `equipos` ADD `estado` INT(1) NOT NULL DEFAULT '1' COMMENT 'Estado en sistema del registro' AFTER `img_equipo2`;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/mantenimiento/index.php' WHERE `interfaz`.`cod_int` = 39;
ALTER TABLE `mantenimientos` ADD `estado` INT(1) NOT NULL DEFAULT '1' COMMENT 'Estado en sistema del registro' AFTER `valor_mantenimientos`;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/precios/index.php' WHERE `interfaz`.`cod_int` = 74;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/baja/index.php' WHERE `interfaz`.`cod_int` = 75;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/cliente/index.php' WHERE `interfaz`.`cod_int` = 7;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/paciente/index.php' WHERE `interfaz`.`cod_int` = 10;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/responsable/index.php' WHERE `interfaz`.`cod_int` = 73;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/contrato/index.php' WHERE `interfaz`.`cod_int` = 71;
UPDATE `empresa` SET `nit_jmc` = '900.345.953-1' WHERE `empresa`.`cod_jmc` = 1;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/otro_si/index.php' WHERE `interfaz`.`cod_int` = 72;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/pago/index.php' WHERE `interfaz`.`cod_int` = 58;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/usuarios/index.php' WHERE `interfaz`.`cod_int` = 1;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/entrega/index.php' WHERE `interfaz`.`cod_int` = 25;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/pagoAdelantado/index.php' WHERE `interfaz`.`cod_int` = 82;
ALTER TABLE `factura` ADD `anticipado` INT(1) NOT NULL DEFAULT '0' AFTER `cliente`;
ALTER TABLE `pagos` ADD `facturado` INT(1) NOT NULL DEFAULT '0' AFTER `cod_contrato`;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/informe_equipo_cliente/index.php' WHERE `interfaz`.`cod_int` = 76;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/informe_equipo_estado/index.php' WHERE `interfaz`.`cod_int` = 55;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/informe_equipo_articulo/index.php' WHERE `interfaz`.`cod_int` = 78;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/informe_equipo_clase/index.php' WHERE `interfaz`.`cod_int` = 80;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/informe_pagos_diario/index.php' WHERE `interfaz`.`cod_int` = 79;
DELETE FROM interfaz WHERE `interfaz`.`cod_int` = 83;
UPDATE `interfaz` SET `rut_int` = 'http://localhost:8080/Williamson/vista/informe_pagos_cartera/index.php' WHERE `interfaz`.`cod_int` = 81;
DELETE FROM interfaz WHERE `interfaz`.`cod_int` = 72;