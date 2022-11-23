<?php
include dirname(__file__, 2) . '/modelo/entrega.php';

$entrega = new Entrega();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'consultaContratos') {
    $resultado = $entrega->getContratos($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'listadoEquipos') {
    $resultado = $entrega->getListaEquipos($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'inserta') {
    $mensaje = $entrega->insertaEntrega($_REQUEST);
    if ($mensaje) {
        $resultado = $entrega->insertaEquipos($_REQUEST);
        $resultado = $entrega->modificaEquipos($_REQUEST);
        $resultado = $entrega->eliminaEquipos($_REQUEST);
        echo json_encode($mensaje); //imprime el json
    } else {
        echo $_REQUEST['nombres_entrega'].','.$_REQUEST['apellidos_entrega'].','.$_REQUEST['fkID_tipo_documento'];
    }
}

if ($tipo == 'empresa') {
    $resultado = $entrega->getEmpresa();
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'entrega') {
    $resultado = $entrega->consultaEntrega($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}
?>