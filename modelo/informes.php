<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Informes
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Cliente
    public function getCliente()
    {
        $query  = "SELECT cod_cli, IF(tipo_persona = 2, CONCAT(nom1_cli,' - ',cedula_cli), CONCAT(apel1_cli,' ',apel2_cli,' ',nom1_cli,' ',nom2_cli,' - ',cedula_cli)) AS nombre FROM cliente
                ORDER BY nombre ASC;";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Informe equipo cliente
    public function getInformeEquipoCliente($data)
    {
        $query  = "SELECT consecutivo, consecutivo_equipo, nom_clase, nom_equipo, desc_tipo_equipos, CONCAT(nom1_cli, ' ', nom2_cli, ' ',apel1_cli, ' ', apel2_cli) AS nombre_cliente, fecha_ini_contrato, fecha_fin_contrato FROM contrato_alquiler
            INNER JOIN listado_equipos ON listado_equipos.cod_contrato = contrato_alquiler.cod_calc
            INNER JOIN equipos ON equipos.cod_equipo = listado_equipos.cod_equipo
            INNER JOIN cliente ON cliente.cod_cli = contrato_alquiler.cod_cliente
            INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
            INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
            WHERE cod_cli = '".$data['cod_cliente']."'
            ORDER BY `contrato_alquiler`.`fecha_ini_contrato` ASC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Estados
    public function getEstado()
    {
        $query  = "SELECT cod_est_arrend_equipo, desc_est_arrend_equipo FROM estado_arrend_equipo ORDER BY cod_est_arrend_equipo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Informe equipo estado
    public function getInformeEquipoEstado($data)
    {
        $query  = "SELECT consecutivo_equipo, nom_clase, nom_equipo, desc_tipo_equipos, canon_arrend_equipo, valor_deposito FROM equipos
            INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
            INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
            WHERE estado_arrend_equipo = '".$data['cod_estado']."'
            ORDER BY consecutivo_equipo ASC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Articulo
    public function getArticulo()
    {
        $query  = "SELECT cod_equipo, CONCAT(consecutivo_equipo, ' ', nom_clase, ' ',desc_tipo_equipos) AS articulo FROM equipos 
                INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo 
                INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
                ORDER BY consecutivo_equipo ASC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Informe equipo articulo
    public function getInformeEquipoArticulo($data)
    {
        $query  = "SELECT consecutivo, consecutivo_equipo, nom_clase, nom_equipo, desc_tipo_equipos, CONCAT(nom1_cli, ' ', nom2_cli, ' ',apel1_cli, ' ', apel2_cli) AS nombre_cliente, fecha_ini_contrato, fecha_fin_contrato FROM contrato_alquiler
            INNER JOIN listado_equipos ON listado_equipos.cod_contrato = contrato_alquiler.cod_calc
            INNER JOIN equipos ON equipos.cod_equipo = listado_equipos.cod_equipo
            INNER JOIN cliente ON cliente.cod_cli = contrato_alquiler.cod_cliente
            INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
            INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
            WHERE equipos.cod_equipo = '".$data['cod_equipo']."'
            ORDER BY `contrato_alquiler`.`fecha_ini_contrato` ASC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Clases
    public function getClases()
    {
        $query  = "SELECT cod_clase, nom_clase FROM clase_equipos ORDER BY nom_clase";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Tipos
    public function getTipo($data)
    {
        $query  = "SELECT clase_equipo, cod_tipo_equipos, desc_tipo_equipos FROM tipo_equipos 
                WHERE clase_equipo = '" . $data['clase_equipo'] . "' ORDER BY desc_tipo_equipos";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Alquilados
    public function getTotalAlquilado($data)
    {
        $query  = "SELECT CONCAT(nom_clase, ' ', desc_tipo_equipos) AS equipo, COUNT(*) AS total_alquilado FROM equipos
                INNER JOIN  clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
                INNER JOIN  tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
                WHERE estado_arrend_equipo = 1 AND equipos.clase_equipo = '".$data['cod_clase']."' AND tipo_equipo = '".$data['cod_tipo']."' AND estado=1
                GROUP BY cod_clase, tipo_equipo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Libres
    public function getTotalLibre($data)
    {
        $query  = "SELECT COUNT(*) AS total_libre FROM equipos
                WHERE estado_arrend_equipo = 2 AND clase_equipo = '".$data['cod_clase']."' AND tipo_equipo = '".$data['cod_tipo']."' AND estado=1 
                GROUP BY clase_equipo, tipo_equipo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Mantenimiento
    public function getTotalMantenimiento($data)
    {
        $query  = "SELECT COUNT(*) AS total_mantenimiento FROM equipos
                WHERE estado_arrend_equipo = 3 AND clase_equipo = '".$data['cod_clase']."' AND tipo_equipo = '".$data['cod_tipo']."' AND estado=1
                GROUP BY clase_equipo, tipo_equipo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Baja
    public function getTotalBaja($data)
    {
        $query  = "SELECT COUNT(*) AS total_baja FROM equipos
                WHERE estado_arrend_equipo = 4 AND clase_equipo = '".$data['cod_clase']."' AND tipo_equipo = '".$data['cod_tipo']."' AND estado=1
                GROUP BY clase_equipo, tipo_equipo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Total
    public function getTotalEquipos($data)
    {
        $query  = "SELECT COUNT(*) AS total_equipos FROM equipos
                WHERE clase_equipo = '".$data['cod_clase']."' AND tipo_equipo = '".$data['cod_tipo']."' 
                GROUP BY clase_equipo, tipo_equipo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Detalle
    public function getDetalle($data)
    {
        $query  = "SELECT consecutivo, consecutivo_equipo, nom_clase, desc_tipo_equipos, CONCAT(nom1_cli, ' ',nom2_cli, ' ', apel1_cli, ' ', apel2_cli) AS nombre_cliente, fecha_ini_contrato, fecha_fin_contrato FROM equipos
                LEFT JOIN listado_equipos ON listado_equipos.cod_equipo = equipos.cod_equipo
                LEFT JOIN contrato_alquiler ON contrato_alquiler.cod_calc = listado_equipos.cod_contrato
                INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
                INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
                LEFT JOIN cliente ON cliente.cod_cli = contrato_alquiler.cod_cliente
                WHERE equipos.clase_equipo = '".$data['cod_clase']."' AND tipo_equipo='".$data['cod_tipo']."' AND estado_arrend_equipo= '".$data['estado']."' AND estado=1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Informe pagos diario
    public function getInformePagosDiario($data)
    {
        $query  = "SELECT fech_factura, SUM(total_factura) AS total_factura FROM factura WHERE fech_factura >= '". $data['fecha_inicial'] ."' AND fech_factura <= '". $data['fecha_final'] ."' GROUP BY fech_factura ORDER BY `factura`.`fech_factura` ASC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Informe detalle pago
    public function getDetallePago($data)
    {
        $query  = "SELECT cod_fac, fech_factura, total_factura, CONCAT(nom1_cli,' ',nom2_cli,' ',apel1_cli,' ', apel2_cli) AS nombre_cliente, desc_tipo_pago FROM factura
                INNER JOIN cliente ON cliente.cod_cli = factura.cliente
                INNER JOIN tipo_pago ON tipo_pago.cod_tipo_pago = factura.forma_pago
                WHERE fech_factura = '".$data['fecha']."'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
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

    //Tabla cartera
    public function getCartera()
    {
        $query = "SELECT cedula_cli, CONCAT(nom1_cli,' ',nom2_cli,' ',apel1_cli,' ',apel2_cli) AS nombre_cliente, consecutivo, consecutivo_equipo, nom_clase, nom_equipo, desc_tipo_equipos, cod_contrato,fecha_ini_pago,saldo_pago,TIMESTAMPDIFF(DAY,(fecha_ini_pago),CURDATE()) as dias FROM pagos 
                INNER JOIN contrato_alquiler ON contrato_alquiler.cod_calc = pagos.cod_contrato
                INNER JOIN cliente ON cliente.cod_cli = contrato_alquiler.cod_cliente
                INNER JOIN equipos ON equipos.cod_equipo = pagos.cod_equipo
                INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
                INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
                WHERE estado_pago=1 AND fecha_ini_pago <= CURDATE() AND estado_contrato = 1 AND saldo_pago > 0 AND estado_contrato = 1 ORDER BY fecha_ini_pago";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Lista contratos
    public function getListaContratos($data)
    {
        $query  = "SELECT cod_calc FROM contrato_alquiler WHERE estado_contrato = 1 ORDER BY `cod_calc` DESC LIMIT 2000";
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
            $pagosContrato = $this->calcularNuevosPagos($data);
            $cuotas = 1;
        } else {
            $pagosContrato = $this->getPagosContrato($data);
            $dataMeses = $this->getMeses($data);
            if($dataMeses[0]['meses'] > 0){
                $cuotas = $dataMeses[0]['meses'];  
            } else {
                $cuotas = 0;
                $bandera = 'No tiene cuotas pendientes';
            }            
        }
        for($i=0; $i<$cuotas; $i++){
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

}
?>