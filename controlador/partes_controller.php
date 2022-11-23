<?php
include dirname(__file__, 2) . '/modelo/partes.php';

class partesController extends partes
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaPartes($permisos)
    {
        $partes      = new Partes();
        $listaPartes = $partes->getPartes();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaPartes)) {
                for ($i = 0; $i < sizeof($listaPartes); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer">' . $listaPartes[$i]["nom_clase"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaPartes[$i]["desc_partes"] . '</td>';

                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-target="#partesModal" data-bs-toggle="modal" name="btn_editar" data-id-partes="' . $listaPartes[$i]["cod_partes"] . '"><i class="fa-solid fa-pen-to-square"></i></button></td>';
                    }
                    if ($permisos[0]["eli_per"] == 1) {
                        echo '<td class="text-center"> <button type="button" class="btn btn-danger" name="btn_eliminar" data-id-partes="' . $listaPartes[$i]["cod_partes"] . '" data-bs-toggle="modal" data-bs-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen partess</td>';
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
        $partes = new Partes();
        //Lista del menu Nivel 1
        $listaClase = $partes->getClases();
        //Se recorre array de nivel 1
        if (isset($listaClase)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaClase); $i++) {
                //Valida si es el valor
                if ($valor == $listaClase[$i]["cod_clase"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaClase[$i]["cod_clase"] . '" ' . $seleccionado . '>' . $listaClase[$i]["nom_clase"] . '</option>';
            }
        }
    }

    //Funcion para lista desplegable del si no
    public function getSelectSiNo()
    {
        //Instancia del partes
        $partes = new Partes();
        //Lista del menu Nivel 1
        $listaSiNo = $partes->getSiNo();
        //Se recorre array de nivel 1
        if (isset($listaSiNo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaSiNo); $i++) {
                //Valida si es el valor
                if ($valor == $listaSiNo[$i]["cod_si_no"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaSiNo[$i]["cod_si_no"] . '" ' . $seleccionado . '>' . $listaSiNo[$i]["nom_si_no"] . '</option>';
            }
        }
    }
}