<?php
include "../sesion.php";

include '../../controlador/permisos_controller.php';
include '../../controlador/login_controller.php';
$loginController = new LoginController();
$permisos     = $loginController->Permisos($idUsuario, 3);
$permisosController = new PermisosController();
?>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <?php include "../menu.php"; ?>
      </div>
      <div class="col-sm-9">
        <?php include "edit_permisos.php"; ?>
      </div>
    </div>
  </div>
<?php include '../footer.php';?>