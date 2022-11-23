<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Baja
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los bajaes
    public function getBaja()
    {
        $query  = "SELECT cod_baja, consecutivo_equipo, CONCAT(nom_clase, ' - ', desc_tipo_equipos) AS equipo, fecha_baja, desc_tipo_baja FROM bajas 
            INNER JOIN equipos ON equipos.cod_equipo = bajas.equipo_baja
            INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
            INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
            INNER JOIN tipo_baja ON tipo_baja.cod_tipo_baja = bajas.tipo_baja
            ORDER BY cod_baja DESC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo baja
    public function insertaBaja($data)
    {
        $query  = "INSERT INTO `bajas` (equipo_baja, fecha_baja, tipo_baja, observaciones_baja) VALUES ('" . $data['equipo_baja']  . "', '" . $data['fecha_baja']  . "', '" . $data['tipo_baja']  . "', '" . $data['observaciones_baja']  . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
                return true;
        } else {
            return false;
        }
    }

    //Equipos
    public function getEquipos()
    {
        $query  = "SELECT cod_equipo,CONCAT(consecutivo_equipo,' - ',nom_clase,' - ',desc_tipo_equipos) AS equipo  FROM equipos
                INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
                INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
                WHERE estado_arrend_equipo = 2 AND equipos.estado = 1 ORDER BY equipo ASC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Tipo baja
    public function getTipo()
    {
        $query  = "SELECT cod_tipo_baja, desc_tipo_baja FROM tipo_baja
                ORDER BY desc_tipo_baja";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Modifica estado
    public function modificaEstado($data)
    {
        $query  = "UPDATE equipos SET estado_arrend_equipo = '4' WHERE cod_equipo = '" . $data['equipo_baja'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }
}