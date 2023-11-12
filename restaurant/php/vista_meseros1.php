<!-- <!DOCTYPE html>
<html>
<head>
    <title>Vista del Mesero</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <div class="mesas">
        <div class="mesa" onclick="irAVistaPedidos(1)">
            <div class="circulo">1</div>
        </div>
        <div class="mesa" onclick="irAVistaPedidos(2)">
            <div class="circulo">2</div>
        </div>
        <div class="mesa" onclick="irAVistaPedidos(3)">
            <div class="circulo">3</div>
        </div>
        <div class="mesa" onclick="irAVistaPedidos(4)">
            <div class="circulo">4</div>
        </div>
        <div class="mesa" onclick="irAVistaPedidos(5)">
            <div class="circulo">5</div>
        </div>
    </div>

    <script>
        function irAVistaPedidos(numeroMesa) {
            window.location.href = 'php/vista_pedidos.php?mesa=' + numeroMesa;
        }
    </script>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
    <title>Vista del Mesero</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <div class="mesas">
        <?php for ($i = 1; $i <= 5; $i++) { ?>
            <div class="mesa" id="mesa<?php echo $i; ?>" onclick="mostrarPedidos(<?php echo $i; ?>)">
                <div class="circulo"><?php echo $i; ?></div>
                <div class="contador-tiempo" id="contador-mesa<?php echo $i; ?>">Tiempo: 0s</div>
            </div>
        <?php } ?>
    </div>

    <div class="mesa-pedidos" id="mesa-pedidos">
        <h2>Mesa <span id="numero-mesa"></span> - Pedidos</h2>
        <!-- <form action="procesar_pedido.php" method="post" onsubmit="iniciarContador()"> -->
        <form action="" method="post" onsubmit="iniciarContador()">
            <!-- Agregar elementos del formulario para ingresar pedidos -->
            <button type="submit">Enviar Pedido</button>
        </form>
        <div id="contador">Tiempo transcurrido: 0 segundos</div>
    </div>

    <script>
        function mostrarPedidos(numeroMesa) {
            // Ocultar todos los elementos de "mesa-pedidos"
            const mesasPedidos = document.getElementsByClassName('mesa-pedidos');
            for (let i = 0; i < mesasPedidos.length; i++) {
                mesasPedidos[i].style.display = 'none';
            }

            // Mostrar la vista de pedidos correspondiente
            const vistaPedidos = document.getElementById('mesa-pedidos');
            vistaPedidos.style.display = 'block';

            // Actualizar el número de la mesa
            document.getElementById('numero-mesa').textContent = numeroMesa;
        }

        let tiempoTranscurrido = 0;
        let contadorInterval;

        function iniciarContador() {
            contadorInterval = setInterval(function() {
                tiempoTranscurrido++;
                document.getElementById('contador').textContent = 'Tiempo transcurrido: ' + tiempoTranscurrido + ' segundos';
            }, 1000);
        }

        // Detener el contador cuando el formulario se envía
        function detenerContador() {
            clearInterval(contadorInterval);
        }
    </script>
</body>
</html>