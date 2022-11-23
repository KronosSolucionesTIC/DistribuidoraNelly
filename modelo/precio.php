<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Precio
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los precioes
    public function getPrecio()
    {
        $query  = "SELECT cod_equipo, consecutivo_equipo, CONCAT(nom_clase, ' - ', desc_tipo_equipos) AS equipo, canon_arrend_equipo FROM equipos 
            INNER JOIN clase_equipos ON clase_equipos.cod_clase = equipos.clase_equipo
            INNER JOIN tipo_equipos ON tipo_equipos.cod_tipo_equipos = equipos.tipo_equipo
            WHERE estado = 1 ORDER BY equipo";
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

    //Edita precios
    public function editaPrecio($data)
    {
        $query  = "UPDATE equipos SET canon_arrend_equipo = '" . $data['canon_arrend_equipo']  . "' WHERE clase_equipo = '" . $data['clase_equipo']. "' AND  tipo_equipo = '" . $data['tipo_equipo']. "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
                return true;
        } else {
            return false;
        }
    }
}