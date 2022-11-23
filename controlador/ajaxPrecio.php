<?php
include dirname(__file__, 2) . '/modelo/precio.php';

$precio = new Precio();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'consultaTipo') {
    $resultado = $precio->getTipo($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    $resultado = $precio->editaPrecio($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_precio'].','.$_REQUEST['apellidos_precio'].','.$_REQUEST['fkID_tipo_documento'];
    }
}