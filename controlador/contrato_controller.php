<?php
include dirname(__file__, 2) . '/modelo/contrato.php';

class contratoController extends contrato
{
    //Constructor
    public function __construct(){}

    //Funcion para traer tabla
    public function getTablaContrato($permisos)
    {
        $contrato      = new Contrato();
        $listaContrato = $contrato->getContrato();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaContrato)) {
                for ($i = 0; $i < sizeof($listaContrato); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer">' . $listaContrato[$i]["consecutivo"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaContrato[$i]["nombre_cliente"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaContrato[$i]["nombre_paciente"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaContrato[$i]["fecha_ini_contrato"] . '</td>';
                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-target="#contratoModal" data-bs-toggle="modal" name="btn_editar" data-id-contrato="' . $listaContrato[$i]["cod_calc"] . '"><i class="fa-solid fa-pen-to-square"></i></button></td>';
                    }
                    if ($permisos[0]["con_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-primary" name="btn_ver" data-id-contrato="' . $listaContrato[$i]["cod_calc"] . '" data-bs-toggle="modal" data-bs-target="#detalleModal"><i class="fa-solid fa-binoculars"></i></button></td>';
                    }
                    if ($permisos[0]["con_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-primary" name="btn_anexo" data-id-contrato="' . $listaContrato[$i]["cod_calc"] . '" data-bs-toggle="modal" data-bs-target="#anexoModal"><i class="fa-solid fa-binoculars"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen contratos</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }

    //Select tipo contrato
    public function getSelectTipoContrato()
    {
        //Instancia de contrato
        $contrato = new Contrato();
        //Lista del menu Nivel 1
        $listaTipo = $contrato->getTipoContrato();
        //Se recorre array de nivel 1
        if (isset($listaTipo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipo); $i++) {
                echo '<option value="' . $listaTipo[$i]["cod_tipo_contrato"] . '">' . $listaTipo[$i]["desc_tipo_contrato"] . '</option>';
            }
        }
    }

    //Select cliente
    public function getSelectCliente()
    {
        //Instancia de contrato
        $contrato = new Contrato();
        //Lista del menu Nivel 1
        $listaTipo = $contrato->getCliente();
        //Se recorre array de nivel 1
        if (isset($listaTipo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipo); $i++) {
                echo '<option value="' . $listaTipo[$i]["cod_cli"] . '">' . $listaTipo[$i]["nombre"] . '</option>';
            }
        }
    }

    //Select responsable
    public function getSelectResponsable()
    {
        //Instancia de contrato
        $contrato = new Contrato();
        //Lista del menu Nivel 1
        $listaTipo = $contrato->getResponsable();
        //Se recorre array de nivel 1
        if (isset($listaTipo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipo); $i++) {
                echo '<option value="' . $listaTipo[$i]["cod_cli"] . '">' . $listaTipo[$i]["nombre"] . '</option>';
            }
        }
    }

    //Funcion para lista desplegable de la clase
    public function getSelectClase()
    {
        //Instancia del contrato
        $contrato = new Contrato();
        //Lista del menu Nivel 1
        $listaClase = $contrato->getClases();
        //Se recorre array de nivel 1
        if (isset($listaClase)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaClase); $i++) {
                echo '<option value="' . $listaClase[$i]["cod_clase"] . '">' . $listaClase[$i]["nom_clase"] . '</option>';
            }
        }
    }
}
?>