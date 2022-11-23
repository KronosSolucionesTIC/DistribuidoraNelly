<!-- Modal -->
<div class="modal fade" id="informesModal" tabindex="-1" aria-labelledby="informesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="informesModalLabel">Formato de entrega</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="contenidoDetalle">
          <div class="table-responsive">
            <table id="tablaInforme" class="table">
              <thead class="bg-dark text-white">
                <th class="text-center">Clase</th>
                <th class="text-center">Alquilado</th>
                <th class="text-center">Libre</th>
                <th class="text-center">Mantenimiento</th>
                <th class="text-center">De baja</th>
                <th class="text-center">Total</th>
              </thead>
              <tr>
                <td class="text-center"><span class="equipo"></span></td>
                <td class="text-center"><span class="alquilado"></span></td>
                <td class="text-center"><span class="libre"></span></td>
                <td class="text-center"><span class="mantenimiento"></span></td>
                <td class="text-center"><span class="baja"></span></td>
                <td class="text-center"><span class="total"></span></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_imprimir">Imprimir</button>
      </div>
    </div>
  </div>
</div>