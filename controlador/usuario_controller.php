<?php
include dirname(__file__, 2) . '/modelo/usuario.php';

class usuarioController extends usuario
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaUsuario($permisos)
    {
        $usuario      = new Usuario();
        $listaUsuario = $usuario->getUsuario();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaUsuario)) {
                for ($i = 0; $i < sizeof($listaUsuario); $i++) {
                    echo '<tr>';
                    echo '<td class="text-center" style="cursor: pointer">' . $listaUsuario[$i]["nom_usu"] . '</td>';
                    echo '<td class="text-center" style="cursor: pointer">' . $listaUsuario[$i]["cc_usu"] . '</td>';
                    echo '<td class="text-center" style="cursor: pointer">' . $listaUsuario[$i]["nom_car"] . '</td>';
                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-target="#usuarioModal" data-bs-toggle="modal" name="btn_editar" data-id-usuario="' . $listaUsuario[$i]["cod_usu"] . '"><i class="fa-solid fa-pen-to-square"></i></button></td>';
                    }
                    if ($permisos[0]["eli_per"] == 1) {
                        echo '<td class="text-center"> <button type="button" class="btn btn-danger" name="btn_eliminar" data-id-usuario="' . $listaUsuario[$i]["cod_usu"] . '" data-bs-toggle="modal" data-bs-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button></td>';
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

    //Funcion para lista desplegable de Rol
    public function getSelectRol()
    {
        //Instancia del usuario
        $usuario = new Usuario();
        //Lista del menu Nivel 1
        $listaRol = $usuario->getRol();
        //Se recorre array de nivel 1
        if (isset($listaRol)) {
            for ($i = 0; $i < sizeof($listaRol); $i++) {
                //Valida si es el valor
                if ($valor == $listaRol[$i]["cod_rol"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaRol[$i]["cod_rol"] . '" ' . $seleccionado . '>' . $listaRol[$i]["nom_rol"] . '</option>';
            }
        }
    }

    //Funcion para lista desplegable del cargo
    public function getSelectCargo()
    {
        //Instancia del usuario
        $usuario = new Usuario();
        //Lista del menu Nivel 1
        $listaCargo = $usuario->getCargo();
        //Se recorre array de nivel 1
        if (isset($listaCargo)) {
            for ($i = 0; $i < sizeof($listaCargo); $i++) {
                //Valida si es el valor
                if ($valor == $listaCargo[$i]["cod_car"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaCargo[$i]["cod_car"] . '" ' . $seleccionado . '>' . $listaCargo[$i]["nom_car"] . '</option>';
            }
        }
    }
}