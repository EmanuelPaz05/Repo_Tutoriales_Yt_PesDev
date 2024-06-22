<?php

$url = '';
$token = '';

$media_url = 'https://www.elboomeran.com/upload/ficheros/noticias/messi.jpg.pdf'; // Reemplaza con el enlace a la imagen
$caption = 'Envio pdf de Messi'; // Texto del pie de foto

$data = array(
    "messaging_product" => "whatsapp",
    "recipient_type" => "individual",
    "to" => "numero recibidor",
    "type" => "document",
    "document" => array(
        "link" => $media_url,   
        "caption" => $caption,
        "filename" => "messi el pdf"
    )
);

$data_string = json_encode($data);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $token,
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string)
));

$result = curl_exec($curl);

// Verificar si hubo un error
if (curl_errno($curl)) {
    $error_msg = curl_error($curl);
    echo 'Error: ' . $error_msg;
}

// Obtener el código de estado HTTP
$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

// Mostrar la respuesta y el código de estado
echo 'HTTP Code: ' . $http_code . PHP_EOL;
echo 'Response: ' . $result;

?>
