<?php
include dirname(__file__, 2) . '/modelo/pago.php';

$pago = new Pago();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'consultaContratos') {
    $resultado = $pago->getContratos($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'consultaPagos') {
    $resultado = $pago->getPagos($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'pagosAtrasados') {
    $resultado = $pago->insertaPago($_REQUEST);
    if($resultado == 'No tiene equipos'){
        echo json_encode($resultado); //imprime el json
    } else {
        echo json_encode($resultado); //imprime el json
    }      
}

if ($tipo == 'inserta') {
    $resultado = $pago->insertaFactura($_REQUEST);
    if ($resultado) {
        $resultado = $pago->insertaDetalleFactura($_REQUEST);
        $resultado = $pago->modificaPagos($_REQUEST);
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_pago'].','.$_REQUEST['apellidos_pago'].','.$_REQUEST['fkID_tipo_documento'];
    }
}

if ($tipo == 'empresa') {
    $resultado = $pago->getEmpresa();
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'factura') {
    $resultado = $pago->consultaFactura($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}
?>