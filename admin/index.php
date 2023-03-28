<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:loginAdmin.html");
}
include 'connection.php';
$query = "SELECT * FROM `lawyers` where `status`='active'";
$query1 = "SELECT * FROM `lawyers` where `status`='rejected'";
$query3 = "SELECT * FROM `lawyers` where `status`='pending'";
$query4 = "SELECT * FROM `lawyers`";
$data = mysqli_query($connect, "$query");
$data1 = mysqli_query($connect, "$query1");
$data2 = mysqli_query($connect, "$query3");
$data4 = mysqli_query($connect, "$query4");

$clients_query = "SELECT * FROM `clients`";
$clients_data = mysqli_query($connect, "$clients_query");

$res = mysqli_query($connect, "SELECT * FROM `contact`");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin page</title>

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
                                        <div>Pending Lawyers</div>
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
                                        <div>Allowed Lawyers</div>
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
                                        <div>Rejected Lawyers</div>
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
                                        <div>All Lawyers(s)</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>


                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="panel " style="background-color: black">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa  fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge" style="color:white ;"><b><?php
                                                                                    $result = mysqli_num_rows($clients_data);
                                                                                    echo $result;
                                                                                    ?></div>
                                        <div style="color:white ;">All Client(s)</div></b>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>



                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h4 class="box-title">FEEDBACK MANAGEMENT </h4>
                        </div>

                    </div>


                </div>
                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="panel " style="background-color:skyblue">
                            <div class="panel-heading">
                                <div class="card-body--">

                                    <?php
                                    if (mysqli_num_rows($res)) {
                                        while ($row = mysqli_fetch_array($res)) {
                                    ?>
                                            <div class="message">
                                                <div class="row">
                                                    <h4 class="col-sm-6"><?php echo $row[2] ?></h4>
                                                    <small class="col-sm-6 text-right"><?php echo $row[1]
                                                                                        ?></small>
                                                </div>
                                                <p><?php echo $row[4]
                                                    ?></p>

                                                <div style="display: flex; align-items:justify;">

                                                    <a type="submit" class="btn btn-info btn-sm" href="mailto:<?php echo $row[3] ?>">

                                                        Reply
                                                    </a>

                                                    &nbsp;
                                                    <a href='deleteFeedback.php?id=<?php echo $row[0] ?>'>
                                                        <button class="d-flex btn btn-danger btn-sm">

                                                            Delete
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>

                                    <?php
                                        }
                                    } else {
                                        echo "<center><p>
                                        NO FEEDBACK YET
                                        </p></center>";
                                    }
                                    ?>

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