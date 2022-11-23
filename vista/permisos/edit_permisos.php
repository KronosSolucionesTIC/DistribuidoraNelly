<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cod_rol  = isset($_REQUEST['cod_rol']) ? $_REQUEST['cod_rol'] : "";
?>
<div class="card mb-3">
    <div class="card-header Naranja">Contenido</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-condensed table-bordered display" id="tablaPermisos" style="width:100%">
                    <thead class="bg-gradient-info">
                        <tr class="text-center">
                            <th>Modulo</th>
                            <th>Interfaz</th>
                            <th>Consulta</th>
                            <th>Inserción</th>
                            <th>Edición</th>
                            <th>Eliminación</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th class="text-center"><button onclick="marcar('consulta')" id="consulta" value="Marcar" class="btn btn-primary">Marcar</button></th>
                            <th class="text-center"><button onclick="marcar('insercion')" id="insercion" value="Marcar" class="btn btn-primary">Marcar</button></th>
                            <th class="text-center"><button onclick="marcar('edicion')" id="edicion" value="Marcar" class="btn btn-primary">Marcar</button></th>
                            <th class="text-center"><button onclick="marcar('eliminacion')" id="eliminacion" value="Marcar" class="btn btn-primary">Marcar</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if($cod_rol == ""){
                                echo '<tr><td>No existen registros con este Rol</td></tr>';
                            } else {
                                $permisosController->getTablaModulos($permisos, $cod_rol);
                            }
                        ?>
                        <tr>
                            <td colspan="6" class="text-center"><button class="btn btn-success" onclick="eliminar_permisos(<?php echo $cod_rol ?>);">Guardar permisos</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "../copyright.php";?>
<?php include "scripts.php";?>