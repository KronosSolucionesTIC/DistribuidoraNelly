<?php
include dirname(__file__, 2) . '/modelo/empresa.php';

$empresa = new Empresa();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'consulta') {
    $resultado = $empresa->consultaEmpresa($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    $resultado = $empresa->editaEmpresa($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}