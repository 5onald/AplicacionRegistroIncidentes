<?php

declare(strict_types=1);

require_once __DIR__ . '/../repositories/UsuarioRepository.php';

class AuthService
{
    private PDO $conexion;
    private UsuarioRepository $usuarioRepository;

    public function __construct(
        PDO $conexion,
        UsuarioRepository $usuarioRepository
    ) {
        $this->conexion = $conexion;
        $this->usuarioRepository = $usuarioRepository;
    }

    /**
     * Validar la cuenta corporativa y recuperar sus datos.
     */
    public function autenticar(string $cuentaAD): ?array
    {
        $cuentaAD = trim($cuentaAD);

        if ($cuentaAD === '') {
            return null;
        }

        $this->conexion->beginTransaction();

        try {

            // Buscar al usuario en SQL Server.
            $usuario = $this->usuarioRepository
                ->buscarPorCuentaAD($cuentaAD);

            // Si no existe, está inactivo o no tiene roles.
            if ($usuario === null) {
                $this->conexion->rollBack();
                return null;
            }

            // Actualizar las fechas de acceso.
            $this->usuarioRepository
                ->actualizarFechasAcceso($usuario['id']);

            $this->conexion->commit();

            return $usuario;

        } catch (Throwable $e) {

            if ($this->conexion->inTransaction()) {
                $this->conexion->rollBack();
            }

            throw $e;
        }
    }
}