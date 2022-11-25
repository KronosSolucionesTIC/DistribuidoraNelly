<?php
include dirname(__file__, 2) . '/modelo/inventario.php';

class inventarioController extends inventario
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaInventario($permisos)
    {
        $inventario      = new Inventario();
        $listaInventario = $inventario->getInventario();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaInventario)) {
                for ($i = 0; $i < sizeof($listaInventario); $i++) {
                    echo '<tr>';
                    echo '<td>' . $listaInventario[$i]["descripcion_producto"] . '</td>';
                    echo '<td>' . $listaInventario[$i]["cantidad_inventario"] . '</td>';
                    echo '<td>' . $listaInventario[$i]["fecha"] . '</td>';
                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-target="#inventarioModal" data-bs-toggle="modal" name="btn_editar" data-id-inventario="' . $listaInventario[$i]["codigo_inventario"] . '"><i class="fa-solid fa-pen-to-square"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen inventarios</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }

    //Select tipo persona
    public function getSelectTipoPersona()
    {
        //Instancia de inventario
        $inventario = new Inventario();
        //Lista del menu Nivel 1
        $listaTipo = $inventario->getTipoPersona();
        //Se recorre array de nivel 1
        if (isset($listaTipo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipo); $i++) {
                //Valida si es el valor
                if ($valor == $listaTipo[$i]["cod_tipo_persona"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaTipo[$i]["cod_tipo_persona"] . '" ' . $seleccionado . '>' . $listaTipo[$i]["desc_tipo_persona"] . '</option>';
            }
        }
    }

    //Select tipo empleado
    public function getSelectTipoEmpleado()
    {
        //Instancia de inventario
        $inventario = new Inventario();
        //Lista del menu Nivel 1
        $listaTipo = $inventario->getTipoEmpleado();
        //Se recorre array de nivel 1
        if (isset($listaTipo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipo); $i++) {
                //Valida si es el valor
                if ($valor == $listaTipo[$i]["cod_tipo_empleado"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaTipo[$i]["cod_tipo_empleado"] . '" ' . $seleccionado . '>' . $listaTipo[$i]["nom_tipo_empleado"] . '</option>';
            }
        }
    }

    //Funcion para lista desplegable del si no
    public function getSelectSiNo()
    {
        //Instancia del inventario
        $inventario = new Inventario();
        //Lista del menu Nivel 1
        $listaSiNo = $inventario->getSiNo();
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

    //Select ciudad
    public function getSelectCiudad()
    {
        //Instancia de inventario
        $inventario = new Inventario();
        //Lista del menu Nivel 1
        $listaTipo = $inventario->getCiudad();
        //Se recorre array de nivel 1
        if (isset($listaTipo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipo); $i++) {
                //Valida si es el valor
                if ($valor == $listaTipo[$i]["cod_ciu"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaTipo[$i]["cod_ciu"] . '" ' . $seleccionado . '>' . $listaTipo[$i]["nom_ciu"] . '</option>';
            }
        }
    }
}