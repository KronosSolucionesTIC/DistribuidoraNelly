<?php
include dirname(__file__, 2) . '/modelo/tipo_partes.php';

class tipo_partesController extends tipo_partes
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaTipo_partes($permisos)
    {
        $tipo_partes      = new Tipo_partes();
        $listaTipo_partes = $tipo_partes->getTipo_partes();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaTipo_partes)) {
                for ($i = 0; $i < sizeof($listaTipo_partes); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer">' . $listaTipo_partes[$i]["nom_clase"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaTipo_partes[$i]["nombre"] . '</td>';
                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-target="#tipo_partesModal" data-bs-toggle="modal" name="btn_editar" data-id-tipo_partes="' . $listaTipo_partes[$i]["cod_tipo_partes"] . '"><i class="fa-solid fa-pen-to-square"></i></button></td>';
                    }
                    if ($permisos[0]["eli_per"] == 1) {
                        echo '<td class="text-center"> <button type="button" class="btn btn-danger" name="btn_eliminar" data-id-tipo_partes="' . $listaTipo_partes[$i]["cod_tipo_partes"] . '" data-bs-toggle="modal" data-bs-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen tipo_partess</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }

    }

    //Funcion para lista desplegable de las partes
    public function getSelectParte()
    {
        //Instancia del partes
        $tipo_partes = new Tipo_partes();
        //Lista del menu Nivel 1
        $listaPartes = $tipo_partes->getPartes();
        //Se recorre array de nivel 1
        if (isset($listaPartes)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaPartes); $i++) {
                //Valida si es el valor
                if ($valor == $listaPartes[$i]["cod_partes"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaPartes[$i]["cod_partes"] . '" ' . $seleccionado . '>' . $listaPartes[$i]["nombre"] . '</option>';
            }
        }
    }
}