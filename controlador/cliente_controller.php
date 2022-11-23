<?php
include dirname(__file__, 2) . '/modelo/cliente.php';

class clienteController extends cliente
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaCliente($permisos)
    {
        $cliente      = new Cliente();
        $listaCliente = $cliente->getCliente();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaCliente)) {
                for ($i = 0; $i < sizeof($listaCliente); $i++) {
                    echo '<tr>';
                    if($listaCliente[$i]["tipo_persona"] == 2){
                        echo '<td>' . $listaCliente[$i]["nom1_cli"] . '</td>';
                    } else {
                        echo '<td>' . $listaCliente[$i]["nombre"] . '</td>';
                    }
                    
                    echo '<td>' . $listaCliente[$i]["cedula_cli"] . '</td>';
                    echo '<td>' . $listaCliente[$i]["direccion_cli"] . '</td>';
                    echo '<td>' . $listaCliente[$i]["telefono_cli"] . '</td>';
                    echo '<td>' . $listaCliente[$i]["celular_cli"] . '</td>';
                    echo '<td>' . $listaCliente[$i]["desc_tipo_persona"] . '</td>';
                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-target="#clienteModal" data-bs-toggle="modal" name="btn_editar" data-id-cliente="' . $listaCliente[$i]["cod_cli"] . '"><i class="fa-solid fa-pen-to-square"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen clientes</td>';
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
        //Instancia de cliente
        $cliente = new Cliente();
        //Lista del menu Nivel 1
        $listaTipo = $cliente->getTipoPersona();
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
        //Instancia de cliente
        $cliente = new Cliente();
        //Lista del menu Nivel 1
        $listaTipo = $cliente->getTipoEmpleado();
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
        //Instancia del cliente
        $cliente = new Cliente();
        //Lista del menu Nivel 1
        $listaSiNo = $cliente->getSiNo();
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
        //Instancia de cliente
        $cliente = new Cliente();
        //Lista del menu Nivel 1
        $listaTipo = $cliente->getCiudad();
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