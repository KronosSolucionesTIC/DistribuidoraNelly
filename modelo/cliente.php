<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Cliente
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los clientees
    public function getCliente()
    {
        $query  = "SELECT cod_cli, nom1_cli, CONCAT(nom1_cli,' ',nom2_cli,' ',apel1_cli,' ',apel2_cli) AS nombre, cedula_cli, direccion_cli, telefono_cli, celular_cli, desc_tipo_persona,tipo_persona  FROM cliente 
                INNER JOIN tipo_persona ON tipo_persona.cod_tipo_persona = cliente.tipo_persona
                ORDER BY cod_cli DESC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo cliente
    public function insertaClienteNatural($data)
    {
        $query  = "INSERT INTO `cliente` (nom1_cli, nom2_cli, apel1_cli, apel2_cli, cedula_cli, tipo_empleo_cli, direccion_cli, telefono_cli, ciudad_cli, barrio_cli, celular_cli, email_cli, cod_mismo_paciente, tipo_persona, fecha_ingreso) VALUES ('" . $data['nom1_cli']  . "', '" . $data['nom2_cli']  . "', '" . $data['apel1_cli']  . "', '" . $data['apel2_cli']  . "', '" . $data['cedula_cli']  . "', '" . $data['tipo_empleo_cli']  . "' , '" . $data['direccion_cli']  . "' , '" . $data['telefono_cli']  . "' , '" . $data['ciudad_cli']  . "', '" . $data['barrio_cli']  . "', '" . $data['celular_cli']  . "', '" . $data['email_cli']  . "', '" . $data['cod_mismo_paciente']  . "', '1', '". date('Y-m-d'). "')";
        $result = mysqli_query($this->link, $query);
        if($data["cod_mismo_paciente"] == 1){
            $cliente = $this->getUltimoCliente();
            $this->insertaPaciente($data, $cliente);
        }
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Crea un nuevo cliente
    public function insertaClienteJuridica($data)
    {
        $query  = "INSERT INTO `cliente` (nom1_cli, cedula_cli, direccion_cli, telefono_cli, ciudad_cli, barrio_cli, celular_cli, email_cli, tipo_persona, repre_legal, cedula_representante, direccion_repre, tel_repre, celu_repre, email_repres, ciudad_repre, fecha_ingreso) VALUES ('" . $data['rsocial_jur']  . "', '" . $data['nit_jur']  . "', '" . $data['dir_jur']  . "' , '" . $data['telefono_jur']  . "' , '" . $data['ciudad_jur']  . "', '" . $data['barrio_jur']  . "', '" . $data['celular_jur']  . "', '" . $data['email_jur']  . "', '2', '" . $data['repre_legal']  . "', '" . $data['cedula_representante']  . "', '" . $data['direccion_repre']  . "','" . $data['tel_repre']  . "','" . $data['celu_repre']  . "','" . $data['email_repres']  . "','" . $data['ciudad_repre']  . "', '". date('Y-m-d'). "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Traer un cliente registrados
    public function consultaCliente($data)
    {
        $query = "SELECT cod_cli, nom1_cli, nom2_cli, apel1_cli, apel2_cli, cedula_cli, tipo_empleo_cli, direccion_cli, telefono_cli, ciudad_cli, barrio_cli, celular_cli, email_cli, cod_mismo_paciente, tipo_persona, repre_legal, cedula_representante, direccion_repre, tel_repre, celu_repre, email_repres, ciudad_repre, fecha_ingreso FROM cliente
                WHERE cod_cli = '" . $data['cod_cli'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita Cliente
    public function editaClienteNatural($data)
    {
        $query  = "UPDATE cliente SET nom1_cli = '".$data["nom1_cli"]."',nom2_cli = '".$data["nom2_cli"]."',apel1_cli = '".$data["apel1_cli"]."',apel2_cli = '".$data["apel2_cli"]."', cedula_cli = '".$data["cedula_cli"]."',tipo_empleo_cli = '".$data["tipo_empleo_cli"]."',direccion_cli = '".$data["direccion_cli"]."', telefono_cli = '".$data["telefono_cli"]."', ciudad_cli = '".$data["ciudad_cli"]."', barrio_cli = '".$data["barrio_cli"]."', celular_cli = '".$data["celular_cli"]."', email_cli = '".$data["email_cli"]."', cod_mismo_paciente = '".$data["cod_mismo_paciente"]."'  WHERE cod_cli = '" . $data['cod_cli'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Edita Cliente
    public function editaClienteJuridica($data)
    {
        $query  = "UPDATE cliente SET nom1_cli = '".$data["rsocial_jur"]."', cedula_cli = '".$data["nit_jur"]."',direccion_cli = '".$data["dir_jur"]."', telefono_cli = '".$data["telefono_jur"]."', ciudad_cli = '".$data["ciudad_jur"]."', barrio_cli = '".$data["barrio_jur"]."', celular_cli = '".$data["celular_jur"]."', email_cli = '".$data["email_jur"]."', repre_legal = '".$data["repre_legal"]."', cedula_representante = '".$data["cedula_representante"]."',direccion_repre = '".$data["direccion_repre"]."', tel_repre = '".$data["tel_repre"]."', celu_repre = '".$data["celu_repre"]."', email_repres = '".$data["email_repres"]."', ciudad_repre = '".$data["ciudad_repre"]."'  WHERE cod_cli = '" . $data['cod_cli'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Tipo persona
    public function getTipoPersona()
    {
        $query  = "SELECT cod_tipo_persona, desc_tipo_persona FROM tipo_persona
                ORDER BY desc_tipo_persona";
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

    //Crea un nuevo paciente
    public function insertaPaciente($data, $dataCliente)
    {
        $query  = "INSERT INTO `paciente` (nom1_pac, nom2_pac, apel1_pac, apel2_pac, cedula_pac, tipo_empleo_pac, direccion_pac, telefono_pac, ciudad_pac, celular_pac, fecha_ingreso, cod_cliente, cod_parentesco) VALUES ('" . $data['nom1_cli']  . "', '" . $data['nom2_cli']  . "', '" . $data['apel1_cli']  . "', '" . $data['apel2_cli']  . "', '" . $data['cedula_cli']  . "', '" . $data['tipo_empleo_cli']  . "' , '" . $data['direccion_cli']  . "' , '" . $data['telefono_cli']  . "' , '" . $data['ciudad_cli']  . "', '" . $data['celular_cli']  . "', '". date('Y-m-d'). "', '" . $dataCliente[0]['cod_cli']  . "', 0)";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta ultimo cliente
    public function getUltimoCliente(){
        $query  = "SELECT cod_cli FROM cliente ORDER BY cod_cli DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}