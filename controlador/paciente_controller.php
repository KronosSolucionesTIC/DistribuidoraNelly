<?php
include dirname(__file__, 2) . '/modelo/paciente.php';

class pacienteController extends paciente
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaPaciente($permisos)
    {
        $paciente      = new Paciente();
        $listaPaciente = $paciente->getPaciente();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaPaciente)) {
                for ($i = 0; $i < sizeof($listaPaciente); $i++) {
                    echo '<tr>';
                    echo '<td>' . $listaPaciente[$i]["nombre"] . '</td>';                
                    echo '<td>' . $listaPaciente[$i]["cedula_pac"] . '</td>';
                    echo '<td>' . $listaPaciente[$i]["direccion_pac"] . '</td>';
                    echo '<td>' . $listaPaciente[$i]["telefono_pac"] . '</td>';
                    echo '<td>' . $listaPaciente[$i]["celular_pac"] . '</td>';
                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-target="#pacienteModal" data-bs-toggle="modal" name="btn_editar" data-id-paciente="' . $listaPaciente[$i]["cod_pac"] . '"><i class="fa-solid fa-pen-to-square"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen pacientes</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }

    //Select cliente
    public function getSelectCliente()
    {
        //Instancia de paciente
        $paciente = new Paciente();
        //Lista del menu Nivel 1
        $listaTipo = $paciente->getCliente();
        //Se recorre array de nivel 1
        if (isset($listaTipo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipo); $i++) {
                //Valida si es el valor
                if ($valor == $listaTipo[$i]["cod_cli"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaTipo[$i]["cod_cli"] . '" ' . $seleccionado . '>' . $listaTipo[$i]["nombre"] . '</option>';
            }
        }
    }

    //Select parentesco
    public function getSelectParentesco()
    {
        //Instancia de paciente
        $paciente = new Paciente();
        //Lista del menu Nivel 1
        $listaTipo = $paciente->getParentesco();
        //Se recorre array de nivel 1
        if (isset($listaTipo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipo); $i++) {
                //Valida si es el valor
                if ($valor == $listaTipo[$i]["cod_parent"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaTipo[$i]["cod_parent"] . '" ' . $seleccionado . '>' . $listaTipo[$i]["desc_parent"] . '</option>';
            }
        }
    }

    //Select tipo empleado
    public function getSelectTipoEmpleado()
    {
        //Instancia de paciente
        $paciente = new Paciente();
        //Lista del menu Nivel 1
        $listaTipo = $paciente->getTipoEmpleado();
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

    //Select ciudad
    public function getSelectCiudad()
    {
        //Instancia de paciente
        $paciente = new Paciente();
        //Lista del menu Nivel 1
        $listaTipo = $paciente->getCiudad();
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

    //Select tipo edad
    public function getSelectTipoEdad()
    {
        //Instancia del paciente
        $paciente = new Paciente();
        //Lista del menu Nivel 1
        $listaSiNo = $paciente->getTipoEdad();
        //Se recorre array de nivel 1
        if (isset($listaSiNo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaSiNo); $i++) {
                //Valida si es el valor
                if ($valor == $listaSiNo[$i]["cod_tipo_edad"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaSiNo[$i]["cod_tipo_edad"] . '" ' . $seleccionado . '>' . $listaSiNo[$i]["desc_tipo_edad"] . '</option>';
            }
        }
    }
}