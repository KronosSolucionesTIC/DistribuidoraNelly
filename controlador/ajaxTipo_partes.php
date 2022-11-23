<?php
include dirname(__file__, 2) . '/modelo/tipo_partes.php';

$tipo_partes = new Tipo_partes();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'inserta') {
    $resultado = $tipo_partes->insertaTipo_partes($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_tipo_partes'].','.$_REQUEST['apellidos_tipo_partes'].','.$_REQUEST['fkID_tipo_documento'];
    }
}

if ($tipo == 'consulta') {
    $resultado = $tipo_partes->consultaTipo_partes($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    $resultado = $tipo_partes->editaTipo_partes($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}

if ($tipo == 'elimina_logico') {
    if ($tipo_partes->eliminaLogicoTipo_partes($_GET)) {
        return '1';
    } else {
        return '0';
    }
}