<?php
include "../sesion.php";

include '../../controlador/pago_controller.php';
include '../../controlador/login_controller.php';
$loginController = new LoginController();
$permisos     = $loginController->Permisos($idUsuario, 58);
$pagoController = new PagoController();
?>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <?php include "../menu.php"; ?>
      </div>
      <div class="col-sm-9">
        <?php include "con_pago.php"; ?>
      </div>
    </div>
  </div>
<?php include '../footer.php';?>