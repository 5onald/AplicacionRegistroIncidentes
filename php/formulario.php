<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar incidente al registro</title>
    <!-- Se vincula la hoja de estilos externa -->
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/root.css">
</head>
<body>

<!-- Se establece la cabecera principal con el logotipo corporativo y el menú de navegación -->
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

<!-- Se muestra una capa oscura de fondo cuando el panel está abierto -->
<div class="overlay" id="overlay"></div>

<!-- Se inicia el contenedor principal que aloja el título y la estructura del formulario -->
<div class="container">
    <h2>Agregar incidente al registro</h2>

    <div class="main-layout">
        <!-- Se define la sección del formulario de captura de datos -->
        <div class="form-section">
            <form action="procesar_formulario.php" method="POST">
                <div class="form-grid">
                    
                    <div class="form-group">
                        <label for="tipo_incidente">Tipo de incidente*</label>
                        <input type="text" id="tipo_incidente" name="tipo_incidente" required>
                    </div>

                    <div class="form-group">
                        <label for="servidor">Servidor(es)</label>
                        <select id="servidor" name="servidor">
                            <option value="">Seleccionar</option>
                            <option value="Servidor 1">Servidor 1</option>
                            <option value="Servidor 2">Servidor 2</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fecha">Fecha*</label>
                        <input type="date" id="fecha" name="fecha" required>
                    </div>

                    <div class="form-group">
                        <label for="sistema">Sistema(s)</label>
                        <select id="sistema" name="sistema">
                            <option value="">Seleccionar</option>
                            <option value="Sistema A">Sistema A</option>
                            <option value="Sistema B">Sistema B</option>
                        </select>
                    </div>

                    <!-- Hora de inicio con formato 24h con segundos -->
                    <div class="form-group">
                        <label for="hora_inicio">Hora de inicio*</label>
                        <input type="time" id="hora_inicio" name="hora_inicio" step="1" required style="appearance: auto;">
                    </div>

                    <div class="form-group">
                        <label for="pais">País(es)*</label>
                        <select id="pais" name="pais" required>
                            <option value="">Seleccionar</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="El_Salvador">El Salvador</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Panama">Panamá</option>
                        </select>
                    </div>

                    <!-- Hora de finalización con formato 24h con segundos -->
                    <div class="form-group">
                        <label for="hora_fin">Hora de finalización*</label>
                        <input type="time" id="hora_fin" name="hora_fin" step="1" required style="appearance: auto;">
                    </div>

                    <div class="form-group">
                        <label for="afecta_operativa">Afecta operativa*</label>
                        <select id="afecta_operativa" name="afecta_operativa" required>
                            <option value="">Seleccionar</option>
                            <option value="Si">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="duracion">Duración*</label>
                        <input type="text" id="duracion" name="duracion" readonly placeholder="Se calcula automáticamente" required>
                    </div>

                    <div class="form-group">
                        <label for="persona_registra">Persona que registra*</label>
                        <input type="text" id="persona_registra" name="persona_registra" required>
                    </div>

                    <div class="form-group full-width">
                        <label for="detalle_falla">Detalle de la falla* (Máx. 2000 caracteres)</label>
                        <textarea id="detalle_falla" name="detalle_falla" maxlength="2000" required></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label for="detalle_afectacion">Detalle afectación (Máx. 1000 caracteres)</label>
                        <input type="text" id="detalle_afectacion" maxlength="1000" name="detalle_afectacion">
                    </div>

                    <div class="form-group full-width">
                        <label for="url">URL documentación/evidencias</label>
                        <input type="url" id="url" name="url">
                    </div>

                    <div class="buttons-container">
                        <button type="button" class="btn-salir">Salir</button>
                        <button type="submit" name="publicar" class="btn-publicar">Publicar incidente</button>
                    </div>

                </div>
            </form>
        </div>

        <!-- Se define la sección visual para mostrar a Prestamito -->
        <div class="mascot-section">
            <img src="../img/Prestamito-Celular.png" alt="Prestamito">
        </div>
    </div>
</div>

<!-- Script para validar campos, horas y controlar el panel lateral -->
<script>
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const sidePanel = document.getElementById('sidePanel');
    const closeBtn = document.getElementById('closeBtn');
    const overlay = document.getElementById('overlay');
    const inputFecha = document.getElementById('fecha');
    const horaInicio = document.getElementById('hora_inicio');
    const horaFin = document.getElementById('hora_fin');

    function openPanel() {
        sidePanel.classList.add('open');
        overlay.classList.add('active');
    }
    
    function closePanel() {
        sidePanel.classList.remove('open');
        overlay.classList.remove('active');
    }

    hamburgerBtn.addEventListener('click', openPanel);
    closeBtn.addEventListener('click', closePanel);
    overlay.addEventListener('click', closePanel);

    function calcularDuracion() {
        const fechaVal = inputFecha.value;
        const horaInicioVal = horaInicio.value;
        const horaFinVal = horaFin.value;
        const inputDuracion = document.getElementById('duracion');

        // Se verifica la selección de la fecha y ambas horas
        if (fechaVal && horaInicioVal && horaFinVal) {
            const inicioStr = horaInicioVal.length === 5 ? `${horaInicioVal}:00` : horaInicioVal;
            const finStr = horaFinVal.length === 5 ? `${horaFinVal}:00` : horaFinVal;

            const inicio = new Date(`${fechaVal}T${inicioStr}`);
            let fin = new Date(`${fechaVal}T${finStr}`);

            if (fin < inicio) {
                fin.setDate(fin.getDate() + 1);
            }

            const diferenciaMs = fin - inicio;
            const segundosTotales = Math.floor(diferenciaMs / 1000);
            
            const dias = Math.floor(segundosTotales / 86400);
            const horasRestantes = Math.floor((segundosTotales % 86400) / 3600);
            const minutosRestantes = Math.floor((segundosTotales % 3600) / 60);
            const segundosRestantes = segundosTotales % 60;

            let partes = [];

            if (dias > 0) {
                partes.push(dias + (dias === 1 ? " día" : " días"));
            }
            if (horasRestantes > 0) {
                partes.push(horasRestantes + (horasRestantes === 1 ? " hora" : " horas"));
            }
            if (minutosRestantes > 0) {
                partes.push(minutosRestantes + (minutosRestantes === 1 ? " minuto" : " minutos"));
            }
            if (segundosRestantes > 0 || partes.length === 0) {
                partes.push(segundosRestantes + (segundosRestantes === 1 ? " segundo" : " segundos"));
            }

            inputDuracion.value = partes.join(' y ');
        } else {
            inputDuracion.value = '';
        }
    }

    inputFecha.addEventListener('change', calcularDuracion);
    horaInicio.addEventListener('change', calcularDuracion);
    horaFin.addEventListener('change', calcularDuracion);

    document.querySelector('form').addEventListener('submit', function(event) {
        const afectaOperativa = document.getElementById('afecta_operativa').value;
        const detalleAfectacion = document.getElementById('detalle_afectacion').value.trim();

        if (afectaOperativa === 'Si' && detalleAfectacion === '') {
            alert('El campo "Detalle afectación" es obligatorio cuando la afectación operativa es "Sí".');
            event.preventDefault();
            document.getElementById('detalle_afectacion').focus();
        }
    });
</script>

</body>
</html>