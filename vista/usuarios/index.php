<?php
include "../sesion.php";

include '../../controlador/usuario_controller.php';
include '../../controlador/login_controller.php';
$loginController = new LoginController();
$permisos     = $loginController->Permisos($idUsuario, 1);
$usuarioController = new UsuarioController();
?>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <?php include "../menu.php"; ?>
      </div>
      <div class="col-sm-9">
        <?php include "con_usuario.php"; ?>
      </div>
    </div>
  </div>
<?php include '../footer.php';?>