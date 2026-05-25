<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Producto - FINWARE</title>
    <link rel="stylesheet" href="views/css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Registrar Nuevo Producto</h1>
        <form action="index.php?action=guardar" method="POST">
            <label>Nombre del Producto:</label>
            <input type="text" name="nombre" required>

            <label>Descripción:</label>
            <textarea name="descripcion"></textarea>

            <label>Precio:</label>
            <input type="number" name="precio" step="0.01" required>

            <label>Stock Inicial:</label>
            <input type="number" name="stock" required>

            <div class="acciones">
                <button type="submit" class="btn-nuevo">Guardar Producto</button>
                <a href="index.php" class="btn-eliminar">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>