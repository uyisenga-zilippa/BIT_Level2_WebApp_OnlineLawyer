<?php
session_start();
if (!isset($_SESSION['lawyerId'])) {
    header("location:../lowyer.php");
}
include "../connection.php";
$id = $_SESSION['lawyerId'];
$lawyerName = $_SESSION['lawyerName'];

$caseInfor = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `cases` WHERE `id`={$_GET['id']}"));


if (isset($_FILES['contract'])) {
    $file = "files/cases_contract/" . $_FILES['contract']['name'];
    $fileName = $_FILES['contract']['name'];
    $target_dir = "../files/cases_contract/";
    $target_file = $target_dir . basename($_FILES["contract"]["name"]);

    // Select file type
    $contractFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("pdf");

    // Check extension
    if (in_array($contractFileType, $extensions_arr)) {

        $query = "UPDATE `cases` SET `contracts`='$file' WHERE `id`='$id'";
        $done = mysqli_query($connect, "$query");

        if ($done) {
            move_uploaded_file($_FILES['contract']['tmp_name'], $target_dir . $fileName);
            echo "<script>alert('Contract Uploaded successfuly');window.open('index.php','_self');</script>";
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    } else {
        echo "<script>alert('Please select PDF document');history.go(-1);</script>";
    }
}


// mark as signed
if(isset($_POST['saved']))
{
$query2="UPDATE `cases` SET `status`='signed' WHERE `id`={$_GET['id']}";
$done=mysqli_query($connect,"$query2");
if($done)
{
    ?>
<script>
    alert("Case marked as signed successfuly");window.open('index.php','_self');
</script>
    <?php
}
else
{
    echo "Error: ",mysqli_error($connect);
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

    <title>Lawyer Panel</title>

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

        <?php include 'include/nav.php'; ?>

        

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">View Signed Contract</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <br>
                <h6 style="font-size:18px;color:black;">Dear Lawyer, </h6>
                <p>Download this contract for <?php echo $caseInfor['case_title'] ?> and mark it as signed</p>


<div class="row">
    <div class="col-lg-6">
                <a href="../<?php echo $caseInfor['signed_contract'] ?>"><button class='btn btn-success'>DOWNLOAD</button></a>
 </div>
 <div class="col-lg-6">
 <form action="" method="post">
     <button name="saved" type="submit" class="btn btn-primary text-center" >Mark As Signed</button>
    </form>
</div>
</div>
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