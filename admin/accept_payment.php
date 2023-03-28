<?php
session_start();
// if (!isset($_SESSION['username'])) {
//     header("location:../index.php.php");
// }
include "../connection.php";

//$schoolId = $_SESSION['schoolId'];
$id = $_GET['id'];
//$stId = $_GET['stId'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/startmin.js"></script>
    <script>
        const sendEmail = (from, name, subject, sendTo, msg) => {
            window.open(`https://webprojecteduc.000webhostapp.com/sendMail.php?from=${from}&name=${name}&subject=${subject}&sendTo=${sendTo}&msg=${msg}`, '_self');
        }
    </script>
</body>

</html>
<?php
// $amount = mysqli_fetch_array(mysqli_query($connect, "SELECT `reg_fee` FROM `schools` WHERE `id`='$schoolId'"));
$day = date("d");
$month = date("m");
$year = date("Y");

$query = "UPDATE `schools` SET `isPayed`='yes' WHERE `id`='$id'";
$done = mysqli_query($connect, "$query");
$paymentQuery = "INSERT INTO `payments` (`id`, `school_id`, `student_id`, `amount`, `day`, `month`, `year`) VALUES ('', '$id', '0', '50000', '$day', '$month', '$year');";
$studentInfor = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `schools` WHERE `id`='$id'"));

$sendTo = $studentInfor['email'];
$studentName = $studentInfor['name'];
$msg = " Hello $studentName<br>your payment of <b>50000 Frw</b> has approved";

//$schoolInfor = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `schools` WHERE `id`='$schoolId'"));
$sendFrom = 'isiyvetton@gmail.com';//$schoolInfor['email'];
$schoolName = 'learning online';
$subject = "Payment Accepts";

$isInserted = mysqli_query($connect, "$paymentQuery");
if ($done and $isInserted) {
    echo "<script>sendEmail('$sendFrom','$schoolName','$subject','$sendTo','$msg')</script>";
} else echo "Error: " . mysqli_error($connect);





?>