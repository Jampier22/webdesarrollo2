<?php
$conexion = new mysqli("127.0.0.1", "root", "", "inscripcionesjh");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Mensaje de bienvenida en estilo bonito (solo visible si se accede directamente)
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Conexión Exitosa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background: linear-gradient(to right, #6f42c1, #007bff);
                color: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                font-family: "Segoe UI", sans-serif;
            }
            .welcome-box {
                background: rgba(255,255,255,0.1);
                padding: 2rem 3rem;
                border-radius: 1rem;
                box-shadow: 0 10px 30px rgba(0,0,0,0.2);
                text-align: center;
            }
            h1 {
                font-weight: bold;
                font-size: 2.5rem;
            }
        </style>
    </head>
    <body>
        <div class="welcome-box">
            <h1>¡Bienvenido a la tarea de Jampier Hidalgo! 🎓</h1>
            <p class="lead mt-3">Conexión a la base de datos establecida correctamente.</p>
        </div>
    </body>
    </html>
    ';
}
?>