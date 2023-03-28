<?php
session_start();
if (!isset($_SESSION['schoolId'])) {
    header("location:../index.php.php");
}
include "../connection.php";
$id = $_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM `head_teacher` WHERE `id`='$id'");
$mastorInfor = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Head Teacher Informations
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" method="POST" action="submit_edit_mastor.php" enctype='multipart/form-data'>
                                    <input type="hidden" name="id" value="<?php echo $mastorInfor[0] ?>">
                                    <div class="form-group">
                                        <label>Firstname</label>
                                        <input class="form-control" name="fname" value="<?php echo $mastorInfor[2] ?>" placeholder="Firstname">
                                    </div>
                                    <div class="form-group">
                                        <label>Lastname</label>
                                        <input class="form-control" name="lname" value="<?php echo $mastorInfor[3] ?>" placeholder="Lastname">
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $mastorInfor[4] ?>" placeholder="Email address">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" name="phone" value="<?php echo $mastorInfor[5] ?>" placeholder="Tel">
                                    </div>
                                    <div class="form-group">
                                        <label>Start At</label>
                                        <input type="date" class="form-control" name="startAt" value="<?php echo $mastorInfor[6] ?>">
                                    </div>
                                    <button type="submit" class="btn btn-outline btn-primary" name="done">Save Change</button>
                                    <a href="head_mastor.php"><button type="button" class="btn btn-outline btn-warning">Cancle</button></a>
                                </form>
                            </div>

                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
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