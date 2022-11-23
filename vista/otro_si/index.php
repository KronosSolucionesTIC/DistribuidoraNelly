<?php
include "../sesion.php";

include '../../controlador/otro_si_controller.php';
include '../../controlador/login_controller.php';
$loginController = new LoginController();
$permisos     = $loginController->Permisos($idUsuario, 72);
$otro_siController = new Otro_siController();
?>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <?php include "../menu.php"; ?>
      </div>
      <div class="col-sm-9">
        <?php include "con_otro_si.php"; ?>
      </div>
    </div>
  </div>
<?php include '../footer.php';?>