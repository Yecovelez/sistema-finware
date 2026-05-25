<?php

class Producto {

    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conectar();
    }

    // LISTAR PRODUCTOS
    public function listar() {
        $sql = "SELECT * FROM productos";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // INSERTAR PRODUCTO
    public function insertar($nombre, $desc, $precio, $stock) {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre, $desc, $precio, $stock]);
    }

    // ELIMINAR PRODUCTO
    public function eliminar($id) {
        $sql = "DELETE FROM productos WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    // OBTENER POR ID
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM productos WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ACTUALIZAR PRODUCTO
    public function actualizar($id, $nombre, $desc, $precio, $stock) {
        $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, stock=? WHERE id=?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nombre, $desc, $precio, $stock, $id]);
    }
}

?>