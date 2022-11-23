<!-- Modal -->
<div class="modal fade" id="pagoAdelantadoModal" tabindex="-1" aria-labelledby="pagoAdelantadoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="pagoAdelantadoModalLabel">Modal title</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_pago" method="POST">
          <input type="hidden" id="cod_calc" name="cod_calc">
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-secondary" role="alert">Pagos adelantados</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="cliente" name="cliente" required="true">
                    <?php $pagoAdelantadoController->getSelectCliente();?>
                  </select>
                  <label for="floatingSelect">Cliente (Obligatorio)</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="contrato" name="contrato" required="true">
                    <option value="0">Seleccione un cliente...</option>
                  </select>
                  <label for="floatingSelect">Contrato (Obligatorio)</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-floating mb-2">
                <input type="date" class="form-control" id="fecha_actual" name="fecha_actual" required="true" disabled value="<?php echo date('Y-m-d'); ?>">
                <label for="floatingInput">Fecha actual</label>
              </div>  
            </div>
            <div class="col-md-4">
              <div class="form-floating mb-2">
                <input type="date" class="form-control" id="fech_factura" name="fech_factura" required="true">
                <label for="floatingInput">Fecha factura (Obligatorio)</label>
              </div> 
            </div>
            <div class="col-md-4">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="forma_pago" name="forma_pago" required="true">
                    <?php $pagoAdelantadoController->getSelectFormaPagoAdelantado();?>
                  </select>
                  <label for="floatingSelect">Forma pago (Obligatorio)</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="valor" name="valor" value="0" required="true">
                <label for="floatingInput">Valor recibido (Obligatorio)</label>
              </div>
            </div>
            <div class="col-md-6">
              <button class="btn btn-primary w-100" style="height: 75%;" id="calcular_cuotas">calcular cuotas</button>
            </div>
          </div> 
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table id="tablaCuotas" class="table"></table>
              </div>
            </div>
          </div>         
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_pago">Guardar</button>
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