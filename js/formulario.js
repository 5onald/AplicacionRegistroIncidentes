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
