<?php
include "../sesion.php";

include '../../controlador/mantenimiento_controller.php';
include '../../controlador/login_controller.php';
$loginController = new LoginController();
$permisos     = $loginController->Permisos($idUsuario, 39);
$mantenimientoController = new MantenimientoController();
?>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <?php include "../menu.php"; ?>
      </div>
      <div class="col-sm-9">
        <?php include "con_mantenimiento.php"; ?>
      </div>
    </div>
  </div>
<?php include '../footer.php';?>