<?php

require_once __DIR__ . '/../app/config/database.php';

try {

    $conexion = getDatabaseConnection();

    $consulta = $conexion->query("
        SELECT
            DB_NAME() AS BaseDatos,
            SYSDATETIME() AS FechaServidor
    ");


    $resultado = $consulta->fetch();


    echo "Conexión exitosa con SQL Server.<br>";


    echo "Base de datos: " .
        htmlspecialchars($resultado['BaseDatos']);


} catch (Throwable $e) {


    http_response_code(500);


    echo "Error al conectar con SQL Server.";
}