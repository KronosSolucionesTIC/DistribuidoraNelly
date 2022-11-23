<!-- Modal -->
<div class="modal fade" id="consecutivoModal" tabindex="-1" aria-labelledby="consecutivoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="consecutivoModalLabel">Modal title</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_consecutivo" method="POST">
          <input type="hidden" id="cod_cons" name="cod_cons">
          <div class="mb-2">
            <input class="form-control" type="text" placeholder="Nombre (Obligatorio)" required id="form_cons" name="form_cons">
          </div>
          <div class="mb-2">
            <input class="form-control" type="text" placeholder="Letra (Obligatorio)" required id="letra_cons" name="letra_cons">
          </div>
          <div class="mb-2">
            <input class="form-control" type="number" placeholder="Número (Obligatorio)" required id="codigo_actual_cons" name="codigo_actual_cons">
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_consecutivo">Guardar</button>
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