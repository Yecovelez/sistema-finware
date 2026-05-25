<?php

// Cargamos el modelo correctamente (ruta segura para Docker/Linux)
require_once __DIR__ . '/../models/Producto.php';

class ProductoController {

    // Mostrar lista de productos
    public function index() {
        $producto = new Producto();
        $todosLosProductos = $producto->listar();

        require_once __DIR__ . '/../views/inventario.php';
    }

    // Mostrar formulario de creación
    public function crear() {
        require_once __DIR__ . '/../views/nuevo_producto.php';
    }

    // Guardar nuevo producto
    public function guardar() {
        if ($_POST) {
            $producto = new Producto();

            $producto->insertar(
                $_POST['nombre'],
                $_POST['descripcion'],
                $_POST['precio'],
                $_POST['stock']
            );

            header("Location: index.php");
            exit;
        }
    }

    // Eliminar producto
    public function borrar() {
        if (isset($_GET['id'])) {
            $producto = new Producto();
            $producto->eliminar($_GET['id']);

            header("Location: index.php");
            exit;
        }
    }

    // Mostrar formulario de edición
    public function editar() {
        if (isset($_GET['id'])) {
            $productoModel = new Producto();
            $p = $productoModel->obtenerPorId($_GET['id']);

            require_once __DIR__ . '/../views/editar_producto.php';
        }
    }

    // Actualizar producto
    public function actualizar() {
        if ($_POST) {
            $producto = new Producto();

            $producto->actualizar(
                $_POST['id'],
                $_POST['nombre'],
                $_POST['descripcion'],
                $_POST['precio'],
                $_POST['stock']
            );

            header("Location: index.php");
            exit;
        }
    }
}

?>