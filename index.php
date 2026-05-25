<?php

// 1. CONEXIÓN BD
require_once 'config/db.php';

// 2. CONTROLADOR
require_once 'controllers/ProductoController.php';

// 🔥 IMPORTANTE: el nombre de clase debe coincidir EXACTO
$controlador = new productoController();

// 3. ROUTER SIMPLE
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {

    case 'crear':
        $controlador->crear();
        break;

    case 'guardar':
        $controlador->guardar();
        break;

    case 'borrar':
        $controlador->borrar();
        break;

    case 'editar':
        $controlador->editar();
        break;

    case 'actualizar':
        $controlador->actualizar();
        break;

    default:
        $controlador->index();
        break;
}
?>