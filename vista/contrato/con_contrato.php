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
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#contratoModal"  id="btn_crear_contrato">
                        Agregar contrato
                    </button>
                <?php }?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-condensed table-bordered display" id="tablaContrato" style="width:100%">
                    <thead class="bg-gradient-info">
                        <tr class="text-center">
                            <th>
                                #Contrato
                            </th>
                            <th>
                                Cliente
                            </th>
                            <th>
                                Paciente
                            </th>
                            <th>
                                Fecha inicio
                            </th>
                            <?php if ($permisos[0]["edi_per"] == 1) { ?>
                            <th>
                                Editar
                            </th>
                            <?php }?>
                            <?php if ($permisos[0]["con_per"] == 1) {?>
                            <th>
                                Contrato
                            </th>
                            <?php }?>
                            <?php if ($permisos[0]["con_per"] == 1) {?>
                            <th>
                                Entrega
                            </th>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contratoController->getTablaContrato($permisos);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "../copyright.php";?>
<?php include "modal_contrato.php";?>
<?php include "modal_detalle.php";?>
<?php include "modal_anexo.php";?>
<?php include "scripts.php";?>