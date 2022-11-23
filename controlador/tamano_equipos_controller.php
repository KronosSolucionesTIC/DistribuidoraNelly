<?php
include dirname(__file__, 2) . '/modelo/tamano_equipos.php';

class tamano_equiposController extends tamano_equipos
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaTamano_equipos($permisos)
    {
        $tamano_equipos      = new Tamano_equipos();
        $listaTamano_equipos = $tamano_equipos->getTamano_equipos();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaTamano_equipos)) {
                for ($i = 0; $i < sizeof($listaTamano_equipos); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer">' . $listaTamano_equipos[$i]["nom_clase"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaTamano_equipos[$i]["desc_tam_equipos"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaTamano_equipos[$i]["desc_unidades"] . '</td>';
                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-target="#tamano_equiposModal" data-bs-toggle="modal" name="btn_editar" data-id-tamano_equipos="' . $listaTamano_equipos[$i]["cod_tam_equipos"] . '"><i class="fa-solid fa-pen-to-square"></i></button></td>';
                    }
                    if ($permisos[0]["eli_per"] == 1) {
                        echo '<td class="text-center"> <button type="button" class="btn btn-danger" name="btn_eliminar" data-id-tamano_equipos="' . $listaTamano_equipos[$i]["cod_tam_equipos"] . '" data-bs-toggle="modal" data-bs-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen tamano_equiposs</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }

    }

    //Funcion para lista desplegable de la clase
    public function getSelectClase()
    {
        //Instancia del partes
        $tamano_equipos = new Tamano_equipos();
        //Lista del menu Nivel 1
        $tamanoEquipos = $tamano_equipos->getClases();
        //Se recorre array de nivel 1
        if (isset($tamanoEquipos)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($tamanoEquipos); $i++) {
                //Valida si es el valor
                if ($valor == $tamanoEquipos[$i]["cod_clase"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $tamanoEquipos[$i]["cod_clase"] . '" ' . $seleccionado . '>' . $tamanoEquipos[$i]["nom_clase"] . '</option>';
            }
        }
    }

    //Funcion para lista desplegable de la unidad
    public function getSelectUnidad()
    {
        //Instancia del tamano equipos
        $tamano_equipos = new Tamano_equipos();
        //Lista del menu Nivel 1
        $tamanoEquipos = $tamano_equipos->getUnidades();
        //Se recorre array de nivel 1
        if (isset($tamanoEquipos)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($tamanoEquipos); $i++) {
                //Valida si es el valor
                if ($valor == $tamanoEquipos[$i]["cod_unidades"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $tamanoEquipos[$i]["cod_unidades"] . '" ' . $seleccionado . '>' . $tamanoEquipos[$i]["desc_unidades"] . '</option>';
            }
        }
    }
}