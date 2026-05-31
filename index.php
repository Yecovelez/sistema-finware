<?php
// 1. FORZAR VISUALIZACIÓN DE ERRORES
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 2. CONEXIÓN A LA BASE DE DATOS
if (file_exists('config/db.php')) {
    require_once 'config/db.php';
} else if (file_exists('config/conexion.php')) {
    require_once 'config/conexion.php';
}

// 3. CONTROLADORES
require_once 'controllers/ProductoController.php';
require_once 'controllers/VentaController.php'; 

$controladorProducto = new productoController();
$controladorVenta = new VentaController(); 

// 4. ENRUTADOR (ROUTER)
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {

    // --- RUTAS DE PRODUCTOS (INVENTARIO) ---
    case 'crear':
        $controladorProducto->crear();
        break;

    case 'guardar':
        $controladorProducto->guardar();
        break;

    case 'borrar':
        $controladorProducto->borrar();
        break;

    case 'editar':
        $controladorProducto->editar();
        break;

    case 'actualizar':
        $controladorProducto->actualizar();
        break;

    // --- NUEVAS RUTAS DE VENTAS ---
    case 'ventas':
        $controladorVenta->index(); 
        break;

    case 'guardarVenta':
        $controladorVenta->guardar(); 
        break;

    // --- RUTA POR DEFECTO ---
    default:
        $controladorProducto->index();
        break;
}
?>
