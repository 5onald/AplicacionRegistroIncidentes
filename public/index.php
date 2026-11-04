<?php

declare(strict_types=1);

session_start();

require_once __DIR__ . '/../app/controllers/AuthController.php';

// Comprobar si se recibió un formulario.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $accion = $_POST['action'] ?? '';

    // Validar la acción solicitada.
    if ($accion !== 'login') {
        http_response_code(400);
        exit('Solicitud no válida.');
    }

    // Validar el token CSRF.
    $token = $_POST['csrf_token'] ?? '';

    if (
        !isset($_SESSION['csrf_token']) ||
        !is_string($token) ||
        !hash_equals($_SESSION['csrf_token'], $token)
    ) {
        $_SESSION['error'] = 'La solicitud no es válida. Inténtalo nuevamente.';

        header('Location: index.php');
        exit;
    }

    // Procesar el inicio de sesión.
    $authController = new AuthController();
    $authController->login();

    exit;
}

// Si ya inició sesión, dirigirlo al sistema.
if (isset($_SESSION['usuario'])) {
    header('Location: catalogo.php');
    exit;
}

// Generar un token para el formulario.
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Mostrar la vista del login.
require_once __DIR__ . '/../app/views/auth/login.php';
