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
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#partesModal"  id="btn_crear_partes">
                        Agregar partes
                    </button>
                <?php }?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-condensed table-bordered display" id="tablaPartes" style="width:100%">
                    <thead class="bg-gradient-info">
                        <tr class="text-center">
                            <th>
                                Categoria
                            </th>
                            <th>
                                Nombre
                            </th>
                            <?php if ($permisos[0]["edi_per"] == 1) { ?>
                            <th>
                                Editar
                            </th>
                            <?php }?>
                            <?php if ($permisos[0]["eli_per"] == 1) {?>
                            <th>
                                Eliminar
                            </th>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $partesController->getTablaPartes($permisos);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "../copyright.php";?>
<?php include "modal_partes.php";?>
<?php include "scripts.php";?>