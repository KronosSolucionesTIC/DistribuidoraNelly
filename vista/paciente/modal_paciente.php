<!-- Modal -->
<div class="modal fade" id="pacienteModal" tabindex="-1" aria-labelledby="pacienteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="pacienteModalLabel">Modal title</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_paciente" method="POST">
          <input type="hidden" id="cod_pac" name="cod_pac">
          <div class="row">
            <div class="alert alert-secondary text-center" role="alert">
              <strong>Datos paciente</strong>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="cod_cliente" name="cod_cliente" required="true">
                    <?php $pacienteController->getSelectCliente();?>
                  </select>
                  <label for="floatingSelect">Cliente (Obligatorio)</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="cod_parentesco" name="cod_parentesco" required="true">
                    <?php $pacienteController->getSelectParentesco();?>
                  </select>
                  <label for="floatingSelect">Parentesco (Obligatorio)</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="mb-2">
                <input class="form-control" type="text" placeholder="Primer nombre (Obligatorio)" id="nom1_pac" name="nom1_pac" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-2">
                <input class="form-control" type="text" placeholder="Segundo nombre" id="nom2_pac" name="nom2_pac">
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-2">
                <input class="form-control" type="text" placeholder="Primer apellido (Obligatorio)" id="apel1_pac" name="apel1_pac" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-2">
                <input class="form-control" type="text" placeholder="Segundo apellido" id="apel2_pac" name="apel2_pac">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="mb-2">
                <input class="form-control" type="text" placeholder="Numero identificación" id="cedula_pac" name="cedula_pac">
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-2">
                <input class="form-control" type="text" placeholder="Dirección (Obligatorio)" id="direccion_pac" name="direccion_pac" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-2">
                <input class="form-control" type="text" placeholder="Teléfono (Obligatorio)" id="telefono_pac" name="telefono_pac" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-2">
                <input class="form-control" type="text" placeholder="Celular" id="celular_pac" name="celular_pac">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="tipo_empleo_pac" name="tipo_empleo_pac">
                    <?php $pacienteController->getSelectTipoEmpleado();?>
                  </select>
                  <label for="floatingSelect">Empleado</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="ciudad_pac" name="ciudad_pac">
                    <?php $pacienteController->getSelectCiudad();?>
                  </select>
                  <label for="floatingSelect">Ciudad</label>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="mb-2">
                <input class="form-control" type="number" placeholder="Edad" id="edad_pac" name="edad_pac">
              </div>
            </div>
            <div class="col-md-2">
              <div class="mb-2">
                <div class="form-floating">
                  <select class="form-select" id="cod_tipo_edad" name="cod_tipo_edad">
                    <?php $pacienteController->getSelectTipoEdad();?>
                  </select>
                  <label for="floatingSelect">Tipo edad</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_paciente">Guardar</button>
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