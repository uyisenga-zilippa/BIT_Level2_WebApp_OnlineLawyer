<?php
session_start();
if (!isset($_SESSION['clientId'])) {
    header("location:../lawyers.php");
}
include "../connection.php";
$id = $_SESSION['clientId'];
$clientName = $_SESSION['clientName'];

$query = "SELECT * FROM `cases` WHERE `id`='{$_GET['id']}'";
$caseInfor = mysqli_fetch_array(mysqli_query($connect, "$query"));

$userInfor = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM clients WHERE id=$id"));

$paymentInfor = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `payment` WHERE `case_id`='{$_GET['id']}'"));

$contractInfor = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `contract` WHERE case_id=$id"));
$remNber = 100 - $contractInfor[2];
$amount = ($caseInfor['price'] * $remNber) / 100;
$description = "Remaining amount on {$caseInfor['case_title']} case";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Client Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div style="margin-top:7cm">
        <center>
            <p>
                You are About to pay remaing amount on case <b> <?php echo $caseInfor['case_title']  ?></b> <br>
                <b>Amount: <?php echo $amount ?></b>
            </p>
        </center>
    </div>


    <form role="form" method="POST" action="../Flutterwave/processPayment.php" enctype='multipart/form-data'>
        <!-- <p style="color: blue;">Payment Process</p> -->
        <input type="hidden" name="amount" value="<?php echo $amount ?>" /> <!-- Replace the value with your transaction amount -->
        <input type="hidden" name="payment_options" value="" />
        <!-- Can be card, account, ussd, qr, mpesa, mobilemoneyghana  (optional) -->
        <input type="hidden" name="description" value="<?php echo $description ?>" />
        <!-- Replace the value with your transaction description -->
        <input type="hidden" name="logo" value="https://th.bing.com/th/id/OIP.NkScbMvamblXEuLfTpbuzwHaF7?pid=ImgDet&rs=1" />
        <!-- Replace the value with your logo url (optional) -->
        <input type="hidden" name="title" value="OnlineLawyer" />
        <!-- Replace the value with your transaction title (optional) -->
        <input type="hidden" name="country" value="RW" /> <!-- Replace the value with your transaction country -->
        <input type="hidden" name="currency" value="RWF" /> <!-- Replace the value with your transaction currency -->
        <input type="hidden" name="email" value="<?php echo $userInfor['email'] ?>" /> <!-- Replace the value with your customer email -->
        <input type="hidden" name="firstname" value="<?php echo $userInfor[1] ?>" />
        <!-- Replace the value with your customer firstname (optional) -->
        <input type="hidden" name="lastname" value="" />
        <!-- Replace the value with your customer lastname (optional) -->
        <input type="hidden" name="phonenumber" value="<?php echo $userInfor['phone'] ?>" />
        <!-- Replace the value with your customer phonenumber (optional if email is passes) -->
        <input type="hidden" name="pay_button_text" value="Complete Payment" />
        <!-- Replace the value with the payment button text you prefer (optional) -->
        <!-- <input type="hidden" name="ref" value="MY_NAME_5a22a7f270abc8879" /> -->
        <!-- Replace the value with your transaction reference. It must be unique per transaction. You can delete this line if you want one to be generated for you. -->
        <input type="hidden" name="successurl" value="../client/payment_success.php?id=<?php echo $id ?>&&desc=<?php echo $description ?>&&amount=1&&remaining='true'">
        <!-- Put your success url here -->
        <input type="hidden" name="failureurl" value="http://request.lendlot.com/13b9gxc1?status=failed">
        <!-- Put your failure url here -->
        <center><input id="btn-of-destiny" class="btn btn-warning" type="submit" value="Pay Now" /></center>

        <!-- <button type="submit" class="btn btn-outline btn-primary" name="done">Submit</button> -->
        <!-- <a href="index.php"><button type="button" class="btn btn-outline btn-warning">Cancle</button></a> -->

    </form>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/startmin.js"></script>

</body>

</html>