<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['clientId'])) {
    header("location:../login.php");
}
include "../connection.php";
$id = $_SESSION['clientId'];
$clientName = $_SESSION['clientName'];

if ($_SESSION['selectedLawyer'] != "") {
    $selectedId = $_SESSION['selectedLawyer'];
    $_SESSION['selectedLawyer'] = "";
    header("location:new_application.php?id=$selectedId");
}

$query = "SELECT * FROM `cases` where `status`='paid' and client_id=$id";
$query1 = "SELECT * FROM `cases` where `status`='rejected' and client_id=$id";
$query3 = "SELECT * FROM `cases` where `status`='pending' and client_id=$id";
$query4 = "SELECT * FROM `cases` where client_id=$id";


$data = mysqli_query($connect, "$query");
$data1 = mysqli_query($connect, "$query1");
$data2 = mysqli_query($connect, "$query3");
$data4 = mysqli_query($connect, "$query4");

$acceptedCaseQuery = "SELECT * FROM `cases` where `client_Id`= '$id' AND `status`='accepted'";
$acceptedCase = mysqli_query($connect, "$acceptedCaseQuery");

$signedCaseQuery = "SELECT * FROM `cases` where `client_Id`= '$id' AND `status`='signed'";
$signedCase = mysqli_query($connect, "$signedCaseQuery");

$missingInforQuery = "SELECT * FROM `clients` where `id`= '$id' AND (id_number='' OR sector='') ";
$missingInfor = mysqli_query($connect, "$missingInforQuery");


$clients_query = "SELECT * FROM `clients`";
$clients_data = mysqli_query($connect, "$clients_query");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Client Page</title>

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

    <div id="wrapper">

        <?php include 'includes/navTop.php'; ?>

        <?php include 'includes/menu.php'; ?>


        <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>


                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-account fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php
                                                            $result = mysqli_num_rows($data2);
                                                            echo $result;
                                                            ?></div>
                                        <div>Pending Cases</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa  fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php
                                                            $result = mysqli_num_rows($data);
                                                            echo $result;
                                                            ?></div>
                                        <div>Allowed Cases</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa  fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php
                                                            $result = mysqli_num_rows($data1);
                                                            echo $result;
                                                            ?></div>
                                        <div>Rejected Cases</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel " style="background-color: cyan">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa  fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php
                                                            $result = mysqli_num_rows($data4);
                                                            echo $result;
                                                            ?></div>
                                        <div>All Cases(s)</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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