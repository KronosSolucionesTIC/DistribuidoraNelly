<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Otro_si
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los otro_sies
    public function getOtro_si()
    {
        $query  = "SELECT cod_otro_si, consecutivo, fecha_otro_si FROM otro_si 
            INNER JOIN contrato_alquiler ON contrato_alquiler.cod_calc = otro_si.contrato_otro_si
            ORDER BY cod_otro_si DESC";
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

    //Datos otro si
    public function consultaOtroSi($data)
    {
        $query = "SELECT cod_otro_si, consecutivo, CONCAT(nom1_cli,' ',nom2_cli, ' ', apel1_cli, ' ', apel2_cli) AS arrendatario, tipo_persona, cedula_cli, CONCAT(nom1_pac,' ',nom2_pac, ' ', apel1_pac, ' ', apel2_pac) AS paciente, cedula_pac, DAY(fecha_ini_contrato) as dia, MONTH(fecha_ini_contrato) as mes,YEAR(fecha_ini_contrato) AS anio, DAY(fecha_otro_si) as dia_otro_si, MONTH(fecha_otro_si) as mes_otro_si, YEAR(fecha_otro_si) as anio_otro_si, nom_ciu AS ciudad  FROM otro_si
                INNER JOIN contrato_alquiler ON contrato_alquiler.cod_calc = otro_si.contrato_otro_si
                INNER JOIN cliente ON cliente.cod_cli = contrato_alquiler.cod_cliente
                LEFT JOIN ciudad ON ciudad.cod_ciu = cliente.ciudad_cli
                INNER JOIN paciente ON paciente.cod_pac = contrato_alquiler.cod_paciente
                WHERE cod_otro_si = '" . $data['cod_otro_si'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae lista equipos
    public function getListaEquipos($data)
    {
        $query  = "SELECT consecutivo_equipo, nom_clase, nom_equipo, desc_tipo_equipos, fecha_ini_contrato, canon_arrend_equipo, valor_deposito, SUM(canon_arrend_equipo) AS total_canon, SUM(valor_deposito) AS total_deposito FROM otro_si_equipos
                    INNER JOIN otro_si ON otro_si.cod_otro_si = otro_si_equipos.otro_si                   
                    INNER JOIN equipos ON equipos.cod_equipo = otro_si_equipos.equipo_otro_si
                    INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
                    INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
                    INNER JOIN contrato_alquiler ON contrato_alquiler.cod_calc = otro_si.contrato_otro_si                    
                    where cod_otro_si  = '" .$data["cod_otro_si"]. "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}