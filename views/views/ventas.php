<?php
$database = new Database();
$db = $database->conectar();
$query = $db->prepare("SELECT * FROM productos WHERE stock > 0");
$query->execute();
$productos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-fluid mt-4" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <div class="row">
        
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0"><i class="fas fa-shopping-cart"></i> Nueva Venta - FINWARE</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="index.php?action=guardarVenta" id="formNuevaVenta">
                        
                        <table class="table table-bordered table-striped" id="tablaCarrito">
                            <thead class="bg-light">
                                <tr>
                                    <th>Producto</th>
                                    <th style="width: 100px;">Cant.</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="bodyCarrito">
                                </tbody>
                        </table>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="m-0">Total:</h3>
                            <h3 class="m-0 text-success" id="textoTotal">$0.00</h3>
                        </div>

                        <input type="hidden" name="nuevaVentaTotal" id="inputTotalHidden" value="0">
                        <input type="hidden" name="listaProductosJson" id="listaProductosJson" required>

                        <button type="submit" class="btn btn-success btn-lg w-100 shadow-sm">
                            <i class="fas fa-check-circle"></i> Registrar Transacción
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h4 class="m-0"><i class="fas fa-boxes"></i> Productos en Inventario</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productos as $prod): ?>
                                <tr>
                                    <td><strong><?php echo $prod['nombre']; ?></strong></td>
                                    <td>$<?php echo number_format($prod['precio'], 2); ?></td>
                                    <td><span class="badge bg-info text-dark"><?php echo $prod['stock']; ?> und</span></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm btnAgregarProducto" 
                                                data-id="<?php echo $prod['id']; ?>"
                                                data-nombre="<?php echo $prod['nombre']; ?>"
                                                data-precio="<?php echo $prod['precio']; ?>"
                                                data-stock="<?php echo $prod['stock']; ?>">
                                            <i class="fas fa-plus"></i> Agregar
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
                alert("No puedes agregar más unidades. Supera las existencias físicas en stock (" + stockMax + ").");
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
    let totalGeneral = 0;

    carrito.forEach((item, index) => {
        let subtotal = item.precio * item.cantidad;
        totalGeneral += subtotal;

        bodyCarrito.innerHTML += `
            <tr>
                <td>${item.nombre}</td>
                <td>
                    <input type="number" class="form-control form-control-sm" value="${item.cantidad}" min="1" max="${item.stockMax}" 
                           onchange="cambiarCantidad(${index}, this.value)">
                </td>
                <td>$${item.precio.toFixed(2)}</td>
                <td><strong>$${subtotal.toFixed(2)}</strong></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminarDelCarrito(${index})">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
    });

    document.getElementById('textoTotal').innerText = `$${totalGeneral.toFixed(2)}`;
    document.getElementById('inputTotalHidden').value = totalGeneral.toFixed(2);
    document.getElementById('listaProductosJson').value = JSON.stringify(carrito);
}

function cambiarCantidad(index, valor) {
    let cant = parseInt(valor);
    if(cant > carrito[index].stockMax) {
        alert("La cantidad ingresada supera el stock real (" + carrito[index].stockMax + ")");
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
        alert("El carrito de compras está vacío.");
    }
});
</script>
