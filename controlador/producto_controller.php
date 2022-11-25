<?php
include dirname(__file__, 2) . '/modelo/producto.php';

class productoController extends producto
{
    //Constructor
    public function __construct()
    {
        # code...
    }

    //Funcion para traer tabla
    public function getTablaProducto($permisos)
    {
        $producto      = new Producto();
        $listaProducto = $producto->getProducto();
        if ($permisos[0]["con_per"] == 1) {
            if (isset($listaProducto)) {
                for ($i = 0; $i < sizeof($listaProducto); $i++) {
                    echo '<tr>';
                    echo '<td  style="cursor: pointer">' . $listaProducto[$i]["PLU_producto"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaProducto[$i]["descripcion_producto"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaProducto[$i]["marca_producto"] . '</td>';
                    echo '<td  style="cursor: pointer">' . $listaProducto[$i]["precio_producto"] . '</td>';
                    if ($permisos[0]["edi_per"] == 1) {
                        echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-target="#productoModal" data-bs-toggle="modal" name="btn_editar" data-id-producto="' . $listaProducto[$i]["codigo_producto"] . '"><i class="fa-solid fa-pen-to-square"></i></button></td>';
                    }
                    if ($permisos[0]["eli_per"] == 1) {
                        echo '<td class="text-center"> <button type="button" class="btn btn-danger" name="btn_eliminar" data-id-producto="' . $listaProducto[$i]["codigo_producto"] . '" data-bs-toggle="modal" data-bs-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button></td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen productos</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }

    }
}