<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$idUsuario    = isset($_SESSION["cod_usu"]) ? $_SESSION["cod_usu"] : "";
if($idUsuario == ""){
  header("Location: login/index.php");
    exit;
} else {
    $_SESSION["cod_usu"] = $idUsuario;
}

include 'header.php';

include '../controlador/login_controller.php';
$loginController = new LoginController();
$datosUsuario = $loginController->UsuarioLogin($idUsuario);
?>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <?php include "menu.php"; ?>
      </div>
      <div class="col-sm-9">
        <div class="card mb-3">
          <div class="card-header Naranja Pacifico">Contenido</div>
            <div class="card-body text-center">
              <img class="img-fluid" src="../imagenes/copyrigth.jpg"> 
            </div>
          </div>
      </div>
    </div>
  </div>
<?php include 'footer.php';?>