<?php
session_start();
if (!isset($_SESSION['schoolId'])) {
    header("location:../index.php.php");
}
include "../connection.php";
$id = $_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM `applications` WHERE `id`='$id'");
$applicationInfor = mysqli_fetch_array($query);

//geting student names from student table
$data = mysqli_query($connect, "SELECT `fname`,`lname` FROM `student` WHERE `id`='$applicationInfor[1]'");
$result = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>admin</title>

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
                        <h3 class="panel-title">Application Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-9">
                                <b><?php echo "$result[0] $result[1]"; ?></b>
                            </div>
                            <div class="col-lg-2">
                                <img src="<?php echo "$applicationInfor[12]" ?>" alt="" width="80" style="border: solid blue 2px;">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-8">
                                <b>Gender</b>:<?php echo $applicationInfor[2] ?>
                            </div>
                            <div class="col-lg-4">
                                <b>Birth Date</b>: <?php echo $applicationInfor[3] ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-8">
                                <b>Father</b>: <?php echo $applicationInfor[4] ?>
                            </div>
                            <div class="col-lg-4">
                                <b>Mother</b>: <?php echo $applicationInfor[5] ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-4">
                                <b> ID Number</b>: <?php echo $applicationInfor[6] ?>
                            </div>
                            <div class="col-lg-4">
                                <b>Email</b>:<?php echo $applicationInfor[7] ?>
                            </div>
                            <div class="col-lg-4">
                                <b>Phone</b>: <?php echo $applicationInfor[8] ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-8">
                                <b>Facility</b>:<?php echo $applicationInfor[10] ?>
                            </div>
                            <div class="col-lg-4">
                                <b>Compuse</b>: <?php echo $applicationInfor[11] ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-8">
                                <?php echo "<a href='../$applicationInfor[13]'><b>ID Copy(pdf)</b></a>" ?>
                            </div>
                            <div class="col-lg-4">
                                <?php echo "<a href=../$applicationInfor[14]><b>Diplome(pdf)</b></a>" ?>
                            </div>
                        </div>
                    </div>
                </div>

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