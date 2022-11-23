<?php
include dirname(__FILE__, 2) . "/config/conexionLogin.php";
/**
 *
 */
class Login
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new ConexionLogin();
        $this->link = $this->conn->conectarse();
    }

    //Trae datos del usuario
    public function getUsuariolog($id_usuario)
    {
        $query = "SELECT cod_usu, nom_usu, car_usu, cc_usu, tel_usu, dir_usu, log_usu, pas_usu, ciu_usu, codig_usu, cod_rol_usu, estado FROM `usuario`
                WHERE cod_usu = '" . $id_usuario . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae la información de ver modulo
    public function getVerModulo($id_usuario)
    {
        $query  = "SELECT cod_mod,nom_mod FROM modulos
                INNER JOIN interfaz ON interfaz.cod_mod_int = modulos.cod_mod
                INNER JOIN permisos ON permisos.cod_int_per = interfaz.cod_int
                INNER JOIN rol ON rol.cod_rol = permisos.cod_usu_per
                INNER JOIN usuario ON usuario.cod_rol_usu = rol.cod_rol
                WHERE cod_usu = '" . $id_usuario . "'
                GROUP BY cod_mod";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
    
    //Obtiene el usuario por nickname
    public function getUserByNickname($usuarioNombre = null)
    {
        if (!empty($usuarioNombre)) {
            $query  = "SELECT cod_usu FROM usuario WHERE log_usu = '" . $usuarioNombre . "' AND estado=1";
            $result = mysqli_query($this->link, $query);
            $data   = array();
            while ($data[] = mysqli_fetch_assoc($result));
            array_pop($data);
            return $data;
        } else {
            return false;
        }
    }

    //Verifica contraseña
    public function getPass($usuarioNombre = null, $password = null)
    {
        
        if (!empty($usuarioNombre)) {
            if (!empty($password)) {
                $query  = "SELECT cod_usu FROM usuario WHERE log_usu ='" . $usuarioNombre . "' AND pas_usu='" . $password . "'";
                $result = mysqli_query($this->link, $query);
                $data   = array();
                while ($data[] = mysqli_fetch_assoc($result));
                array_pop($data);
                return $data;
            }
        } else {
            return false;
        }
    }

    //Trae la información de ver interfaz
    public function getVerInterfaz($id_usuario, $id_modulo)
    {
        $query  = "SELECT cod_int,nom_int, rut_int FROM interfaz
                INNER JOIN modulos ON modulos.cod_mod = interfaz.cod_mod_int
                INNER JOIN permisos ON permisos.cod_int_per = interfaz.cod_int
                INNER JOIN rol ON rol.cod_rol = permisos.cod_usu_per
                INNER JOIN usuario ON usuario.cod_rol_usu = rol.cod_rol
                WHERE cod_usu = '" . $id_usuario . "' AND cod_mod = '" . $id_modulo . "'
                GROUP BY cod_int";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los permisos
    public function getPermisos($id_usuario, $id_interfaz)
    {
        $query = "SELECT con_per, edi_per, eli_per, ins_per FROM permisos
                INNER JOIN rol ON rol.cod_rol = permisos.cod_usu_per
                INNER JOIN usuario ON usuario.cod_rol_usu = rol.cod_rol      
                WHERE cod_usu ='" . $id_usuario . "' and cod_int_per ='" . $id_interfaz . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}