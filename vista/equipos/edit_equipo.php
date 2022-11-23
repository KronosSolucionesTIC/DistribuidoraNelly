<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cod_equipo  = isset($_REQUEST['cod_equipo']) ? $_REQUEST['cod_equipo'] : "";
$datosEquipo = $equipoController->cargaEquipo($cod_equipo);
?>
<div class="card mb-3">
    <div class="card-header Naranja">Contenido</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form id="form_equipo" method="POST">
                    <input type="hidden" id="cod_equipo" name="cod_equipo" value="<?php echo $cod_equipo; ?>">
                    <div class="row">
                        <div class="alert alert-secondary text-center" role="alert">
                          <strong>Datos generales del equipo <?php if($cod_equipo != "") { echo $datosEquipo[0]["consecutivo_equipo"]; }?> </strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="mb-2">
                            <div class="form-floating">
                              <select class="form-select" id="clase_equipo" name="clase_equipo" required="true">
                                <?php $equipoController->getSelectClase($datosEquipo[0]["clase_equipo"]);?>
                              </select>
                              <label for="floatingSelect">Clase (Obligatorio)</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-2">
                            <div class="form-floating">
                              <select class="form-select" id="tipo_equipo" name="tipo_equipo" required="true">
                                <?php if($cod_equipo == "") { ?>
                                    <option selected value="0">Seleccione una clase...</option>
                                <?php } else { 
                                    $equipoController->getSelectTipo($datosEquipo[0], $datosEquipo[0]["tipo_equipo"]);
                                }?>
                              </select>
                              <label for="floatingSelect">Tipo (Obligatorio)</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-2">
                            <div class="form-floating">
                              <select class="form-select" id="tamano_equipo" name="tamano_equipo" required="true">
                                <?php if($cod_equipo == "") { ?>
                                    <option selected value="0">Seleccione una clase...</option>
                                <?php } else { 
                                    $equipoController->getSelectTamano($datosEquipo[0], $datosEquipo[0]["tamano_equipo"]);
                                }?>
                              </select>
                              <label for="floatingSelect">Tamaño (Obligatorio)</label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                              <input type="number" class="form-control" id="canon_arrend_equipo" name="canon_arrend_equipo" required="true" value="<?php if($cod_equipo != "") { echo $datosEquipo[0]["canon_arrend_equipo"] ; }?>">
                              <label for="floatingInput">Canon arrendamiento (obligatorio)</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                              <input type="number" class="form-control" id="valor_deposito" name="valor_deposito" value="<?php if($cod_equipo != "") { echo $datosEquipo[0]["valor_deposito"] ; }?>">
                              <label for="floatingInput">Valor deposito</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="nom_equipo" name="nom_equipo" value="<?php if($cod_equipo != "") { echo $datosEquipo[0]["nom_equipo"] ; }?>">
                              <label for="floatingInput">Nombre</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="desc_equipo" name="desc_equipo" value="<?php if($cod_equipo != "") { echo $datosEquipo[0]["desc_equipo"] ; }?>">
                              <label for="floatingInput">Descripción</label>
                            </div>
                        </div>
                    </div>
                    <?php include 'edit_partes.php'; ?>
                    <?php include 'edit_garantia.php'; ?>
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                            <button data-accion="<?php if($cod_equipo == ""){ echo 'crear';} else {echo 'editar';}?>" type="button" class="btn btn-success" id="btn_guardar_equipo">Guardar</button>
                            <button class="btn btn-success" id="btn_guardando" type="button" disabled hidden>
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
<?php include "../copyright.php";?>
<?php include "scripts.php";?>