<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<div class="card mb-3">
    <div class="card-header Naranja">Contenido</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 text-right mb-3">
                <?php 
                    if ($permisos[0]["ins_per"] == 1) {
                ?>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bajaModal"  id="btn_crear_baja">
                        Agregar baja
                    </button>
                <?php }?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-condensed table-bordered display" id="tablaBaja" style="width:100%">
                    <thead class="bg-gradient-info">
                        <tr class="text-center">
                            <th>
                                Consecutivo
                            </th>
                            <th>
                                Equipo
                            </th>
                            <th>
                                Fecha baja
                            </th>
                            <th>
                                Tipo baja
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $bajaController->getTablaBaja($permisos);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "../copyright.php";?>
<?php include "modal_baja.php";?>
<?php include "scripts.php";?>