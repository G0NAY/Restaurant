<?php
// Lo siguientes para hacer Post
$api_url = 'https://api.ejemplo.com/endpoint'; // Reemplaza con la URL de la API que deseas utilizar

$data = array(
    'clave1' => 'valor1',
    'clave2' => 'valor2'
);

$curl = curl_init($api_url);

curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

if ($response === false) {
    echo 'Error en la solicitud: ' . curl_error($curl);
} else {
    echo 'Respuesta de la API: ' . $response;
}

curl_close($curl);
?>

<?php
// Lo siguientes para hacer GET
    $api_url = 'https://api.ejemplo.com/endpoint'; // Reemplaza con la URL de la API que deseas utilizar

    $curl = curl_init($api_url);

    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    if ($response === false) {
        echo 'Error en la solicitud: ' . curl_error($curl);
    } else {
        echo 'Respuesta de la API: ' . $response;
    }

    curl_close($curl);
?>
<?php
// Lo siguientes para hacer Delete
$api_url = 'https://api.ejemplo.com/endpoint'; // Reemplaza con la URL de la API que deseas utilizar

$curl = curl_init($api_url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

if ($response === false) {
    echo 'Error en la solicitud: ' . curl_error($curl);
} else {
    echo 'Respuesta de la API: ' . $response;
}

curl_close($curl);
?>

<?php
// Lo siguientes para hacer update

$api_url = 'https://api.ejemplo.com/recurso/123'; // Reemplaza con la URL del recurso que deseas actualizar
$data_to_update = array(
    'campo1' => 'nuevo_valor1',
    'campo2' => 'nuevo_valor2'
);

$curl = curl_init($api_url);

curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data_to_update));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

if ($response === false) {
    echo 'Error en la solicitud: ' . curl_error($curl);
} else {
    echo 'Respuesta de la API: ' . $response;
}

curl_clo