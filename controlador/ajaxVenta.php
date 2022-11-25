<?php
include dirname(__file__, 2) . '/modelo/venta.php';

$venta = new Venta();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'insertaNatural') {
    $resultado = $venta->insertaVentaNatural($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_venta'].','.$_REQUEST['apellidos_venta'].','.$_REQUEST['fkID_tipo_documento'];
    }
}

if ($tipo == 'insertaJuridica') {
    $resultado = $venta->insertaVentaJuridica($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_venta'].','.$_REQUEST['apellidos_venta'].','.$_REQUEST['fkID_tipo_documento'];
    }
}


if ($tipo == 'consulta') {
    $resultado = $venta->consultaVenta($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'editaNatural') {
    $resultado = $venta->editaVentaNatural($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}

if ($tipo == 'editaJuridica') {
    $resultado = $venta->editaVentaJuridica($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}