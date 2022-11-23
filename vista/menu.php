        <div class="card">
          <div class="card-header Naranja">
            Menu del sistema
          </div>
          <div class="card-body">
            <?php
              $vermodulo = $loginController->VerModulo($idUsuario);
              foreach ($vermodulo as $key => $value) {
            ?>
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="<?php echo 'heading'.$value['cod_mod']; ?>">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="<?php echo '#collapse'.$value['cod_mod']; ?>" aria-expanded="true" aria-controls="<?php echo 'collapse'.$value['cod_mod']; ?>">
                    <?php echo $value["nom_mod"] ?>
                  </button>
                </h2>
                <div id="<?php echo 'collapse'.$value['cod_mod']; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo 'heading'.$value['cod_mod']; ?>" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <ul class="list-group list-group-flush">
                      <?php
                        $verInterfaz = $loginController->VerInterfaz($idUsuario, $value["cod_mod"]);
                        foreach ($verInterfaz as $llave => $valor) {
                      ?>
                          <li class="list-group-item">
                            <strong>
                              <a href="<?php echo $valor['rut_int']; ?>">
                                <?php echo $valor["nom_int"]; ?>
                              </a>
                            </strong>
                          </li>                      
                      <?php
                        }
                      ?>   
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <?php 
              }
            ?>
          </div>
          <div class="card-footer text-muted">
            <button id="btn_cerrar_sesion" class="btn btn-danger">Salir</button>            
          </div>
        </div>