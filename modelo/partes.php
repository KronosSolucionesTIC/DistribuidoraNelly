<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Partes
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los parteses
    public function getPartes()
    {
        $query  = "SELECT cod_partes, nom_clase, desc_partes FROM partes 
                INNER JOIN clase_equipos ON clase_equipos.cod_clase = partes.clase_parte
                WHERE estado = 1 
                ORDER BY nom_clase, desc_partes";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo partes
    public function insertaPartes($data)
    {
        $query  = "INSERT INTO `partes` (desc_partes, clase_parte, chequeo_inv) VALUES ('" . $data['desc_partes']  . "', '" . $data['clase_parte']  . "', '" . $data['chequeo_inv']  . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
                return true;
        } else {
            return false;
        }
    }

    //Traer un partes registrados
    public function consultaPartes($data)
    {
        $query = "SELECT cod_partes, desc_partes, clase_parte, chequeo_inv FROM partes
                WHERE cod_partes = '" . $data['cod_partes'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita Partes
    public function editaPartes($data)
    {
        $query  = "UPDATE partes SET desc_partes = '".$data["desc_partes"]."', clase_parte = '".$data["clase_parte"]."', chequeo_inv = '".$data["chequeo_inv"]."'  WHERE cod_partes = '" . $data['cod_partes'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un Partes
    public function eliminaLogicoPartes($data)
    {
        $query  = "UPDATE partes SET estado = 2 WHERE cod_partes = '" . $data['cod_partes'] . "'";
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

    //Trae el si no
    public function getSiNo()
    {
        $query  = "SELECT cod_si_no, nom_si_no FROM si_no";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}