<?php
//session_start();
// if (!isset($_SESSION['schoolId'])) {
//     header("location:../admin");
// }
include "../connection.php";
 $id=$_GET['id'];

$query = "SELECT lawyers.names,lawyers.email,lawyers.phone,amount,lawyers.id,payment.id,receipt
FROM lawyers,payment WHERE lawyers.id=payment.payer_id AND receiver_id='admin' AND payment.id='$id'";
$data = mysqli_query($connect, "$query");
$row = mysqli_fetch_array($data);
 error_reporting(0);
$iid=$row['4'];

 if(isset($_POST['saved']))
{
    $query2="UPDATE `lawyers` SET `status`='paid' WHERE `id`='$iid'";
    $done=mysqli_query($connect,"$query2");
    if($done)
    {
        ?>
    <script>
        alert(" successfuly approved payment");window.open('index.php','_self');
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
                        <i class="fa fa-user fa-fw"></i> <?php //echo $choolName; 
                                                            ?> <b class="caret"></b>
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
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i>Schools<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="new_application.php">pending school</a>
                                </li>
                                <li>
                                    <a href="allowed_school.php">Allowed Schools</a>
                                </li>
                            </ul>

                            <!-- /.nav-second-level -->
                        </li>
                        <li class="active">
                            <a href="#"><i class="fa fa-table fa-fw"></i>Payments</a>
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
        <b>NAMES:</b><?php echo $row[0] ?><br>
        <b>EMAIL:</b><?php echo $row[1] ?><br>
        <b>PHONE:</b><?php echo $row[2] ?><br>
        <b>AMOUNT:</b><?php echo $row[3] ?><br></h6>
        


<div class="row">
<div class="col-lg-6">
        <a href="../<?php echo $row[6] ?>"><button class='btn btn-success'>DOWNLOAD</button></a>
</div>
<div class="col-lg-6">
<form action="" method="post">
<button name="saved" type="submit" class="btn btn-primary text-center" >Mark As Approved</button>
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