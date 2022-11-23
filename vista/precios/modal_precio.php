<!-- Modal -->
<div class="modal fade" id="precioModal" tabindex="-1" aria-labelledby="precioModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="precioModalLabel">Modal title</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_precio" method="POST">
          <input type="hidden" id="cod_precio" name="cod_precio">
          <div class="mb-2">
            <div class="form-floating">
              <select class="form-select" id="clase_equipo" name="clase_equipo" required="true">
                <?php $precioController->getSelectClase();?>
              </select>
              <label for="floatingSelect">Clase (Obligatorio)</label>
            </div>
          </div>
          <div class="mb-2">
            <div class="form-floating">
              <select class="form-select" id="tipo_equipo" name="tipo_equipo" required="true">
                Seleccione una clase...
              </select>
              <label for="floatingSelect">Tipo (Obligatorio)</label>
            </div>
          </div>
          <div class="mb-2">
            <input class="form-control" type="number" placeholder="Canon arrendamiento (Obligatorio)" required id="canon_arrend_equipo" name="canon_arrend_equipo">
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_precio">Guardar</button>
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