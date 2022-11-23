<?php
include dirname(__file__, 2) . '/modelo/responsable.php';

class responsableController extends responsable
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaResponsable($permisos)
    {
        $responsable      = new Responsable();
        $listaResponsable = $responsable->getResponsable();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaResponsable)) {
                for ($i = 0; $i < sizeof($listaResponsable); $i++) {
                    echo '<tr>';
                    if($listaResponsable[$i]["tipo_persona"] == 2){
                        echo '<td>' . $listaResponsable[$i]["nom1_cli"] . '</td>';
                    } else {
                        echo '<td>' . $listaResponsable[$i]["nombre"] . '</td>';
                    }
                    
                    echo '<td>' . $listaResponsable[$i]["cedula_cli"] . '</td>';
                    echo '<td>' . $listaResponsable[$i]["direccion_cli"] . '</td>';
                    echo '<td>' . $listaResponsable[$i]["telefono_cli"] . '</td>';
                    echo '<td>' . $listaResponsable[$i]["celular_cli"] . '</td>';
                    echo '<td>' . $listaResponsable[$i]["desc_tipo_persona"] . '</td>';
                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-target="#responsableModal" data-bs-toggle="modal" name="btn_editar" data-id-responsable="' . $listaResponsable[$i]["cod_cli"] . '"><i class="fa-solid fa-pen-to-square"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen responsables</td>';
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
        //Instancia de responsable
        $responsable = new Responsable();
        //Lista del menu Nivel 1
        $listaTipo = $responsable->getTipoPersona();
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
        //Instancia de responsable
        $responsable = new Responsable();
        //Lista del menu Nivel 1
        $listaTipo = $responsable->getTipoEmpleado();
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
        //Instancia del responsable
        $responsable = new Responsable();
        //Lista del menu Nivel 1
        $listaSiNo = $responsable->getSiNo();
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
        //Instancia de responsable
        $responsable = new Responsable();
        //Lista del menu Nivel 1
        $listaTipo = $responsable->getCiudad();
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