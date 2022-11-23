                <div id="divNatural">
                    <div class="row">
                        <div class="alert alert-secondary text-center" role="alert">
                          <strong>Datos responsable natural</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Primer nombre (Obligatorio)" id="nom1_cli" name="nom1_cli">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Segundo nombre" id="nom2_cli" name="nom2_cli">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Primer apellido (Obligatorio)" id="apel1_cli" name="apel1_cli">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Segundo apellido" id="apel2_cli" name="apel2_cli">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="number" placeholder="Identificación (Obligatorio)" id="cedula_cli" name="cedula_cli">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Dirección (Obligatorio)" id="direccion_cli" name="direccion_cli">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Teléfono (Obligatorio)" id="telefono_cli" name="telefono_cli">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="email" placeholder="Email" id="email_cli" name="email_cli">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Barrio" id="barrio_cli" name="barrio_cli">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Celular" id="celular_cli" name="celular_cli">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="mb-2">
                            <div class="form-floating">
                              <select class="form-select" id="tipo_empleo_cli" name="tipo_empleo_cli">
                                <?php $responsableController->getSelectTipoEmpleado();?>
                              </select>
                              <label for="floatingSelect">Empleado</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-2">
                            <div class="form-floating">
                              <select class="form-select" id="ciudad_cli" name="ciudad_cli">
                                <?php $responsableController->getSelectCiudad();?>
                              </select>
                              <label for="floatingSelect">Ciudad</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-2">
                            <div class="form-floating">
                              <select class="form-select" id="cod_mismo_paciente" name="cod_mismo_paciente">
                                <?php $responsableController->getSelectSiNo();?>
                              </select>
                              <label for="floatingSelect">¿Responsable es el mismo paciente?</label>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>