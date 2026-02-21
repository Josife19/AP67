<?php
require_once __DIR__ . '/autoload.php';

// El gestor arranca sesión internamente
$gestor = new GestorEntidad();
$controller = new EntidadController($gestor);

$accion = $_GET['accion'] ?? 'index';

switch ($accion) {
    case 'crear':
        $controller->crear();
        break;
    case 'editar':
        $controller->editar();
        break;
    case 'eliminar':
        $controller->eliminar();
        break;
    default:
        $controller->index();
        break;
}

