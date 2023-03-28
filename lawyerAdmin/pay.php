<?php
session_start();
if (!isset($_SESSION['lawyerId'])) {
    header("location:../index.php");
}
include "../connection.php";

$id = $_SESSION['lawyerId'];
$lawyerName = $_SESSION['lawyerName'];
$date = date("d/m/Y");

$sel = "SELECT * FROM `lawyers` WHERE `id`='$id'";
$query = mysqli_query($connect, $sel);
$result = mysqli_fetch_array($query);


if (isset($_POST['done'])) {
    $fileName = $_FILES['file']['name'];

    $file = "./files/bank_receipt/" . $fileName;
    $target_dir = "../files/bank_receipt/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("pdf");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {
        $updateQuery = "INSERT INTO `payment` (`id`, `payer_id`, `receiver_id`, `amount`, `receipt`, `reason`) VALUES (NULL, '$id', 'admin', '10000', '$file', 'reg fees')";
        $isDone = mysqli_query($connect, "$updateQuery");
        $isUploaded = move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $fileName);
        if ($isDone and $isUploaded) {
            $updateIsPayQuery = "UPDATE `lawyers` SET `status`='wait' WHERE `id`='$id'";
            mysqli_query($connect, "$updateIsPayQuery");
            echo "<script>alert('Your bank receipt submitted well done');window.open('./index.php','_self');</script>";
        } else echo "Error:" . mysqli_error($connect);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <br><br><br><br>
    <div class="container">
        <?php

        if ($result['status'] == 'active') { ?>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">You are about to pay Access fees</h3>
                        </div>
                        <div class="panel-body">

                            <fieldset>
                                <div class="form-group">
                                    <?php echo "<b>" . $result[2] . "</b>"; ?>
                                </div>
                                <div class="form-group">
                                    Access for one year fee: <b>10,000 Frw</b>
                                </div>

                                <div class="form-group">
                                    Account Number(BK): <?php echo "<b>08794586476</b>"; ?>
                                </div>
                                <form action="#" method="POST" enctype='multipart/form-data'>

                                    <div class="form-group">
                                        <label>Upload Bank Rec</label>
                                        <input type="file" name="file" id="file" required="" onchange="return fileValidation()">
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">

                                            <div class="form-group">

                                                <button type="submit" name="done" id="" class="btn btn-success btn-block">Send</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6"><a href="index.php" class="btn btn-warning btn-block">clancel</a>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div>
                <br><br><br>
                <center>
                    <h4>You Alread sent your bank receipt, Please wait for respond!</h4>
                    <br>
                    <b>
                        <h3>Thank You</h3>
                    </b>
                    <br><br><br><br><br>
                    <a href="./index.php">Back To Home</a>
                </center>
            </div>
        <?php } ?>
    </div>
    <script>
        function fileValidation() {
            var fileInput =
                document.getElementById('file');

            var filePath = fileInput.value;

            // Allowing file type 
            var allowedExtensions =
                /(\.pdf)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type, Only pdf format is allowed');
                fileInput.value = '';
                return false;
            }
            return true;
        }
    </script>
</body>

</html>