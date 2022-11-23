<?php
include dirname(__file__, 2) . '/modelo/usuario.php';

$usuario = new Usuario();
$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

if ($tipo == 'inserta') {
    $resultado = $usuario->insertaUsuario($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $_REQUEST['nombres_usuario'].','.$_REQUEST['apellidos_usuario'].','.$_REQUEST['fkID_tipo_documento'];
    }
}

if ($tipo == 'consulta') {
    $resultado = $usuario->consultaUsuario($_GET);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        return 'No se consulto';
    }
}

if ($tipo == 'edita') {
    $resultado = $usuario->editaUsuario($_REQUEST);
    if ($resultado) {
        echo json_encode($resultado); //imprime el json
    } else {
        echo $r = '0';
    }
}

if ($tipo == 'elimina_logico') {
    if ($usuario->eliminaLogicoUsuario($_GET)) {
        return '1';
    } else {
        return '0';
    }
}

if ($tipo == 'cerrar_sesion') {
    session_start();
    session_destroy();
    echo "si";
}
?>