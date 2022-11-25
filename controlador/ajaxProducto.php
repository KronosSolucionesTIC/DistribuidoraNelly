<?php
include dirname(__file__, 2) . '/modelo/producto.php';

$producto = new Producto();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'inserta') {
    $resultado = $producto->insertaProducto($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_producto'].','.$_REQUEST['apellidos_producto'].','.$_REQUEST['fkID_tipo_documento'];
    }
}

if ($tipo == 'consulta') {
    $resultado = $producto->consultaProducto($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    $resultado = $producto->editaProducto($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}

if ($tipo == 'elimina_logico') {
    if ($producto->eliminaLogicoProducto($_GET)) {
        return '1';
    } else {
        return '0';
    }
}