                    <div class="row">
                        <div class="alert alert-secondary text-center" role="alert">
                          <strong>Garantia</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                              <input type="number" class="form-control" id="cant_garantia" name="cant_garantia" required="true" value="<?php if($cod_equipo != "") { echo $datosEquipo[0]["cant_garantia"] ; }?>">
                              <label for="floatingInput">Tiempo en meses</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="fecha_ini_garantia" name="fecha_ini_garantia" required="true" value="<?php if($cod_equipo != "") { echo $datosEquipo[0]["fecha_ini_garantia"] ; }?>">
                                <label for="floatingInput">Fecha compra</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="fecha_fin_garantia" name="fecha_fin_garantia" value="<?php if($cod_equipo != "") { echo $datosEquipo[0]["fecha_fin_garantia"] ; }?>" required="true">
                                <label for="floatingInput">Fecha fin</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="alert alert-secondary text-center" role="alert">
                          <strong>Motor</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                              <input type="number" class="form-control" id="numero_motor" name="numero_motor" value="<?php if($cod_equipo != "") { echo $datosEquipo[0]["numero_motor"] ; }?>">
                              <label for="floatingInput">Numero</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="marca_motor" name="marca_motor" value="<?php if($cod_equipo != "") { echo $datosEquipo[0]["marca_motor"] ; }?>">
                              <label for="floatingInput">Marca</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                              <input type="date" class="form-control" id="fecha_motor" name="fecha_motor" value="<?php if($cod_equipo != "") { echo $datosEquipo[0]["fecha_motor"] ; }?>">
                              <label for="floatingInput">Fecha</label>
                            </div>
                        </div>
                    </div>