<?php

declare(strict_types=1);

function getDatabaseConnection(): PDO
{
    static $conexion = null;

    // Reutilizar la conexión si ya existe.
    if ($conexion instanceof PDO) {
        return $conexion;
    }

    // Cambiar estos valores según tu instancia y base de datos.
    $servidor = 'CRI-D2825\SQLEXPRESS';
    $baseDatos = 'RegistroIncidentes';

    $cadenaConexion =
        "sqlsrv:Server=$servidor;" .
        "Database=$baseDatos;" .
        "Encrypt=yes;" .
        "TrustServerCertificate=yes";

    try {
        $conexion = new PDO(
            $cadenaConexion,
            null,
            null,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );

        return $conexion;

    } catch (PDOException $e) {

        error_log(
            '[DATABASE ERROR] ' . $e->getMessage()
        );

        throw new RuntimeException(
            'No fue posible conectar con SQL Server.',
            0,
            $e
        );
    }
}