<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.mista.io/sms",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => array('action' => 'senderIDrequest', 'sender_id' => 'OnlineLawyerMIS'),
    CURLOPT_HTTPHEADER => array(
        "x-api-key: ef7212aa-6a86-9f71-9139-8b662f83e7cb-9ec1e84c"
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
