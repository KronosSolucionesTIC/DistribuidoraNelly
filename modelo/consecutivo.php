<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Consecutivo
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los consecutivoes
    public function getConsecutivo()
    {
        $query  = "SELECT cod_cons, form_cons, letra_cons, codigo_actual_cons FROM consecutivo ORDER BY form_cons";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Traer un consecutivo registrados
    public function consultaConsecutivo($data)
    {
        $query = "SELECT cod_cons, form_cons, letra_cons, codigo_actual_cons FROM consecutivo
                WHERE cod_cons = '" . $data['cod_cons'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita Consecutivo
    public function editaConsecutivo($data)
    {
        $query  = "UPDATE consecutivo SET form_cons = '".$data["form_cons"]."', letra_cons = '".$data["letra_cons"]."', codigo_actual_cons = '".$data["codigo_actual_cons"]."' WHERE cod_cons = '" . $data['cod_cons'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }
}