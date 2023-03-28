<?php
session_start();
if (!isset($_SESSION['clientId'])) {
    header("location:../login.php");
}
include "../connection.php";
$id = $_SESSION['clientId'];
$clientName = $_SESSION['clientName'];

$id = $_GET['id'];

// $query = mysqli_query($connect, "SELECT * FROM `lawyers` WHERE `id`='$id'");
$query = "SELECT clients.names,clients.email,clients.phone,clients.province,clients.district,clients.sector,
 cases.case_title,cases.case_description,cases.day,cases.month,cases.year,cases.time,cases.document,lawyers.names
  FROM clients,cases,lawyers WHERE clients.id=cases.client_id AND cases.lawyer_id=lawyers.id AND cases.id='$id' ";
$q = mysqli_query($connect, $query);
$info = mysqli_fetch_array($q);

$query2 = "SELECT attachment_id,case_id,attachment.description,attachment.file from attachment where case_id='$id'";
$data = mysqli_query($connect, $query2);
// $data = mysqli_fetch_array($k);

// echo $data[0];
$query0 = "SELECT cases.id,cases.day,cases.month,cases.year,cases.case_title,lawyers.names,cases.status FROM clients,cases,lawyers WHERE clients.id=cases.client_id AND cases.lawyer_id=lawyers.id AND cases.client_id=$id ";
$data1 = mysqli_query($connect, "$query0");

$caseInfor = mysqli_fetch_array(mysqli_query($connect, "select * from cases where id='$id'"));




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

    <title>Client Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style>
        .btn {
            color: white;
        }
    </style>
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
                        <h1 class="page-header">Cases Details</h1>
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
                                <div class="row">
                                    <div class="col-lg-9">
                                        <b><?php //echo "$result[0] $result[1]"; 
                                            ?></b>
                                    </div>

                                </div>
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
                                        <b>Adress</b>: <?php echo $info[3] . " / " . $info[4] . "/ " . $info[5] ?>
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
                                    <br>
                                    <div class="col-lg-6">
                                        <br><br>
                                        <a href="<?php echo $info[12] ?>"> <b>case file</b></a>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <b>date</b>:<?php echo $info[8] . "/" . $info[9] . "/" . $info[10] . "&nbsp;&nbsp;&nbsp;&nbsp;<i>" . $info[11] . "</i>"; ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <b>Case Status</b>:<?php echo $caseInfor['status']; ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <b>lawyer :</b><?php echo $info[13]; ?>
                                    </div>

                                    <!-- <div class="col-lg-4">
                                <b>Category</b>: <?php //echo $info[11] 
                                                    ?>
                            </div> -->
                                    <br><br>
                                    <?php if (mysqli_num_rows($data)) { ?>
                                        <center>
                                            <div class=" col-md-12 table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>attachments</th>
                                                            <th>description</th>
                                                            <th>file</th>
                                                            <th colspan='1'>
                                                                <center>Options</center>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $count = 0;
                                                        while ($row = mysqli_fetch_array($data)) {
                                                            $count++;
                                                        ?>

                                                            <tr class='odd gradeX'>

                                                                <td>attachments <?php echo $count ?> </td>
                                                                <td><?php echo $row[2] ?></td>
                                                                <td><a href="<?php echo $row[3] ?>"> <b>case file</b></a></td>
                                                                <td class='center'><a href='deleteAttachment.php?id=<?php echo $caseInfor[0]  ?>'>delete</a></td>

                                                            </tr>

                                                        <?php
                                                        }
                                                        ?>


                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                            </div>

                                        </center>
                                </div>
                                <br>
                            </div>

                            <?php



                            if ($caseInfor['status'] == 'signed') { ?>

                                <button class='center btn btn-success'><a href='pay.php?id=<?php echo $caseInfor[0] ?>'>Pay</a></button>

                            <?php
                            } else if ($caseInfor['status'] == 'pending') { ?>

                                <button class='center btn btn-success'><a href='deletecase.php?id=<?php echo $caseInfor[0]  ?>'>delete</a></button>
                                <button class='center btn btn-defout'><a href='updatecase.php?id=<?php echo $caseInfor[0]  ?>'>update</a></button>
                            <?php
                            } else if ($caseInfor['status'] == 'accepted' or $caseInfor['status'] == 'contract_rejected') { ?>
                                <a href='contract.php?id=<?php echo $caseInfor[0]  ?>' class="btn btn-success">Sign Contract</a>
                                <!-- <button class='btn btn-primary' data-toggle="modal" data-target="#myModal" style="cursor:pointer"><span> attach file</span></button> -->

                            <?php
                            } else if ($caseInfor['status'] == 'paid') { ?>

                                <button class='btn btn-primary' data-toggle="modal" data-target="#myModal" style="cursor:pointer"><span '> attach file</span></button>
                            <?php
                            } else if ($caseInfor['status'] == 'won' or $caseInfor['status'] == 'lose') { ?>
                                <?php
                                $price = mysqli_fetch_array(mysqli_query($connect, "SELECT `remain_amount` FROM `contract` WHERE case_id='{$caseInfor['id']}'"));

                                if ($price[0] != 0) {
                                ?>
                                  <a href=' payment.php?id=<?php   ?>' class="btn btn-success">Pay Remaining amount</a>
                                    <?php
                                } else {
                                    ?>

                                        <button class='center'><a href='deletecase.php?id=<?php echo $caseInfor[0]  ?>'>delete</a></button>
                                <?php   }
                            }

                                ?>


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