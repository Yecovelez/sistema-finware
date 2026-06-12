<?php

class ModeloClientes {

    // 1. REGISTRAR UN NUEVO CLIENTE
    static public function mdlRegistrarCliente($tabla, $datos) {
        if (class_exists('Database')) {
            $database = new Database();
            $db = $database->conectar();
        } else {
            return "error";
        }

        $stmt = $db->prepare("INSERT INTO $tabla(documento, nombre, telefono, email) 
                              VALUES (:documento, :nombre, :telefono, :email)");

        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            // Si hay un error (por ejemplo, documento duplicado), capturamos el fallo
            return "error";
        }
        $stmt = null;
    }

    // 2. MOSTRAR/LISTAR TODOS LOS CLIENTES
    static public function mdlMostrarClientes($tabla) {
        if (class_exists('Database')) {
            $database = new Database();
            $db = $database->conectar();
        } else {
            return array();
        }

        $stmt = $db->prepare("SELECT * FROM $tabla ORDER BY id DESC");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
    }
}
