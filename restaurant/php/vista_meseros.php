<!DOCTYPE html>
<html>
<head>
    <title>Vista del Mesero</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
<body>
    <div class="menu" id="menu">
        <ul>
            <li><a href="#" onclick="mostrarConfiguracion()">Configuración</a></li>
            <li><a href="#" onclick="mostrarLista()">Lista</a></li>
            <li><a href="#" onclick="mostrarMesas()">Mesas</a></li>
            <li><a href="#" id="collapse-button" onclick="colapsarMenu()">Colapsar</a></li>
        </ul>
    </div>

    <div class="contenido" id="contenido">
        <div class="mesas">
            <?php for ($i = 1; $i <= 5; $i++) { ?>
                <div class="mesa" id="mesa<?php echo $i; ?>" onclick="mostrarPedidos(<?php echo $i; ?>)">
                    <div class="circulo"><?php echo $i; ?></div>
                    <div class="contador-tiempo" id="contador-mesa<?php echo $i; ?>">Tiempo: 0s</div>
                    <button class="iniciar-contador" onclick="iniciarContador(<?php echo $i; ?>)">Iniciar Contador</button>
                    <button class="detener-contador" onclick="detenerContador(<?php echo $i; ?>)">Detener Contador</button>
                </div>
            <?php } ?>
        </div>

        <div class="vista-pedidos" id="vista-pedidos">
            <h2>Mesa <span id="numero-mesa"></span> - Pedidos</h2>
            <input type="text" placeholder="Ingresar pedido">
            <button class="iniciar-contador" onclick="iniciarContador(numeroMesa)">Iniciar Contador</button>
            <button class="detener-contador" onclick="detenerContador(numeroMesa)">Detener Contador</button>
            <form action="procesar_pedido.php" method="post" onsubmit="iniciarContador()">
                <!-- Agregar elementos para ingresar pedidos -->
                <button type="submit">Enviar Pedido</button>
            </form>
            <div id="contador">Tiempo transcurrido: 0 segundos</div>
        </div>
    </div>

    <script>
        const intervalosContador = {};
        let numeroMesa;

        function mostrarPedidos(numeroMesa) {
            // Ocultar todos los elementos de "vista-pedidos"
            const vistasPedidos = document.getElementsByClassName('vista-pedidos');
            for (let i = 0; i < vistasPedidos.length; i++) {
                vistasPedidos[i].style.display = 'none';
            }

            // Mostrar la vista de pedidos correspondiente
            const vistaPedidos = document.getElementById('vista-pedidos');
            vistaPedidos.style.display = 'block';

            // Actualizar el número de la mesa
            document.getElementById('numero-mesa').textContent = numeroMesa;
            this.numeroMesa = numeroMesa;
        }

        function iniciarContador(numeroMesa) {
            let tiempoTranscurrido = 0;
            clearInterval(intervalosContador[numeroMesa]); // Detener el contador anterior, si existe
            intervalosContador[numeroMesa] = setInterval(function() {
                tiempoTranscurrido++;
                document.getElementById('contador-mesa' + numeroMesa).textContent = 'Tiempo: ' + tiempoTranscurrido + 's';
            }, 1000);
        }

        function detenerContador(numeroMesa) {
            clearInterval(intervalosContador[numeroMesa]);
            document.getElementById('contador-mesa' + numeroMesa).textContent = 'Tiempo: 0s';
        }

        function mostrarConfiguracion() {
            // Agregar código para mostrar la vista de configuración
        }

        function mostrarLista() {
            // Agregar código para mostrar la vista de lista
        }

        function colapsarMenu() {
            const menu = document.getElementById('menu');
            const contenido = document.getElementById('contenido');
            const collapseButton = document.getElementById('collapse-button');

            if (menu.classList.contains('collapsed')) {
                // Expandir el menú
                menu.classList.remove('collapsed');
                contenido.classList.remove('collapsed');
                collapseButton.textContent = 'Colapsar';
            } else {
                // Colapsar el menú
                menu.classList.add('collapsed');
                contenido.classList.add('collapsed');
                collapseButton.textContent = 'Expandir';
            }
        }
    </script>
</body>
</html>