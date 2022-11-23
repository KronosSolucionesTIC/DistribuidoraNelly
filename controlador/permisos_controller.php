<?php
include dirname(__file__, 2) . '/modelo/permisos.php';

class permisosController extends permisos
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaPermisos($permisos)
    {
        $usuario      = new Permisos();
        $listaPermisos = $usuario->getRol();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaPermisos)) {
                for ($i = 0; $i < sizeof($listaPermisos); $i++) {
                    echo '<tr>';
                    echo '<td style="cursor: pointer">' . $listaPermisos[$i]["nom_rol"] . '</td>';
                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><a href="man_permisos.php?cod_rol='. $listaPermisos[$i]["cod_rol"] .'"><button type="button" class="btn btn-primary text-center" name="btn_editar" data-id-usuario="' . $listaPermisos[$i]["cod_rol"] . '">Permisos</button></a></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen usuarios</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }

    //Funcion para traer tabla
    public function getTablaModulos($permisos, $cod_rol)
    {
        $permiso      = new Permisos();
        $listaPermisos = $permiso->getModulos();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaPermisos)) {
                for ($i = 0; $i < sizeof($listaPermisos); $i++) {
                    echo '<tr>';
                    echo '<td style="cursor: pointer">' . $listaPermisos[$i]["nom_mod"] . '</td>';
                    echo '<td style="cursor: pointer">' . $listaPermisos[$i]["nom_int"] . '</td>';

                    echo '<input type="hidden" id="cod_rol_'.$i.'" value="'.$cod_rol.'">';

                    echo '<input type="hidden" id="cod_int_per_'.$i.'" value="'.$listaPermisos[$i]["cod_int"].'">';

                    $consulta = $permiso->getConsulta($cod_rol, $listaPermisos[$i]["cod_int"]);

                    $checkedConsulta = '';
                    $checkedEdicion = '';
                    $checkedEliminacion = '';
                    $checkedInsercion = '';

                    for ($j = 0; $j < sizeof($consulta); $j++) {
                        if($consulta[$j]["con_per"] == 1){
                            $checkedConsulta = 'checked';
                        };
                        if($consulta[$j]["edi_per"] == 1){
                            $checkedEdicion = 'checked';
                        };
                        if($consulta[$j]["eli_per"] == 1){
                            $checkedEliminacion = 'checked';
                        };
                        if($consulta[$j]["ins_per"] == 1){
                            $checkedInsercion = 'checked';
                        };
                    }

                    echo '<td align="center"><input class="form-check-input" type="checkbox" '.$checkedConsulta.' id="consulta_'.$i.'"></td>';
                    echo '<td align="center"><input class="form-check-input" type="checkbox" '.$checkedInsercion.' id="insercion_'. $i.'"></td>';
                    echo '<td align="center"><input class="form-check-input" type="checkbox" '.$checkedEdicion.' id="edicion_'. $i .'"></td>';
                    echo '<td align="center"><input class="form-check-input" type="checkbox" '.$checkedEliminacion.' id="eliminacion_'. $i .'""></td>';

                    echo '</tr>';
                }
                echo '<td align="center"><input type="hidden" value="'. $i .'" id="contador"></td>';
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen usuarios</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }
}