<!-- Modal -->
<div class="modal fade" id="usuarioModal" tabindex="-1" aria-labelledby="usuarioModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="usuarioModalLabel">Modal title</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_usuario" method="POST">
          <input type="hidden" id="cod_usu" name="cod_usu">
          <div class="mb-2">
            <input class="form-control" type="text" placeholder="Nombres (Obligatorio)" required id="nom_usu" name="nom_usu">
          </div>
          <div class="mb-2">
            <input class="form-control" type="email" placeholder="Correo (Obligatorio)" required id="dir_usu" name="dir_usu">
          </div>
          <div class="mb-2">
            <input class="form-control" type="text" placeholder="Cédula (Obligatorio)" required id="cc_usu" name="cc_usu">
          </div>
          <div class="mb-2">
            <input class="form-control" type="text" placeholder="Login (Obligatorio)" required id="log_usu" name="log_usu">
          </div>
          <div class="mb-2">
            <input class="form-control" type="password" placeholder="Password (Obligatorio)" required id="pas_usu" name="pas_usu">
          </div>
          <div class="mb-2">
            <div class="form-floating">
              <select class="form-select" id="car_usu" name="car_usu" required="true">
                <?php $usuarioController->getSelectCargo();?>
              </select>
              <label for="floatingSelect">Cargo (Obligatorio)</label>
            </div>
          </div>
          <div class="mb-2">
            <div class="form-floating">
              <select class="form-select" id="cod_rol_usu" name="cod_rol_usu" required="true">
                <?php $usuarioController->getSelectRol();?>
              </select>
              <label for="floatingSelect">Rol (Obligatorio)</label>
            </div>
          </div>
          <div class="mb-2">
            <input class="form-control" type="text" placeholder="Telefonos" aria-label="default input example" id="tel_usu" name="tel_usu">
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_usuario">Guardar</button>
              <button class="btn btn-success" id="btn_guardando" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Guardando...
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarModalLabel">Eliminar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar el registro?
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" id="btn_cancelar">Cancelar</button>
        <button type="button" class="btn btn-danger" id="btn_eliminar_usuario" name="btn_eliminar_usuario">Eliminar</button>
        <button class="btn btn-danger" id="btn_eliminando" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Eliminando...
        </button>
      </div>
    </div>
  </div>
</div>