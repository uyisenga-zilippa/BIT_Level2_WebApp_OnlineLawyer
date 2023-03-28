<?php
session_start();
if (!isset($_SESSION['lawyerId'])) {
    header("location:../index.php.php");
}
include "../connection.php";
$id = $_SESSION['lawyerId'];
if (isset($_POST['done'])) {
    $password = $_POST['password'];
    $current = $_POST['current'];

    $query = mysqli_query($connect, "SELECT * FROM `lawyers` WHERE `id`='$id' AND `password`='$current'");
    if (mysqli_num_rows($query)) {
        $sql = "UPDATE `lawyers` SET `password`='$password' WHERE `id`='$id'";
        $isDone = mysqli_query($connect, "$sql");
        if ($isDone) {
            echo "<script>alert('Password changed well done');window.open('index.php','_self');</script>";
        } else echo "Error:" . mysqli_error($connect);
    } else echo "<script>alert('worng current password');current.focuc();</script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Settings</title>

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
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Change Password
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" method="POST" action="#" enctype='multipart/form-data' onsubmit="return chack()">

                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter your password" id="pwd">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Retype your new password" id="cpwd">
                                    </div>
                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <input type="password" class="form-control" name="current" placeholder="Enter your Old password" id="current">
                                    </div>

                                    <button type="submit" class="btn btn-outline btn-primary" name="done">Save Change</button>
                                    <a href="index.php"><button type="button" class="btn btn-outline btn-warning">Cancle</button></a>
                                </form>
                            </div>

                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>

            </div>
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