<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Contrato
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los contratoes
    public function getContrato()
    {
        $query  = "SELECT cod_calc, consecutivo, if(tipo_persona = 2, nom1_cli,CONCAT(nom1_cli, ' ', apel1_cli)) AS nombre_cliente, CONCAT(nom1_pac, ' ', apel1_pac) AS nombre_paciente,fecha_ini_contrato FROM contrato_alquiler 
                INNER JOIN cliente ON cliente.cod_cli = contrato_alquiler.cod_cliente 
                INNER JOIN paciente ON paciente.cod_pac = contrato_alquiler.cod_paciente
                ORDER BY cod_calc DESC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Tipo contrato
    public function getTipoContrato()
    {
        $query  = "SELECT cod_tipo_contrato, desc_tipo_contrato FROM tipo_contrato
                ORDER BY desc_tipo_contrato";
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
                ORDER BY nombre ASC;";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Responsable
    public function getResponsable()
    {
        $query  = "SELECT cod_cli, IF(tipo_persona = 2, CONCAT(nom1_cli,' - ',cedula_cli), CONCAT(apel1_cli,' ',apel2_cli,' ',nom1_cli,' ',nom2_cli,' - ',cedula_cli)) AS nombre FROM responsable
                ORDER BY nombre ASC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Paciente
    public function getPaciente($data)
    {
        $query  = "SELECT cod_pac, CONCAT(apel1_pac,' ',apel2_pac,' ',nom1_pac,' ',nom2_pac,' - ',cedula_pac) AS nombre FROM paciente
                WHERE cod_cliente = '" . $data['cod_cliente'] . "'
                ORDER BY nombre ASC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae las clases
    public function getClases()
    {
        $query  = "SELECT cod_clase, nom_clase FROM clase_equipos ORDER BY nom_clase";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
    
    //Trae los consecutivos
    public function getConsecutivo($data)
    {
        $query  = "SELECT cod_equipo, IF(nom_equipo is null, CONCAT(consecutivo_equipo, ' - ',nom_clase, ' - ', desc_tipo_equipos), CONCAT(consecutivo_equipo, ' - ',nom_clase, ' - ', nom_equipo, ' - ', desc_tipo_equipos)) AS equipo FROM `equipos`
            INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
            INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
            WHERE cod_clase = '" . $data['cod_clase'] . "' AND estado_arrend_equipo = 2
            ORDER BY cod_equipo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los valores
    public function getValores($data)
    {
        $query  = "SELECT canon_arrend_equipo, valor_deposito FROM `equipos` WHERE cod_equipo = '" . $data['cod_equipo'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Traer numero contrato
    public function consultaNumero()
    {
        $query = "SELECT CONCAT(letra_cons,RIGHT(EXTRACT(YEAR FROM now()), 2),IF(EXTRACT(MONTH FROM now()) < 10, CONCAT('0',EXTRACT(MONTH FROM now())),EXTRACT(MONTH FROM now())), codigo_actual_cons) AS numero FROM consecutivo WHERE cod_cons = 9";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo contrato
    public function insertaContrato($data, $consecutivo)
    {
        if(isset($data['cod_responsable'])){
            $responsable = $data['cod_responsable'];
        } else {
            $responsable = 0;
        }
        $query  = "INSERT INTO `contrato_alquiler` (consecutivo, cod_cliente, fecha_ini_contrato, fecha_ingreso, fecha_fin_contrato, cod_paciente, cod_responsable, observ_contrato, estado_contrato, tipo_contrato) VALUES ('" . $consecutivo  . "', '" . $data['cod_cliente']  . "', '" . $data['fecha_ini_contrato']  . "' , '" . date('Y-m-d') . "', '" . $data['fecha_fin_contrato']  . "', '" . $data['cod_paciente']  . "', '" . $responsable . "', '" . $data['observ_contrato']  . "','1', '" . $data['tipo_contrato']  . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Aumenta consecutivo
    public function aumentaConsecutivo(){
        $query  = "UPDATE consecutivo SET codigo_actual_cons = (SELECT codigo_actual_cons + 1) WHERE cod_cons = 9";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Ingresa equipos
    public function insertaEquipos($data, $valor)
    {   
        if($valor == ""){
            $dataContrato = $this->getUltimoContrato();
            $valor = $dataContrato[0]['cod_calc'];
        } 
        $bandera = false;
        for($i=0; $i< $data["contador"]; $i++){
            if(isset($data['cod_equipo_'.$i ])){
                $query  = "INSERT INTO `listado_equipos` (cod_contrato, cod_equipo, canon_equipo, deposito_equipo, total_equipo) VALUES ('" . $valor  . "', '" . $data['cod_equipo_'.$i ]  . "',  '" . $data['canon_equipo_'.$i ]  . "',  '" . $data['deposito_equipo_'.$i ]  . "',  '" . $data['total_equipo_'.$i ]  . "')";
                $result = mysqli_query($this->link, $query);
                if (mysqli_affected_rows($this->link) > 0) {
                    $bandera = true;
                } else {
                    $bandera = false;
                }
            }        
        }
        return $bandera;
    }

    //Consulta ultimo contrato
    public function getUltimoContrato(){
        $query  = "SELECT cod_calc FROM contrato_alquiler ORDER BY cod_calc DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Traer un contrato registrados
    public function consultaContrato($data)
    {
        $query = "SELECT cod_calc, consecutivo, cod_cliente, fecha_ini_contrato, fecha_ingreso, fecha_fin_contrato, cod_paciente, cod_responsable, observ_contrato, tipo_contrato FROM contrato_alquiler
                WHERE cod_calc = '" . $data['cod_contrato'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita Contrato
    public function editaContrato($data)
    {
        $query  = "UPDATE contrato_alquiler SET fecha_ini_contrato = '".$data["fecha_ini_contrato"]."',fecha_fin_contrato = '".$data["fecha_fin_contrato"]."',observ_contrato = '".$data["observ_contrato"]."'  WHERE cod_calc = '" . $data['cod_calc'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Trae lista equipos
    public function getListaEquipos($cod_contrato)
    {
        $query  = "SELECT fecha_ini_contrato, fecha_fin_contrato, desc_tipo_equipos, tipo_contrato, listado_equipos.cod_equipo, nom_clase, consecutivo_equipo, IF(nom_equipo != '', nom_equipo,'') AS nombre, canon_equipo, deposito_equipo, total_equipo FROM listado_equipos
                INNER JOIN contrato_alquiler ON contrato_alquiler.cod_calc = listado_equipos.cod_contrato
                INNER JOIN equipos ON equipos.cod_equipo = listado_equipos.cod_equipo
                INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
                INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
                WHERE listado_equipos.cod_contrato = '" .$cod_contrato. "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Elimina los equipos
    public function eliminaEquipos($data)
    {
        $query  = "DELETE FROM listado_equipos WHERE `listado_equipos`.`cod_contrato` =  '" .$data['cod_calc']. "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
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

    //Traer un contrato registrado con cliente
    public function consultaDetalleContrato($data)
    {
        $query = "SELECT nom_ciu, SUM(deposito_equipo) AS total_deposito, SUM(total_equipo) AS total_canon, cedula_cli, tipo_persona, CONCAT(nom1_cli, ' ', nom2_cli,' ',apel1_cli,'',apel2_cli) AS nombre_cliente, cod_calc, consecutivo, cod_cliente, fecha_ini_contrato, contrato_alquiler.fecha_ingreso, fecha_fin_contrato, cod_paciente, cod_responsable, observ_contrato, tipo_contrato FROM listado_equipos
                INNER JOIN contrato_alquiler ON contrato_alquiler.cod_calc = listado_equipos.cod_contrato
                INNER JOIN equipos ON equipos.cod_equipo = listado_equipos.cod_equipo
                INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
                INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
                INNER JOIN cliente ON cliente.cod_cli = contrato_alquiler.cod_cliente
                LEFT JOIN ciudad ON ciudad.cod_ciu = cliente.ciudad_cli
                WHERE cod_calc = '" . $data['cod_contrato'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Traer datos anexo
    public function consultaAnexoContrato($data)
    {
        $query = "SELECT CONCAT(nom1_cli, ' ', nom2_cli,' ',apel1_cli,' ',apel2_cli) AS nombre_cliente, CONCAT(nom1_pac, ' ', nom2_pac,' ',apel1_pac,' ',apel2_pac) AS nombre_paciente, cedula_cli, cedula_pac, direccion_cli, direccion_pac, telefono_cli, telefono_pac, celular_pac, celular_cli, nom_clase, desc_tipo_equipos, consecutivo_equipo, equipos.cod_equipo, desc_partes, consecutivo, tipo_contrato FROM listado_equipos
                INNER JOIN contrato_alquiler ON contrato_alquiler.cod_calc = listado_equipos.cod_contrato
                INNER JOIN equipos ON equipos.cod_equipo = listado_equipos.cod_equipo
                INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
                INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
                INNER JOIN cliente ON cliente.cod_cli = contrato_alquiler.cod_cliente
                INNER JOIN partes ON partes.clase_parte = equipos.clase_equipo
                LEFT JOIN paciente ON paciente.cod_pac = contrato_alquiler.cod_paciente
                LEFT JOIN ciudad ON ciudad.cod_ciu = cliente.ciudad_cli
                WHERE cod_calc = '" . $data['cod_contrato'] . "' AND chequeo_inv=1 AND partes.estado=1 ORDER BY equipos.cod_equipo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Modifica estado equipos
    public function modificaEquipo($data){
        $bandera = false;
        for($i=0; $i< $data["contador"]; $i++){
            if(isset($data['cod_equipo_'.$i ])){
                $query  = "UPDATE `equipos` SET `estado_arrend_equipo` = '1' WHERE `equipos`.`cod_equipo` = '" . $data['cod_equipo_'.$i ] . "'";
                $result = mysqli_query($this->link, $query);
                if (mysqli_affected_rows($this->link) > 0) {
                    $bandera = true;
                } else {
                    $bandera = false;
                }
            }        
        }
        return $bandera;
    }
}