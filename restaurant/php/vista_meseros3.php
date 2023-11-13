<!DOCTYPE html>
<html>
<head>
    <title>Vista del Mesero</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        .mesa {
            float: left;
            width: 33%; /* Ajusta el ancho de cada mesa según tu preferencia */
        }
        .vista-pedidos {
            clear: both;
        }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

<div class="menu" id="menu">
    <ul>
        <li><a href="#" class="menu-button" data-action="configuracion">Configuración</a></li>
        <li><a href="#" class="menu-button" data-action="lista">Lista</a></li>
        <li><a href="#" class="menu-button" data-action="mesas">Mesas</a></li>
        <li><a href="#" id="collapse-button" data-action="colapsarMenu">Colapsar</a></li>
    </ul>
</div>

<div class="contenido" id="contenido">
    <div class="mesas">
        <?php for ($i = 1; $i <= 6; $i++) { ?>
            <div class="mesa" id="mesa<?php echo $i; ?>">
                <div class="circulo mesa-circulo" data-mesa="<?php echo $i; ?>">
                    <?php echo $i; ?>
                </div>
                <h4>Mesa <?php echo $i; ?></h4>
                <div class="contador-tiempo" id="contador-mesa<?php echo $i; ?>">Tiempo: 0s</div>
            </div>
        <?php } ?>
    </div>

    <?php for ($i = 1; $i <= 6; $i++) { ?>
        <div class="vista-pedidos" id="vista-pedidos<?php echo $i; ?>">
            <h2>Mesa <?php echo $i; ?> - Pedidos</h2>
            <input type="text" placeholder="Ingresar pedido" >
            <input type="text" placeholder="Costo">
            <button class="abrir-modal" data-modal="<?php echo $i; ?>">Agregar +</button>
            <!-- <button class="agregar-platillo-btn" data-modal="<?php echo $i; ?>" data-toggle="modal" data-target="#modalAgregarPlatillo" onclick="agregarPlatillo(<?php echo $i; ?>)">Agregar +</button> -->
            <br>
            <button class="iniciar-contador" data-mesa="<?php echo $i; ?>" onclick="iniciarContador(<?php echo $i; ?>)">Enviar pedido</button>
            <button class="detener-contador" data-mesa="<?php echo $i; ?>" onclick="detenerContador(<?php echo $i; ?>)">Total de pedido</button>
            <div id="total-pedido<?php echo $i; ?>">Se debe un total de: $ 0.00 pesos</div>
        </div>
    <?php } ?>

</div>

    
    <!-- Modal -->
    <div class="modal">
        <div class="modal-content">
            <h2>Pregunta</h2>
            <p>Elige una opción para el Menu?</p>
            <select class="seleccion">
                <option value="opcion1">Pollo</option>
                <option value="opcion2">Pescado</option>
                <option value="opcion3">Pechuga</option>
            </select>
            <button class="cerrar-modal">Aceptar</button>
        </div>
    </div>

    <div class="respuestas">
        <div id="respuesta1"></div>
        <div id="respuesta2"></div>
        <div id="respuesta3"></div>
    </div>


<script>
    const intervalosContador = {};

    // Función para mostrar elementos
    function mostrarElemento(id) {
        $('.vista-pedidos').hide();
        $('#' + id).show();
    }

    // Función para iniciar el contador
    function iniciarContador(numeroMesa) {
        let tiempoTranscurrido = 0;
        clearInterval(intervalosContador[numeroMesa]);
        intervalosContador[numeroMesa] = setInterval(function() {
            const horas = Math.floor(tiempoTranscurrido / 3600); // 3600 segundos en una hora
            const minutos = Math.floor((tiempoTranscurrido % 3600) / 60);
            const segundos = tiempoTranscurrido % 60;
            $(`#contador-mesa${numeroMesa}`).text(`Tiempo: ${horas}:${minutos}:${segundos}`);
            tiempoTranscurrido++;
        }, 1000);
    }

    // Función para detener el contador
    function detenerContador(numeroMesa) {
        clearInterval(intervalosContador[numeroMesa]);
        $(`#contador-mesa${numeroMesa}`).text('Tiempo: 0s');
    }

    // Documento listo
    $(document).ready(function() {
        // Manejar clics en los botones del menú
        $('.menu-button').click(function() {
            const action = $(this).data('action');
            if (action === 'colapsarMenu') {
                colapsarMenu();
            } else {
                mostrarElemento(action);
            }
        });

        // Manejar clics en los círculos de mesa
        $('.mesa-circulo').click(function() {
            const numeroMesa = $(this).data('mesa');
            mostrarElemento('vista-pedidos' + numeroMesa);
            $('#numero-mesa').text(numeroMesa);
        });
    });

    function colapsarMenu() {
        const menu = $('#menu');
        const contenido = $('#contenido');
        const collapseButton = $('#collapse-button');

        if (menu.hasClass('collapsed')) {
            // Expandir el menú
            menu.removeClass('collapsed');
            contenido.removeClass('collapsed');
            collapseButton.text('Colapsar');
        } else {
            // Colapsar el menú
            menu.addClass('collapsed');
            contenido.addClass('collapsed');
            collapseButton.text('Expandir');
        }
    }

</script>
<script>
        const modal = document.querySelector('.modal');
        const respuestas = document.querySelectorAll('.respuestas');
        const selecciones = document.querySelectorAll('.seleccion');

        function abrirModal(event) {
            const modalId = event.target.dataset.modal;
            modal.style.display = 'block';
            modal.dataset.respuestaId = modalId;
        }

        function cerrarModal(event) {
            modal.style.display = 'none';
            const respuestaId = modal.dataset.respuestaId;
            const seleccion = selecciones[respuestaId - 1];
            const respuesta = respuestas[respuestaId - 1];
            const respuestaSeleccionada = seleccion.options[seleccion.selectedIndex].text;
            respuesta.innerHTML = `Respuesta: ${respuestaSeleccionada}`;
        }

        const abrirModales = document.querySelectorAll('.abrir-modal');
        const cerrarModales = document.querySelectorAll('.cerrar-modal');

        abrirModales.forEach(function (boton) {
            boton.addEventListener('click', abrirModal);
        });

        cerrarModales.forEach(function (boton) {
            boton.addEventListener('click', cerrarModal);
        });
    </script>

</body>
</html>