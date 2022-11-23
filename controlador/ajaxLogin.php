<?php
include dirname(__file__, 2) . '/modelo/login.php';

$login = new Login();
$tipo     = $_POST['tipo'];

//Request: Ingresar
if (isset($_POST['Ingresar'])) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $secretKey = "6Lcbth0iAAAAAOK5t83hbTH06RyTZmUwbKUDHCcs";

    $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha&remoteip=$ip");

    $atributos = json_decode($respuesta, TRUE);

    if(!$atributos['success']){
        header('location: ../vista/login/index.php?captcha=false');
    } else {
        $login = new Login();
        if ($login->getUserByNickname($_POST['username'])) {
            if ($login->getPass($_POST['username'], $_POST['passwd'])) {
                $datosUsuario = $login->getUserByNickname($_POST['username']);
                session_start(); //Registra la sesion
                $_SESSION['cod_usu'] = $datosUsuario[0]["cod_usu"];
                header('location: ../vista/index.php');
            } else {
                header('location: ../vista/login/index.php?pass=false');
            }
        } else {
            header('location: ../vista/login/index.php?existe=false');
        }
    }
}