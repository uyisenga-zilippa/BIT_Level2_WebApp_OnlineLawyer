<?php
session_start();
include "../connection.php";
$id = $_GET['id'];
$desc = $_GET['desc'];
$amount = $_GET['amount'];

//sms confing
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://auth.oltranz.com/auth/realms/api/protocol/openid-connect/token',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'client_id=isaha-co&grant_type=client_credentials&client_secret=f305ec36-f1e2-4858-85d0-386958185553',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
$result = json_decode($response);
$token = $result->{'access_token'};
//echo $token;

function sendSms($token, $receiver, $message)
{

    $curl = curl_init();
    $token1 =  "Authorization: Bearer $token";

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://sms.api.oltranz.com/api/v1/sms/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
"title": "OL services",
"message": "' . $message . '", 
"receivers": [ "' . "25" . $receiver . '"]


}',
        CURLOPT_HTTPHEADER => array(
            $token1,
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
}



$query = "SELECT DISTINCT province FROM `lawyers` WHERE `status`='active'";
$data = mysqli_query($connect, "$query");

//get all user Informations
$sql = "SELECT * FROM `clients` WHERE `id`='$id'";
$userInfor = mysqli_fetch_array(mysqli_query($connect, "$sql"));
$day = date("d");
$month = date("m");
$year = date("Y");
$contractInfor = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `contract` WHERE case_id=$id"));


$query_stutus = "SELECT cases.case_title,cases.price,lawyers.id,cases.id,lawyers.phone,lawyers.names FROM cases,lawyers WHERE cases.lawyer_id=lawyers.id AND cases.id='$id'";

$caseInfor = mysqli_fetch_array(mysqli_query($connect, "$query_stutus"));
if ($amount == 1) {
    $aamount = $caseInfor[1];
} else {
    $aamount = ($caseInfor[1] * $contractInfor[2]) / 100;
}
$query = "INSERT INTO `payment` (`id`,`day`,`month`,`year`, `payer_id`, `receiver_id`, `reason`, `amount`,`case_id`) VALUES (NULL, '$day', '$month','$year','$id', '$caseInfor[2]', '$desc', '$aamount','$caseInfor[3]');";

$done = mysqli_query($connect, "$query");
if ($done) {
    if (isset($_GET['remaining'])) {
        $query2 = "UPDATE `contract` SET `remain_amount`='0' WHERE `case_id`='$caseInfor[3]'";

        sendSms($token, $caseInfor[4], 'Hello Me ' . $caseInfor[5] . ' you have recieved payment of ' . $aamount . 'RWF from ' . $userInfor['names'] . ' for ' . $desc . ', your amount will sent to your bank account soon');

?>
        <script>
            window.open('index.php', '_self')
        </script>

        <?php

    } else {
        $query2 = "UPDATE `cases` SET `status`='paid' WHERE `id`='$caseInfor[3]'";
        if (mysqli_query($connect, "$query2")) {
            sendSms($token, $caseInfor[4], 'Hello Me ' . $caseInfor[5] . ' you have recieved payment of ' . $aamount . ' from ' . $userInfor['names'] . ' for ' . $desc . ', your amount will sent to your bank account soon');
        ?>
            <script>
                window.open('index.php', '_self')
            </script>
<?php
        } else {
            echo "ERROR " . mysqli_error($connect);
        }
    }
} else {
    echo "ERROR " . mysqli_error($connect);
}
