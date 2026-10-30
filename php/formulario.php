<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $afecta_operativa = $_POST['afecta_operativa'] ?? '';
    $detalle_afectacion = trim($_POST['detalle_afectacion'] ?? '');
    $fecha_inicio = $_POST['fecha_inicio'] ?? '';
    $fecha_fin = $_POST['fecha_fin'] ?? '';

    // Se valida que la fecha de finalización sea mayor o igual a la de inicio.
    if ($fecha_fin < $fecha_inicio) {
        $mensaje = "Error: La fecha de finalización no puede ser anterior a la fecha de inicio.";
        $tipo_mensaje = "error";
    } elseif ($afecta_operativa === 'Si' && $detalle_afectacion === '') {
        $mensaje = "Error: Debe registrar el 'Detalle afectación' si la afectación operativa es 'Sí'.";
        $tipo_mensaje = "error";
    } else {
        // Aquí continuaría el proceso para guardar en la base de datos de SQL Server.
        $mensaje = "¡Formulario procesado correctamente!";
        $tipo_mensaje = "exito";
    }
} else {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del registro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main class="container">
        <h2 class="<?= htmlspecialchars($tipo_mensaje, ENT_QUOTES, 'UTF-8') ?>">
            <?= htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') ?>
        </h2>
        <p style="text-align: center;">
            <a href="index.html">Volver al formulario</a>
        </p>
    </main>
</body>
</html>
