<?php
include "../sesion.php";

include '../../controlador/tamano_equipos_controller.php';
include '../../controlador/login_controller.php';
$loginController = new LoginController();
$permisos     = $loginController->Permisos($idUsuario, 67);
$tamano_equiposController = new Tamano_equiposController();
?>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <?php include "../menu.php"; ?>
      </div>
      <div class="col-sm-9">
        <?php include "con_tamano_equipos.php"; ?>
      </div>
    </div>
  </div>
<?php include '../footer.php';?>