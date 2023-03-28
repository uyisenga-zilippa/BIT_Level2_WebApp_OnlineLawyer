<?php
session_start();
if (!isset($_SESSION['lawyerId'])) {
    header("location:../index.php");
}
include "../connection.php";

$id = $_SESSION['lawyerId'];
$lawyerName = $_SESSION['lawyerName'];

$CaseId = $_GET['id'];

$query = "SELECT clients.names,case_title,clients.phone,cases.price,cases.id,payment.receipt FROM cases,clients,lawyers,payment WHERE lawyers.id=cases.lawyer_id AND cases.client_id=clients.id AND payment.payer_id=clients.id AND cases.id=$CaseId";
$data = mysqli_query($connect, "$query");
$caseInfor = mysqli_fetch_array($data);
error_reporting(0);
// $iid = $row['4'];

if (isset($_POST['saved'])) {
    $query2 = "UPDATE `cases` SET `status`='paid' WHERE `id`='$CaseId'";
    $done = mysqli_query($connect, "$query2");
    if ($done) {

?>
        <script>
            alert(" successfuly approved payment");
            window.open('index.php', '_self');
        </script>
<?php
    } else {
        echo "Error: ", mysqli_error($connect);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Payment</title>

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

        <?php include 'include/nav.php'; ?>



        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Approve payment</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <br>
                <h6 style="font-size:18px;color:black;">
                    <b>NAMES:</b><?php echo $caseInfor[0] ?><br>
                    <b>EMAIL:</b><?php echo $caseInfor[0] ?><br>
                    <b>PHONE:</b><?php echo $caseInfor[2] ?><br>
                    <b>AMOUNT:</b><?php echo $caseInfor[3] ?><br>
                </h6>



                <div class="row">
                    <div class="col-lg-6">
                        <a href="../<?php echo $caseInfor[5] ?>"><button class='btn btn-success'>DOWNLOAD</button></a>
                    </div>
                    <div class="col-lg-6">
                        <form action="" method="post">
                            <button name="saved" type="submit" class="btn btn-primary text-center">Mark As Approved</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

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