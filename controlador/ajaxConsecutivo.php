<?php
include dirname(__file__, 2) . '/modelo/consecutivo.php';

$consecutivo = new Consecutivo();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";


if ($tipo == 'consulta') {
    $resultado = $consecutivo->consultaConsecutivo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    $resultado = $consecutivo->editaConsecutivo($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}