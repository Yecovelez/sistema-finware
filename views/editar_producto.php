<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto - FINWARE</title>

    <!-- RUTA SEGURA EN DOCKER -->
    <link rel="stylesheet" href="/views/css/estilos.css">
</head>
<body>
    <div class="container">

        <h1>Editar Producto</h1>

        <form action="index.php?action=actualizar" method="POST">

            <input type="hidden" name="id" value="<?php echo $p['id']; ?>">

            <label>Nombre del Producto:</label>
            <input type="text" name="nombre" value="<?php echo $p['nombre']; ?>" required>

            <label>Descripción:</label>
            <textarea name="descripcion"><?php echo $p['descripcion']; ?></textarea>

            <label>Precio:</label>
            <input type="number" name="precio" step="0.01" value="<?php echo $p['precio']; ?>" required>

            <label>Stock:</label>
            <input type="number" name="stock" value="<?php echo $p['stock']; ?>" required>

            <div class="acciones">
                <button type="submit" class="btn-nuevo">Actualizar Cambios</button>

                <a href="index.php"
                   class="btn-eliminar"
                   style="text-decoration:none; padding:10px; background:#6c757d; color:white; border-radius:5px;">
                   Cancelar
                </a>
            </div>

        </form>

    </div>
</body>
</html>