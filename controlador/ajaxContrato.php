<?php
include dirname(__file__, 2) . '/modelo/contrato.php';

$contrato = new Contrato();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'consultaPaciente') {
    $resultado = $contrato->getPaciente($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'consultaConsecutivo') {
    $resultado = $contrato->getConsecutivo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'consultaValores') {
    $resultado = $contrato->getValores($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'consultaNumero') {
    $resultado = $contrato->consultaNumero();
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta') {
    $dataConsecutivo = $contrato->consultaNumero();
    $resultado = $contrato->insertaContrato($_REQUEST, $dataConsecutivo[0]["numero"]);
    $contrato->aumentaConsecutivo();
    $contrato->insertaEquipos($_REQUEST, '');
    $contrato->modificaEquipo($_REQUEST);
    echo json_encode($resultado); //imprime el json
}

if ($tipo == 'consulta') {
    $resultado = $contrato->consultaContrato($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    $contrato->editaContrato($_REQUEST);
    $contrato->eliminaEquipos($_REQUEST);
    $resultado = $contrato->insertaEquipos($_REQUEST, $_REQUEST['cod_calc']);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se edito';
    }
}

if ($tipo == 'listadoEquipos') {
    $resultado = $contrato->getListaEquipos($_GET['cod_contrato']);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'empresa') {
    $resultado = $contrato->getEmpresa();
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'detalle') {
    $resultado = $contrato->consultaDetalleContrato($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'anexo') {
    $resultado = $contrato->consultaAnexoContrato($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}
?>