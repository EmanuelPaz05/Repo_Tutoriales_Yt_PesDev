<?php

$url = '';
$token = '';


$data = array(
    "messaging_product" => "whatsapp",
    "recipient_type" => "individual",
    "to" => "numero a quien llega",
    "type" => "template",
    "template" => array(
        "name" => "inicia",
        "language" => array(
            "code" => "es_AR")
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
curl_close($curl);

echo $result;

?>
