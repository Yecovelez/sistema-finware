<?php
require_once 'models/VentaModel.php';

class VentaController {

    // 1. MÉTODO PARA MOSTRAR LA INTERFAZ DEL CARRITO CON ESTILOS INYECTADOS
    public function index() {
        $database = new Database();
        $db = $database->conectar();
        $query = $db->prepare("SELECT * FROM productos WHERE stock > 0");
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>FINWARE - Ventas</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        </head>
        <body class="bg-light">

        <div class="container-fluid mt-4" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            <div class="row">
                
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white p-3">
                            <h4 class="m-0"><i class="fas fa-shopping-cart me-2"></i> Nueva Venta - FINWARE</h4>
                        </div>
                        <div class="card-body p-4">
                            <form method="POST" action="index.php?action=guardarVenta" id="formNuevaVenta">
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover align-middle" id="tablaCarrito">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 35%;">Producto</th>
                                                <th style="width: 20%;">Cant.</th>
                                                <th style="width: 20%;">Precio</th>
                                                <th style="width: 20%;">Subtotal</th>
                                                <th style="width: 5%;"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodyCarrito">
                                        </tbody>
                                    </table>
                                </div>

                                <hr class="my-4">

                                <div class="row align-items-center mb-3">
                                    <div class="col-6">
                                        <label for="inputDescuento" class="form-label text-secondary fw-bold m-0">Aplicar Descuento ($):</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="number" class="form-control text-end fw-bold text-danger" id="inputDescuento" name="ventaDescuento" value="0.00" min="0" step="0.01" oninput="calcularTotales()">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="text-muted">Subtotal Neto:</span>
                                    <span class="text-muted" id="textoSubtotal">$0.00</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h3 class="m-0 text-secondary">Total a Pagar:</h3>
                                    <h3 class="m-0 text-success fw-bold" id="textoTotal">$0.00</h3>
                                </div>

                                <input type="hidden" name="nuevaVentaTotal" id="inputTotalHidden" value="0">
                                <input type="hidden" name="listaProductosJson" id="listaProductosJson" required>

                                <button type="submit" class="btn btn-success btn-lg w-100 shadow-sm py-2 fw-bold">
                                    <i class="fas fa-check-circle me-2"></i> Registrar Transacción
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-dark text-white p-3">
                            <h4 class="m-0"><i class="fas fa-boxes me-2"></i> Productos en Inventario</h4>
                        </div>
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered align-middle">
                                    <thead class="table-blue text-white" style="background-color: #007bff;">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Stock</th>
                                            <th class="text-center">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($productos as $prod): ?>
                                        <tr>
                                            <td><strong><?php echo htmlspecialchars($prod['nombre']); ?></strong></td>
                                            <td class="text-primary fw-bold">$<?php echo number_format($prod['precio'], 2); ?></td>
                                            <td><span class="badge bg-info text-dark px-2 py-2" style="font-size: 0.9rem;"><?php echo $prod['stock']; ?> und</span></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-sm px-3 shadow-sm btnAgregarProducto" 
                                                        data-id="<?php echo $prod['id']; ?>"
                                                        data-nombre="<?php echo htmlspecialchars($prod['nombre']); ?>"
                                                        data-precio="<?php echo $prod['precio']; ?>"
                                                        data-stock="<?php echo $prod['stock']; ?>">
                                                    <i class="fas fa-plus me-1"></i> Agregar
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
        let carrito = [];

        document.querySelectorAll('.btnAgregarProducto').forEach(boton => {
            boton.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const nombre = this.getAttribute('data-nombre');
                const precio = parseFloat(this.getAttribute('data-precio'));
                const stockMax = parseInt(this.getAttribute('data-stock'));

                const existe = carrito.find(item => item.id === id);

                if (existe) {
                    if (existe.cantidad < stockMax) {
                        existe.cantidad++;
                    } else {
                        alert("No puedes vender más unidades de las disponibles en el inventario (" + stockMax + ").");
                        return;
                    }
                } else {
                    carrito.push({ id, nombre, precio, cantidad: 1, stockMax });
                }

                renderizarCarrito();
            });
        });

        function renderizarCarrito() {
            const bodyCarrito = document.getElementById('bodyCarrito');
            bodyCarrito.innerHTML = '';

            carrito.forEach((item, index) => {
                let subtotal = item.precio * item.cantidad;

                bodyCarrito.innerHTML += `
                    <tr>
                        <td class="fw-bold text-secondary">${item.nombre}</td>
                        <td>
                            <input type="number" class="form-control form-control-sm text-center" value="${item.cantidad}" min="1" max="${item.stockMax}" 
                                   onchange="cambiarCantidad(${index}, this.value)" style="width: 70px;">
                        </td>
                        <td class="text-muted">$${item.precio.toFixed(2)}</td>
                        <td class="text-dark fw-bold">$${subtotal.toFixed(2)}</td>
                        <td>
                            <button type="button" class="btn btn-outline-danger btn-sm border-0" onclick="eliminarDelCarrito(${index})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });

            calcularTotales();
        }

        // LÓGICA DE CALCULO MATEMÁTICO INTEGRADA
        function calcularTotales() {
            let subtotalNeto = 0;

            carrito.forEach(item => {
                subtotalNeto += item.precio * item.cantidad;
            });

            // Leer valor de descuento ingresado por el usuario
            let descuentoInput = parseFloat(document.getElementById('inputDescuento').value);
            if (isNaN(descuentoInput) || descuentoInput < 0) {
                descuentoInput = 0;
            }

            // Validar que el descuento no supere el costo total neto de los productos
            if (descuentoInput > subtotalNeto) {
                alert("El descuento no puede ser mayor al subtotal de la venta.");
                descuentoInput = subtotalNeto;
                document.getElementById('inputDescuento').value = subtotalNeto.toFixed(2);
            }

            let totalFinal = subtotalNeto - descuentoInput;

            // Renderizar valores finales en la interfaz
            document.getElementById('textoSubtotal').innerText = `$${subtotalNeto.toFixed(2)}`;
            document.getElementById('textoTotal').innerText = `$${totalFinal.toFixed(2)}`;
            
            // Pasar el valor calculado final al input que procesa PHP
            document.getElementById('inputTotalHidden').value = totalFinal.toFixed(2);
            document.getElementById('listaProductosJson').value = JSON.stringify(carrito);
        }

        function cambiarCantidad(index, valor) {
            let cant = parseInt(valor);
            if(cant > carrito[index].stockMax) {
                alert("La cantidad supera las existencias (" + carrito[index].stockMax + ")");
                carrito[index].cantidad = carrito[index].stockMax;
            } else if (cant < 1 || isNaN(cant)) {
                carrito[index].cantidad = 1;
            } else {
                carrito[index].cantidad = cant;
            }
            renderizarCarrito();
        }

        function eliminarDelCarrito(index) {
            carrito.splice(index, 1);
            renderizarCarrito();
        }

        document.getElementById('formNuevaVenta').addEventListener('submit', function(e) {
            if (carrito.length === 0) {
                e.preventDefault();
                alert("El carrito está vacío. Agrega productos.");
            }
        });
        </script>
        </body>
        </html>
        <?php
    }

    // 2. MÉTODO PARA PROCESAR Y GUARDAR LA TRANSACCIÓN CON EL NUEVO MODELO
    public function guardar() {
        if (isset($_POST["nuevaVentaTotal"])) {
            
            $tablaVentas = "ventas";
            
            // Capturamos el descuento que viaja desde el formulario por POST
            $descuento = isset($_POST["ventaDescuento"]) ? $_POST["ventaDescuento"] : 0;

            // Armamos el arreglo mapeado con las variables exactas que espera el ModeloVentas
            $datosVenta = array(
                "total" => $_POST["nuevaVentaTotal"],
                "descuento" => $descuento
            );

            $idVentaGarantizado = ModeloVentas::mdlRegistrarVenta($tablaVentas, $datosVenta);

            if ($idVentaGarantizado != "error" && is_numeric($idVentaGarantizado)) {
                
                $tablaDetalles = "detalle_ventas";
                $listaProductos = json_decode($_POST["listaProductosJson"], true);
                $erroresDetalle = 0;

                foreach ($listaProductos as $key => $value) {
                    $datosDetalle = array(
                        "venta_id" => $idVentaGarantizado,
                        "producto_id" => $value["id"],
                        "cantidad" => $value["cantidad"],
                        "precio_unitario" => $value["precio"]
                    );

                    $respuestaDetalle = ModeloVentas::mdlRegistrarDetalleVenta($tablaDetalles, $datosDetalle);
                    
                    if ($respuestaDetalle == "error") {
                        $erroresDetalle++;
                    }
                }

                if ($erroresDetalle == 0) {
                    echo '<script>
                        alert("¡La venta con descuento ha sido registrada con éxito y el inventario se ha actualizado!");
                        window.location = "index.php?action=ventas"; 
                    </script>';
                } else {
                    echo '<script>alert("Venta creada, pero con errores en el detalle.");</script>';
                }
            } else {
                echo '<script>alert("Error crítico al registrar la venta.");</script>';
            }
        }
    }
}
?>
