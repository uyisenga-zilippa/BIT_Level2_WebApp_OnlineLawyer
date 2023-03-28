<!DOCTYPE html>
<html lang="en">

<head>
    <title>Farm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">
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
<script>
    const sendEmail = (from, name, subject, sendTo, msg) => {
        window.open(`https://emailaip.000webhostapp.com/sendMail.php?from=${from}&name=${name}&subject=${subject}&sendTo=${sendTo}&msg=${msg}`, '_self');
    }
</script>

<body>
    <div class="container ">
        <div class="row">
            <!--<div class="col-md-12 col-sm-12 col-xs-12 center" style="padding:12px"> -->



            <div class="col-md-4 col-sm-4 col-xs-4 "></div>
            <div class="col-md-5 col-sm-5 col-xs-5 ">
                <br>
                <center>
                    <h3>Reset Password</h3>
                </center>
                <br>
                <form class="jumbotron" id="login" method="post" action="#">

                    <div class="form-group">
                        <label for="username">Email:</label>
                        <input type="email" class="form-control" placeholder="Enter username" required='' name="email">
                    </div>

                    <div class="form-group">
                        <input type="submit" style="background: #008ae6;color: white" class="form-control" value="Reset" name="submited">
                    </div>

                </form>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 "></div>
        </div>
    </div>
</body>

</html>

<?php
include "connection.php";

if (isset($_POST['submited'])) {
    $email = $_POST['email'];
    $query = "SELECT * FROM `student` WHERE `email`='$email'";
    $data = mysqli_query($connect, "$query");
    if (mysqli_num_rows($data)) {
        $userInfo = mysqli_fetch_array($data);
        $random1 = rand(0, 100);
        $random2 = rand(0, 100);
        $username = $userInfo[1];
        $link = "Az$random1%~U$userInfo[0]xT$username%KbN~$random2^G";
        $date = date("d/M/Y");
        $query2 = "INSERT INTO `reset_password` (`id`, `date`,`student_id`, `link`) VALUES (NULL, '$date','$userInfo[0]', '$link');";

        $done = mysqli_query($connect, "$query2");

        $sendFrom = "schoolsystems@gmail.com";
        $schoolName = "school system";
        $subject = "Reset password Link";
        $sendTo = $email;
        $msg = "Hello $userInfo[1] $userInfo[2]<br> There is your reseting password link: <a href=http://localhost/yvetto/checkResetLink.php?link=$link>http://localhost/yvetto/checkResetLink.php?link=$link</a>";

        if ($done) {
            echo " <script>
                sendEmail('$sendFrom', '$schoolName', '$subject', '$sendTo', '$msg');
            </script>";
        }
    } else {
        echo "<script>alert('user doesn\'t exist'); </script>";
    }
}

?>