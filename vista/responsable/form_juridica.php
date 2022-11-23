                <div id="divJuridica">
                    <div class="row">
                        <div class="alert alert-secondary text-center" role="alert">
                          <strong>Datos responsable juridica</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="NIT (Obligatorio)" id="nit_jur" name="nit_jur">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Razon social (Obligatorio)" id="rsocial_jur" name="rsocial_jur">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Dirección" id="dir_jur" name="dir_jur">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <div class="form-floating">
                              <select class="form-select" id="ciudad_jur" name="ciudad_jur">
                                <?php $responsableController->getSelectCiudad();?>
                              </select>
                              <label for="floatingSelect">Ciudad</label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Barrio" id="barrio_jur" name="barrio_jur">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Teléfono" id="telefono_jur" name="telefono_jur">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Celular" id="celular_jur" name="celular_jur">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="email" placeholder="Email" id="email_jur" name="email_jur">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="alert alert-secondary text-center" role="alert">
                        <strong>Datos representante legal</strong>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Representante legal"  id="repre_legal" name="repre_legal">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Identificación" id="cedula_representante" name="cedula_representante">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Dirección" id="direccion_repre" name="direccion_repre">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Teléfono" id="tel_repre" name="tel_repre">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="text" placeholder="Celular"  id="celu_repre" name="celu_repre">
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="mb-2">
                            <input class="form-control" type="email" placeholder="Email"  id="email_repres" name="email_repres">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-2">
                            <div class="form-floating">
                              <select class="form-select" id="ciudad_repre" name="ciudad_repre">
                                <?php $responsableController->getSelectCiudad();?>
                              </select>
                              <label for="floatingSelect">Ciudad</label>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>