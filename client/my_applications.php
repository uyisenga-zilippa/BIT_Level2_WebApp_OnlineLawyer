<?php
session_start();
$h = 6;
if (!isset($_SESSION['clientId'])) {
    header("location:../login.php");
}
include "../connection.php";
$id = $_SESSION['clientId'];
$clientName = $_SESSION['clientName'];


// include "../connection.php";
// $id = $_SESSION['lawyerId'];
// $lawyerName = $_SESSION['lawyerName'];
// $choolName = $_SESSION['schoolname'];
$query = "SELECT cases.id,cases.day,cases.month,cases.year,cases.case_title,lawyers.names,cases.status FROM clients,cases,lawyers WHERE clients.id=cases.client_id AND cases.lawyer_id=lawyers.id AND cases.client_id=$id ";
$data = mysqli_query($connect, "$query");


//generate lawyer names
$queryi = "SELECT * FROM `lawyers` WHERE `id`='$id'";
$datai = mysqli_query($connect, "$queryi");
$lawyerInfori = mysqli_fetch_array($datai);

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
                        <h1 class="page-header">My cases</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Cases
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>dates</th>
                                                <th>Cases title</th>
                                                <th>Lawyer</th>
                                                <th>Case status</th>
                                                <th>
                                                    <center>Options</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_array($data)) {
                                            ?>

                                                <tr class='odd gradeX'>
                                                    <td> <?php echo "$row[1]/$row[2]/$row[3] " ?></td>
                                                    <td><?php echo $row[4] ?></td>
                                                    <td><?php echo $row[5] ?></td>
                                                    <td><?php echo $row[6] ?></td>


                                                    <td class='center'><a href='view.php?id=<?php echo $row[0]  ?>'>View</a></td>

                                                </tr>
                                                <div id="myModal" class="modal" style="margin-top: 1cm;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <p align='right'><button class="btn btn-danger text-center" data-dismiss="modal">X</button></p>
                                                                <h3 class="modal-title">File attachment</h3>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="attachment.php" method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" name="cid" value="<?php echo $row['0'] ?>">

                                                                    <div class="row">
                                                                        <div class="col-lg-10">
                                                                            <div class="form-group">

                                                                                <textarea name="text" id="texts" cols="60" rows="3" placeholder="File description" required></textarea>
                                                                            </div>


                                                                            <div class="form-group">

                                                                                <input type="file" class="form-control" required='' name="attach">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-2">
                                                                            <button class="btn btn-primary">
                                                                                Save
                                                                            </button>
                                                                        </div>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                            <!-- <div class="modal-footer">by director of 13or Ltd</div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->



                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->


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