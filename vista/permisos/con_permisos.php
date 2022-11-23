<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<div class="card mb-3">
    <div class="card-header Naranja">Contenido</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-condensed table-bordered display" id="tablaPermisos" style="width:100%">
                    <thead class="bg-gradient-info">
                        <tr class="text-center">
                            <th>
                                Rol
                            </th>
                            <?php if ($permisos[0]["edi_per"] == 1) { ?>
                            <th>
                                Opciones
                            </th>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $permisosController->getTablaPermisos($permisos);?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "../copyright.php";?>
<?php include "scripts.php";?>