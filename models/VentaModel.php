<?php

class ModeloVentas {

    // Insertar la venta general
    static public function mdlRegistrarVenta($tabla, $datos) {
        if (class_exists('Database')) {
            $database = new Database();
            $db = $database->conectar();
        } else {
            return "error";
        }

        $stmt = $db->prepare("INSERT INTO $tabla(total) VALUES (:total)");
        $stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $db->lastInsertId();
        } else {
            return "error";
        }
        $stmt = null;
    }

    // Insertar el desglose de productos y actualizar stock
    static public function mdlRegistrarDetalleVenta($tabla, $datos) {
        if (class_exists('Database')) {
            $database = new Database();
            $db = $database->conectar();
        } else {
            return "error";
        }
        
        $stmt = $db->prepare("INSERT INTO $tabla(venta_id, producto_id, cantidad, precio_unitario) 
                              VALUES (:venta_id, :producto_id, :cantidad, :precio_unitario)");
        
        $stmt->bindParam(":venta_id", $datos["venta_id"], PDO::PARAM_INT);
        $stmt->bindParam(":producto_id", $datos["producto_id"], PDO::PARAM_INT);
        $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
        $stmt->bindParam(":precio_unitario", $datos["precio_unitario"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            // RESTA AUTOMÁTICA DE STOCK
            $tablaProductos = "productos"; 
            $stmtUpdate = $db->prepare("UPDATE $tablaProductos 
                                        SET stock = stock - :cantidad_vendida 
                                        WHERE id = :producto_id");
            
            $stmtUpdate->bindParam(":cantidad_vendida", $datos["cantidad"], PDO::PARAM_INT);
            $stmtUpdate->bindParam(":producto_id", $datos["producto_id"], PDO::PARAM_INT);
            $stmtUpdate->execute();
            
            return "ok";
        } else {
            return "error";
        }
        $stmt = null;
    }
}
