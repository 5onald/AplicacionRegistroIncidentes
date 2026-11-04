<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instacredit | Catálogo</title>
    <link rel="icon" href="https://play-lh.googleusercontent.com/VoUV6OswKY1SFVqADHaAOcOCiCfHnK0GIecm7QglCwpDV4GzAGLahgM8T7vQeAgAqsqEajme77gxrpfGB4IMYA" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/root.css">
</head>
<body>
    <header>
        <div>
            <img src="assets/img/instacredit.png" alt="logo-instacredit">
        </div>
    </header>
    <main>
        <aside class="sidebar">
            <h2>FILTRAR DATOS</h2>

            <!-- Campo para filtrar el estado de los incidentes: ACTIVO = 1 \ INHABILITADO = 0 -->
            <div class="campo-filtro">
                <label for="filtrarEstado">ESTADO</label>
                <select id="filtrarEstado">
                    <option value="">-- Seleccionar --</option>
                </select>
            </div>

            <div>
                <form>
                    <label for="fecha-inicio"></label>
                    <input type="date" id="fecha-inicio" name="fecha_inicio">

                    <label for="fecha-fin"></label>
                    <input type="date" id="fecha-fin" name="fecha_fin">

                    <button type="submit"></button>
                </form>
            </div>

            <!-- Campo para filtrar el tipo de incidente -->
            <div class="campo-filtro">
                <label for="filtrarTipoIncidente">TIPO DE INCIDENTE</label>
                <select id="filtrarTipoIncidente">
                    <option value="">-- Seleccionar --</option>
                </select>
            </div>

            <!-- Campo para filtrar el país y seleccionar uno o varios -->
            <div class="campo-filtro">
                <label for="filtrarPais">PAÍS</label>
                <select id="filtrarPais">
                    <option value="">-- Seleccionar --</option>
                </select>
            </div>

            <!-- Campo para filtrar el servidor y seleccionar uno o varios -->
            <div class="campo-filtro">
                <label for="filtrarServidor">SERVIDOR</label>
                <select id="filtrarServidor">
                    <option value="">-- Seleccionar --</option>
                </select>
            </div>

            <!-- Campo para filtrar el sistema y seleccionar uno o varios -->
            <div class="campo-filtro">
                <label for="filtrarSistema">SISTEMA</label>
                <select id="filtrarSistema">
                    <option value="">-- Seleccionar --</option>
                </select>
            </div>

        </aside>
        <section id="info_general"></section>
    </main>
    
</body>
</html>