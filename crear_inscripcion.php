<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscripción a Evento VIP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e3f2fd, #f8bbd0);
            min-height: 100vh;
        }
        .navbar {
            background-color: #6f42c1;
        }
        .navbar-brand {
            color: white;
            font-weight: bold;
        }
        .card-form {
            border-radius: 1rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #6f42c1;
            border: none;
        }
        .btn-custom:hover {
            background-color: #5a379e;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="bi bi-stars me-2"></i>Evento VIP</a>
    </div>
</nav>

<!-- Contenido -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card card-form bg-white p-4">
                <h3 class="text-center text-primary mb-4"><i class="bi bi-calendar-plus me-2"></i>Inscribirse a Evento</h3>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Nombre del evento:</label>
                        <input type="text" name="nombre_evento" class="form-control" placeholder="Ej. Gala Anual VIP" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha:</label>
                        <input type="date" name="fecha" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Usuario:</label>
                        <select name="usuario_id" class="form-select" required>
                            <option value="">Seleccione un usuario</option>
                            <?php
                            $usuarios = $conexion->query("SELECT id, nombre_usuario FROM usuarios1");
                            while ($user = $usuarios->fetch_assoc()) {
                                echo "<option value='{$user['id']}'>{$user['nombre_usuario']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-custom text-white">
                            <i class="bi bi-check2-circle me-1"></i>Guardar inscripción
                        </button>
                    </div>
                </form>

                <!-- Resultado -->
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $evento = $_POST['nombre_evento'];
                    $fecha = $_POST['fecha'];
                    $usuario_id = $_POST['usuario_id'];

                    $stmt = $conexion->prepare("INSERT INTO inscripcionesjg (nombre_evento, fecha, usuario_id) VALUES (?, ?, ?)");
                    $stmt->bind_param("ssi", $evento, $fecha, $usuario_id);

                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success mt-4'><i class='bi bi-check-circle-fill'></i> Inscripción registrada con éxito.</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-4'><i class='bi bi-x-circle-fill'></i> Error: " . $stmt->error . "</div>";
                    }

                    $stmt->close();
                }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-center mt-5 text-muted small">
    <p>© 2025 Evento VIP | CREATE BY Jampier Hidalgo</p>
</footer>

</body>
</html>
