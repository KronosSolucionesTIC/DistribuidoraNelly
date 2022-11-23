<!-- Modal -->
<div class="modal fade" id="entregaModal" tabindex="-1" aria-labelledby="entregaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="entregaModalLabel">Modal title</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_entrega" method="POST">
          <input type="hidden" id="cod_calc" name="cod_calc">
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-secondary" role="alert">Entregas</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="cliente" name="cliente" required="true">
                    <?php $entregaController->getSelectCliente();?>
                  </select>
                  <label for="floatingSelect">Cliente (Obligatorio)</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="cod_contrato" name="cod_contrato" required="true">
                    <option value="0">Seleccione un cliente...</option>
                  </select>
                  <label for="floatingSelect">Contrato (Obligatorio)</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-floating mb-2">
                <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega" required="true" value="<?php echo date('Y-m-d'); ?>">
                <label for="floatingInput">Fecha entrega (Obligatorio)</label>
              </div>  
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-2">
                <input type="text" class="form-control" id="observaciones" name="observaciones">
                <label for="floatingInput">Observaciones</label>
              </div> 
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table id="tablaEquipos" class="table"></table>
              </div>
            </div>
          </div>         
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_entrega">Guardar</button>
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