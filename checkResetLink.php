<?php
include "connection.php";
$link = $_GET['link'];
$query = "SELECT * FROM `reset_password` WHERE `link`='$link'";
$data = mysqli_query($connect, "$query");
$linkInfo = mysqli_fetch_array($data);
$userId = $linkInfo[2];
if (isset($_POST['submit'])) {
    $password = $_POST['password'];
    $query2 = "UPDATE `student` SET `password`='$password' WHERE `id`='$userId'";
    $done = mysqli_query($connect, "$query2");
    if ($done) {
        echo "<script>alert('Your password reseted successful');window.open('login.php','_self')</script>";
    } else {
        echo "error" . mysqli_error($connect);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reset pawword</title>
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

<body>
    <div class="container ">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3 "></div>
            <div class="col-md-6 col-sm-6 col-xs-6 ">
                <?php
                if (mysqli_num_rows($data)) {
                ?>


                    <br>
                    <center>
                        <h3>Reseting your password</h3>
                    </center>
                    <br>
                    <form class="jumbotron" id="login" method="post" onsubmit="return chack()" action="#">

                        <div class="form-group">
                            <label for="username">New Password:</label>
                            <input type="password" id="pwd" class="form-control" placeholder="Enter your new password" required='' name="password">
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password:</label>
                            <input type="password" id="cpwd" class="form-control" required='' placeholder="Renter your new password">
                        </div>
                        <div class="form-group">
                            <input type="submit" style="background: #008ae6;color: white" class="form-control" value="save" name="submit">
                        </div>

                    </form>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3 "></div>
        </div>
    </div>
    <script>
        const chack = () => {
            if (pwd.value === cpwd.value) {
                return true;
            } else {
                alert("Two different password");
                return false;
            }
        }
    </script>
</body>

</html>
<?php } else {
?>
    <div class="jumbotron">
        <h3 style="color: red;">Invalid reset password link</h3>
        <br>
        <center><a href=" index.html"><button class="btn" style="background-color:#008ae6;color: white;">Back to
                    Home</button></a></center>
    </div>
<?php } ?>