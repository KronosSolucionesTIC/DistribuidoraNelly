<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Usuario
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los usuario registrados
    public function getUsuario()
    {
        $query = "SELECT cod_usu, nom_usu, cc_usu, nom_car FROM usuario
            INNER JOIN cargo ON cargo.cod_car = usuario.car_usu
            WHERE usuario.estado = 1 ";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los roles
    public function getRol()
    {
        $query  = "SELECT cod_rol, nom_rol FROM rol WHERE estado =1 ORDER BY nom_rol";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los cargos
    public function getCargo()
    {
        $query  = "SELECT cod_car, nom_car FROM cargo ORDER BY nom_car";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo usuario
    public function insertaUsuario($data)
    {
        $query  = "INSERT INTO `usuario` (nom_usu, car_usu, cc_usu, tel_usu, dir_usu, log_usu, pas_usu, cod_rol_usu) VALUES ('" . $data['nom_usu']  . "', '" . $data['car_usu']  . "', '" . $data['cc_usu']  . "', '" . $data['tel_usu']  . "', '" . $data['dir_usu']  . "', '" . $data['log_usu']  . "', '" . $data['pas_usu']  . "', '" . $data['cod_rol_usu']  . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
                return true;
        } else {
            return false;
        }
    }

    //Traer un usuario registrados
    public function consultaUsuario($data)
    {
        $query = "SELECT cod_usu, nom_usu, car_usu, cc_usu, tel_usu, dir_usu, log_usu, pas_usu, cod_rol_usu, nom_car FROM usuario
                INNER JOIN cargo ON cargo.cod_car = usuario.car_usu
                WHERE cod_usu = '" . $data['cod_usu'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Elimina logico un usuario
    public function eliminaLogicoUsuario($data)
    {
        $query  = "UPDATE usuario SET estado = 2 WHERE cod_usu = '" . $data['cod_usu'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Edita Usuario
    public function editaUsuario($data)
    {
        $query  = "UPDATE usuario SET nom_usu = '".$data["nom_usu"]."', cc_usu = '".$data["cc_usu"]."' , dir_usu = '".$data["dir_usu"]."', tel_usu = '".$data["tel_usu"]."',log_usu = '" . $data['log_usu'] . "', pas_usu = '".$data["pas_usu"]."', car_usu = '".$data["car_usu"]."', cod_rol_usu = '".$data["cod_rol_usu"]."' WHERE cod_usu = '" . $data['cod_usu'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }
}