<?php
include "../sesion.php";

include '../../controlador/producto_controller.php';
include '../../controlador/login_controller.php';
$loginController = new LoginController();
$permisos     = $loginController->Permisos($idUsuario, 1);
$productoController = new ProductoController();
?>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <?php include "../menu.php"; ?>
      </div>
      <div class="col-sm-9">
        <?php include "con_producto.php"; ?>
      </div>
    </div>
  </div>
<?php include '../footer.php';?>