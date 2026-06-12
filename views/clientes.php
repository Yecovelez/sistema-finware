<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINWARE - Gestión de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-white" href="index.php">
                <i class="fas fa-warehouse me-2"></i>FINWARE
            </a>
            <div class="navbar-nav">
                <a class="nav-link text-white opacity-75" href="index.php?action=ventas"><i class="fas fa-shopping-cart me-1"></i> Ventas</a>
                <a class="nav-link text-white active fw-bold" href="index.php?action=clientes"><i class="fas fa-users me-1"></i> Clientes</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-4" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        <div class="row">
            
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 bg-white">
                    <div class="card-header bg-primary text-white p-3">
                        <h5 class="m-0"><i class="fas fa-user-plus me-2"></i> Nuevo Cliente</h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="index.php?action=guardarCliente">
                            
                            <div class="mb-3">
                                <label for="nuevoDocumento" class="form-label text-secondary fw-bold">Documento (Cédula/NIT) *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    <input type="text" class="form-control" id="nuevoDocumento" name="nuevoDocumento" placeholder="Ej: 10234567" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="nuevoNombre" class="form-label text-secondary fw-bold">Nombre Completo *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="nuevoNombre" name="nuevoNombre" placeholder="Ej: Juan Pérez" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="nuevoTelefono" class="form-label text-secondary fw-bold">Teléfono / Celular</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="text" class="form-control" id="nuevoTelefono" name="nuevoTelefono" placeholder="Ej: 3001234567">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="nuevoEmail" class="form-label text-secondary fw-bold">Correo Electrónico</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="nuevoEmail" name="nuevoEmail" placeholder="Ej: cliente@correo.com">
                                </div>
                            </div>

                            <small class="text-muted d-block mb-3">* Campos obligatorios</small>

                            <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm fw-bold">
                                <i class="fas fa-save me-2"></i> Guardar Cliente
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mb-4">
                <div class="card shadow-sm border-0 bg-white">
                    <div class="card-header bg-dark text-white p-3">
                        <h5 class="m-0"><i class="fas fa-users me-2"></i> Base de Datos de Clientes</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle border">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20%;">Documento</th>
                                        <th style="width: 35%;">Nombre</th>
                                        <th style="width: 20%;">Teléfono</th>
                                        <th style="width: 25%;">Correo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($clientes)): ?>
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-4">
                                                <i class="fas fa-info-circle me-2"></i>No hay clientes registrados en el sistema todavía.
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($clientes as $cliente): ?>
                                        <tr>
                                            <td class="fw-bold text-secondary"><?php echo htmlspecialchars($cliente['documento']); ?></td>
                                            <td><strong><?php echo htmlspecialchars($cliente['nombre']); ?></strong></td>
                                            <td><?php echo !empty($cliente['telefono']) ? htmlspecialchars($cliente['telefono']) : '<span class="text-muted">N/A</span>'; ?></td>
                                            <td class="text-muted"><?php echo !empty($cliente['email']) ? htmlspecialchars($cliente['email']) : 'N/A'; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
