<?php
include dirname(__file__, 2) . '/modelo/login.php';

class loginController extends login
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Trae datos del ussuario
    public function UsuarioLogin($id_usuario){
        $login     = new Login();
        $resultado = $login->getUsuariolog($id_usuario);
        return $resultado;
    }

    //Trae datos de los modulos
    public function VerModulo($id_usuario){
        $login     = new Login();
        $resultado = $login->getVerModulo($id_usuario);
        return $resultado;
    }   

    //Trae datos de las interfaces
    public function VerInterfaz($id_usuario,$id_modulo){
        $login     = new Login();
        $resultado = $login->getVerInterfaz($id_usuario, $id_modulo);
        return $resultado;
    } 

    //Trae los permisos
    public function Permisos($id_usuario, $id_interfaz){
        $login     = new Login();
        $resultado = $login->getPermisos($id_usuario, $id_interfaz);
        return $resultado;
    }  
}