<?php
include dirname(__file__, 2) . '/modelo/venta.php';

class ventaController extends venta
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaVenta($permisos)
    {
        $venta      = new Venta();
        $listaVenta = $venta->getVenta();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaVenta)) {
                for ($i = 0; $i < sizeof($listaVenta); $i++) {
                    echo '<tr>';
                    echo '<td>' . $listaVenta[$i]["nombres_cliente"] . ' ' .$listaVenta[$i]["apellidos_cliente"].'</td>';
                    echo '<td>' . $listaVenta[$i]["descripcion_producto"] . '</td>';
                    echo '<td>' . $listaVenta[$i]["fecha_de_venta"] . '</td>';
                    echo '<td>' . $listaVenta[$i]["valor_unidad_venta"] . '</td>';
                    echo '<td>' . $listaVenta[$i]["cantidad_venta"] . '</td>';
                    echo '<td>' . $listaVenta[$i]["valor_unidad_venta"] . '</td>';
                    echo '<td>' . $listaVenta[$i]["valor_total_venta"] . '</td>';
                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-target="#ventaModal" data-bs-toggle="modal" name="btn_editar" data-id-venta="' . $listaVenta[$i]["codigo_venta"] . '"><i class="fa-solid fa-pen-to-square"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen ventas</td>';
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
        //Instancia de venta
        $venta = new Venta();
        //Lista del menu Nivel 1
        $listaTipo = $venta->getTipoPersona();
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
        //Instancia de venta
        $venta = new Venta();
        //Lista del menu Nivel 1
        $listaTipo = $venta->getTipoEmpleado();
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
        //Instancia del venta
        $venta = new Venta();
        //Lista del menu Nivel 1
        $listaSiNo = $venta->getSiNo();
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
        //Instancia de venta
        $venta = new Venta();
        //Lista del menu Nivel 1
        $listaTipo = $venta->getCiudad();
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