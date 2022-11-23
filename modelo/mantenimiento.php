<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Mantenimiento
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los mantenimientoes
    public function getMantenimiento()
    {
        $query  = "SELECT cod_mantenimientos, consecutivo_equipo, CONCAT(nom_clase, ' - ', desc_tipo_equipos) AS equipo, fecha_mantenimientos, valor_mantenimientos, desc_est_arrend_equipo FROM mantenimientos 
            INNER JOIN  equipos ON equipos.cod_equipo = mantenimientos.equipo_mantenimientos 
            INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
            INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
            INNER JOIN estado_arrend_equipo ON estado_arrend_equipo.cod_est_arrend_equipo = equipos.estado_arrend_equipo
            WHERE mantenimientos.estado = 1 ORDER BY cod_mantenimientos DESC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo mantenimiento
    public function insertaMantenimiento($data)
    {
        $query  = "INSERT INTO `mantenimientos` (equipo_mantenimientos, fecha_mantenimientos, valor_mantenimientos) VALUES ('" . $data['equipo_mantenimientos']  . "', '" . $data['fecha_mantenimientos']  . "', '" . $data['valor_mantenimientos']  . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
                return true;
        } else {
            return false;
        }
    }

    //Traer un mantenimiento registrados
    public function consultaMantenimiento($data)
    {
        $query = "SELECT cod_mantenimientos, fecha_mantenimientos, valor_mantenimientos, equipo_mantenimientos, estado_arrend_equipo FROM mantenimientos
                INNER JOIN equipos ON equipos.cod_equipo = mantenimientos.equipo_mantenimientos
                WHERE cod_mantenimientos = '" . $data['cod_mantenimientos'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita Mantenimiento
    public function editaMantenimiento($data)
    {
        $query  = "UPDATE mantenimientos SET equipo_mantenimientos = '".$data["equipo_mantenimientos"]."', fecha_mantenimientos = '".$data["fecha_mantenimientos"]."', valor_mantenimientos = '".$data["valor_mantenimientos"]."' WHERE cod_mantenimientos = '" . $data['cod_mantenimientos'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un Mantenimiento
    public function eliminaLogicoMantenimiento($data)
    {
        $query  = "UPDATE mantenimientos SET estado = 2 WHERE cod_mantenimientos = '" . $data['cod_mantenimientos'] . "'";
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
                WHERE estado_arrend_equipo != 1 AND equipos.estado = 1 ORDER BY equipo ASC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Equipos
    public function getEstado()
    {
        $query  = "SELECT cod_est_arrend_equipo, desc_est_arrend_equipo FROM estado_arrend_equipo
                WHERE cod_est_arrend_equipo != 1 ORDER BY cod_est_arrend_equipo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Modifica estado
    public function modificaEstado($data)
    {
        $query  = "UPDATE equipos SET estado_arrend_equipo = '".$data["estado_arrend_equipo"]."' WHERE cod_equipo = '" . $data['equipo_mantenimientos'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }
}