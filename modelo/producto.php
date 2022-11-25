<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Producto
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los productoes
    public function getProducto()
    {
        $query  = "CALL consultar_producto()";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo producto
    public function insertaProducto($data)
    {
        $query  = "INSERT INTO `producto` (nom_producto) VALUES ('" . $data['nom_producto']  . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
                return true;
        } else {
            return false;
        }
    }

    //Traer un producto registrados
    public function consultaProducto($data)
    {
        $query = "SELECT cod_producto, nom_producto FROM producto
                WHERE cod_producto = '" . $data['cod_producto'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita Producto
    public function editaProducto($data)
    {
        $query  = "UPDATE producto SET nom_producto = '".$data["nom_producto"]."' WHERE cod_producto = '" . $data['cod_producto'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un Producto
    public function eliminaLogicoProducto($data)
    {
        $query  = "UPDATE producto SET estado = 2 WHERE cod_producto = '" . $data['cod_producto'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }
}