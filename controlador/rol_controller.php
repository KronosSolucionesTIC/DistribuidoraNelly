<?php
include dirname(__file__, 2) . '/modelo/rol.php';

class rolController extends rol
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaRol($permisos)
    {
        $rol      = new Rol();
        $listaRol = $rol->getRol();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaRol)) {
                for ($i = 0; $i < sizeof($listaRol); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer">' . $listaRol[$i]["nom_rol"] . '</td>';
                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-target="#rolModal" data-bs-toggle="modal" name="btn_editar" data-id-rol="' . $listaRol[$i]["cod_rol"] . '"><i class="fa-solid fa-pen-to-square"></i></button></td>';
                    }
                    if ($permisos[0]["eli_per"] == 1) {
                        echo '<td class="text-center"> <button type="button" class="btn btn-danger" name="btn_eliminar" data-id-rol="' . $listaRol[$i]["cod_rol"] . '" data-bs-toggle="modal" data-bs-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button></td>';
                    }
                    echo '</tr>';
                }
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