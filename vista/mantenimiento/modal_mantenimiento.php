<!-- Modal -->
<div class="modal fade" id="mantenimientoModal" tabindex="-1" aria-labelledby="mantenimientoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="mantenimientoModalLabel">Modal title</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_mantenimiento" method="POST">
          <input type="hidden" id="cod_mantenimientos" name="cod_mantenimientos">
          <div class="row">
            <div class="mb-2">
              <div class="form-floating">
                <select class="form-select" id="equipo_mantenimientos" name="equipo_mantenimientos" required="true">
                  <?php $mantenimientoController->getSelectEquipo();?>
                </select>
                <label for="floatingSelect">Equipo (Obligatorio)</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="fecha_mantenimientos" name="fecha_mantenimientos" required="true">
                    <label for="floatingInput">Fecha mantenimiento (Obligatorio)</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="valor_mantenimientos" name="valor_mantenimientos">
                    <label for="floatingInput">Valor (Obligatorio)</label>
                </div>
            </div>
            <div class="col-md-4">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="estado_arrend_equipo" name="estado_arrend_equipo" required="true">
                    <?php $mantenimientoController->getSelectEstado();?>
                  </select>
                  <label for="floatingSelect">Estado (Obligatorio)</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_mantenimiento">Guardar</button>
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
        <h5 class="modal-title" id="eliminarModalLabel">Eliminar mantenimiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar el registro?
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" id="btn_cancelar">Cancelar</button>
        <button type="button" class="btn btn-danger" id="btn_eliminar_mantenimiento" name="btn_eliminar_mantenimiento">Eliminar</button>
        <button class="btn btn-danger" id="btn_eliminando" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Eliminando...
        </button>
      </div>
    </div>
  </div>
</div>