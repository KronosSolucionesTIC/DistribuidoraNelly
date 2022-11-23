<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Responsable
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los responsablees
    public function getResponsable()
    {
        $query  = "SELECT cod_cli, nom1_cli, CONCAT(nom1_cli,' ',nom2_cli,' ',apel1_cli,' ',apel2_cli) AS nombre, cedula_cli, direccion_cli, telefono_cli, celular_cli, desc_tipo_persona,tipo_persona  FROM responsable 
                INNER JOIN tipo_persona ON tipo_persona.cod_tipo_persona = responsable.tipo_persona
                ORDER BY cod_cli DESC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo responsable
    public function insertaResponsableNatural($data)
    {
        $query  = "INSERT INTO `responsable` (nom1_cli, nom2_cli, apel1_cli, apel2_cli, cedula_cli, tipo_empleo_cli, direccion_cli, telefono_cli, ciudad_cli, barrio_cli, celular_cli, email_cli, cod_mismo_paciente, tipo_persona, fecha_ingreso) VALUES ('" . $data['nom1_cli']  . "', '" . $data['nom2_cli']  . "', '" . $data['apel1_cli']  . "', '" . $data['apel2_cli']  . "', '" . $data['cedula_cli']  . "', '" . $data['tipo_empleo_cli']  . "' , '" . $data['direccion_cli']  . "' , '" . $data['telefono_cli']  . "' , '" . $data['ciudad_cli']  . "', '" . $data['barrio_cli']  . "', '" . $data['celular_cli']  . "', '" . $data['email_cli']  . "', '" . $data['cod_mismo_paciente']  . "', '1', '". date('Y-m-d'). "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Crea un nuevo responsable
    public function insertaResponsableJuridica($data)
    {
        $query  = "INSERT INTO `responsable` (nom1_cli, cedula_cli, direccion_cli, telefono_cli, ciudad_cli, barrio_cli, celular_cli, email_cli, tipo_persona, repre_legal, cedula_representante, direccion_repre, tel_repre, celu_repre, email_repres, ciudad_repre, fecha_ingreso) VALUES ('" . $data['rsocial_jur']  . "', '" . $data['nit_jur']  . "', '" . $data['dir_jur']  . "' , '" . $data['telefono_jur']  . "' , '" . $data['ciudad_jur']  . "', '" . $data['barrio_jur']  . "', '" . $data['celular_jur']  . "', '" . $data['email_jur']  . "', '2', '" . $data['repre_legal']  . "', '" . $data['cedula_representante']  . "', '" . $data['direccion_repre']  . "','" . $data['tel_repre']  . "','" . $data['celu_repre']  . "','" . $data['email_repres']  . "','" . $data['ciudad_repre']  . "', '". date('Y-m-d'). "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Traer un responsable registrados
    public function consultaResponsable($data)
    {
        $query = "SELECT cod_cli, nom1_cli, nom2_cli, apel1_cli, apel2_cli, cedula_cli, tipo_empleo_cli, direccion_cli, telefono_cli, ciudad_cli, barrio_cli, celular_cli, email_cli, cod_mismo_paciente, tipo_persona, repre_legal, cedula_representante, direccion_repre, tel_repre, celu_repre, email_repres, ciudad_repre, fecha_ingreso FROM responsable
                WHERE cod_cli = '" . $data['cod_cli'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita Responsable
    public function editaResponsableNatural($data)
    {
        $query  = "UPDATE responsable SET nom1_cli = '".$data["nom1_cli"]."',nom2_cli = '".$data["nom2_cli"]."',apel1_cli = '".$data["apel1_cli"]."',apel2_cli = '".$data["apel2_cli"]."', cedula_cli = '".$data["cedula_cli"]."',tipo_empleo_cli = '".$data["tipo_empleo_cli"]."',direccion_cli = '".$data["direccion_cli"]."', telefono_cli = '".$data["telefono_cli"]."', ciudad_cli = '".$data["ciudad_cli"]."', barrio_cli = '".$data["barrio_cli"]."', celular_cli = '".$data["celular_cli"]."', email_cli = '".$data["email_cli"]."', cod_mismo_paciente = '".$data["cod_mismo_paciente"]."'  WHERE cod_cli = '" . $data['cod_cli'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Edita Responsable
    public function editaResponsableJuridica($data)
    {
        $query  = "UPDATE responsable SET nom1_cli = '".$data["rsocial_jur"]."', cedula_cli = '".$data["nit_jur"]."',direccion_cli = '".$data["dir_jur"]."', telefono_cli = '".$data["telefono_jur"]."', ciudad_cli = '".$data["ciudad_jur"]."', barrio_cli = '".$data["barrio_jur"]."', celular_cli = '".$data["celular_jur"]."', email_cli = '".$data["email_jur"]."', repre_legal = '".$data["repre_legal"]."', cedula_representante = '".$data["cedula_representante"]."',direccion_repre = '".$data["direccion_repre"]."', tel_repre = '".$data["tel_repre"]."', celu_repre = '".$data["celu_repre"]."', email_repres = '".$data["email_repres"]."', ciudad_repre = '".$data["ciudad_repre"]."'  WHERE cod_cli = '" . $data['cod_cli'] . "'";
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
}