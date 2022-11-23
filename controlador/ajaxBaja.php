<?php
include dirname(__file__, 2) . '/modelo/baja.php';

$baja = new Baja();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'inserta') {
    $resultado = $baja->insertaBaja($_REQUEST);
    $resultado = $baja->modificaEstado($_REQUEST);
    echo json_encode($resultado); //imprime el json
}

if ($tipo == 'consulta') {
    $resultado = $baja->consultaBaja($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}