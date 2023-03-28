<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("location:../login.php");
}
include "../connection.php";
$userId = $_SESSION['userId'];
$id = $_GET['id'];
$username = $_SESSION['username'];
require_once('../stripe/config.php');
//$id=$_GET['id'];
$sel = "SELECT `school_id` FROM `applications` WHERE `student_id`='$id'";
$query = mysqli_query($connect, $sel);
$result = mysqli_fetch_array($query);
//echo $result[0];
$id1 = $result[0];
$query1 = mysqli_query($connect, "SELECT reg_fee,name FROM schools WHERE id='$id1'");
$result2 = mysqli_fetch_array($query1);
if (isset($_POST['done'])) {
    $fileName = "bank_recpt_for_student_with_id_" . $userId . ".pdf";
    $file = "../files/bank_recpt/" . $fileName;
    $target_dir = "../files/bank_recpt/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("pdf");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {
        $updateQuery = "UPDATE `applications` SET `bank_recpt`='$file' WHERE `student_id`='$userId'";
        $isDone = mysqli_query($connect, "$updateQuery");
        $isUploaded = move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $fileName);
        if ($isDone and $isUploaded) {
            $updateIsPayQuery = "UPDATE `applications` SET `isPayed`='pending' WHERE `student_id`='$userId'";
            mysqli_query($connect, "$updateIsPayQuery");
            echo "<script>alert('Your bank recpt submitted well done,Chack your email for responde');window.open('index.php','_self');</script>";
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
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">You are about to pay Registration fees</h3>
                    </div>
                    <div class="panel-body">

                        <fieldset>
                            <div class="form-group">
                                Registration: <?php echo "<b>" . $result2[0] . "</b>"; ?>
                            </div>
                            <div class="form-group">
                                School Name: <?php echo "<b>" . $result2[1] . "</b>"; ?>
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
                                    <div class="col-lg-6"><a href="../stripe/charge.php?id=<?php echo $result[0]; ?>" class="btn btn-warning btn-block">clancel</a>
                                    </div>
                                </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
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