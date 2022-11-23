                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table" id="tablaPartes">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="text-center">Parte</th>
                                            <th class="text-center">Tipo parte</th>
                                            <th class="text-center">Agregar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="mb-2">
                                                    <div class="form-floating">
                                                      <select class="form-select" id="cod_parte" name="cod_parte">
                                                        <?php if($cod_equipo == "") { ?>
                                                            <option selected value="0">Seleccione una clase...</option>
                                                        <?php } else { 
                                                            $equipoController->getSelectParte($datosEquipo[0]);
                                                        }?>
                                                      </select>
                                                      <label for="floatingSelect">Parte</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="mb-2">
                                                    <div class="form-floating">
                                                      <select class="form-select" id="cod_tipo_parte" name="cod_tipo_parte">
                                                        <option selected value="">Seleccione una parte...</option>
                                                      </select>
                                                      <label for="floatingSelect">Tipo parte</label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary w-100" id="agregarPartes"><i class="fa-solid fa-plus"></i></button>
                                            </td>
                                        </tr>
                                        <?php 
                                            if($cod_equipo != ""){ 
                                                $listaPartes = $equipoController->listaPartes($cod_equipo);
                                                    for($i=0; $i< sizeof($listaPartes); $i++){
                                        ?>
                                            <tr id="<?php echo $i; ?>">
                                                <td>
                                                    <input type="hidden" name="<?php echo 'cod_parte_'.$i ?>" value="<?php echo $listaPartes[$i]["cod_parte"]; ?>"><?php echo $listaPartes[$i]["desc_partes"];?>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="<?php echo 'cod_tipo_parte_'.$i ?>" value="<?php echo $listaPartes[$i]["cod_tipo_parte"]; ?>"><?php echo $listaPartes[$i]["desc_tipo_partes"];?>
                                                </td>
                                                <td>
                                                    <button type="button" id="<?php echo 'btn_'.$i ?>" data-parte="<?php echo $listaPartes[$i]["cod_parte"]; ?>" data-tipo-parte="<?php echo $listaPartes[$i]["cod_tipo_parte"]; ?>" class="btn btn-primary w-100" onclick="quitarPartes(<?php echo $i?>)"><i class="fa-solid fa-minus"></i></button>
                                                </td>
                                            </tr>
                                        <?php 
                                                }
                                            } 
                                        ?>
                                    </tbody>
                                    <input type="hidden" id="contador" name="contador" value="<?php if($cod_equipo != ""){ echo $i; } else { echo '0'; }?>">
                                </table>
                            </div>
                        </div>
                    </div>