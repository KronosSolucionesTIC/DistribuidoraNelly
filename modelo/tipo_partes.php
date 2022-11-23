<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Tipo_partes
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los tipo_parteses
    public function getTipo_partes()
    {
        $query  = "SELECT cod_tipo_partes, nom_clase, CONCAT(desc_partes, ' - ', desc_tipo_partes) AS nombre FROM tipo_partes 
                INNER JOIN partes ON partes.cod_partes = tipo_partes.cod_parte
                INNER JOIN clase_equipos ON clase_equipos.cod_clase = partes.clase_parte
                WHERE tipo_partes.estado = 1 
                ORDER BY nom_clase, desc_partes, desc_tipo_partes";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo tipo_partes
    public function insertaTipo_partes($data)
    {
        $query  = "INSERT INTO `tipo_partes` (desc_tipo_partes, cod_parte) VALUES ('" . $data['desc_tipo_partes']  . "', '" . $data['cod_parte']  . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
                return true;
        } else {
            return false;
        }
    }

    //Traer un tipo_partes registrados
    public function consultaTipo_partes($data)
    {
        $query = "SELECT cod_tipo_partes, desc_tipo_partes, cod_parte FROM tipo_partes
                WHERE cod_tipo_partes = '" . $data['cod_tipo_partes'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita Tipo_partes
    public function editaTipo_partes($data)
    {
        $query  = "UPDATE tipo_partes SET desc_tipo_partes = '".$data["desc_tipo_partes"]."', cod_parte = '".$data["cod_parte"]."' WHERE cod_tipo_partes = '" . $data['cod_tipo_partes'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un Tipo_partes
    public function eliminaLogicoTipo_partes($data)
    {
        $query  = "UPDATE tipo_partes SET estado = 2 WHERE cod_tipo_partes = '" . $data['cod_tipo_partes'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Trae las partes
    public function getPartes()
    {
        $query  = "SELECT cod_partes, CONCAT(nom_clase,' - ', desc_partes) as nombre FROM partes 
                INNER JOIN clase_equipos ON clase_equipos.cod_clase = partes.clase_parte
                WHERE partes.estado = 1
                ORDER BY nom_clase, desc_partes";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}