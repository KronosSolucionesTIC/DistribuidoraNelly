<?php
include dirname(__file__, 2) . '/modelo/partes.php';

$partes = new Partes();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'inserta') {
    $resultado = $partes->insertaPartes($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_partes'].','.$_REQUEST['apellidos_partes'].','.$_REQUEST['fkID_tipo_documento'];
    }
}

if ($tipo == 'consulta') {
    $resultado = $partes->consultaPartes($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    $resultado = $partes->editaPartes($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}

if ($tipo == 'elimina_logico') {
    if ($partes->eliminaLogicoPartes($_GET)) {
        return '1';
    } else {
        return '0';
    }
}