<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:loginAdmin.html");
}
include "connection.php";
$id = $_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM `clients` WHERE `id`='$id'");
$clientInfor = mysqli_fetch_array($query);

// get school bank rspt 
// $query2 = mysqli_query($connect, "SELECT * FROM `lawyer_documents` WHERE `lawyer_id`='$id'");
// $document = mysqli_fetch_array($query2);

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
                        <h3 class="panel-title">Clients Information</h3>

                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-9">

                            </div>
                            <div class="col-lg-2">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Names:</b>:<?php echo $clientInfor[1] ?>
                            </div>
                            <div class="col-lg-6">
                                <b>Gender</b>: <?php echo $clientInfor[2] ?>
                            </div>

                            <div class="col-lg-6">
                                <b>Date of birth</b>: <?php echo $clientInfor[3] ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Email</b>: <?php echo $clientInfor['email'] ?>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Phone</b>: <?php echo $clientInfor[6] ?>
                            </div>


                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Address</b>:<?php echo $clientInfor['province'] . ', ';
                                                echo $clientInfor['district']
                                                    . ', ';
                                                echo $clientInfor['sector']; ?>
                            </div>


                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-8">
                                <?php //echo "<a href='../$clientInfor[13]'><b>ID Copy(pdf)</b></a>" 
                                ?>
                            </div>
                            <div class="col-lg-4">
                                <?php //echo "<a href=../$lawyerInfor[14]><b>Diplome(pdf)</b></a>" 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-lg-6">
                        <center>
                            <a href="<? php // echo "accept.php?id=$id"; 
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
                    </div> -->
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