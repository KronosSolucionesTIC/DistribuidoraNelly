<?php
include dirname(__file__, 2) . '/modelo/consecutivo.php';

class consecutivoController extends consecutivo
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaConsecutivo($permisos)
    {
        $consecutivo      = new Consecutivo();
        $listaConsecutivo = $consecutivo->getConsecutivo();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaConsecutivo)) {
                for ($i = 0; $i < sizeof($listaConsecutivo); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer">' . $listaConsecutivo[$i]["form_cons"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaConsecutivo[$i]["letra_cons"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaConsecutivo[$i]["codigo_actual_cons"] . '</td>';
                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-target="#consecutivoModal" data-bs-toggle="modal" name="btn_editar" data-id-consecutivo="' . $listaConsecutivo[$i]["cod_cons"] . '"><i class="fa-solid fa-pen-to-square"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen consecutivos</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }

    }
}