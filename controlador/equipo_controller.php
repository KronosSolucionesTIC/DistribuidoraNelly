<?php
include dirname(__file__, 2) . '/modelo/equipo.php';

class equipoController extends equipo
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaEquipo($permisos)
    {
        $equipo      = new Equipo();
        $listaEquipo = $equipo->getEquipo();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaEquipo)) {
                for ($i = 0; $i < sizeof($listaEquipo); $i++) {
                    echo '<tr>';
                    echo '<td >' . $listaEquipo[$i]["consecutivo_equipo"] . '</td>';
                    echo '<td >' . $listaEquipo[$i]["nombre"] . '</td>';
                    echo '<td >' . number_format($listaEquipo[$i]["canon_arrend_equipo"],'0','0','.') .'</td>';
                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><a href="man_equipo.php?&cod_equipo=' .$listaEquipo[$i]["cod_equipo"]. '"><button type="button" class="btn btn-warning text-center" data-bs-target="#equipoModal" data-bs-toggle="modal" name="btn_editar" data-id-equipo="' . $listaEquipo[$i]["cod_equipo"] . '"><i class="fa-solid fa-pen-to-square"></i></button></a></td>';
                    }
                    if ($permisos[0]["con_per"] == 1) {
                        echo '<td class="text-center"> <button type="button" class="btn btn-primary" name="btn_ver" data-id-equipo="' . $listaEquipo[$i]["cod_equipo"] . '" data-bs-toggle="modal" data-bs-target="#equipoModal"><i class="fa-solid fa-binoculars"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen equipos</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }

    }

    //Funcion para lista desplegable de la clase
    public function getSelectClase($valor)
    {
        //Instancia del equipo
        $equipo = new Equipo();
        //Lista del menu Nivel 1
        $listaClase = $equipo->getClases();
        //Se recorre array de nivel 1
        if (isset($listaClase)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaClase); $i++) {
                //Valida si es el valor
                if ($valor == $listaClase[$i]["cod_clase"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaClase[$i]["cod_clase"] . '" ' . $seleccionado . '>' . $listaClase[$i]["nom_clase"] . '</option>';
            }
        }
    }

    //Funcion para lista desplegable del tipo
    public function getSelectTipo($data, $valor)
    {
        //Instancia del equipo
        $equipo = new Equipo();
        //Lista del menu Nivel 1
        $listaClase = $equipo->getTipo($data);
        //Se recorre array de nivel 1
        if (isset($listaClase)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaClase); $i++) {
                //Valida si es el valor
                if ($valor == $listaClase[$i]["cod_tipo_equipos"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaClase[$i]["cod_tipo_equipos"] . '" ' . $seleccionado . '>' . $listaClase[$i]["desc_tipo_equipos"] . '</option>';
            }
        }
    }

    //Funcion para lista desplegable del tamaño
    public function getSelectTamano($data, $valor)
    {
        //Instancia del equipo
        $equipo = new Equipo();
        //Lista del menu Nivel 1
        $listaClase = $equipo->getTamano($data);
        //Se recorre array de nivel 1
        if (isset($listaClase)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaClase); $i++) {
                //Valida si es el valor
                if ($valor == $listaClase[$i]["cod_tam_equipos"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaClase[$i]["cod_tam_equipos"] . '" ' . $seleccionado . '>' . $listaClase[$i]["desc_tam_equipos"] . '</option>';
            }
        }
    }

    //Funcion para lista desplegable de la parte
    public function getSelectParte($data)
    {
        //Instancia del equipo
        $equipo = new Equipo();
        //Lista del menu Nivel 1
        $listaClase = $equipo->getPartes($data);
        //Se recorre array de nivel 1
        if (isset($listaClase)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaClase); $i++) {
                //Valida si es el valor
                if ($valor == $listaClase[$i]["cod_partes"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaClase[$i]["cod_partes"] . '" ' . $seleccionado . '>' . $listaClase[$i]["desc_partes"] . '</option>';
            }
        }
    }

    //Funcion para cargar equipo
    public function cargaEquipo($cod_equipo)
    {
        //Instancia del equipo
        $equipo = new Equipo();
        //Lista del menu Nivel 1
        $listaClase = $equipo->consultaEquipo($cod_equipo);
        //Se recorre array de nivel 1
        if (isset($listaClase)) {
            return $listaClase;
        }
    }

    //Funcion para lista partes
    public function listaPartes($cod_equipo)
    {
        //Instancia del equipo
        $equipo = new Equipo();
        //Lista del menu Nivel 1
        $listaClase = $equipo->getListaPartes($cod_equipo);
        //Se recorre array de nivel 1
        if (isset($listaClase)) {
            return $listaClase;
        }
    }
}