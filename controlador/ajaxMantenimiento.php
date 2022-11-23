<?php
include dirname(__file__, 2) . '/modelo/mantenimiento.php';

$mantenimiento = new Mantenimiento();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'inserta') {
    $resultado = $mantenimiento->insertaMantenimiento($_REQUEST);
    if ($resultado) {
        $mantenimiento->modificaEstado($_REQUEST);
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_mantenimiento'].','.$_REQUEST['apellidos_mantenimiento'].','.$_REQUEST['fkID_tipo_documento'];
    }
}

if ($tipo == 'consulta') {
    $resultado = $mantenimiento->consultaMantenimiento($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    $resultado = $mantenimiento->editaMantenimiento($_REQUEST);
    $mantenimiento->modificaEstado($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}

if ($tipo == 'elimina_logico') {
    if ($mantenimiento->eliminaLogicoMantenimiento($_GET)) {
        return '1';
    } else {
        return '0';
    }
}