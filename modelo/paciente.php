<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Paciente
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los pacientees
    public function getPaciente()
    {
        $query  = "SELECT cod_pac, CONCAT(nom1_pac,' ',nom2_pac,' ',apel1_pac,' ',apel2_pac) AS nombre, cedula_pac, direccion_pac, telefono_pac, celular_pac  FROM paciente 
                ORDER BY cod_pac DESC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Cliente
    public function getCliente()
    {
        $query  = "SELECT cod_cli, IF(tipo_persona = 2, CONCAT(nom1_cli,' - ',cedula_cli), CONCAT(apel1_cli,' ',apel2_cli,' ',nom1_cli,' ',nom2_cli,' - ',cedula_cli)) AS nombre FROM cliente
                ORDER BY nombre ASC;";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Parentesco
    public function getParentesco()
    {
        $query  = "SELECT cod_parent, desc_parent FROM parentesco ORDER BY desc_parent";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Tipo empleado
    public function getTipoEmpleado()
    {
        $query  = "SELECT cod_tipo_empleado, nom_tipo_empleado FROM tipo_empleado
                ORDER BY nom_tipo_empleado";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae ciudad
    public function getCiudad()
    {
        $query  = "SELECT cod_ciu, nom_ciu FROM ciudad ORDER BY nom_ciu";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae tipo edad
    public function getTipoEdad()
    {
        $query  = "SELECT cod_tipo_edad, desc_tipo_edad FROM tipo_edad";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo paciente
    public function insertaPaciente($data)
    {
        $query  = "INSERT INTO `paciente` (nom1_pac, nom2_pac, apel1_pac, apel2_pac, cedula_pac, tipo_empleo_pac, direccion_pac, telefono_pac, ciudad_pac, celular_pac, edad_pac, cod_tipo_edad, fecha_ingreso, cod_cliente, cod_parentesco) VALUES ('" . $data['nom1_pac']  . "', '" . $data['nom2_pac']  . "', '" . $data['apel1_pac']  . "', '" . $data['apel2_pac']  . "', '" . $data['cedula_pac']  . "', '" . $data['tipo_empleo_pac']  . "' , '" . $data['direccion_pac']  . "' , '" . $data['telefono_pac']  . "' , '" . $data['ciudad_pac']  . "', '" . $data['celular_pac']  . "', '" . $data['edad_pac']  . "', '" . $data['cod_tipo_edad']  . "', '". date('Y-m-d'). "', '" . $data['cod_cliente']  . "', '" . $data['cod_parentesco']  . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Traer un paciente registrados
    public function consultaPaciente($data)
    {
        $query = "SELECT cod_pac, nom1_pac, nom2_pac, apel1_pac, apel2_pac, cedula_pac, tipo_empleo_pac, direccion_pac, telefono_pac, ciudad_pac, celular_pac, edad_pac, cod_tipo_edad, fecha_ingreso, cod_cliente, cod_parentesco FROM paciente
                WHERE cod_pac = '" . $data['cod_pac'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita Paciente
    public function editaPaciente($data)
    {
        $query  = "UPDATE paciente SET nom1_pac = '".$data["nom1_pac"]."',nom2_pac = '".$data["nom2_pac"]."',apel1_pac = '".$data["apel1_pac"]."',apel2_pac = '".$data["apel2_pac"]."', cedula_pac = '".$data["cedula_pac"]."',tipo_empleo_pac = '".$data["tipo_empleo_pac"]."',direccion_pac = '".$data["direccion_pac"]."', telefono_pac = '".$data["telefono_pac"]."', ciudad_pac = '".$data["ciudad_pac"]."', edad_pac = '".$data["edad_pac"]."', celular_pac = '".$data["celular_pac"]."', cod_tipo_edad = '".$data["cod_tipo_edad"]."', cod_cliente = '".$data["cod_cliente"]."', cod_parentesco = '".$data["cod_parentesco"]."'  WHERE cod_pac = '" . $data['cod_pac'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }
}