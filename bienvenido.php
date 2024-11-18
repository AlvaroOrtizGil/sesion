<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: sin_permisos.php"); // Redirigir a la pantalla de no permisos
    exit;
}

// Obtener datos para la bienvenida
$usuario = $_SESSION['usuario'];
$hora_actual = date("H:i:s"); // Hora actual en formato 24 horas
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Bienvenida</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9f5ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .welcome-container {
            background: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h2>¡Bienvenido, <?= htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8'); ?>!</h2>
        <p>La hora actual es: <strong><?= $hora_actual; ?></strong></p>
        <p>Esperamos que tengas un excelente día 😊</p>
        <form action="cerrar_sesion.php" method="POST">
            <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
        </form>
    </div>
</body>
</html>
