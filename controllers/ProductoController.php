<?php
// Traemos el modelo para poder usar sus funciones
require_once 'models/Producto.php';

class ProductoController {
    
    // 1. ESTA ES LA FUNCIÓN QUE YA TENÍAS (para mostrar la lista)
    public function index() {
        $producto = new Producto();
        $todosLosProductos = $producto->listar();
        require_once 'views/inventario.php';
    }

    // 2. AQUÍ EMPIEZAN LAS FUNCIONES NUEVAS (Paso 2)
    
    // Función para mostrar el formulario de "Nuevo Producto"
    public function crear() {
        require_once 'views/nuevo_producto.php';
    }

    // Función para recibir los datos del formulario y guardarlos
    public function guardar() {
        if ($_POST) {
            $producto = new Producto();
            // Recibe los datos que el usuario escribió en el formulario
            $producto->insertar(
                $_POST['nombre'], 
                $_POST['descripcion'], 
                $_POST['precio'], 
                $_POST['stock']
            );
            
            // Después de guardar, nos manda de vuelta a la tabla principal
            header("Location: index.php");
        }
    }

    public function borrar() {
    if (isset($_GET['id'])) {
        $producto = new Producto();
        $producto->eliminar($_GET['id']);
        header("Location: index.php"); // Regresa a la tabla
    }
}

public function editar() {
    if (isset($_GET['id'])) {
        $productoModel = new Producto();
        $p = $productoModel->obtenerPorId($_GET['id']);
        require_once 'views/editar_producto.php';
    }
}

public function actualizar() {
    if ($_POST) {
        $producto = new Producto();
        $producto->actualizar($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock']);
        header("Location: index.php");
    }
}
    
} // <--- ESTA ES LA LLAVE QUE CIERRA LA CLASE. No pongas nada después de ella.
?>