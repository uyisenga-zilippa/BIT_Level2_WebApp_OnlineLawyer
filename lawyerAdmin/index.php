<?php
session_start();
if (!isset($_SESSION['lawyerId'])) {
    header("location:../index.php");
}
include "../connection.php";

$id = $_SESSION['lawyerId'];
$lawyerName = $_SESSION['lawyerName'];

$select_lawyer = mysqli_query($connect, "SELECT status FROM lawyers WHERE id='$id'");
$getStatus = mysqli_fetch_array($select_lawyer);

$query = "SELECT cases.id,clients.names,clients.email,clients.phone,clients.province,clients.district,clients.sector,
 cases.case_title,cases.case_description,cases.day,cases.month,cases.year,cases.time,
 cases.document,signed_contract,cases.status
FROM clients,cases
 WHERE clients.id=cases.client_id AND cases.status='signed_panding' AND lawyer_id='$id' ";
// $q = mysqli_query($connect, $query);
// $in = mysqli_fetch_array($q);

$signedContracts = mysqli_query($connect, "$query");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lawyer Cpanel</title>

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

        <!-- Navigation -->
        <?php include('include/nav.php') ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <br><br><br>
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

                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                            $query = mysqli_query($connect, "SELECT count(id) FROM `cases` WHERE `status`='pending' AND lawyer_id='$id' ");
                                            $result = mysqli_fetch_array($query);
                                            echo $result[0];

                                            ?></div>
                                        <div>New Cases</div>
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

                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                            $query = mysqli_query($connect, "SELECT count(id) FROM `cases` WHERE `status`='paid' AND lawyer_id='$id'");
                                            $result = mysqli_fetch_array($query);
                                            echo $result[0];

                                            ?>

                                        </div>
                                        <div>Ongoing Cases</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">

                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"> <?php
                                                            $query = mysqli_query($connect, "SELECT count(id) FROM `cases` WHERE  (`status`='lost' or status='won') AND lawyer_id='$id'");
                                                            $result = mysqli_fetch_array($query);
                                                            echo $result[0];

                                                            ?></div>
                                        <div>Closed Cases</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel" style="background-color: cyan;">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">

                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?php
                                            $query = mysqli_query($connect, "SELECT count(id) FROM `cases` WHERE  `status`='accepted' AND lawyer_id='$id'");
                                            $result = mysqli_fetch_array($query);
                                            echo $result[0];

                                            ?>
                                        </div>
                                        <div>pending Cases</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>








                <!-- /.row -->
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