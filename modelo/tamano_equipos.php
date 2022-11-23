<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Tamano_equipos
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los tamano_equiposes
    public function getTamano_equipos()
    {
        $query  = "SELECT nom_clase, desc_tam_equipos, desc_unidades, cod_tam_equipos, cod_unidad, cod_clase_equipos  FROM tamano_equipos 
                INNER JOIN clase_equipos ON clase_equipos.cod_clase = tamano_equipos.cod_clase_equipos
                INNER JOIN unidades ON unidades.cod_unidades = tamano_equipos.cod_unidad
                WHERE estado = 1 ORDER BY nom_clase, desc_tam_equipos";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo tamano_equipos
    public function insertaTamano_equipos($data)
    {
        $query  = "INSERT INTO `tamano_equipos` (desc_tam_equipos, cod_unidad, cod_clase_equipos) VALUES ('" . $data['desc_tam_equipos']  . "', '" . $data['cod_unidad']  . "', '" . $data['cod_clase_equipos']  . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
                return true;
        } else {
            return false;
        }
    }

    //Traer un tamano_equipos registrados
    public function consultaTamano_equipos($data)
    {
        $query = "SELECT cod_tam_equipos, desc_tam_equipos, cod_unidad, cod_clase_equipos FROM tamano_equipos
                WHERE cod_tam_equipos= '" . $data['cod_tam_equipos'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita Tamano_equipos
    public function editaTamano_equipos($data)
    {
        $query  = "UPDATE tamano_equipos SET desc_tam_equipos = '".$data["desc_tam_equipos"]."', cod_unidad = '".$data["cod_unidad"]."', cod_clase_equipos = '".$data["cod_clase_equipos"]."' WHERE cod_tam_equipos = '" . $data['cod_tam_equipos'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un Tamano_equipos
    public function eliminaLogicoTamano_equipos($data)
    {
        $query  = "UPDATE tamano_equipos SET estado = 2 WHERE cod_tam_equipos = '" . $data['cod_tam_equipos'] . "'";
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

    //Trae las unidades
    public function getUnidades()
    {
        $query  = "SELECT cod_unidades, desc_unidades FROM unidades WHERE cod_med_unidades =  1 ORDER BY desc_unidades";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}