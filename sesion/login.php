<?php
session_start();
$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : null;
$tipo_mensaje = isset($_SESSION['tipo_mensaje']) ? $_SESSION['tipo_mensaje'] : null;
unset($_SESSION['mensaje'], $_SESSION['tipo_mensaje']); // Limpiar mensajes después de mostrarlos
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .mensaje-error {
            color: #dc3545;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center mb-4">Iniciar Sesión</h2>
        <!-- Mostrar mensajes dinámicos -->
<?php if ($mensaje): ?> 
    <!-- Si existe un mensaje en la variable $mensaje, lo muestra. -->
    <p class="<?= $tipo_mensaje === 'error' ? 'mensaje-error' : ''; ?>">
        <!-- Establece una clase CSS condicionalmente. Si $tipo_mensaje es 'error', asigna la clase 'mensaje-error'. -->
        <?= htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?>
        <!-- Muestra el contenido del mensaje sanitizado para evitar inyecciones de código (XSS). -->
    </p>
<?php endif; ?>
        
<form action="procesar.php" method="POST">
    <!-- Formulario que envía los datos a procesar.php mediante el método POST. -->
    <div class="mb-3">
        <label for="usuario" class="form-label">Usuario:</label>
        <!-- Etiqueta para el campo de texto del usuario, asociada al input con el atributo 'for'. -->
        <input type="text" id="usuario" name="usuario" class="form-control" required>
        <!-- Campo de texto donde el usuario ingresa su nombre. 'required' hace que este campo sea obligatorio. -->
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña:</label> 
        <!-- Etiqueta para el campo de texto de contraseña. -->
        <input type="password" id="password" name="password" class="form-control" required>
        <!-- Campo para ingresar la contraseña. El atributo 'type="password"' oculta los caracteres ingresados. -->
    </div>
    <div class="d-grid">
        <!-- Contenedor con diseño de grilla que estira el botón para que ocupe todo el ancho. -->
        <button type="submit" class="btn btn-primary">Acceder</button>
        <!-- Botón para enviar el formulario. Tiene la clase 'btn btn-primary' para aplicar estilos de Bootstrap. -->
    </div>
</form>

    </div>
</body>
</html>
