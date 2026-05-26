<div class="form-container">
    <h2>Registrar Nuevo Producto</h2>
    
    <form action="index.php?action=guardar" method="POST">
        
        <div class="form-grid">
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ej. Monitor XYZ" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="2" placeholder="Ej. Un monitor ideal para juegos o diseño"></textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <div class="input-with-prefix">
                    <span>$</span>
                    <input type="number" id="precio" name="precio" step="0.01" placeholder="750000.00" required>
                </div>
            </div>

            <div class="form-group">
                <label for="stock">Stock Inicial:</label>
                <input type="number" id="stock" name="stock" placeholder="10" required>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Guardar Producto</button>
            <a href="index.php" class="btn-cancel">Cancelar</a>
        </div>
    </form>
</div>

<style>
    /* Contenedor principal tipo tarjeta blanca */
    .form-container {
        max-width: 850px;
        margin: 30px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-container h2 {
        margin-top: 0;
        margin-bottom: 25px;
        color: #2c3e50;
        font-size: 28px;
    }

    /* Distribución en rejilla de 2 columnas */
    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr; /* Dos columnas iguales */
        gap: 20px; /* Espaciado entre campos */
        margin-bottom: 25px;
    }

    /* Cada bloque de campo (label + input) vertical */
    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-group label {
        font-weight: 600;
        color: #34495e;
        font-size: 15px;
    }

    /* Estilo general para cajas de texto e inputs */
    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group textarea {
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 15px;
        background-color: #fafafa;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #27ae60;
        box-shadow: 0 0 5px rgba(39, 174, 96, 0.3);
        outline: none;
        background-color: #ffffff;
    }

    /* Permitir que el textarea mantenga buena altura */
    .form-group textarea {
        resize: vertical;
    }

    /* Contenedor especial para el prefijo de moneda ($) */
    .input-with-prefix {
        display: flex;
        align-items: center;
        background: #fafafa;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .input-with-prefix span {
        padding: 0 12px;
        color: #7f8c8d;
        background: #ededed;
        border-right: 1px solid #ccc;
        height: 100%;
        display: flex;
        align-items: center;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
        font-weight: bold;
    }

    .input-with-prefix input {
        border: none !important;
        flex: 1;
        border-top-left-radius: 0 !important;
        border-bottom-left-radius: 0 !important;
    }

    /* Sección inferior de botones alineados */
    .form-actions {
        display: flex;
        justify-content: flex-end; /* Alinea a la derecha */
        gap: 12px;
        border-top: 1px solid #eee;
        padding-top: 20px;
    }

    /* Botón Guardar (Verde) */
    .btn-submit {
        background-color: #27ae60;
        color: white;
        border: none;
        padding: 12px 24px;
        font-size: 15px;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-submit:hover {
        background-color: #219653;
    }

    /* Botón Cancelar (Borde Rojo) */
    .btn-cancel {
        background-color: transparent;
        color: #c0392b;
        border: 1px solid #c0392b;
        padding: 12px 24px;
        font-size: 15px;
        font-weight: bold;
        text-decoration: none;
        border-radius: 5px;
        text-align: center;
        transition: all 0.2s;
    }

    .btn-cancel:hover {
        background-color: #fce4d6;
        color: #962d22;
    }

    /* Adaptabilidad para pantallas pequeñas (Celulares) */
    @media (max-width: 600px) {
        .form-grid {
            grid-template-columns: 1fr; /* Pasa a una sola columna */
        }
        .form-actions {
            flex-direction: column;
        }
    }
</style>