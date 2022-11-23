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
                <table class="table table-hover table-condensed table-bordered display" id="tablaInformes" style="width:100%">
                    <thead class="bg-dark text-white">
                        <tr class="text-center">
                            <th colspan="3">
                                Informe pagos diario
                            </th>
                        </tr>
                    </thead>
                    <tr class="text-center">
                        <th>
                            Fecha inicial
                        </th>
                        <th>
                            Fecha final
                        </th>
                        <?php if ($permisos[0]["con_per"] == 1) { ?>
                        <th>
                            Informe
                        </th>
                        <?php }?>
                    </tr>
                    <tbody>
                        <tr>
                            <form id="form_informes">
                                <td>
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="fecha_inicial" name="fecha_inicial" required="true">
                                        <label for="floatingInput">Fecha inicial:</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="fecha_final" name="fecha_final" required="true">
                                        <label for="floatingInput">Fecha inicial:</label>
                                    </div>
                                </td>
                            </form>
                            <td><button type="button" class="btn btn-primary" id="btn_ver" data-bs-toggle="modal" data-bs-target="#informesModal"><i class="fa-solid fa-binoculars"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "../copyright.php";?>
<?php include "modal_informe.php";?>
<?php include "modal_detalle.php";?>
<?php include "modal_factura.php";?>
<?php include "scripts.php";?>