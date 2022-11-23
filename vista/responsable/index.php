<?php
include "../sesion.php";

include '../../controlador/responsable_controller.php';
include '../../controlador/login_controller.php';
$loginController = new LoginController();
$permisos     = $loginController->Permisos($idUsuario, 73);
$responsableController = new ResponsableController();
?>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <?php include "../menu.php"; ?>
      </div>
      <div class="col-sm-9">
        <?php include "con_responsable.php"; ?>
      </div>
    </div>
  </div>
<?php include '../footer.php';?>