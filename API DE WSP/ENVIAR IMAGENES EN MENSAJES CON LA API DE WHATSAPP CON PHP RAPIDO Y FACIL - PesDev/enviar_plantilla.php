<?php

$url = 'https://graph.facebook.com/v19.0/344789888711746/messages';
$token = 'EAANvayfj0k0BO7nMvB9Eux8ZBfyQnHdvUFTiP0fOIhdhkNu1bHKhYIYaoCTIHEROC4CTCI429CxW3UpsMuW1YhtUsfZA7zBba3s1ysZCqlRvFoZCIZAT6td8CHduvzHZCegS22mj1kIxm6RB2To6HSibq97nKJH6DZAvlDmJcmNYXXtXeWZAAXpSI8n2qImuhn3ygtdzmZA8kGb0IGunY';


$data = array(
    "messaging_product" => "whatsapp",
    "recipient_type" => "individual",
    "to" => "+5435726062288",
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
