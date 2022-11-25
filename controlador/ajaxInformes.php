<?php
include dirname(__file__, 2) . '/modelo/informes.php';

$informes = new Informes();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'informe_ventas') {
    $resultado = $informes->getInformeVentas($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo json_encode($resultado); //imprime el json
    }
}

if ($tipo == 'informe_equipo_estado') {
    $resultado = $informes->getInformeEquipoEstado($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo json_encode($resultado); //imprime el json
    }
}

if ($tipo == 'informe_equipo_articulo') {
    $resultado = $informes->getInformeEquipoArticulo($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo json_encode($resultado); //imprime el json
    }
}

if ($tipo == 'consultaTipo') {
    $resultado = $informes->getTipo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'total_alquilado') {
    $resultado = $informes->getTotalAlquilado($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo json_encode($resultado); //imprime el json
    }
}

if ($tipo == 'total_libre') {
    $resultado = $informes->getTotalLibre($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo json_encode($resultado); //imprime el json
    }
}

if ($tipo == 'total_mantenimiento') {
    $resultado = $informes->getTotalMantenimiento($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo json_encode($resultado); //imprime el json
    }
}

if ($tipo == 'total_baja') {
    $resultado = $informes->getTotalBaja($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo json_encode($resultado); //imprime el json
    }
}

if ($tipo == 'total_equipos') {
    $resultado = $informes->getTotalEquipos($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo json_encode($resultado); //imprime el json
    }
}

if ($tipo == 'detalle') {
    $resultado = $informes->getDetalle($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo json_encode($resultado); //imprime el json
    }
}

if ($tipo == 'informe_pagos_diario') {
    $resultado = $informes->getInformePagosDiario($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo json_encode($resultado); //imprime el json
    }
}

if ($tipo == 'detallePago') {
    $resultado = $informes->getDetallePago($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo json_encode($resultado); //imprime el json
    }
}

if ($tipo == 'empresa') {
    $resultado = $informes->getEmpresa();
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo json_encode($resultado); //imprime el json
    }
}

if ($tipo == 'factura') {
    $resultado = $informes->consultaFactura($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'listaContratos') {
    $resultado = $informes->getListaContratos($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'pagosAtrasados') {
    $resultado = $informes->insertaPago($_REQUEST);
    if($resultado == 'No tiene equipos'){
        echo json_encode($resultado); //imprime el json
    } else {
        echo json_encode($resultado); //imprime el json
    }      
}
?>