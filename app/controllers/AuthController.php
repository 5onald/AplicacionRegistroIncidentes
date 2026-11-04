<?php

declare(strict_types=1);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../repositories/UsuarioRepository.php';
require_once __DIR__ . '/../services/AuthService.php';

class AuthController
{
    public function login(): void
    {
        // Obtener la cuenta autenticada por IIS.
        $cuentaAD = $_SERVER['LOGON_USER'] ?? '';

        if (empty($cuentaAD)) {
            $this->redirigirConError(
                'No fue posible identificar tu cuenta corporativa.'
            );
        }

        try {

            // Obtener conexión con SQL Server.
            $conexion = getDatabaseConnection();

            // Instanciar repositorio y servicio.
            $usuarioRepository = new UsuarioRepository($conexion);

            $authService = new AuthService(
                $conexion,
                $usuarioRepository
            );

            // Validar el usuario.
            $usuario = $authService->autenticar($cuentaAD);

            if ($usuario === null) {
                $this->redirigirConError(
                    'Tu cuenta no está registrada, está inactiva o no tiene un rol asignado.'
                );
            }

            // Regenerar el identificador de sesión.
            session_regenerate_id(true);

            // Guardar la información del usuario autenticado.
            $_SESSION['usuario'] = $usuario;

            // Redirigir al sistema.
            header('Location: catalogo.php');
            exit;

        } catch (Throwable $e) {

            // Registrar el error técnico en el log del servidor.
            error_log(
                '[AUTH ERROR] ' . $e->getMessage()
            );

            $this->redirigirConError(
                'Ocurrió un problema al validar tu acceso. Inténtalo nuevamente.'
            );
        }
    }

    /**
     * Guardar un mensaje y regresar al login.
     */
    private function redirigirConError(string $mensaje): void
    {
        $_SESSION['error'] = $mensaje;

        header('Location: index.php');
        exit;
    }
}