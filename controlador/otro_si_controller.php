<?php
include dirname(__file__, 2) . '/modelo/otro_si.php';

class otro_siController extends otro_si
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaOtro_si($permisos)
    {
        $otro_si      = new Otro_si();
        $listaOtro_si = $otro_si->getOtro_si();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaOtro_si)) {
                for ($i = 0; $i < sizeof($listaOtro_si); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer">' . $listaOtro_si[$i]["cod_otro_si"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaOtro_si[$i]["consecutivo"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaOtro_si[$i]["fecha_otro_si"] . '</td>';
                    if ($permisos[0]["con_per"] == 1) {
                        echo '<td class="text-center"> <button type="button" class="btn btn-primary" name="btn_ver" data-id-otro-si="' . $listaOtro_si[$i]["cod_otro_si"] . '" data-bs-toggle="modal" data-bs-target="#otro_siModal"><i class="fa-solid fa-binoculars"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen otro_sis</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }

    }
}