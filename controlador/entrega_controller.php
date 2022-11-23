<?php
include dirname(__file__, 2) . '/modelo/entrega.php';

class entregaController extends entrega
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaEntrega($permisos)
    {
        $entrega      = new Entrega();
        $listaEntrega = $entrega->getEntrega();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaEntrega)) {
                for ($i = 0; $i < sizeof($listaEntrega); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer">' . $listaEntrega[$i]["cod_entrega"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaEntrega[$i]["nombre_cliente"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaEntrega[$i]["consecutivo"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaEntrega[$i]["fecha_entrega"] . '</td>';
                    if ($permisos[0]["con_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-primary text-center" data-bs-target="#detalleModal" data-bs-toggle="modal" name="btn_ver" data-id-entrega="' . $listaEntrega[$i]["cod_entrega"] . '"><i class="fa-solid fa-binoculars"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen entregas</td>';
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
        //Instancia de entrega
        $entrega = new Entrega();
        //Lista del menu Nivel 1
        $listaTipo = $entrega->getCliente();
        //Se recorre array de nivel 1
        if (isset($listaTipo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipo); $i++) {
                echo '<option value="' . $listaTipo[$i]["cod_cli"] . '">' . $listaTipo[$i]["nombre"] . '</option>';
            }
        }
    }
}