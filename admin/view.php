<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:loginAdmin.html");
}
include "connection.php";
$id = $_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM `lawyers` WHERE `id`='$id'");
$ck = mysqli_query($connect, "SELECT * FROM `lawyers` WHERE `id`='$id'");
$lawyerInfor = mysqli_fetch_array($query);

//checking status to generate different buttons
$ck = mysqli_query($connect, "SELECT * FROM `lawyers` WHERE `id`='$id'");
$lawyer_status = mysqli_fetch_array($ck);
// echo $lawyer_status[0];

// get school bank rspt 
$query2 = mysqli_query($connect, "SELECT * FROM `lawyer_documents` WHERE `lawyer_id`='$id'");
$document = mysqli_fetch_array($query2);

// get lawyer documents
$query3 = "SELECT * FROM `lawyer_documents` WHERE `lawyer_id`='$id'";
$data3 = mysqli_query($connect, "$query3");
$documents = mysqli_fetch_array($data3);

$hasDoc = mysqli_num_rows($data3);

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
                        <h3 class="panel-title">Lawyer Information</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-9">

                                <img src="<?php echo "../$lawyerInfor[1]" ?>" alt="" width="80" style="border: solid blue 2px;">
                            </div>
                            <div class="col-lg-2">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Names:</b>:<?php echo $lawyerInfor[2] ?>
                            </div>
                            <div class="col-lg-6">
                                <b>Qualification</b>: <?php echo $lawyerInfor['qualification'] ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Email</b>: <?php echo $lawyerInfor['email'] ?>
                            </div>
                            <div class="col-lg-6">
                                <b>Langauges</b>: <?php echo $lawyerInfor['langauges'] ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Phone</b>: <?php echo $lawyerInfor['phone'] ?>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?php
                                        if ($hasDoc) {
                                            if (!$documents[2] == "") { ?>
                                                <a href="../<?php echo  $documents[2] ?>">
                                                    <b>View ID</b></a>
                                        <?php } else {
                                                echo "No ID";
                                            }
                                        } else {
                                            echo "No ID";
                                        } ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php
                                        if ($hasDoc) {
                                            if (!$documents[3] == "") { ?>
                                                <a href="../<?php echo  $documents[3] ?>">
                                                    <b>View Qualification</b></a>
                                        <?php } else {
                                                echo "No Qualification";
                                            }
                                        } else {
                                            echo "No Qualification";
                                        } ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Address</b>:<?php echo $lawyerInfor['province'] . ', ';
                                                echo $lawyerInfor['district']; ?>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?php
                                        if ($hasDoc) {
                                            if (!$documents[4] == "") { ?>
                                                <a href="../<?php echo  $documents[4] ?>">
                                                    <b>View Licence</b></a>
                                        <?php } else {
                                                echo "No Licence";
                                            }
                                        } else {
                                            echo "No Licence";
                                        } ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php
                                        if ($hasDoc) {
                                            if (!$documents[5] == "") { ?>
                                                <a href="../<?php echo  $documents[5] ?>">
                                                    <b>View Justification</b></a>
                                        <?php } else {
                                                echo "No Justification";
                                            }
                                        } else {
                                            echo "No Justification";
                                        } ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-8">
                                <?php //echo "<a href='../$lawyerInfor[13]'><b>ID Copy(pdf)</b></a>" 
                                ?>
                            </div>
                            <div class="col-lg-4">
                                <?php //echo "<a href=../$lawyerInfor[14]><b>Diplome(pdf)</b></a>" 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if ($lawyer_status['status'] == 'pending') {
                ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <center>
                                <a href="<?php echo "accept.php?id=$id"; ?>">
                                    <div class="btn btn-success text-center">Approve</div>
                                </a>
                            </center>
                        </div>
                        <div class="col-lg-6">
                            <center>
                                <a href="<?php echo "denie.php?id=$id"; ?>">
                                    <div class="btn btn-warning text-center">Deny</div>
                                </a>
                            </center>
                        </div>
                    </div>
                <?php
                }

                ?>

                <?php
                if ($lawyer_status['status'] == 'active') {
                ?>
                    <div class="row">
                        <!-- <div class="col-lg-6">
                        <center>
                            <a href="<?php // echo "accept.php?id=$id"; 
                                        ?>">
                                <div class="btn btn-success text-center">Accept</div>
                            </a>
                        </center>
                    </div> -->
                        <div class="col-lg-12">
                            <center>
                                <a href="<?php echo "denie.php?id=$id"; ?>">
                                    <div class="btn btn-warning text-center">Deny</div>
                                </a>
                            </center>
                        </div>

                    </div>
                <?php
                }

                ?>

                <?php
                if ($lawyer_status['status'] == 'rejected') {
                ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <center>
                                <a href="<?php echo "accept.php?id=$id"; ?>">
                                    <div class="btn btn-success text-center">Approve</div>
                                </a>
                            </center>
                        </div>
                        <div class="col-lg-6">
                            <center>
                                <a href="<?php echo "deleteLawyer.php?id=$id"; ?>">
                                    <div class="btn btn-danger text-center">Delete</div>
                                </a>
                            </center>
                        </div>
                    </div>
                <?php
                }

                ?>




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