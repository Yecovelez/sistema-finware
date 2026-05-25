<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINWARE - Inventario</title>
    <link rel="stylesheet" href="views/css/estilos.css">
</head>
<body>

    <div class="container">
        <h1>Gestión de Inventario - FINWARE</h1>
        
        <div class="acciones">
            <a href="index.php?action=crear" class="btn-nuevo" style="text-decoration: none; display: inline-block; padding: 10px; background: #28a745; color: white; border-radius: 5px;">+ Nuevo Producto</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($todosLosProductos)): ?>
                    <?php foreach ($todosLosProductos as $p): ?>
                    <tr>
                        <td><?php echo $p['id']; ?></td>
                        <td><?php echo $p['nombre']; ?></td>
                        <td><?php echo $p['descripcion']; ?></td>
                        <td>$<?php echo number_format($p['precio'], 2); ?></td>
                        <td><?php echo $p['stock']; ?></td>
                        <td>
                            <a href="index.php?action=editar&id=<?php echo $p['id']; ?>" 
                               class="btn-editar" 
                               style="text-decoration: none; padding: 5px 10px; background: #ffc107; color: black; border-radius: 3px; font-size: 13px; margin-right: 5px;">
                               Editar
                            </a>

                            <a href="index.php?action=borrar&id=<?php echo $p['id']; ?>" 
                               class="btn-eliminar" 
                               onclick="return confirm('¿Estás seguro de eliminar este producto?')"
                               style="text-decoration: none; padding: 5px 10px; background: #dc3545; color: white; border-radius: 3px; font-size: 13px;">
                               Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align:center;">No hay productos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="views/js/main.js"></script>
</body>
</html>