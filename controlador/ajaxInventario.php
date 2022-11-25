<?php
include dirname(__file__, 2) . '/modelo/inventario.php';

$inventario = new Inventario();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'insertaNatural') {
    $resultado = $inventario->insertaInventarioNatural($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_inventario'].','.$_REQUEST['apellidos_inventario'].','.$_REQUEST['fkID_tipo_documento'];
    }
}

if ($tipo == 'insertaJuridica') {
    $resultado = $inventario->insertaInventarioJuridica($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_inventario'].','.$_REQUEST['apellidos_inventario'].','.$_REQUEST['fkID_tipo_documento'];
    }
}


if ($tipo == 'consulta') {
    $resultado = $inventario->consultaInventario($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'editaNatural') {
    $resultado = $inventario->editaInventarioNatural($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}

if ($tipo == 'editaJuridica') {
    $resultado = $inventario->editaInventarioJuridica($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}