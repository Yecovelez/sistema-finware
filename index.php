<?php
// 1. CARGAR LA CONEXIÓN PRIMERO (Esto es lo que falta)
require_once 'config/db.php';

// 2. Cargar el controlador
require_once 'controllers/ProductoController.php';

$controlador = new ProductoController();

// 3. Decidir qué acción ejecutar
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if ($action == 'crear') {
    $controlador->crear();
} elseif ($action == 'guardar') {
    $controlador->guardar();
} elseif ($action == 'borrar') {
    $controlador->borrar();
} elseif ($action == 'editar') {
    $controlador->editar(); // Esta línea llama al archivo que acabas de crear
} elseif ($action == 'actualizar') {
    $controlador->actualizar();
} else {
    $controlador->index();
}
?>