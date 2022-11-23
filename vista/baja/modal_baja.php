<!-- Modal -->
<div class="modal fade" id="bajaModal" tabindex="-1" aria-labelledby="bajaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="bajaModalLabel">Modal title</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_baja" method="POST">
          <input type="hidden" id="cod_bajas" name="cod_bajas">
          <div class="row">
            <div class="mb-2">
              <div class="form-floating">
                <select class="form-select" id="equipo_baja" name="equipo_baja" required="true">
                  <?php $bajaController->getSelectEquipo();?>
                </select>
                <label for="floatingSelect">Equipo (Obligatorio)</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="fecha_baja" name="fecha_baja" required="true">
                    <label for="floatingInput">Fecha baja (Obligatorio)</label>
                </div>
            </div>
            <div class="col-md-4">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="tipo_baja" name="tipo_baja" required="true">
                    <?php $bajaController->getSelectTipo();?>
                  </select>
                  <label for="floatingSelect">Tipo de baja (Obligatorio)</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="observaciones_baja" name="observaciones_baja">
                    <label for="floatingInput">Observaciones (Obligatorio)</label>
                </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_baja">Guardar</button>
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