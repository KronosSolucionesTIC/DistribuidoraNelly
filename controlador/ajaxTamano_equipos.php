<?php
include dirname(__file__, 2) . '/modelo/tamano_equipos.php';

$tamano_equipos = new Tamano_equipos();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'inserta') {
    $resultado = $tamano_equipos->insertaTamano_equipos($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_tamano_equipos'].','.$_REQUEST['apellidos_tamano_equipos'].','.$_REQUEST['fkID_tipo_documento'];
    }
}

if ($tipo == 'consulta') {
    $resultado = $tamano_equipos->consultaTamano_equipos($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    $resultado = $tamano_equipos->editaTamano_equipos($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}

if ($tipo == 'elimina_logico') {
    if ($tamano_equipos->eliminaLogicoTamano_equipos($_GET)) {
        return '1';
    } else {
        return '0';
    }
}