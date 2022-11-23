<?php
include "../sesion.php";

include '../../controlador/tipo_partes_controller.php';
include '../../controlador/login_controller.php';
$loginController = new LoginController();
$permisos     = $loginController->Permisos($idUsuario, 65);
$tipo_partesController = new Tipo_partesController();
?>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <?php include "../menu.php"; ?>
      </div>
      <div class="col-sm-9">
        <?php include "con_tipo_partes.php"; ?>
      </div>
    </div>
  </div>
<?php include '../footer.php';?>