<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Registro de Incidentes</title>
    <link rel="stylesheet" href="../css/home_registrador.css">
    <link rel="stylesheet" href="../css/root.css">
</head>
<body>

<header>
    <img src="../img/instacredit.png" alt="Logo instacredit" width="310" height="80">
    <img src="../img/Menu-Hamburguesa.png" alt="Menu" width="80" height="80" id="hamburger-btn" style="cursor: pointer;">
</header>

<!-- Panel lateral deslizante -->
<div class="side-panel" id="sidePanel">
    <div class="panel-header">
        <span class="close-btn" id="closeBtn">&times;</span>
    </div>
    <div class="panel-content">
        <div class="user-info">
            <span class="user-icon">
                <img src="../img/Logo-Usuario.png" alt="Icono de usuario" width="40" height="40">
            </span>
            <span class="user-name">Usuario</span>
        </div>
        <hr style="border: 0; border-top: 1px solid #eee; margin: 15px 0;">
        <a href="#" class="logout-link">
            <span class="logout-icon">
                <img src="../img/Cerrar-Sesion.png" alt="Salir" width="20" height="20">
            </span> Cerrar sesión
        </a>
    </div>
</div>

<!-- Contenedor principal con márgenes controlados -->
<div class="container">
    <div class="dashboard-header">
        <h2>Dashboard de Registro de Incidentes</h2>
        <div class="dashboard-actions">
            <a href="formulario.php" class="btn-publicar">Agregar incidente</a>
        </div>
    </div>

    <!-- Reporte de Power BI -->
    <div class="powerbi-container">
        <iframe title="ReporteIncidencias" width="100%" height="600" src="https://app.powerbi.com/" frameborder="0" allowFullScreen="true"></iframe>
    </div>
</div>

<!-- Script para controlar el panel lateral -->
<script>
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const sidePanel = document.getElementById('sidePanel');
    const closeBtn = document.getElementById('closeBtn');

    hamburgerBtn.addEventListener('click', () => {
        sidePanel.classList.add('open');
    });

    closeBtn.addEventListener('click', () => {
        sidePanel.classList.remove('open');
    });
</script>

</body>
</html>