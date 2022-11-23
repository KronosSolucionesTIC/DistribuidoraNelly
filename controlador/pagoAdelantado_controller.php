<?php
include dirname(__file__, 2) . '/modelo/pagoAdelantado.php';

class pagoAdelantadoController extends pagoAdelantado
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaPagoAdelantado($permisos)
    {
        $pagoAdelantado      = new PagoAdelantado();
        $listaPagoAdelantado = $pagoAdelantado->getPagoAdelantado();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaPagoAdelantado)) {
                for ($i = 0; $i < sizeof($listaPagoAdelantado); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer">' . $listaPagoAdelantado[$i]["cod_fac"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaPagoAdelantado[$i]["nombre_cliente"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaPagoAdelantado[$i]["fech_factura"] . '</td>';
                    if ($permisos[0]["con_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-primary text-center" data-bs-target="#facturaModal" data-bs-toggle="modal" name="btn_ver" data-id-factura="' . $listaPagoAdelantado[$i]["cod_fac"] . '"><i class="fa-solid fa-binoculars"></i></button></td>';
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
        $pagoAdelantado = new PagoAdelantado();
        //Lista del menu Nivel 1
        $listaTipo = $pagoAdelantado->getCliente();
        //Se recorre array de nivel 1
        if (isset($listaTipo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipo); $i++) {
                echo '<option value="' . $listaTipo[$i]["cod_cli"] . '">' . $listaTipo[$i]["nombre"] . '</option>';
            }
        }
    }

    //Select forma pago
    public function getSelectFormaPagoAdelantado()
    {
        //Instancia de pago
        $pagoAdelantado = new PagoAdelantado();
        //Lista del menu Nivel 1
        $listaTipo = $pagoAdelantado->getFormaPagoAdelantado();
        //Se recorre array de nivel 1
        if (isset($listaTipo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipo); $i++) {
                echo '<option value="' . $listaTipo[$i]["cod_tipo_pago"] . '">' . $listaTipo[$i]["desc_tipo_pago"] . '</option>';
            }
        }
    }
}