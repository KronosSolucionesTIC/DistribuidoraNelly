<?php
include dirname(__file__, 2) . '/modelo/otro_si.php';

$otro_si = new Otro_si();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'empresa') {
    $resultado = $otro_si->getEmpresa();
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'otro_si') {
    $resultado = $otro_si->consultaOtroSi($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'listadoEquipos') {
    $resultado = $otro_si->getListaEquipos($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}
?>