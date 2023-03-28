<?php
session_start();
if (!isset($_SESSION['lawyerId'])) {
    header("location:../index.php");
}
include "../connection.php";
$id = $_SESSION['lawyerId'];
$lawyerName = $_SESSION['lawyerName'];

$day = date("d");
$month = date("m");
$year = date("Y");

if (isset($_POST['done'])) {

    $type = $_POST['type'];
    $amount = $_POST['amount'];

    $file = "files/taxDocuments/" . $_FILES['file']['name'];
    $fileName = $_FILES['file']['name'];
    $target_dir = "../files/taxDocuments/";
    $target_file = $target_dir . basename($_FILES['file']["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("pdf");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        $query = "INSERT INTO `tax` (`id`,`day`,`month`,`year`, `lawyer_id`, `tax_type`, `amount`, `tax_reciept`) VALUES (NULL, '$id','$day', '$month','$year', '$type', '$amount', '$file');";

        $done = mysqli_query($connect, "$query");

        if ($done) {
            move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $fileName);
            echo "<script>alert('Your tax Reciept submitted successful');window.open('index.php','_self');</script>";
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    } else {
        echo "no";
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

    <title>lawyer cpanel</title>

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
        <?php include('include/nav.php') ?>
        <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tax Payment</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Paying Taxes
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST" action="" enctype='multipart/form-data'>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p style="color: blue;">Tax Payment</p>

                                            <div class="form-group">
                                                <label>Tax Type</label>
                                                <input class="form-control" name="type" placeholder="Enter Tax Type">

                                            </div>
                                            <div class="form-group">
                                                <label>Amount</label>
                                                <input class="form-control" name="amount" placeholder="Enter amount you pay">

                                            </div>


                                            <div class="form-group">
                                                <label>Upload Tax Reciept</label>
                                                <input type="file" class="form-control" name="file" required>

                                            </div>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        <div class="col-lg-6">

                                            <center><img src="image/11.jpg" style="width: 50%;"></center>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline btn-primary" name="done">Submit</button>
                                    <a href="index.php"><button type="button" class="btn btn-outline btn-warning">Cancle</button></a>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>


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