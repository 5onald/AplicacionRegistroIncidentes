<?php
// Se incluye el archivo de conexión si es necesario
include 'conexion_base.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $afecta_operativa = $_POST['afecta_operativa'];
    $detalle_afectacion = trim($_POST['detalle_afectacion']);
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    // Se valida que la fecha de finalización sea mayor o igual a la de inicio
    if ($fecha_fin < $fecha_inicio) {
        echo "<p style='margin-top: 20px; color: #e74c3c; text-align: center;'>Error: La fecha de finalización no puede ser anterior a la fecha de inicio.</p>";
    } 
    // Se valida la regla condicional del detalle de afectación
    else if ($afecta_operativa === 'Si' && empty($detalle_afectacion)) {
        echo "<p style='margin-top: 20px; color: #e74c3c; text-align: center;'>Error: Debe registrar el 'Detalle afectación' si la afectación operativa es 'Sí'.</p>";
    } else {
        // Aquí se realizaría la inserción de datos en SQL Server en el futuro
        echo "<p style='margin-top: 20px; color: #2ecc71; text-align: center;'>¡Formulario procesado correctamente!</p>";
    }
}
?>