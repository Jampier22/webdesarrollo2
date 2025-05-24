<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e0f7fa, #f8bbd0);
            min-height: 100vh;
        }
        .navbar {
            background: #007bff;
        }
        .navbar-brand {
            font-weight: bold;
            color: white;
        }
        .card-form {
            border-radius: 1rem;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            background-color: #ffffff;
        }
        .form-label {
            font-weight: 500;
        }
        .btn-custom {
            background-color: #007bff;
            border: none;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="bi bi-person-fill-add me-2"></i>Registro de Usuarios VIP</a>
    </div>
</nav>

<!-- Contenido -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-form p-4">
                <h3 class="text-center mb-4 text-primary"><i class="bi bi-pencil-square me-2"></i>Nuevo Usuario VIP</h3>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Nombre:</label>
                        <input type="text" name="nombre_usuario" class="form-control" placeholder="Ej. Carla Pérez" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo:</label>
                        <input type="email" name="correo" class="form-control" placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-custom text-white">
                            <i class="bi bi-check-circle me-1"></i>Guardar Usuario
                        </button>
                    </div>
                </form>

                <!-- Resultado del registro -->
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nombre = $_POST['nombre_usuario'];
                    $correo = $_POST['correo'];

                    $stmt = $conexion->prepare("INSERT INTO usuarios1 (nombre_usuario, correo) VALUES (?, ?)");
                    $stmt->bind_param("ss", $nombre, $correo);

                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success mt-4'><i class='bi bi-check-circle-fill'></i> Usuario registrado correctamente.</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-4'><i class='bi bi-x-circle-fill'></i> Error al registrar el usuario.</div>";
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
    <p>CREATE BY Jampier Hidalgo&copy; 2025</p>
</footer>

</body>
</html>
