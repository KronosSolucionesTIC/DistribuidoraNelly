<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$idUsuario    = isset($_SESSION["cod_usu"]) ? $_SESSION["cod_usu"] : "";
if($idUsuario == ""){
  header("Location: https://armenia.ortopedicoswyw.com/vista/login/index.php");
  exit;
} else {
  $_SESSION["cod_usu"] = $idUsuario;
}

include '../head.php';
?>