<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Entrega
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los entregaes
    public function getEntrega()
    {
        $query  = "SELECT cod_entrega, CONCAT(nom1_cli,' ',nom2_cli,' ',apel1_cli,' ',apel2_cli) AS nombre_cliente, fecha_entrega, consecutivo FROM entregas 
                INNER JOIN contrato_alquiler ON contrato_alquiler.cod_calc = entregas.cod_contrato
                INNER JOIN cliente ON cliente.cod_cli = contrato_alquiler.cod_cliente
                ORDER BY cod_entrega DESC LIMIT 2000";
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
                WHERE estado_contrato = 1 GROUP BY cod_cli ORDER BY nombre ASC";
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
  
    //Trae lista equipos
    public function getListaEquipos($data)
    {
        $query  = "SELECT fecha_ini_contrato, fecha_fin_contrato, desc_tipo_equipos, tipo_contrato, listado_equipos.cod_equipo, nom_clase, consecutivo_equipo, IF(nom_equipo != '', nom_equipo,'') AS nombre, canon_equipo, deposito_equipo, total_equipo FROM listado_equipos
                INNER JOIN contrato_alquiler ON contrato_alquiler.cod_calc = listado_equipos.cod_contrato
                INNER JOIN equipos ON equipos.cod_equipo = listado_equipos.cod_equipo
                INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
                INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
                WHERE listado_equipos.cod_contrato = '" .$data['cod_contrato']. "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo entrega
    public function insertaEntrega($data)
    {
        $dataSaldo = $this->consultaSaldo($_REQUEST);
        if($data['contador'] == $data['seleccionados']){
            $tipo_entrega = 2;
            if($dataSaldo[0]['saldo_deuda'] == 0){
                $this->finalizaContrato($_REQUEST);
            } 
        } else {
            $tipo_entrega = 1;
        }        
        $query  = "INSERT INTO `entregas` (cod_contrato, fecha_entrega, tipo_entrega, saldo_deuda, observaciones) VALUES ('" . $data['cod_contrato']  . "', '" . $data['fecha_entrega']  . "','". $tipo_entrega ."', '". $dataSaldo[0]['saldo_deuda'] ."', '" . $data['observaciones']  . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Saldo
    public function consultaSaldo($data)
    {
        $query  = "SELECT SUM(saldo_pago) AS saldo_deuda FROM `pagos` WHERE  saldo_pago > 0 AND cod_contrato = '" .$data['cod_contrato']. "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Ingresa equipos
    public function insertaEquipos($data)
    {   
        $dataEntrega = $this->getUltimaEntrega();
        $bandera = false;
        for($i=0; $i< $data["contador"]; $i++){
            $query  = "INSERT INTO `entregas_equipos` (cod_entrega, cod_equipo) VALUES ('" . $dataEntrega[0]['cod_entrega']  . "', '" . $data['cod_equipo_'.$i ]  . "')";
            $result = mysqli_query($this->link, $query);
            if (mysqli_affected_rows($this->link) > 0) {
                $bandera = true;
            } else {
                $bandera = false;
            }       
        }
        return $bandera;
    }

    //Ultima entrega
    public function getUltimaEntrega(){
        $query  = "SELECT cod_entrega FROM entregas ORDER BY cod_entrega DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Modifica equipos
    public function modificaEquipos($data)
    {   
        $bandera = false;
        for($i=0; $i< $data["contador"]; $i++){
            $query  = "UPDATE equipos SET estado_arrend_equipo = '2' WHERE cod_equipo ='" . $data['cod_equipo_'.$i ] ."'";
            $result = mysqli_query($this->link, $query);
            if (mysqli_affected_rows($this->link) > 0) {
                $bandera = true;
            } else {
                $bandera = false;
            }
        }
        return $bandera;
    }

    //Finaliza contrato
    public function finalizaContrato($data)
    {   
        $query  = "UPDATE contrato_alquiler SET estado_contrato = '2' WHERE cod_calc ='". $data['cod_contrato'] ."'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            $bandera = true;
        } else {
            $bandera = false;
        }
    }

    //Elimina equipos
    public function eliminaEquipos($data)
    {   
        $bandera = false;
        for($i=0; $i< $data["contador"]; $i++){
            $query  = "DELETE FROM listado_equipos WHERE cod_equipo = '" . $data['cod_equipo_'.$i ] ."' AND cod_contrato = '".$data['cod_contrato']."'";
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

    //Entrega
    public function consultaEntrega($data)
    {
        $query  = "SELECT nom_ciu, cedula_cli, tipo_persona, saldo_deuda, consecutivo_equipo, nom_clase, nom_equipo, desc_tipo_equipos, entregas.cod_entrega, consecutivo, fecha_entrega FROM entregas_equipos
                INNER JOIN equipos on (equipos.cod_equipo = entregas_equipos.cod_equipo)
                INNER JOIN clase_equipos on (clase_equipos.cod_clase = equipos.clase_equipo)
                INNER JOIN tipo_equipos on (tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo)   
                INNER JOIN entregas ON entregas.cod_entrega = entregas_equipos.cod_entrega
                INNER JOIN contrato_alquiler ON contrato_alquiler.cod_calc = entregas.cod_contrato
                INNER JOIN cliente ON cliente.cod_cli = contrato_alquiler.cod_cliente
                LEFT JOIN ciudad ON ciudad.cod_ciu = cliente.ciudad_cli                
                WHERE entregas.cod_entrega = '".$data['cod_entrega']."'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}
?>