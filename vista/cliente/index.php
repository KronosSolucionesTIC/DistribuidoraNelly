<?php
include "../sesion.php";

include '../../controlador/cliente_controller.php';
include '../../controlador/login_controller.php';
$loginController = new LoginController();
$permisos     = $loginController->Permisos($idUsuario, 7);
$clienteController = new ClienteController();
?>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <?php include "../menu.php"; ?>
      </div>
      <div class="col-sm-9">
        <?php include "con_cliente.php"; ?>
      </div>
    </div>
  </div>
<?php include '../footer.php';?>