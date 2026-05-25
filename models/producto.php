<?php
class Producto {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conectar();
    }

    // Esta es la función que ya tenías
    public function listar() {
        $sql = "SELECT * FROM productos";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // AQUÍ DEBE ESTAR LA FUNCIÓN QUE FALTA (Paso 3 anterior)
    public function insertar($nombre, $desc, $precio, $stock) {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$nombre, $desc, $precio, $stock]);
    }
    // AQUI DEBE ESTAR LA FUNCION PARA ELIMINAR PRODUCTOS DE LA BASE DE DATOS
    public function eliminar($id) {
    $sql = "DELETE FROM productos WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$id]);
}

// Para buscar los datos del producto que vamos a editar
public function obtenerPorId($id) {
    $sql = "SELECT * FROM productos WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Para guardar los cambios realizados
public function actualizar($id, $nombre, $desc, $precio, $stock) {
    $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, stock=? WHERE id=?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$nombre, $desc, $precio, $stock, $id]);
}

} // <--- Verifica que esta llave esté al final de TODO
?>