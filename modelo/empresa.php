<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Empresa
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae los empresaes
    public function getEmpresa()
    {
        $query  = "SELECT cod_jmc, nom_jmc, nit_jmc, dir_jmc, tel_jmc, fax_jmc, pag_jmc, mail_jmc, lugar_jmc  FROM empresa";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Traer un empresa registrados
    public function consultaEmpresa($data)
    {
        $query = "SELECT cod_jmc, nom_jmc, nit_jmc, dir_jmc, tel_jmc, fax_jmc, pag_jmc, mail_jmc, lugar_jmc FROM empresa
                WHERE cod_jmc = '" . $data['cod_empresa'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita Empresa
    public function editaEmpresa($data)
    {
        $query  = "UPDATE empresa SET nom_jmc = '".$data["nom_jmc"]."', nit_jmc = '".$data["nit_jmc"]."', dir_jmc = '".$data["dir_jmc"]."', tel_jmc = '".$data["tel_jmc"]."',fax_jmc = '".$data["fax_jmc"]."', pag_jmc = '".$data["pag_jmc"]."', mail_jmc = '".$data["mail_jmc"]."', lugar_jmc = '".$data["lugar_jmc"]."' WHERE cod_jmc = '" . $data['cod_jmc'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }
}