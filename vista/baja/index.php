<?php
include "../sesion.php";

include '../../controlador/baja_controller.php';
include '../../controlador/login_controller.php';
$loginController = new LoginController();
$permisos     = $loginController->Permisos($idUsuario, 75);
$bajaController = new BajaController();
?>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <?php include "../menu.php"; ?>
      </div>
      <div class="col-sm-9">
        <?php include "con_baja.php"; ?>
      </div>
    </div>
  </div>
<?php include '../footer.php';?>