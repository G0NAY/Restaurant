<!DOCTYPE html>
<html>
<head>
    <title>Vista del Mesero</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

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
            <?php for ($i = 1; $i <= 5; $i++) { ?>
                <div class="mesa" id="mesa<?php echo $i; ?>">
                    <div class="circulo mesa-circulo" data-mesa="<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </div>
                    <h4>Mesa <?php echo $i; ?></h4>
                    <div class="contador-tiempo" id="contador-mesa<?php echo $i; ?>">Tiempo: 0s</div>
                </div>

                <div class="vista-pedidos" id="vista-pedidos<?php echo $i; ?>">
                    <h2>Mesa <?php echo $i; ?> - Pedidos</h2>
                    <div class="contador-tiempo" id="contador-mesa<?php echo $i; ?>">Costo: 0s</div>

                    <!-- <form action="" method="post" id="formulario-pedido<?php echo $i; ?>">-->
                        <!-- Agregar elementos para ingresar pedidos -->
                    <!--</form> -->
                    <button class="agregar-platillo-btn" data-toggle="modal" data-target="#modalAgregarPlatillo">Agregar Platillo</button>

                        <button class="iniciar-contador" data-mesa="<?php echo $i; ?>" onclick="iniciarContador(<?php echo $i; ?>)">Enviar pedido</button>
                        <button class="detener-contador" data-mesa="<?php echo $i; ?>" onclick="detenerContador(<?php echo $i; ?>)">Total de pedido</button>
                    <div id="total-pedido<?php echo $i; ?>">Se debe un total de: $ 0.00 pesos</div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="modal fade" id="modalAgregarPlatillo" tabindex="-1" role="dialog" aria-labelledby="modalAgregarPlatilloLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarPlatilloLabel">Agregar Platillo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí puedes cargar el contenido del JSON -->
                    <div id="platillo-list"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarPlatillo()">Agregar</button>
                </div>
            </div>
        </div>
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

        function agregarPlatillo() {
            // Aquí obtener el platillo seleccionado desde el JSON
            // const url = 'https://ejemplo.com/api/datos.json';

            // // Realizar la solicitud HTTP utilizando Fetch
            // fetch(url)
            // .then(response => {
            //     // Verificar si la respuesta es exitosa (código de estado 200)
            //     if (!response.ok) {
            //     throw new Error('Error al realizar la solicitud');
            //     }
            //     return response.json(); // Analizar la respuesta JSON
            // })
            // .then(data => {
            //     // Utilizar los datos
            //     data.forEach(item => {
            //     console.log(item.nombre + ': ' + item.valor);
            //     });
            // })
            // .catch(error => {
            //     console.error(error);
            // });
            
            const url = 'http://189.188.82.63:81/Home/LogIn';

            // Configuración de la ventana emergente
            const opciones = 'width=600,height=400,toolbar=no,location=no,menubar=no,scrollbars=no,resizable=no,status=no';

            // Abrir la ventana emergente
            const ventana = window.open(url, 'NombreDeLaVentana', opciones);

            // Verificar si la ventana emergente se ha abierto correctamente
            if (ventana) {
                // La ventana emergente se ha abierto correctamente
            } else {
                // La ventana emergente ha sido bloqueada por el navegador
                alert('La ventana emergente ha sido bloqueada por el navegador. Habilita las ventanas emergentes para ver el contenido.');
            }

            // // Puedes acceder a los datos del platillo seleccionado y realizar acciones, como agregarlo a la lista de pedidos
            // const selectedPlatillo = obtenerPlatilloSeleccionado();

            // // Ejemplo: Agregar el platillo a la lista de pedidos
            // agregarPlatilloALaLista(selectedPlatillo);

            // // Cierra la ventana modal
            // $('#modalAgregarPlatillo').modal('hide');
        }

        // Función para obtener el platillo seleccionado
        function obtenerPlatilloSeleccionado() {
            // Aquí debes implementar la lógica para obtener el platillo seleccionado desde el JSON
            // Puedes usar jQuery para acceder al contenido del modal y obtener la información
            // Ejemplo: supongamos que tienes una lista de platillos en formato JSON en un elemento con el ID "platillo-list"
            const platilloId = $('#platillo-list').val();
            
            // Recupera el platillo seleccionado desde el JSON
            const platilloSeleccionado = obtenerPlatilloPorId(platilloId);

            return platilloSeleccionado;
        }

        // Función para agregar el platillo a la lista de pedidos
        function agregarPlatilloALaLista(platillo) {
            // Aquí puedes implementar la lógica para agregar el platillo a la lista de pedidos
            // Puedes mostrarlo en la vista o realizar acciones adicionales, como calcular el total
        }

    </script>
</body>
</html>