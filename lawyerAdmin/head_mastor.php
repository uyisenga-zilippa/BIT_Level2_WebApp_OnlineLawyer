<?php
session_start();
if (!isset($_SESSION['schoolId'])) {
    header("location:../schools.php");
}
include "../connection.php";
$id = $_SESSION['schoolId'];
$choolName = $_SESSION['schoolname'];
$query = "SELECT * FROM `head_teacher` WHERE `school_id`='$id' ORDER BY `head_teacher`.`id` DESC LIMIT 1";
$data = mysqli_query($connect, "$query");
$mastorInfor = mysqli_fetch_array($data);
$isExist = mysqli_num_rows($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>School profiles</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background: #008ae6">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php" style="color: white">School Admin</a>
            </div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <ul class="nav navbar-nav navbar-left navbar-top-links">
                <li><a href="../index.html" style="color: white"><i class="fa fa-home fa-fw"></i> Website</a></li>
            </ul>

            <ul class="nav navbar-right navbar-top-links">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white">
                        <i class="fa fa-user fa-fw"></i> <?php echo $choolName; ?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="setting.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li class="active">
                            <a href="head_mastor.php"><i class="fa fa-user-md"></i> Head Mastor</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Students<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="new_application.php">New Application</a>
                                </li>
                                <li>
                                    <a href="allowed_students.php">Allowed Students</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="view_payments.php"><i class="fa fa-table fa-fw"></i>Payments</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i>Search Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Student <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="search_date.php?type=student&category=1">Monthly Report</a>
                                        </li>
                                        <li>
                                            <a href="search_date.php?type=student&category=2">Annually Report</a>
                                        </li>

                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li>
                                    <a href="#">Payments <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="search_date.php?type=payment&category=1">Monthly Report</a>
                                        </li>
                                        <li>
                                            <a href="search_date.php?type=payment&category=2">Annually Report</a>
                                        </li>

                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>



                        <!-- /.nav-third-level -->
                        </li>
                    </ul>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Head Mastor</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-md-12 ">
                        <div class=" panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Head Mastor Information</h3>
                            </div>
                            <div class="panel-body">
                                <!-- check if there is head mastor -->
                                <?php
                                if (!$isExist) {
                                    echo "<br><br><center><a href='add_mastor.php'> <button class='btn btn-warning'>Add</button></a></center>";
                                } else {
                                    echo " 
                                <div class='row'>
                                    <div class='col-lg-8'>
                                        <b>$mastorInfor[2] $mastorInfor[3]</b>
                                    </div>
                                    <div class='col-lg-4'>
                                        <b>Email</b>: $mastorInfor[4]
                                    </div>
                                </div>
                                <br>
                                <div class='row'>
                                    <div class='col-lg-8'>
                                        <b>Phone</b>: $mastorInfor[5]
                                    </div>
                                    <div class='col-lg-4'>
                                        <b>start Date</b>:  $mastorInfor[6] 
                                    </div>
                                </div>
                                <br>";
                                } ?>


                            </div>
                        </div>

                    </div>
                </div>
                <?php
                if ($isExist) {
                    echo '<div class="row">';
                } else {
                    echo '<div class="row" style="display:none">';
                }
                ?>

                <div class="col-lg-3"></div>
                <div class="col-lg-2"> <?php echo "<a href='edit_mastor.php?id=$mastorInfor[0]'><button class='btn btn-primary'> Edit</button></a>" ?></div>
                <div class="col-lg-2"></div>
                <div class="col-lg-2"> <?php echo "<a href='replace_head_mastor.php?id=$mastorInfor[0]'><button class='btn btn-primary'> Replace</button></a>" ?></div>

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