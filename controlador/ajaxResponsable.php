<?php
include dirname(__file__, 2) . '/modelo/responsable.php';

$responsable = new Responsable();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'insertaNatural') {
    $resultado = $responsable->insertaResponsableNatural($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_responsable'].','.$_REQUEST['apellidos_responsable'].','.$_REQUEST['fkID_tipo_documento'];
    }
}

if ($tipo == 'insertaJuridica') {
    $resultado = $responsable->insertaResponsableJuridica($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_responsable'].','.$_REQUEST['apellidos_responsable'].','.$_REQUEST['fkID_tipo_documento'];
    }
}


if ($tipo == 'consulta') {
    $resultado = $responsable->consultaResponsable($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'editaNatural') {
    $resultado = $responsable->editaResponsableNatural($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}

if ($tipo == 'editaJuridica') {
    $resultado = $responsable->editaResponsableJuridica($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}