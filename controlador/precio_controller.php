<?php
include dirname(__file__, 2) . '/modelo/precio.php';

class precioController extends precio
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaPrecio($permisos)
    {
        $precio      = new Precio();
        $listaPrecio = $precio->getPrecio();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaPrecio)) {
                for ($i = 0; $i < sizeof($listaPrecio); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer">' . $listaPrecio[$i]["consecutivo_equipo"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaPrecio[$i]["equipo"] . '</td>';
                    echo '<td  style="cursor: pointer">' . number_format($listaPrecio[$i]["canon_arrend_equipo"],'0','.','.') . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen precios</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }

    }

    //Funcion para lista desplegable de la clase
    public function getSelectClase()
    {
        //Instancia del precio
        $precio = new Precio();
        //Lista del menu Nivel 1
        $listaClase = $precio->getClases();
        //Se recorre array de nivel 1
        if (isset($listaClase)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaClase); $i++) {
                $seleccionado = "";
                echo '<option value="' . $listaClase[$i]["cod_clase"] . '" ' . $seleccionado . '>' . $listaClase[$i]["nom_clase"] . '</option>';
            }
        }
    }
}