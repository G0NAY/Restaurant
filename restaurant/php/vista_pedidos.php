<!DOCTYPE html>
<html>
<head>
    <title>Vista de Pedidos - Mesa <?php echo $_GET['mesa']; ?></title>
</head>
<body>
    <h1>Mesa <?php echo $_GET['mesa']; ?></h1>
    <form action="procesar_pedido.php" method="post">
        <!-- Agregar elementos del formulario para ingresar pedidos -->
        <button type="submit">Enviar Pedido</button>
    </form>

    <div id="contador">Tiempo transcurrido: 0 segundos</div>

    <script>
        let tiempoTranscurrido = 0;

        function actualizarContador() {
            tiempoTranscurrido++;
            document.getElementById('contador').textContent = 'Tiempo transcurrido: ' + tiempoTranscurrido + ' segundos';
        }

        setInterval(actualizarContador, 1000); // Actualizar el contador cada segundo
    </script>
</body>
</html>