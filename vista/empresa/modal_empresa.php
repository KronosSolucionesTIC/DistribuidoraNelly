<!-- Modal -->
<div class="modal fade" id="empresaModal" tabindex="-1" aria-labelledby="empresaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="empresaModalLabel">Modal title</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_empresa" method="POST">
          <input type="hidden" id="cod_jmc" name="cod_jmc">
          <div class="mb-2">
            <input class="form-control" type="text" placeholder="Nombre (Obligatorio)" required id="nom_jmc" name="nom_jmc">
          </div>
          <div class="mb-2">
            <input class="form-control" type="text" placeholder="NIT (Obligatorio)" required id="nit_jmc" name="nit_jmc">
          </div>
          <div class="mb-2">
            <input class="form-control" type="text" placeholder="Dirección" id="dir_jmc" name="dir_jmc">
          </div>
          <div class="mb-2">
            <input class="form-control" type="text" placeholder="Teléfono" id="tel_jmc" name="tel_jmc">
          </div>
          <div class="mb-2">
            <input class="form-control" type="text" placeholder="Pagina" id="pag_jmc" name="pag_jmc">
          </div>
          <div class="mb-2">
            <input class="form-control" type="email" placeholder="Email" id="mail_jmc" name="mail_jmc">
          </div>
          <div class="mb-2">
            <input class="form-control" type="text" placeholder="FAX" id="fax_jmc" name="fax_jmc">
          </div>
          <div class="mb-2">
            <input class="form-control" type="text" placeholder="Lugar" id="lugar_jmc" name="lugar_jmc">
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_empresa">Guardar</button>
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