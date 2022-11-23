<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Rol
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los roles
    public function getRol()
    {
        $query  = "SELECT cod_rol, nom_rol FROM rol WHERE estado = 1 ORDER BY nom_rol";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo rol
    public function insertaRol($data)
    {
        $query  = "INSERT INTO `rol` (nom_rol) VALUES ('" . $data['nom_rol']  . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
                return true;
        } else {
            return false;
        }
    }

    //Traer un rol registrados
    public function consultaRol($data)
    {
        $query = "SELECT cod_rol, nom_rol FROM rol
                WHERE cod_rol = '" . $data['cod_rol'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita Rol
    public function editaRol($data)
    {
        $query  = "UPDATE rol SET nom_rol = '".$data["nom_rol"]."' WHERE cod_rol = '" . $data['cod_rol'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un Rol
    public function eliminaLogicoRol($data)
    {
        $query  = "UPDATE rol SET estado = 2 WHERE cod_rol = '" . $data['cod_rol'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }
}