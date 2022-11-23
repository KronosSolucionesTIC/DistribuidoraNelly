<?php
include dirname(__file__, 2) . '/modelo/pagoAdelantado.php';

$pagoAdelantado = new PagoAdelantado();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'consultaContratos') {
    $resultado = $pagoAdelantado->getContratos($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'validaEquipos') {
    $resultado = $pagoAdelantado->getValidaEquipos($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'validaSaldo') {
    $resultado = $pagoAdelantado->getValidaSaldo($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'validaMeses') {
    $resultado = $pagoAdelantado->getValidaMeses($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'consultaPagoAdelantados') {
    $resultado = $pagoAdelantado->getPagoAdelantados($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'pagosAdelantados') {
    $pagoAdelantado->eliminaPagos($_REQUEST);
    $saldo = $pagoAdelantado->consultaSaldo($_REQUEST);
    $cuotas = $pagoAdelantado->getConsultaCuotas($_REQUEST, $saldo);
    if ($cuotas) {
        $resultado = $pagoAdelantado->insertaPagoAdelantado($_REQUEST, $cuotas);
        if($resultado){
            echo json_encode($resultado); //imprime el json
        } else {
            echo json_encode('No tiene equipos'); //imprime el json
        }
    } else {
        echo json_encode('No se consulto');
    }       
}
if ($tipo == 'consultaPagos') {
    $resultado = $pagoAdelantado->getPagos($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta') {
    $resultado = $pagoAdelantado->insertaFactura($_REQUEST);
    if ($resultado) {
        $resultado = $pagoAdelantado->insertaDetalleFactura($_REQUEST);
        $resultado = $pagoAdelantado->modificaPagoAdelantados($_REQUEST);
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_pago'].','.$_REQUEST['apellidos_pago'].','.$_REQUEST['fkID_tipo_documento'];
    }
}

if ($tipo == 'empresa') {
    $resultado = $pagoAdelantado->getEmpresa();
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'factura') {
    $resultado = $pagoAdelantado->consultaFactura($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}
?>