<!-- Modal -->
<div class="modal fade" id="equipoModal" tabindex="-1" aria-labelledby="equipoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="equipoModalLabel">Hoja de inventario</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="contenidoInventario">
          <table class="table table-borderless" id="tablaInventario" width="100%">
          </table>
          <table class="table table-bordered" id="tablaPartes" width="100%">
          </table>
          <table class="table table-borderless" id="tablaGarantia" width="100%">
          </table>
          <table class="table table-borderless" id="tablaEmpresa" width="100%">
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_imprimir">Imprimir</button>
      </div>
    </div>
  </div>
</div>