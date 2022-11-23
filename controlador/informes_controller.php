<?php
include dirname(__file__, 2) . '/modelo/informes.php';

class informesController extends informes
{
    //Constructor
    public function __construct()
    {
        # code...
    }
    
    //Select cliente
    public function getSelectCliente()
    {
        //Instancia de informes
        $informes = new Informes();
        //Lista del menu Nivel 1
        $listaTipo = $informes->getCliente();
        //Se recorre array de nivel 1
        if (isset($listaTipo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaTipo); $i++) {
                echo '<option value="' . $listaTipo[$i]["cod_cli"] . '">' . $listaTipo[$i]["nombre"] . '</option>';
            }
        }
    }

   //Select estado
    public function getSelectEstado()
    {
        //Instancia del informes
        $informes = new Informes();
        //Lista del menu Nivel 1
        $listaInformes = $informes->getEstado();
        //Se recorre array de nivel 1
        if (isset($listaInformes)) {
            for ($i = 0; $i < sizeof($listaInformes); $i++) {
                $seleccionado = "";
                echo '<option value="' . $listaInformes[$i]["cod_est_arrend_equipo"] . '" ' . $seleccionado . '>' . $listaInformes[$i]["desc_est_arrend_equipo"] . '</option>';
            }
        }
    }

   //Select articulo
    public function getSelectArticulo()
    {
        //Instancia del informes
        $informes = new Informes();
        //Lista del menu Nivel 1
        $listaInformes = $informes->getArticulo();
        //Se recorre array de nivel 1
        if (isset($listaInformes)) {
            for ($i = 0; $i < sizeof($listaInformes); $i++) {
                $seleccionado = "";
                echo '<option value="' . $listaInformes[$i]["cod_equipo"] . '" ' . $seleccionado . '>' . $listaInformes[$i]["articulo"] . '</option>';
            }
        }
    }

    //Select clase
    public function getSelectClase()
    {
        //Instancia del informes
        $informes = new Informes();
        //Lista del menu Nivel 1
        $listaClase = $informes->getClases();
        //Se recorre array de nivel 1
        if (isset($listaClase)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaClase); $i++) {
                echo '<option value="' . $listaClase[$i]["cod_clase"] . '">' . $listaClase[$i]["nom_clase"] . '</option>';
            }
        }
    }

    //Tabla cartera
    public function getTablaCartera($permisos)
    {
        $informes      = new Informes();
        $listaInformes = $informes->getCartera();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaInformes)) {
                for ($i = 0; $i < sizeof($listaInformes); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer; text-align:right">' . number_format($listaInformes[$i]["cedula_cli"],0,0,'.') . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaInformes[$i]["nombre_cliente"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaInformes[$i]["consecutivo"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaInformes[$i]["consecutivo_equipo"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaInformes[$i]["nom_clase"] .' '. $listaInformes[$i]["nom_equipo"] .''. $listaInformes[$i]["desc_tipo_equipos"] .'</td>';
                    $saldo30 = $listaInformes[$i]["dias"] <= 30 ? number_format($listaInformes[$i]["saldo_pago"],0,0,'.'): "0";
                    echo '<td  style="cursor: pointer; text-align:right">' . $saldo30 . '</td>';
                    if($listaInformes[$i]["dias"] >= 30 and $listaInformes[$i]["dias"] <= 60) {
                        $saldo60 = number_format($listaInformes[$i]["saldo_pago"],0,0,'.');
                    } else {
                        $saldo60 = 0;
                    }
                    echo '<td  style="cursor: pointer; text-align:right">' . $saldo60 . '</td>';
                    if($listaInformes[$i]["dias"] >= 60 and $listaInformes[$i]["dias"] <= 90) {
                        $saldo90 = number_format($listaInformes[$i]["saldo_pago"],0,0,'.');
                    } else {
                        $saldo90 = 0;
                    }
                    echo '<td style="cursor: pointer; text-align:right">' . $saldo90 . '</td>';
                    $saldoMas90 = $listaInformes[$i]["dias"] > 90 ? number_format($listaInformes[$i]["saldo_pago"],0,0,'.') : "0";
                    echo '<td  style="cursor: pointer; text-align:right">' . $saldoMas90 . '</td>';
                    echo '</tr>';
                }
                echo '<tr>';
                echo '<td style="text-align:center" colspan="9"><button id="btn_imprimir" class="btn btn-primary w-50">Imprimir</button></td>';
                echo '</tr>';
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen rols</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }
}
?>