<?php
include "connection.php";
if (isset($_GET['id'])) {
    $schoolId = $_GET['id'];
}

if (isset($_POST['signup'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "INSERT INTO `student` (`id`, `fname`, `lname`, `email`, `password`) VALUES (NULL, '$fname', '$lname', '$email', '$password');";
    $done = mysqli_query($connect, "$query");
    if ($done) {
        echo "<script>alert('Account created successfuly')</script>";
        header("location:student/index.php");
    } else {
        echo "error";
    }
}
?>

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

<body>
    <div class="container ">
        <div class="row">
            <!--<div class="col-md-12 col-sm-12 col-xs-12 center" style="padding:12px"> -->



            <div class="col-md-3 col-sm-3 col-xs-3 "></div>
            <div class="col-md-6 col-sm-6 col-xs-6 ">
                <center>
                    <h1>Client SignUp</h1>

                </center>
                <form class="jumbotron" id="login" method="post" action="client.php" onsubmit="return chack()">
                    <p class="text-center" style="background: darkgreen;color:white">Sign Up</p>
                    <div class="form-group">
                        <label for="username"> Names:</label>
                        <input type="text" class="form-control" placeholder="Enter your Names" required='' name="names">
                    </div>

                    <div class="form-group">
                        <label for="username">email:</label>
                        <input type="email" class="form-control" placeholder="Enter email address" required='' name="email">
                    </div>
                    <div class="form-group">
                        <label for="username"> PHONE:</label>
                        <input type="text" class="form-control" placeholder="Enter your phone number" required='' name="phone">
                    </div>

                    <div class="form-group">
                        <label for="password">password:</label>
                        <input type="password" class="form-control" required='' id="pwd" placeholder="Enter password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm password:</label>
                        <input type="password" class="form-control" required='' id="cpwd" placeholder="Enter password again to confirm it" name="cpassword">
                    </div>



                    <div class="form-group">
                        <input type="submit" style="background: cyan;color: white" class="btn" value="Sign Up" name="done">
                        <a href='login.php' class="btn">Already have Account?,Login here</a>
                    </div>

                </form>
            </div>
            <br><br>
            <p><a href="index.php">Back Home</a></p>
            <div class="col-md-3 col-sm-3 col-xs-3 "></div>

        </div>

    </div>
    <script>
        const chack = () => {
            if (pwd.value === cpwd.value) {
                return true;
            } else {
                alert("Two diffirent password!");
                cpwd.focus();
                return false;
            }
        }
    </script>
</body>

</html>