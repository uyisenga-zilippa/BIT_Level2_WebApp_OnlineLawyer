<?php
session_start();
if (!isset($_SESSION['lawyerId'])) {
    header("location:../index.php");
}
include "../connection.php";

$id = $_SESSION['lawyerId'];
$lawyerName = $_SESSION['lawyerName'];

// $query = mysqli_query($connect, "SELECT * FROM `lawyers` WHERE `id`='$id'");
$query = "SELECT clients.names,clients.email,clients.phone,clients.province,clients.district,clients.sector,
 cases.case_title,cases.case_description,cases.day,cases.month,cases.year,cases.time,cases.document,cases.status
FROM clients,cases WHERE clients.id=cases.client_id AND cases.id={$_GET['id']} ";
$q = mysqli_query($connect, $query);
$info = mysqli_fetch_array($q);



//geting student names from student table
// $data = mysqli_query($connect, "SELECT `fname`,`lname` FROM `student` WHERE `id`='$info[1]'");
// $result = mysqli_fetch_array($data);
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

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('include/nav.php') ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <br><br><br>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Case Details</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class=" panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">case information</h3>
                            </div>
                            <div class="panel-body">


                                <br>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <b><u>Client information</u></b>:<?php //echo $info[2] 
                                                                            ?>
                                    </div>
                                    <div class="col-lg-8">
                                        <b>Names</b>:<?php echo $info[0] ?>
                                    </div>
                                    <div class="col-lg-4">
                                        <b>Email</b>: <?php echo $info[1] ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <b>Phone</b>: <?php echo $info[2] ?>
                                    </div>
                                    <div class="col-lg-4">
                                        <b>Adress</b>: <?php echo $info[3], ",", $info[4], ",", $info[5] ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <b> Case title</b>: <?php echo $info[6] ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <b>case discription</b>:<?php echo $info[7] ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="../<?php echo $info[12] ?>"> View Case File</a>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <b>date</b>:<?php echo $info[8] . "/" . $info[9] . "/" . $info[10] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $info[11]; ?>
                                    </div>
                                    <!-- <div class="col-lg-4">
                                <b>Category</b>: <?php //echo $info[11] 
                                                    ?>
                            </div> -->
                                </div>
                                <br>
                                <!-- <div class="row">
                            <div class="col-lg-8">
                                <?php echo "<a href='../$info[1]'><b>ID Copy(pdf)</b></a>" ?>
                            </div>
                            <div class="col-lg-4">
                                <?php echo "<a href=../$info[1]><b>Diplome(pdf)</b></a>" ?>
                            </div>
                        </div> -->
                            </div>
                        </div>
                        <?php

                        if ($info[13] == 'pending') {

                        ?>

                            <div class="row">
                                <div class="col-lg-6">
                                    <center>
                                        <!-- <a href="<?php echo "accept.php?id={$_GET['id']}"; ?>"> -->
                                        <button type="button" data-toggle="modal" class="btn btn-success text-center" data-target="#myModal">Take case</button>
                                        <!-- </a> -->
                                    </center>
                                </div>
                                <div class="col-lg-6">
                                    <center>
                                        <a href="<?php echo "deny.php?id={$_GET['id']}"; ?>">
                                            <div class="btn btn-warning text-center">Deny</div>
                                        </a>
                                    </center>
                                </div>
                            </div>

                        <?php

                        } elseif ($info[13] == 'paid') {
                        ?>

                            <div class="row">
                                <center>
                                    <p>
                                    <h2>Close the case</h2>
                                    <hr>
                                    </p>
                                </center>
                                <div class="col-lg-6">
                                    <center>
                                        <a href="<?php echo "markWon.php?id={$_GET['id']}"; ?>">
                                            <button type="button" class="btn btn-success text-center">mark as won</button>
                                        </a>
                                    </center>
                                </div>
                                <div class="col-lg-6">
                                    <center>
                                        <a href="<?php echo "markLost.php?id={$_GET['id']}"; ?>">
                                            <div class="btn btn-warning text-center">mark as lost</div>
                                        </a>
                                    </center>
                                </div>
                            </div>


                        <?php

                        } elseif ($info[13] == 'rejected') { ?>
                            <div class="col-lg-12">
                                <center>
                                    <!-- <a href="<?php echo "accept.php?id={$_GET['id']}"; ?>"> -->
                                    <button type="button" data-toggle="modal" class="btn btn-success text-center" data-target="#myModal">Take case</button>
                                    <!-- </a> -->
                                </center>
                            </div>
                        <?php


                        } elseif ($info[13] == 'client_sign') { ?>
                            <div class="col-lg-12">
                                <center>
                                    <a href="<?php echo "contract.php?id={$_GET['id']}"; ?>">
                                        <button type="button" class="btn btn-success text-center">See Contract</button>
                                    </a>
                                </center>
                            </div>
                        <?php

                        } else {
                        }

                        ?>





                    </div>
                </div>
                <div id="myModal" class="modal" style="margin-top: 1cm;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p align='right'><button class="btn btn-danger text-center" data-dismiss="modal">X</button></p>
                                <h3 class="modal-title">Send Case Contract </h3>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Taking this case you have to set price to your client
                                </p>
                                <br>
                                <form action="accept.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="caseId" value="<?php echo $_GET['id'] ?>">


                                    <div class="form-group">
                                        <label for="price">Case Price</label>
                                        <input type="number" class="form-control" required='' name="price" placeholder="Enter case price">
                                    </div>

                                    <center>
                                        <button class="btn btn-primary">
                                            Send
                                        </button>
                                    </center>

                                </form>
                            </div>
                            <!-- <div class="modal-footer">by director of 13or Ltd</div> -->
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