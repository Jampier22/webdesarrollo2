<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Inscripciones VIP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e3eafc);
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background-color: #6f42c1;
        }
        .navbar-brand {
            color: #fff;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .navbar-brand:hover {
            color: #e0dfff;
        }
        .table-container {
            background: #fff;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .table thead {
            background-color: #6f42c1;
            color: #fff;
        }
        footer {
            margin-top: 50px;
            text-align: center;
            color: #999;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="bi bi-people-fill me-2"></i>Inscripciones VIP</a>
    </div>
</nav>

<!-- Contenido -->
<div class="container mt-5">
    <div class="table-container">
        <h3 class="text-center text-primary mb-4">
            <i class="bi bi-card-checklist me-2"></i>Listado de Inscripciones VIP
        </h3>

        <?php
        $sql = "
            SELECT i.nombre_evento, i.fecha, u.nombre_usuario 
            FROM inscripcionesjg i 
            JOIN usuarios1 u ON i.usuario_id = u.id
        ";
        $resultado = $conexion->query($sql);

        if ($resultado && $resultado->num_rows > 0): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead>
                        <tr>
                            <th><i class="bi bi-calendar-event-fill me-1"></i>Evento</th>
                            <th><i class="bi bi-calendar-date-fill me-1"></i>Fecha</th>
                            <th><i class="bi bi-person-fill me-1"></i>Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($fila['nombre_evento']) ?></td>
                                <td><?= htmlspecialchars($fila['fecha']) ?></td>
                                <td><?= htmlspecialchars($fila['nombre_usuario']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">
                <i class="bi bi-exclamation-circle-fill me-2"></i>No hay inscripciones registradas VIP.
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Footer -->
<footer class="mt-5">
    <p>© <?= date("Y") ?> Inscripciones VIP | CREATE BY 💜 JAMPIER HIDALGO </p>
</footer>

</body>
</html>

