<?php
include dirname(__file__, 2) . '/modelo/pago.php';

class pagoController extends pago
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaPago($permisos)
    {
        $pago      = new Pago();
        $listaPago = $pago->getPago();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaPago)) {
                for ($i = 0; $i < sizeof($listaPago); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer">' . $listaPago[$i]["cod_fac"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaPago[$i]["nombre_cliente"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaPago[$i]["fech_factura"] . '</td>';
                    if ($permisos[0]["con_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-primary text-center" data-bs-target="#facturaModal" data-bs-toggle="modal" name="btn_ver" data-id-factura="' . $listaPago[$i]["cod_fac"] . '"><i class="fa-solid fa-binoculars"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen pagos</td>';
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
        //Instancia de pago
        $pago = new Pago();
        //Lista del menu Nivel 1
        $listaTipo = $pago->getCliente();
        //Se recorre array de nivel 1
        if (isset($listaTipo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipo); $i++) {
                echo '<option value="' . $listaTipo[$i]["cod_cli"] . '">' . $listaTipo[$i]["nombre"] . '</option>';
            }
        }
    }

    //Select forma pago
    public function getSelectFormaPago()
    {
        //Instancia de pago
        $pago = new Pago();
        //Lista del menu Nivel 1
        $listaTipo = $pago->getFormaPago();
        //Se recorre array de nivel 1
        if (isset($listaTipo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipo); $i++) {
                echo '<option value="' . $listaTipo[$i]["cod_tipo_pago"] . '">' . $listaTipo[$i]["desc_tipo_pago"] . '</option>';
            }
        }
    }
}