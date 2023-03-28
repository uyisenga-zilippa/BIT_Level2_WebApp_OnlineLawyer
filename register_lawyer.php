<?php
include "connection.php";

$query = "SELECT * FROM mineduc";
$data = mysqli_query($connect, "$query");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>School</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
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
                <center>
                    <h2>Register Lawyer</h2>
                </center>
                <form class="jumbotron" id="login" method="post" action="lawyerSignUp.php" onsubmit="return chack()">
                    <p class="text-center" style="background:#008ae6;color:white">Sign Up</p>

                    <div class="form-group">
                        <label for="name">Names</label>
                        <input type="name" class="form-control" placeholder="Enter your names" required='' name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Enter your email" required='' name="email">
                    </div>

                    <div class="form-group">
                        <label for="password"> Phone:</label>
                        <input type="text" class="form-control" placeholder="Enter Phone" required='' name="phone">
                    </div>


                    <div class="form-group">
                        <label for="password"> Password:</label>
                        <input type="password" class="form-control" required='' id="pwd" placeholder="Enter your password" name="password">
                    </div>

                    <div class="form-group">
                        <label for="password">Confirm password:</label>
                        <input type="password" class="form-control" required='' id="cpwd" placeholder="Enter password again to confirm it" name="cpassword">
                    </div>





                    <div class="form-group">
                        <input type="submit" style="background:#008ae6;color: white" class="btn" value="Sign Up" name="done">
                        Already have Account?,<a href='schoolLogin.html'>Login here</a>
                    </div>
                    <br>
                    <p><a href="index.html">Back Home</a></p>
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
                alert("Two diffirent password!");
                cpwd.focus();
                return false;
            }
        }
    </script>
</body>

</html>