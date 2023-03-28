<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:loginAdmin.html");
}
include "connection.php";
$id = $_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM `schools` WHERE `id`='$id'");
$applicationInfor = mysqli_fetch_array($query);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>view..</title>

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
                <div class=" panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">School Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-9">
                                <b><?php //echo "$result[0] $result[1]"; 
                                    ?></b>
                            </div>
                            <div class="col-lg-2">
                                <img src="<?php echo "../$applicationInfor[8]" ?>" alt="" width="80" style="border: solid blue 2px;">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-8">
                                <b>School name:</b>:<?php echo $applicationInfor[2] ?>
                            </div>
                            <div class="col-lg-4">
                                <b>School code:</b>: <?php echo $applicationInfor[1] ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-8">
                                <b>School Type</b>: <?php echo $applicationInfor[4] ?>
                            </div>
                            <div class="col-lg-4">
                                <b>School Location</b>: <?php echo $applicationInfor[13] ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-4">
                                <b>Category</b>: <?php echo $applicationInfor[6] ?>
                            </div>
                            <div class="col-lg-4">
                                <b>Email</b>:<?php echo $applicationInfor[9] ?>
                            </div>
                            <div class="col-lg-4">
                                <b>Phone</b>: <?php echo $applicationInfor[10] ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-8">
                                <b>Options</b>:<?php echo $applicationInfor[7] ?>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-lg-6">
                        <center>
                            <a href="<?php //echo "accept.php?id=$id"; 
                                        ?>">
                                <div class="btn btn-success text-center">Accept</div>
                            </a>
                        </center>
                    </div>
                    <div class="col-lg-6">
                        <center>
                            <a href="<?php //echo "denie.php?id=$id"; 
                                        ?>">
                                <div class="btn btn-warning text-center">No</div>
                            </a>
                        </center>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

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