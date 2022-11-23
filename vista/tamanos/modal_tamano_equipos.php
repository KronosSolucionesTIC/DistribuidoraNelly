<!-- Modal -->
<div class="modal fade" id="tamano_equiposModal" tabindex="-1" aria-labelledby="tamano_equiposModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="tamano_equiposModalLabel">Modal title</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_tamano_equipos" method="POST">
          <input type="hidden" id="cod_tam_equipos" name="cod_tam_equipos">
          <div class="mb-2">
            <div class="form-floating">
              <select class="form-select" id="cod_clase_equipos" name="cod_clase_equipos" required="true">
                <?php $tamano_equiposController->getSelectClase();?>
              </select>
              <label for="floatingSelect">Clase (Obligatorio)</label>
            </div>
          </div>
          <div class="mb-2">
            <input class="form-control" type="text" placeholder="Valor (Obligatorio)" required id="desc_tam_equipos" name="desc_tam_equipos">
          </div>
          <div class="mb-2">
            <div class="form-floating">
              <select class="form-select" id="cod_unidad" name="cod_unidad" required="true">
                <?php $tamano_equiposController->getSelectUnidad();?>
              </select>
              <label for="floatingSelect">Unidad (Obligatorio)</label>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_tamano_equipos">Guardar</button>
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
        <h5 class="modal-title" id="eliminarModalLabel">Eliminar tamano_equipos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar el registro?
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal" id="btn_cancelar">Cancelar</button>
        <button type="button" class="btn btn-danger" id="btn_eliminar_tamano_equipos" name="btn_eliminar_tamano_equipos">Eliminar</button>
        <button class="btn btn-danger" id="btn_eliminando" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Eliminando...
        </button>
      </div>
    </div>
  </div>
</div>