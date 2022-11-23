<?php
include dirname(__file__, 2) . '/modelo/permisos.php';

$permisos = new Permisos();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'elimina') {
    if ($permisos->eliminaPermisos($_GET)) {
        return '1';
    } else {
        return '0';
    }
}

if ($tipo == 'inserta') {
    $resultado = $permisos->insertaPermisos($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_usuario'].','.$_REQUEST['apellidos_usuario'].','.$_REQUEST['fkID_tipo_documento'];
    }
}
?>