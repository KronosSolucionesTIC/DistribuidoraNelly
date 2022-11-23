<?php
include dirname(__file__, 2) . '/modelo/empresa.php';

class empresaController extends empresa
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaEmpresa($permisos)
    {
        $empresa      = new Empresa();
        $listaEmpresa = $empresa->getEmpresa();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaEmpresa)) {
                for ($i = 0; $i < sizeof($listaEmpresa); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer">' . $listaEmpresa[$i]["nom_jmc"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaEmpresa[$i]["nit_jmc"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaEmpresa[$i]["dir_jmc"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaEmpresa[$i]["tel_jmc"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaEmpresa[$i]["fax_jmc"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaEmpresa[$i]["pag_jmc"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaEmpresa[$i]["lugar_jmc"] . '</td>';

                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-target="#empresaModal" data-bs-toggle="modal" name="btn_editar" data-id-empresa="' . $listaEmpresa[$i]["cod_jmc"] . '"><i class="fa-solid fa-pen-to-square"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen empresas</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }

    }
}