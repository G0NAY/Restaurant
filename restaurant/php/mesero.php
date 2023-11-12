<!DOCTYPE html>
<html>
<head>
    <title>Vista del Mesero</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
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
</html>