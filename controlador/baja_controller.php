<?php
include dirname(__file__, 2) . '/modelo/baja.php';

class bajaController extends baja
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaBaja($permisos)
    {
        $baja      = new Baja();
        $listaBaja = $baja->getBaja();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaBaja)) {
                for ($i = 0; $i < sizeof($listaBaja); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer">' . $listaBaja[$i]["consecutivo_equipo"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaBaja[$i]["equipo"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaBaja[$i]["fecha_baja"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaBaja[$i]["desc_tipo_baja"] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen bajas</td>';
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
        //Instancia del baja
        $baja = new Baja();
        //Lista del menu Nivel 1
        $listaBaja = $baja->getEquipos();
        //Se recorre array de nivel 1
        if (isset($listaBaja)) {
            echo '<option value="0" selected>Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaBaja); $i++) {
                $seleccionado = "";
                echo '<option value="' . $listaBaja[$i]["cod_equipo"] . '" ' . $seleccionado . '>' . $listaBaja[$i]["equipo"] . '</option>';
            }
        }
    }

   //Select tipo de baja
    public function getSelectTipo()
    {
        //Instancia del baja
        $baja = new Baja();
        //Lista del menu Nivel 1
        $listaBaja = $baja->getTipo();
        //Se recorre array de nivel 1
        if (isset($listaBaja)) {
            echo '<option value="0" selected>Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaBaja); $i++) {
                $seleccionado = "";
                echo '<option value="' . $listaBaja[$i]["cod_tipo_baja"] . '" ' . $seleccionado . '>' . $listaBaja[$i]["desc_tipo_baja"] . '</option>';
            }
        }
    }
}