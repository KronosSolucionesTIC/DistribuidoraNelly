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
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="contenidoDetalle">
                    <table class="table table-hover table-condensed table-bordered display" id="tablaInformes" style="width:100%">
                        <thead class="bg-dark text-white">
                            <tr class="text-center">
                                <th colspan="9">
                                    Pagos cartera
                                </th>
                            </tr>
                        </thead>
                        <tr class="text-center">
                            <th>No identificación</th>
                            <th>Cliente</th>
                            <th>Contrato</th>
                            <th>Artículo</th>
                            <th>Descripción</th>
                            <th>0-30</th>
                            <th>31-60</th>
                            <th>61-90</th>
                            <th>+90</th>
                        </tr>
                        <tbody>
                            <?php $informesController->getTablaCartera($permisos); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "../copyright.php";?>
<?php include "scripts.php";?>