<?php

declare(strict_types=1);

class UsuarioRepository
{
    private PDO $conexion;

    public function __construct(PDO $conexion)
    {
        $this->conexion = $conexion;
    }

    /**
     * Buscar un usuario activo mediante su cuenta AD.
     */
    public function buscarPorCuentaAD(string $cuentaAD): ?array
    {
        $sql = "
            SELECT
                U.IdUsuario,
                U.CuentaAD,
                U.NombreMostrar,
                U.Correo,
                U.Activo,
                U.FechaPrimerAcceso,
                U.FechaUltimoAcceso,
                R.IdRol,
                R.Nombre AS NombreRol,
                R.Descripcion
            FROM Usuario U
            INNER JOIN UsuarioRol UR
                ON U.IdUsuario = UR.IdUsuario
            INNER JOIN Rol R
                ON UR.IdRol = R.IdRol
            WHERE U.CuentaAD = :cuentaAD
              AND U.Activo = 1
            ORDER BY R.IdRol;
        ";

        $consulta = $this->conexion->prepare($sql);

        $consulta->execute([
            'CuentaAD' => $CuentaAD
        ]);

        $resultados = $consulta->fetchAll();

        // Si no existen resultados, no se concede acceso.
        if (empty($resultados)) {
            return null;
        }

        // Datos generales del usuario.
        $primerResultado = $resultados[0];

        // Recuperar todos los roles asociados.
        $roles = [];

        foreach ($resultados as $fila) {

            $idRol = (int) $fila['IdRol'];

            $roles[$idRol] = [
                'id' => $idRol,
                'nombre' => $fila['NombreRol'],
                'descripcion' => $fila['Descripcion']
            ];
        }

        return [
            'id' => (int) $primerResultado['IdUsuario'],
            'CuentaAD' => $primerResultado['CuentaAD'],
            'nombre' => $primerResultado['NombreMostrar'],
            'correo' => $primerResultado['Correo'],
            'activo' => (bool) $primerResultado['Activo'],
            'fechaPrimerAcceso' => $primerResultado['FechaPrimerAcceso'],
            'fechaUltimoAcceso' => $primerResultado['FechaUltimoAcceso'],
            'roles' => array_values($roles)
        ];
    }

    /**
     * Actualizar las fechas de acceso del usuario.
     */
    public function actualizarFechasAcceso(int $idUsuario): void
    {
        $sql = "
            UPDATE Usuario
            SET
                FechaPrimerAcceso = COALESCE(
                    FechaPrimerAcceso,
                    SYSDATETIME()
                ),
                FechaUltimoAcceso = SYSDATETIME()
            WHERE IdUsuario = :idUsuario;
        ";

        $consulta = $this->conexion->prepare($sql);

        $consulta->execute([
            'idUsuario' => $idUsuario
        ]);
    }
}