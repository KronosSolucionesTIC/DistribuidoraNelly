<!-- Modal -->
<div class="modal fade" id="clienteModal" tabindex="-1" aria-labelledby="clienteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="clienteModalLabel">Modal title</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_cliente" method="POST">
          <input type="hidden" id="cod_cli" name="cod_cli">
          <div class="mb-2">
            <div class="form-floating">
              <select class="form-select" id="tipo_persona" name="tipo_persona" required="true">
                <?php $clienteController->getSelectTipoPersona();?>
              </select>
              <label for="floatingSelect">Tipo cliente (Obligatorio)</label>
            </div>
          </div>
          <?php include 'form_natural.php' ?>
          <?php include 'form_juridica.php' ?>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_cliente">Guardar</button>
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