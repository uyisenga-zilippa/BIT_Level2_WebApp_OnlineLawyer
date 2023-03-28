<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['lawyerId'])) {
    header("location:../lawyerLogin.html");
}
include "../connection.php";
$id = $_SESSION['lawyerId'];
$lawyerName = $_SESSION['lawyerName'];
//$month=$_POST['month'];
$year = $_POST['year'];
$query = "SELECT lawyers.names,payment.day,payment.month,payment.year, payment.amount,clients.names,payment.reason FROM lawyers,payment,clients WHERE lawyers.id=payment.receiver_id AND payment.payer_id=clients.id AND payment.status='sent' AND payment.year='$year' AND lawyers.id=$id";
$data = mysqli_query($connect, "$query");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>cases</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="css/dataTables/dataTables.responsive.css" rel="stylesheet">

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
        <?php include('include/nav.php') ?>
        <?php
        if (mysqli_num_rows($data) <= 0) {
        ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Annualy Report</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    nothing to show in this <?php echo $year; ?> year
                                </div>
                                <!-- /.panel-heading -->
                                <div class="col-lg-12">

                                </div>


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
<?php
        } else {



?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Annualy Report</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Closed Cases and Amount Recieved from Cases
                        </div>
                        <!-- /.panel-heading -->
                        <div class="col-lg-12">
                            <table border="1" style="border-collapse: collapse;margin-top:20px;">
                                <thead>
                                    <tr>
                                        <th class="no">No</th>
                                        <th>Date</th>
                                        <th>Client</th>
                                        <th>Case</th>
                                        <th>Amount Paid</th>
                                        <th>Amount Earned</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // echo mysqli_num_rows($data);
                                    $count = 0;
                                    $paid = 0;
                                    $revenue = 0;
                                    $sent = 0;
                                    while ($row = mysqli_fetch_array($data)) {
                                        // echo $row[0];
                                        $count++;
                                        $paid = $paid + $row[4];
                                        $revenue = $revenue + ($row[4] * 5 / 100);
                                        $sent = $sent + ($row[4] - ($row[4] * 5 / 100));

                                    ?>


                                        <tr>
                                            <td><?php echo $count
                                                ?></td>

                                            <td><?php echo $row[1] . "/" . $row[2] . "/" . $row[3];
                                                ?></td>
                                            <td><?php echo $row[5];
                                                ?></td>
                                            <td><?php echo $row[6];
                                                ?></td>
                                            <td><?php echo $row[4];
                                                ?></td>
                                            <td><?php echo $row[4] - ($row[4] * 5 / 100);
                                                ?></td>


                                        </tr>
                                    <?php }
                                    ?>
                                    <tr>

                                        <td colspan="2"><b>Total Amount Paid</b></td>
                                        <td><b><?php echo $paid;  ?></b></td>
                                        <td colspan="2"><b>Total Amount Earned</b></td>
                                        <td><b><?php echo $sent;  ?></b></td>

                                    </tr>

                                </tbody>

                            </table>
                        </div>
                        <div class="col-lg-12">
                            <p>Done at ................ on ..../..../20....</p>
                            <p>Done by:</p>
                            <p>Signature & stamp</p>
                        </div>

                    </div>
                    <button class="btn btn-primary" onclick="window.open('printAnnualReport.php?year=<?php echo $year ?>')">Print</button>
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
<?php } ?>
<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="js/dataTables/jquery.dataTables.min.js"></script>
<script src="js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

</body>

</html>