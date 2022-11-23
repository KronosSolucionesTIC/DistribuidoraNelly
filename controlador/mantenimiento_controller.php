<?php
include dirname(__file__, 2) . '/modelo/mantenimiento.php';

class mantenimientoController extends mantenimiento
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaMantenimiento($permisos)
    {
        $mantenimiento      = new Mantenimiento();
        $listaMantenimiento = $mantenimiento->getMantenimiento();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaMantenimiento)) {
                for ($i = 0; $i < sizeof($listaMantenimiento); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer">' . $listaMantenimiento[$i]["consecutivo_equipo"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaMantenimiento[$i]["equipo"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaMantenimiento[$i]["fecha_mantenimientos"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaMantenimiento[$i]["desc_est_arrend_equipo"] . '</td>';
                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-target="#mantenimientoModal" data-bs-toggle="modal" name="btn_editar" data-id-mantenimiento="' . $listaMantenimiento[$i]["cod_mantenimientos"] . '"><i class="fa-solid fa-pen-to-square"></i></button></td>';
                    }
                    if ($permisos[0]["eli_per"] == 1) {
                        echo '<td class="text-center"> <button type="button" class="btn btn-danger" name="btn_eliminar" data-id-mantenimiento="' . $listaMantenimiento[$i]["cod_mantenimientos"] . '" data-bs-toggle="modal" data-bs-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen mantenimientos</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }

    }

    //Funcion para lista desplegable del equipo
    public function getSelectEquipo()
    {
        //Instancia del mantenimiento
        $mantenimiento = new Mantenimiento();
        //Lista del menu Nivel 1
        $listaMantenimiento = $mantenimiento->getEquipos();
        //Se recorre array de nivel 1
        if (isset($listaMantenimiento)) {
            echo '<option value="0" selected>Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaMantenimiento); $i++) {
                $seleccionado = "";
                echo '<option value="' . $listaMantenimiento[$i]["cod_equipo"] . '" ' . $seleccionado . '>' . $listaMantenimiento[$i]["equipo"] . '</option>';
            }
        }
    }

   //Select estado
    public function getSelectEstado()
    {
        //Instancia del mantenimiento
        $mantenimiento = new Mantenimiento();
        //Lista del menu Nivel 1
        $listaMantenimiento = $mantenimiento->getEstado();
        //Se recorre array de nivel 1
        if (isset($listaMantenimiento)) {
            for ($i = 0; $i < sizeof($listaMantenimiento); $i++) {
                $seleccionado = "";
                echo '<option value="' . $listaMantenimiento[$i]["cod_est_arrend_equipo"] . '" ' . $seleccionado . '>' . $listaMantenimiento[$i]["desc_est_arrend_equipo"] . '</option>';
            }
        }
    }
}