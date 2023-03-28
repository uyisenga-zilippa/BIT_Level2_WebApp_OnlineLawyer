<?php

// $curl = curl_init();

// curl_setopt_array($curl, array(
//     CURLOPT_URL => 'https://api.mista.io/sms',
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => '',
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 0,
//     CURLOPT_FOLLOWLOCATION => true,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => 'POST',
//     CURLOPT_POSTFIELDS => array('to' => '250780640237', 'from' => 'TEST2', 'unicode' => '0', 'sms' => 'Hello Cedro urwaye COVID-19', 'action' => 'send-sms'),
//     CURLOPT_HTTPHEADER => array(
//         'x-api-key: ef7212aa-6a86-9f71-9139-8b662f83e7cb-9ec1e84c'
//     ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;

// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require_once 'twilio-php-main/src/Twilio/autoload.php';

use Twilio\Rest\Client;


// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 



$sid    = "ACa7f48aa73a813336649d89c0c5569460";
$token  = "7a29dcd147dc30f5ee623826f4e5cc3e";
$twilio = new Client($sid, $token);

$message = $twilio->messages
    ->create(
        "+250784628745", // to 
        array(
            "messagingServiceSid" => "MG32b63c92c547e67f30a800e1c8a48d24",
            "body" => "ytui ,hjvyugui hjvtyfg j ykf7n"
        )
    );

print($message->sid);

// Account details
// $apiKey = urlencode('MzU3NDU0NTM2NTY2NDM2YTUwMzU1ODRmNDg1MTQ2NjE=');

// // Message details
// $numbers = array(+250780591269,);
// $sender = urlencode('OLMIS');
// $message = rawurlencode('this is for just testing');

// $numbers = implode(',', $numbers);

// // Prepare data for POST request
// $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

// // Send the POST request with cURL
// $ch = curl_init('https://api.txtlocal.com/send/');
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($ch);
// curl_close($ch);

// // Process your response here
// echo $response;
