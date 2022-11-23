<!-- Modal -->
<div class="modal fade" id="contratoModal" tabindex="-1" aria-labelledby="contratoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="contratoModalLabel">Modal title</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_contrato" method="POST">
          <input type="hidden" id="cod_calc" name="cod_calc">
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-secondary" role="alert" id="divNumero"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="tipo_contrato" name="tipo_contrato" required="true">
                    <?php $contratoController->getSelectTipoContrato();?>
                  </select>
                  <label for="floatingSelect">Tipo contrato (Obligatorio)</label>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="cod_cliente" name="cod_cliente" required="true">
                    <?php $contratoController->getSelectCliente();?>
                  </select>
                  <label for="floatingSelect">Cliente (Obligatorio)</label>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="cod_responsable" name="cod_responsable">
                    <?php $contratoController->getSelectResponsable();?>
                  </select>
                  <label for="floatingSelect">Responsable (Obligatorio)</label>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="cod_paciente" name="cod_paciente" required="true">
                    <option value="0">Seleccione un cliente...</option>
                  </select>
                  <label for="floatingSelect">Paciente (Obligatorio)</label>
                </div>
              </div>
            </div>
          </div>
          <?php include "form_equipo.php"; ?>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_contrato">Guardar</button>
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