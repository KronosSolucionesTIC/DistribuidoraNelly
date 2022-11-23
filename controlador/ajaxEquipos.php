<?php
include dirname(__file__, 2) . '/modelo/equipo.php';

$equipo = new Equipo();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'inserta') {
    $resultado = $equipo->insertaEquipo($_REQUEST);
    if ($resultado) {
        $equipo->insertaGarantia($_REQUEST);
        $equipo->actualizaGarantia();
        $equipo->insertaMotor($_REQUEST,'');      
        $equipo->insertaPartes($_REQUEST,'');
        echo json_encode($resultado); //imprime el json
    } else {
        echo json_encode('No guardo');
    }
}

if ($tipo == 'consulta') {
    $resultado = $equipo->consultaEquipo($_GET['cod_equipo']);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    $resultado = $equipo->editaEquipo($_REQUEST);
    $equipo->editaGarantia($_REQUEST);
    $existeMotor = $equipo->existeMotor($_REQUEST);
    if($existeMotor){
        $equipo->editaMotor($_REQUEST);
    } else {
        $equipo->insertaMotor($_REQUEST, $_REQUEST['cod_equipo']);
    }
    $equipo->eliminaPartes($_REQUEST);
    echo json_encode('Entro a inserta partes');
    $equipo->insertaPartes($_REQUEST, $_REQUEST['cod_equipo']);

    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}

if ($tipo == 'consultaTipo') {
    $resultado = $equipo->getTipo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'consultaTamano') {
    $resultado = $equipo->getTamano($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'consultaParte') {
    $resultado = $equipo->getPartes($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'consultaTipoParte') {
    $resultado = $equipo->getTipoPartes($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'listadoPartes') {
    $resultado = $equipo->getListaPartes($_GET['cod_equipo']);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'garantia') {
    $resultado = $equipo->getGarantia($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'empresa') {
    $resultado = $equipo->getEmpresa();
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}