<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Equipo
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los equipoes
    public function getEquipo()
    {
        $query  = "SELECT cod_equipo, consecutivo_equipo, CONCAT(nom_clase, ' - ', desc_tipo_equipos) AS nombre, canon_arrend_equipo FROM equipos 
                INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
                INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
                WHERE estado = 1
                ORDER BY cod_equipo DESC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo equipo
    public function insertaEquipo($data)
    {
        $dataConsecutivo = $this->getConsecutivo($data['clase_equipo']);
        $consecutivo = $dataConsecutivo[0]['letra_cons'].'00'.$dataConsecutivo[0]['codigo_actual_cons'];
        $this->aumentaConsecutivo($dataConsecutivo);
        $query  = "INSERT INTO `equipos` (tamano_equipo, estado_arrend_equipo, tipo_equipo, clase_equipo, desc_equipo, fecha_ingreso, canon_arrend_equipo, consecutivo_equipo, valor_deposito, nom_equipo) VALUES ('" . $data['tamano_equipo']  . "', '2', '" . $data['tipo_equipo']  . "',  '" . $data['clase_equipo']  . "',  '" . $data['desc_equipo']  . "', '". date('Y-m-d')."',  '" . $data['canon_arrend_equipo']  . "', '" . $consecutivo  . "', '" . $data['valor_deposito']  . "', '" . $data['nom_equipo']  . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
                return true;
        } else {
            return false;
        }
    }

    //Edita Equipo
    public function editaEquipo($data)
    {
        $query  = "UPDATE equipos SET clase_equipo = '".$data["clase_equipo"]."', tipo_equipo = '".$data["tipo_equipo"]."', tamano_equipo = '".$data["tamano_equipo"]."',canon_arrend_equipo = '".$data["canon_arrend_equipo"]."', valor_deposito = '".$data["valor_deposito"]."', desc_equipo = '".$data["desc_equipo"]."', nom_equipo = '".$data["nom_equipo"]."' WHERE cod_equipo = '" . $data['cod_equipo'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un Equipo
    public function eliminaLogicoEquipo($data)
    {
        $query  = "UPDATE equipos SET estado = 2 WHERE cod_rol = '" . $data['cod_rol'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
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

    //Trae las tipos
    public function getTipo($data)
    {
        $query  = "SELECT clase_equipo, cod_tipo_equipos, desc_tipo_equipos FROM tipo_equipos 
                WHERE clase_equipo = '" . $data['clase_equipo'] . "'
                ORDER BY desc_tipo_equipos";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los tamaños
    public function getTamano($data)
    {
        $query  = "SELECT cod_tam_equipos, desc_tam_equipos FROM tamano_equipos 
                WHERE cod_clase_equipos = '" . $data['clase_equipo'] . "' AND estado=1
                ORDER BY desc_tam_equipos";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae las partes
    public function getPartes($data)
    {
        $query  = "SELECT cod_partes, desc_partes FROM partes
                WHERE clase_parte = '" . $data['clase_equipo'] . "' AND estado=1
                ORDER BY desc_partes";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae las tipo partes
    public function getTipoPartes($data)
    {
        $query  = "SELECT cod_tipo_partes, desc_tipo_partes FROM tipo_partes
                WHERE cod_parte = '" . $data['cod_parte'] . "' AND estado=1
                ORDER BY desc_tipo_partes";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae consecutivo
    public function getConsecutivo($clase){
        $query  = "SELECT cod_cons, letra_cons, num_cons, form_cons, cod_clase_equipo, codigo_actual_cons FROM consecutivo WHERE cod_clase_equipo = '" . $clase . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae consecutivo
    public function aumentaConsecutivo($data){
        $query  = "UPDATE consecutivo SET codigo_actual_cons = '" .$data[0]['codigo_actual_cons']. "' + 1 WHERE cod_cons = '" . $data[0]['cod_cons'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Crea una nueva garantia
    public function insertaGarantia($data)
    {
        $dataEquipo = $this->getUltimoEquipo();
        $query  = "INSERT INTO `garantias` (cod_equipo_garantia, fecha_ini_garantia, fecha_fin_garantia, cant_garantia, unid_garantia) VALUES ('" . $dataEquipo[0]['cod_equipo']  . "', '" . $data['fecha_ini_garantia']  . "', '" . $data['fecha_fin_garantia']  . "', '" . $data['cant_garantia']  . "','6')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
                return true;
        } else {
            return false;
        }
    }

    //Edita garantia
    public function editaGarantia($data)
    {
        $query  = "UPDATE garantias SET fecha_ini_garantia = '" .$data['fecha_ini_garantia']. "', fecha_fin_garantia = '" .$data['fecha_fin_garantia']. "', cant_garantia = '" .$data['cant_garantia']. "' WHERE cod_equipo_garantia = '" .$data['cod_equipo']. "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta ultimo equipo
    public function getUltimoEquipo(){
        $query  = "SELECT cod_equipo FROM equipos WHERE estado = 1 ORDER BY cod_equipo DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Actualiza garantia
    public function actualizaGarantia(){
        $dataEquipo = $this->getUltimoEquipo();
        $dataGarantia = $this->getUltimaGarantia();
        $query  = "UPDATE equipos SET garantia_equipo = '" .$dataGarantia[0]['cod_garantia']. "' WHERE cod_equipo = '" .$dataEquipo[0]['cod_equipo']. "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta ultima garantia
    public function getUltimaGarantia(){
        $query  = "SELECT cod_garantia FROM garantias ORDER BY cod_garantia DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea una nueva garantia motor
    public function insertaMotor($data, $valor)
    {
        if($data['marca_motor'] != '' || $data['numero_motor'] != '' || $data['fecha_motor'] != ''){
            if($valor == ""){
                $dataEquipo = $this->getUltimoEquipo();
                $valor = $dataEquipo[0]['cod_equipo'];
            }
            
            $query  = "INSERT INTO `garantia_motor` (cod_equipo, marca_motor, numero_motor, fecha_motor) VALUES ('" . $valor  . "', '" . $data['marca_motor']  . "', '" . $data['numero_motor']  . "', '" . $data['fecha_motor']  . "')";
            $result = mysqli_query($this->link, $query);
            if (mysqli_affected_rows($this->link) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    //Edita motor
    public function editaMotor($data)
    {
        $query  = "UPDATE garantia_motor SET marca_motor = '" .$data['marca_motor']. "', numero_motor = '" .$data['numero_motor']. "', fecha_motor = '" .$data['fecha_motor']. "' WHERE cod_equipo = '" .$data['cod_equipo']. "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Ingresa partes
    public function insertaPartes($data, $valor)
    {   
        if($valor == ""){
            $dataEquipo = $this->getUltimoEquipo();
            $valor = $dataEquipo[0]['cod_equipo'];
        }
        $bandera = false;
        for($i=0; $i< $data["contador"]; $i++){
            if(isset($data['cod_parte_'.$i ]) && isset($data['cod_tipo_parte_'.$i ])){
                $query  = "INSERT INTO `listado_partes` (cod_equipo_parte, cod_parte, cod_tipo_parte) VALUES ('" . $valor  . "', '" . $data['cod_parte_'.$i ]  . "',  '" . $data['cod_tipo_parte_'.$i ]  . "')";
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

    //Trae el equipo por ID
    public function consultaEquipo($cod_equipo)
    {
        $query  = "SELECT equipos.cod_equipo, equipos.clase_equipo, tipo_equipo, tamano_equipo, canon_arrend_equipo, valor_deposito, desc_equipo, cant_garantia, fecha_ini_garantia, fecha_fin_garantia, numero_motor, marca_motor, fecha_motor, consecutivo_equipo, nom_clase, desc_tipo_equipos, desc_tam_equipos, nom_equipo FROM equipos
                LEFT JOIN garantias ON garantias.cod_garantia = equipos.garantia_equipo
                LEFT JOIN garantia_motor ON garantia_motor.cod_equipo = equipos.cod_equipo
                INNER JOIN  clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
                INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
                INNER JOIN tamano_equipos ON tamano_equipos.cod_tam_equipos = equipos.tamano_equipo
                WHERE equipos.estado = 1 AND equipos.cod_equipo = '" .$cod_equipo. "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae lista partes
    public function getListaPartes($cod_equipo)
    {
        $query  = "SELECT listado_partes.cod_parte, cod_tipo_parte, desc_partes, desc_tipo_partes FROM `listado_partes`
                INNER JOIN equipos ON equipos.cod_equipo = listado_partes.cod_equipo_parte
                INNER JOIN partes ON partes.cod_partes = listado_partes.cod_parte
                INNER JOIN tipo_partes ON tipo_partes.cod_tipo_partes = listado_partes.cod_tipo_parte
                WHERE cod_equipo_parte = '" .$cod_equipo. "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Existe motor
    public function existeMotor($data)
    {
        $query  = "SELECT cod_garantia_motor FROM garantia_motor
                WHERE cod_equipo = '" .$data["cod_equipo"]. "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Elimina partes
    public function eliminaPartes($data)
    {
        $query  = "DELETE FROM listado_partes WHERE cod_equipo_parte = '" . $data['cod_equipo'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Garantia
    public function getGarantia($data)
    {
        $query  = "SELECT consecutivo_equipo, fecha_ini_garantia, cant_garantia, fecha_fin_garantia FROM garantias
                INNER JOIN equipos ON equipos.garantia_equipo = garantias.cod_garantia
                WHERE cod_equipo_garantia = '" . $data['cod_equipo'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Empresa
    public function getEmpresa()
    {
        $query  = "SELECT CONCAT(dir_jmc, ' / Teléfonos: ', tel_jmc) AS empresa FROM empresa";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}