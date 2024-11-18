<?php
session_start();

// Lista de usuarios válidos
$usuarios_validos = [
    'usuario1' => '12345',
    'admin'    => 'admin123',
    'invitado' => 'invitado',
    'Alvaro' =>'hola'
];

// Validar si los campos fueron enviados
if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
    $usuario = htmlspecialchars(trim($_POST['usuario']), ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8');

    // Verificar credenciales
    if (isset($usuarios_validos[$usuario]) && $usuarios_validos[$usuario] === $password) {
        $_SESSION['usuario'] = $usuario; // Guardar el usuario en sesión
        header("Location: bienvenido.php"); // Redirigir a la página de bienvenida
        exit;
    } else {
        $_SESSION['mensaje'] = "Usuario o contraseña incorrectos.";
        $_SESSION['tipo_mensaje'] = "error";
        header("Location: login.php"); // Redirigir al login
        exit;
    }
} else {
    $_SESSION['mensaje'] = "Por favor, complete todos los campos.";
    $_SESSION['tipo_mensaje'] = "error";
    header("Location: login.php"); // Redirigir al login
    exit;
}
?>
