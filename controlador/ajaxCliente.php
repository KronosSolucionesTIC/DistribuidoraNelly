<?php
include dirname(__file__, 2) . '/modelo/cliente.php';

$cliente = new Cliente();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'insertaNatural') {
    $resultado = $cliente->insertaClienteNatural($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_cliente'].','.$_REQUEST['apellidos_cliente'].','.$_REQUEST['fkID_tipo_documento'];
    }
}

if ($tipo == 'insertaJuridica') {
    $resultado = $cliente->insertaClienteJuridica($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_cliente'].','.$_REQUEST['apellidos_cliente'].','.$_REQUEST['fkID_tipo_documento'];
    }
}


if ($tipo == 'consulta') {
    $resultado = $cliente->consultaCliente($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'editaNatural') {
    $resultado = $cliente->editaClienteNatural($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}

if ($tipo == 'editaJuridica') {
    $resultado = $cliente->editaClienteJuridica($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}