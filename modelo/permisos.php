<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Permisos
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Elimina los permisos
    public function eliminaPermisos($data)
    {
        $query  = "DELETE FROM permisos WHERE cod_usu_per = '" . $data['cod_rol'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Crea un nuevo permisos
    public function insertaPermisos($data)
    {
        $query  = "INSERT INTO `permisos` (cod_usu_per, cod_int_per, con_per, edi_per, ins_per, eli_per) VALUES ('" . $data['cod_rol']  . "', '" . $data['cod_int_per']  . "', '" . $data['con_per']  . "', '" . $data['edi_per']  . "', '" . $data['ins_per']  . "', '" . $data['eli_per']  . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
                return true;
        } else {
            return false;
        }
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

    //Trae los modulos
    public function getModulos()
    {
        $query  = "SELECT nom_mod, nom_int, cod_int FROM modulos
                INNER JOIN interfaz ON interfaz.cod_mod_int = modulos.cod_mod
                ORDER BY cod_mod, nom_int";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los permisos de consulta
    public function getConsulta($cod_rol, $cod_int)
    {
        $query  = "SELECT con_per, edi_per, eli_per, ins_per FROM permisos
                WHERE cod_usu_per = '". $cod_rol ."' AND cod_int_per = '".$cod_int."'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}