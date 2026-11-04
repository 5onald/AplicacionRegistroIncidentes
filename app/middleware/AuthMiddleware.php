<?php

declare(strict_types=1);

class AuthMiddleware
{
    /**
     * Comprobar que exista una sesión autenticada.
     */
    public static function requireLogin(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION['usuario'])) {
            header('Location: index.php');
            exit;
        }
    }

    /**
     * Comprobar que el usuario tenga al menos uno
     * de los roles permitidos.
     */
    public static function requireAnyRole(array $rolesPermitidos): void
    {
        self::requireLogin();

        $rolesUsuario = array_column(
            $_SESSION['usuario']['roles'] ?? [],
            'id'
        );

        $rolesUsuario = array_map('intval', $rolesUsuario);
        $rolesPermitidos = array_map('intval', $rolesPermitidos);

        if (empty(array_intersect(
            $rolesUsuario,
            $rolesPermitidos
        ))) {
            http_response_code(403);
            exit('No tienes permisos para acceder a este módulo.');
        }
    }
}