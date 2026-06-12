<?php
// Forzar la inclusión del modelo para evitar la pantalla blanca
require_once __DIR__ . '/../models/ClienteModel.php';

class ClienteController {

    // 1. MÉTODO PARA MOSTRAR LA VISTA CON LA LISTA DE CLIENTES
    public function index() {
        $tabla = "clientes";
        
        // Ejecuta la consulta en la base de datos
        $clientes = ModeloClientes::mdlMostrarClientes($tabla);
        
        // Carga la vista
        require_once 'views/clientes.php';
    }

    // 2. MÉTODO PARA GUARDAR UN NUEVO CLIENTE
    public function guardar() {
        if (isset($_POST["nuevoDocumento"])) {
            $tabla = "clientes";
            $datos = array(
                "documento" => $_POST["nuevoDocumento"],
                "nombre"    => $_POST["nuevoNombre"],
                "telefono"  => $_POST["nuevoTelefono"],
                "email"     => $_POST["nuevoEmail"]
            );

            $respuesta = ModeloClientes::mdlRegistrarCliente($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    alert("¡El cliente ha sido guardado correctamente!");
                    window.location = "index.php?action=clientes";
                </script>';
            } else {
                echo '<script>
                    alert("Error al guardar el cliente.");
                    window.location = "index.php?action=clientes";
                </script>';
            }
        }
    }
}
?>
