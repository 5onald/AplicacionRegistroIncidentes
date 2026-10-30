<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar incidente al registro</title>
    <style>
        /* Se definen los estilos globales para el cuerpo de la página web */
        body {
            font-family: Arial, sans-serif;
            background-color: #E9E9E9;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }

        /* Se configuran los estilos visuales para la cabecera superior */
        header {
            background-color: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            position: relative;
            z-index: 100;
        }

        /* Se establece la animación y posición del panel lateral deslizante */
        .side-panel {
            position: fixed;
            top: 0;
            right: -280px;
            width: 280px;
            height: 100%;
            background-color: #ffffff;
            box-shadow: -4px 0px 15px rgba(0, 0, 0, 0.2);
            transition: right 0.3s ease-in-out;
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        /* Se activa el despliegue visible del panel lateral */
        .side-panel.open {
            right: 0;
        }

        /* Se alinean los elementos del botón de cierre del panel */
        .panel-header {
            padding: 15px 20px;
            display: flex;
            justify-content: flex-end;
        }

        /* Se define el botón visual de cierre (X) */
        .close-btn {
            font-size: 24px;
            cursor: pointer;
            color: #333333;
        }

        /* Se organizan las opciones y contenedores de datos de usuario dentro del panel */
        .panel-content {
            padding: 0 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 16px;
            color: #333333;
            font-weight: bold;
        }

        .logout-link {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #333333;
            font-size: 15px;
            padding: 10px 0;
            transition: color 0.2s;
        }

        .logout-link:hover {
            color: #d9534f;
        }

        /* Se configura el oscurecimiento del fondo al desplegar la barra lateral */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            z-index: 999;
        }

        .overlay.active {
            visibility: visible;
            opacity: 1;
        }

        /* Se establece el contenedor general que envuelve el formulario */
        .container {
            max-width: 70rem;
            background-color: #34495e;
            padding: 30px;
            border-radius: 10px;
            margin: 2rem auto; 
        }

        /* Se define la tipografía y alineación para los títulos principales */
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        
        /* Se configura la distribución flexible que divide el formulario y la mascota */
        .main-layout {
            display: flex;
            gap: 30px;
        }

        /* Se define el espacio flexible que ocupará la sección del formulario */
        .form-section {
            flex: 1; 
        }

        /* Se configuran las dimensiones y alineación del contenedor de la mascota */
        .mascot-section {
            width: 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 50px; 
        }

        /* Se asegura que la imagen de la mascota se adapte de forma responsiva */
        .mascot-section img {
            max-width: 100%;
            height: auto;
        }

        /* Se establece una estructura de cuadrícula de dos columnas para los campos */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Se define el comportamiento de los grupos de campos individuales */
        .form-group {
            display: flex;
            flex-direction: column;
        }

        /* Se permite que ciertos campos ocupen el ancho completo de la cuadrícula */
        .form-group.full-width {
            grid-column: span 2;
        }

        /* Se configuran las etiquetas de los campos del formulario */
        label {
            margin-bottom: 5px;
            font-size: 14px;
        }

        /* Se unifican los estilos visuales para entradas de texto, selectores y áreas de texto */
        input, select, textarea {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        /* Se limita el redimensionamiento vertical exclusivo para las áreas de texto */
        textarea {
            resize: vertical;
            height: 100px;
        }

        /* Se organiza el contenedor de los botones de acción inferior */
        .buttons-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            grid-column: span 2;
        }

        /* Se define el estilo visual para el botón de salida o cancelación */
        .btn-salir {
            background-color: #d9534f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Se define el estilo visual para el botón de publicación o envío */
        .btn-publicar {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<!-- Se establece la cabecera principal con el logotipo corporativo y el menú de navegación -->
<header>
    <img src="instacredit.png" alt="Logo instacredit" width="310" height="80">
    
    <!-- Botón de menú hamburguesa que activa el panel -->
    <img src="Menu-Hamburguesa.png" alt="Menu" width="80" height="80" id="hamburger-btn" style="cursor: pointer;">
</header>

<!-- Panel lateral deslizante -->
<div class="side-panel" id="sidePanel">
    <div class="panel-header">
        <span class="close-btn" id="closeBtn">&times;</span>
    </div>
    <div class="panel-content">
        <div class="user-info">
            <span class="user-icon">
                <img src="Logo-Usuario.png" alt="Icono de usuario" width="40" height="40">
            </span>
            <span class="user-name">Usuario</span>
        </div>
        <hr style="border: 0; border-top: 1px solid #eee; margin: 15px 0;">
        <a href="#" class="logout-link">
            <span class="logout-icon">
                <img src="Cerrar-Sesion.png" alt="Salir" width="20" height="20">
            </span> Cerrar sesión
        </a>
    </div>
</div>

<!-- Capa oscura de fondo (overlay) cuando el panel está abierto -->
<div class="overlay" id="overlay"></div>

<body>

<!-- Se inicia el contenedor principal que aloja el título y la estructura del formulario -->
<div class="container">
    <h2>Agregar incidente al registro</h2>

    <div class="main-layout">
        <!-- Se define la sección del formulario de captura de datos -->
        <div class="form-section">
            <form action="formulario.php" method="POST">
                <div class="form-grid">
                    
                    <!-- Campo para capturar el tipo de incidente -->
                    <div class="form-group">
                        <label for="tipo_incidente">Tipo de incidente*</label>
                        <input type="text" id="tipo_incidente" name="tipo_incidente" required>
                    </div>

                    <!-- Selector para elegir los servidores afectados -->
                    <div class="form-group">
                        <label for="servidor">Servidor(es)</label>
                        <select id="servidor" name="servidor">
                            <option value="">Seleccionar</option>
                            <option value="Servidor 1">Servidor 1</option>
                            <option value="Servidor 2">Servidor 2</option>
                        </select>
                    </div>

                    <!-- Selector de fecha del registro -->
                    <div class="form-group">
                        <label for="fecha">Fecha*</label>
                        <input type="date" id="fecha" name="fecha" required>
                    </div>

                    <!-- Selector para elegir los sistemas involucrados -->
                    <div class="form-group">
                        <label for="sistema">Sistema(s)</label>
                        <select id="sistema" name="sistema">
                            <option value="">Seleccionar</option>
                            <option value="Sistema A">Sistema A</option>
                            <option value="Sistema B">Sistema B</option>
                        </select>
                    </div>

                    <!-- Campo para registrar la fecha y hora de inicio -->
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha de inicio*</label>
                        <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" required>
                    </div>

                    <!-- Selector para indicar el país o países afectados -->
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

                    <!-- Campo para registrar la fecha y hora de finalización -->
                    <div class="form-group">
                        <label for="fecha_fin">Fecha de finalización*</label>
                        <input type="datetime-local" id="fecha_fin" name="fecha_fin" required>
                    </div>

                    <!-- Campo de texto para indicar si afecta la operativa -->
                    <div class="form-group">
                        <label for="afecta_operativa">Afecta operativa*</label>
                        <select id="afecta_operativa" name="afecta_operativa" required>
                            <option value="">Seleccionar</option>
                            <option value="Si">Sí</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <!-- Campo para registrar la duración estimada del incidente -->
                    <div class="form-group">
                        <label for="duracion">Duración*</label>
                        <input type="text" id="duracion" name="duracion" required>
                    </div>

                    <!-- Campo para registrar el nombre de la persona responsable -->
                    <div class="form-group">
                        <label for="persona_registra">Persona que registra*</label>
                        <input type="text" id="persona_registra" name="persona_registra" required>
                    </div>

                    <!-- Área de texto extensa para detallar la falla ocurrida -->
                    <div class="form-group full-width">
                        <label for="detalle_falla">Detalle de la falla* (Máx. 2000 caracteres)</label>
                        <textarea id="detalle_falla" name="detalle_falla" maxlength="2000" required></textarea>
                    </div>

                    <!-- Campo de texto para describir la afectación detallada -->
                    <div class="form-group full-width">
                        <label for="detalle_afectacion">Detalle afectación (Máx. 1000 caracteres)</label>
                        <input type="text" id="detalle_afectacion" maxlength="1000" name="detalle_afectacion">
                    </div>

                    <!-- Campo para ingresar la URL de documentación o evidencias -->
                    <div class="form-group full-width">
                        <label for="url">URL documentación/evidencias</label>
                        <input type="url" id="url" name="url">
                    </div>

                    <!-- Contenedor que agrupa los botones de navegación y envío -->
                    <div class="buttons-container">
                        <button type="button" class="btn-salir">Salir</button>
                        <button type="submit" name="publicar" class="btn-publicar">Publicar incidente</button>
                    </div>

                </div>
            </form>
        </div>

        <!-- Se define la sección visual para mostrar a Prestamito -->
        <div class="mascot-section">
            <img src="Prestamito-Celular.png" alt="Prestamito">
        </div>
    </div>

    <!-- Script para validar campos condicionales, duraciones y controlar el menú lateral -->
    <script>
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const sidePanel = document.getElementById('sidePanel');
        const closeBtn = document.getElementById('closeBtn');
        const overlay = document.getElementById('overlay');
        const fechaInicio = document.getElementById('fecha_inicio');
        const fechaFin = document.getElementById('fecha_fin');

        // Se controla el despliegue y cierre del panel lateral deslizante
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

        // Se actualiza el atributo 'min' de la fecha de fin basándose en la fecha de inicio seleccionada
        fechaInicio.addEventListener('change', function() {
            fechaFin.min = fechaInicio.value;
            if (fechaFin.value && fechaFin.value < fechaInicio.value) {
                fechaFin.value = ''; // Se limpia el campo si la fecha fin previa era menor
            }
        });

        // Se valida la congruencia de las fechas y el detalle de afectación al enviar el formulario
        document.querySelector('form').addEventListener('submit', function(event) {
            const afectaOperativa = document.getElementById('afecta_operativa').value;
            const detalleAfectacion = document.getElementById('detalle_afectacion').value.trim();

            // Se valida que la fecha de fin no sea menor a la fecha de inicio
            if (fechaFin.value && fechaInicio.value && fechaFin.value < fechaInicio.value) {
                alert('La fecha de finalización no puede ser anterior a la fecha de inicio.');
                event.preventDefault();
                fechaFin.focus();
                return;
            }

            // Se valida la regla condicional del detalle de afectación
            if (afectaOperativa === 'Si' && detalleAfectacion === '') {
                alert('El campo "Detalle afectación" es obligatorio cuando la afectación operativa es "Sí".');
                event.preventDefault();
                document.getElementById('detalle_afectacion').focus();
            }
        });
    </script>

    <!-- Se implementa el bloque lógico en PHP para procesar la recepción de datos mediante el método POST -->
    <?php
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
            // Aquí continuaría el proceso para guardar en la base de datos de SQL Server
            echo "<p style='margin-top: 20px; color: #2ecc71; text-align: center;'>¡Formulario procesado correctamente!</p>";
        }
    }
    ?>
    
</div>

</body>
</html>