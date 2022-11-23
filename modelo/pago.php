<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Pago
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los pagoes
    public function getPago()
    {
        $query  = "SELECT cod_fac, CONCAT(nom1_cli, ' ', nom2_cli, ' ', apel1_cli, ' ', apel2_cli) AS nombre_cliente,fech_factura FROM factura 
                INNER JOIN cliente ON cliente.cod_cli = factura.cliente 
                ORDER BY cod_fac DESC LIMIT 2000";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Cliente
    public function getCliente()
    {
        $query  = "SELECT cod_cli, IF(tipo_persona = 2, CONCAT(nom1_cli,' - ',cedula_cli), CONCAT(apel1_cli,' ',apel2_cli,' ',nom1_cli,' ',nom2_cli,' - ',cedula_cli)) AS nombre FROM cliente
                INNER JOIN contrato_alquiler ON contrato_alquiler.cod_cliente = cliente.cod_cli
                GROUP BY cod_cli ORDER BY nombre ASC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Select contratos
    public function getContratos($data)
    {
        $query = "SELECT cod_calc, consecutivo FROM contrato_alquiler WHERE estado_contrato = 1 AND cod_cliente = '" . $data['cod_cliente'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Select forma pago
    public function getFormaPago()
    {
        $query  = "SELECT cod_tipo_pago, desc_tipo_pago FROM tipo_pago ORDER BY desc_tipo_pago";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Tabla pagos
    public function getPagos($data)
    {
        $query = "SELECT (SELECT COUNT(*) FROM `listado_equipos` WHERE cod_contrato = '" . $data['cod_contrato'] . "') AS cantidad, valor_recibido, valor_tot_pago, cod_pago, equipos.cod_equipo, fecha_ini_pago, fecha_fin_pago, consecutivo, consecutivo_equipo, nom_clase, nom_equipo, desc_tipo_equipos,MONTH(fecha_ini_pago) as num_mes_ini,YEAR(fecha_ini_pago) as anio_ini,DAY(fecha_ini_pago) as dia_ini,MONTH(fecha_fin_pago) as num_mes_fin,YEAR(fecha_fin_pago) as anio_fin,DAY(fecha_fin_pago) as dia_fin, saldo_pago, valor_descuento FROM pagos
                INNER JOIN contrato_alquiler ON contrato_alquiler.cod_calc = pagos.cod_contrato
                INNER JOIN equipos ON equipos.cod_equipo = pagos.cod_equipo
                INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
                INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
                WHERE saldo_pago >0 AND fecha_ini_pago <= CURDATE() AND pagos.cod_contrato = '" . $data['cod_contrato'] . "' 
                ORDER BY fecha_ini_pago ASC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Meses
    public function getMeses($data)
    {
        $query = "SELECT TIMESTAMPDIFF(MONTH,(fecha_ini_pago),CURDATE()) as meses From pagos
                INNER JOIN contrato_alquiler ON (contrato_alquiler.cod_calc = pagos.cod_contrato)
                WHERE cod_contrato = '" . $data['cod_contrato'] . "' ORDER BY fecha_ini_pago DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Listado equipos
    public function getListadoEquipos($data)
    {
        $query = "SELECT cod_equipo, canon_equipo, deposito_equipo, total_equipo FROM `listado_equipos`
                WHERE cod_contrato = '" . $data['cod_contrato'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo pago
    public function insertaPago($data)
    {
        $bandera = 'inicial';
        $cantidadPagos = $this->getCuentaPagos($data);
        if($cantidadPagos[0]['cantidad'] == 0){
            $cuotas = 1;
        } else {
            $dataMeses = $this->getMeses($data);
            if($dataMeses[0]['meses'] > 0){
                $cuotas = $dataMeses[0]['meses'];  
            } else {
                $cuotas = 0;
                $bandera = 'No tiene cuotas pendientes';
            }            
        }
        for($i=0; $i<$cuotas; $i++){
            if($cantidadPagos[0]['cantidad'] == 0){
               $pagosContrato = $this->calcularNuevosPagos($data);
            } else {
               $pagosContrato = $this->getPagosContrato($data);
            }
            $listadoEquipos = $this->getListadoEquipos($data);
            if(sizeof($listadoEquipos) > 0){
                for ($j=0; $j < sizeof($listadoEquipos); $j++) {   
                    $query  = "INSERT INTO `pagos` (`fecha_ini_pago`, `fecha_fin_pago`, `valor_tot_pago`, `valor_descuento`, `valor_calculado`, `valor_recibido`, `saldo_pago`, `estado_pago`, `cod_equipo`, `cod_contrato`) VALUES ('" . $pagosContrato[0]['fecha_fin_pago']  . "', '" . $pagosContrato[0]['anio']."-".$pagosContrato[0]['mes']."-".$pagosContrato[0]['dia'] . "', '" . $listadoEquipos[$j]['canon_equipo']  . "', 0, 0, 0, '" . $listadoEquipos[$j]['canon_equipo']  . "', '1', '" . $listadoEquipos[$j]['cod_equipo']  . "', '" . $data['cod_contrato']  . "')";
                    $result = mysqli_query($this->link, $query);
                    if (mysqli_affected_rows($this->link) > 0) {
                        $bandera = 'true';
                    } else {
                        $bandera = 'false';
                    }
                }
            } else {
                    $bandera = 'No tiene equipos';
            }
        }
        return $bandera;
    }

    //PagoAdelantados
    public function calcularNuevosPagos($data)
    {
        $query = "SELECT fecha_ini_contrato AS fecha_fin_pago,DAY((DATE_ADD(fecha_ini_contrato,INTERVAL 1 MONTH))) as dia,MONTH((DATE_ADD(fecha_ini_contrato,INTERVAL 1 MONTH))) as mes,YEAR((DATE_ADD(fecha_ini_contrato,INTERVAL 1 MONTH))) as anio,(DATE_ADD(fecha_ini_contrato,INTERVAL 1 MONTH)) as fecha_fin FROM `contrato_alquiler` WHERE cod_calc = '" . $data['cod_contrato']  . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    } 

    //Cuenta pagos
    public function getCuentaPagos($data)
    {
        $query = "SELECT COUNT(*) AS cantidad FROM pagos WHERE cod_contrato = '" . $data['cod_contrato'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Pagos
    public function getPagosContrato($data)
    {
        $query = "SELECT fecha_fin_pago, DAY((DATE_ADD(fecha_fin_pago,INTERVAL 1 MONTH))) as dia,MONTH((DATE_ADD(fecha_fin_pago,INTERVAL 1 MONTH))) as mes,YEAR((DATE_ADD(fecha_fin_pago,INTERVAL 1 MONTH))) as anio,(DATE_ADD(fecha_fin_pago,INTERVAL 1 MONTH)) as fecha_fin FROM pagos
                WHERE cod_contrato = '" . $data['cod_contrato']  . "' ORDER BY fecha_ini_pago DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    } 

    //Traer un pago registrados
    public function consultaPago($data)
    {
        $query = "SELECT cod_pago, nom_pago FROM pago
                WHERE cod_pago = '" . $data['cod_pago'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Guarda factura
    public function insertaFactura($data)
    {
        $query  = "INSERT INTO factura (`fech_factura`,`fecha_registro`,`total_deuda`,`total_calculado`,`descuento`,`total_factura`,`tipo_factura`,`estado_factura`,`saldo_deuda`,`forma_pago`, `cliente`) VALUES ('" . $data['fech_factura']  . "','" . date('Y-m-d')  . "', '". $data['total_deuda'] ."','". $data['total_calculado'] ."','". $data['total_descuento'] ."','". $data['total_factura'] ."',1,0,'". $data['saldo_deuda'] ."','". $data['forma_pago'] ."','". $data['cliente'] ."')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
                return true;
        } else {
            return false;
        }
    }

    //Consulta ultima factura
    public function getUltimaFactura(){
        $query  = "SELECT cod_fac FROM factura ORDER BY cod_fac DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Guarda detalle factura
    public function insertaDetalleFactura($data)
    {
        $dataFactura = $this->getUltimaFactura();
        $bandera = false;
        $diferencia = 0;
        for($i=0; $i< $data["contador"]; $i++){
            if($i==0){
                $valor_total = $data['total_factura'];
            } else {
                $valor_total = $diferencia;
            }
            $valor_con_descuento = $data['saldo_pago_'.$i] - $data['valor_descuento_'.$i];
            $valor_cuota = $valor_con_descuento;
            if($valor_total == $valor_cuota){
                $valor_recibido = $valor_total;
                $saldo = 0;
                $diferencia = 0;
                $estado_pago = 2;
            }
            if($valor_total > $valor_cuota){
                $valor_recibido = $valor_cuota;
                $saldo = 0;
                $diferencia = $valor_total - $valor_cuota;
                $estado_pago = 2;
            }
            if($valor_total < $valor_cuota){
                $valor_recibido = $valor_total;
                $saldo = $valor_cuota - $valor_recibido;
                $diferencia = 0;
                $estado_pago = 1;
            }            
            $query  = "INSERT INTO d_factura (`factura`,`contrato`,`cod_equipo`,`fecha_ini_pago`,`fecha_fin_pago`,`valor_pago`,`valor_descuento`,`valor_con_descuento`,`valor_recibido`,`saldo`) VALUES ('".$dataFactura[0]['cod_fac']."','".$data['contrato']."', '".$data['cod_equipo_'.$i]."', '". $data['fecha_ini_pago_'.$i] ."', '". $data['fecha_fin_pago_'.$i] ."', '". $data['saldo_pago_'.$i] ."', '". $data['valor_descuento_'.$i] ."', '". $valor_con_descuento ."', '". $valor_recibido ."','". $saldo ."')";
            $result = mysqli_query($this->link, $query);
            if (mysqli_affected_rows($this->link) > 0) {
                $bandera = true;
            } else {
                $bandera = false;
            }        
        }
        return $bandera;
    }

    //Edita pagos
    public function modificaPagos($data)
    {
        $bandera = false;
        $diferencia = 0;
        for($i=0; $i< $data["contador"]; $i++){
            if($i==0){
                $valor_total = $data['total_factura'];
            } else {
                $valor_total = $diferencia;
            }
            $valor_con_descuento = $data['valor_tot_pago_'.$i ] - $data['valor_descuento_'.$i ];
            $saldo_cuota = $data['saldo_pago_'.$i ] - $data['valor_descuento_'.$i ];
            if($valor_total == $saldo_cuota){
                $valor_recibido = $data['valor_recibido_'.$i ] + $valor_total;
                $saldo = 0;
                $diferencia = 0;
                $estado_pago = 2;
            }
            if($valor_total > $saldo_cuota){
                $valor_recibido = $data['valor_recibido_'.$i ] + $saldo_cuota;
                $saldo = 0;
                $diferencia = $valor_total - $saldo_cuota;
                $estado_pago = 2;
            }
            if($valor_total < $saldo_cuota){
                $valor_recibido = $data['valor_recibido_'.$i ] + $valor_total;
                $saldo = $saldo_cuota - $valor_recibido;
                $diferencia = 0;
                $estado_pago = 1;
            }            
            $query  = "UPDATE pagos SET valor_tot_pago = '".$data['valor_tot_pago_'.$i]."', valor_descuento = '". $data['valor_descuento_'.$i ] ."', valor_calculado = '". $valor_con_descuento ."', valor_recibido = '". $valor_recibido ."', saldo_pago = '". $saldo ."', estado_pago = '". $estado_pago ."' WHERE cod_equipo = '". $data['cod_equipo_'.$i ] ."' AND cod_pago = '". $data['cod_pago_'.$i ] ."'";
            $result = mysqli_query($this->link, $query);
            if (mysqli_affected_rows($this->link) > 0) {
                $bandera = true;
            } else {
                $bandera = false;
            }        
        }
        return $bandera;
    }

    //Consulta empresa
    public function getEmpresa()
    {
        $query  = "SELECT nom_jmc, nit_jmc, dir_jmc, tel_jmc, fax_jmc, pag_jmc, mail_jmc, lugar_jmc, logo_jmc FROm empresa
                WHERE cod_jmc = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Tabla factura
    public function consultaFactura($data)
    {
        $query = "SELECT fech_factura, desc_tipo_pago, saldo_deuda AS total_saldo, total_calculado, total_factura AS total_recibido, total_deuda, descuento AS total_descuento, saldo, valor_recibido, valor_con_descuento, valor_descuento, valor_pago, fecha_fin_pago, fecha_ini_pago, desc_tipo_equipos, nom_equipo, nom_clase, consecutivo, cod_fac, CONCAT(nom1_cli,' ', nom2_cli, ' ', apel1_cli, ' ', apel2_cli) AS nombre_cliente, cedula_cli, direccion_cli, telefono_cli, celular_cli, email_cli FROM factura 
                INNER JOIN d_factura ON d_factura.factura= factura.cod_fac 
                INNER JOIN contrato_alquiler  ON contrato_alquiler.cod_calc= d_factura.contrato
                INNER JOIN equipos ON equipos.cod_equipo = d_factura.cod_equipo
                INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
                INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
                INNER JOIN cliente ON cliente.cod_cli= contrato_alquiler.cod_cliente
                INNER JOIN tipo_pago ON tipo_pago.cod_tipo_pago = factura.forma_pago
                WHERE cod_fac = '".$data['cod_fac']."'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}