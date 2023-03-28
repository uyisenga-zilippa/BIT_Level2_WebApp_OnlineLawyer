<?php
session_start();
if (!isset($_SESSION['clientId'])) {
    header("location:../schools.php");
}
include "../connection.php";
$id = $_SESSION['clientId'];
$clientName = $_SESSION['clientName'];
$query = "SELECT * FROM `clients` WHERE `id`='$id'";
$data = mysqli_query($connect, "$query");
$userInfor = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Client profile</title>

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



    </div>
    <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Your information
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

                                    <form role="form" method="POST" action="profileHanlder.php" enctype='multipart/form-data'>
                                        <?php
                                        if (isset($_GET['id'])) {
                                        ?>
                                            <input type="hidden" name="id" value="<?php echo $_GET['id']  ?>">
                                        <?php } ?>
                                        <div class="form-group">
                                            <label>Names</label>
                                            <input class="form-control" name="names" value="<?php echo $userInfor[1] ?>" placeholder="Names" required>

                                        </div>
                                        <div class="form-group">
                                            <label>Gender:</label>&nbsp;&nbsp;
                                            <?php
                                            if ($userInfor['gender'] == 'M') {
                                            ?>
                                                <input type="radio" name="gender" id="" value="M" checked>Male
                                                &nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="gender" id="" value="F">Female
                                            <?php
                                            } else if ($userInfor['gender'] == 'F') { ?>
                                                <input type="radio" name="gender" id="" value="M">Male
                                                &nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="gender" id="" value="F" checked>Female
                                            <?php
                                            } else {
                                            ?>
                                                <input type="radio" name="gender" id="" value="M">Male
                                                &nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="gender" id="" value="F">Female
                                            <?php
                                            }
                                            ?>

                                        </div>

                                        <div class="form-group">
                                            <label>N ID</label>
                                            <input type="number" maxlength="16" minlength="16" class="form-control" name="nid" value="<?php echo $userInfor['id_number'] ?>" placeholder="National ID number" required>

                                        </div>
                                        <div class="form-group">
                                            <label>Date of birth</label>
                                            <input type="date" class="form-control" name="dob" value="<?php echo $userInfor['dob'] ?>" placeholder="Enter Your Age" required>

                                        </div>

                                        <div class="form-group">
                                            <label>Father's name</label>
                                            <input class="form-control" name="father" value="<?php echo $userInfor['father_name'] ?>" placeholder="Enter father's name" required>

                                        </div>
                                        <div class="form-group">
                                            <label>Mother's name</label>
                                            <input class="form-control" name="mother" value="<?php echo $userInfor['mother_name'] ?>" placeholder="Enter mother's name" required>

                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" value="<?php echo $userInfor['email'] ?>" placeholder="email" required>

                                        </div>

                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="phone" value="<?php echo $userInfor['phone'] ?>" placeholder="phone" required>

                                        </div>

                                        <div class="form-group">
                                            <label>Province</label>
                                            <select class="form-control" name="province" id='province' onchange="getDistrict(province.value)">
                                                <option>......</option>
                                                <?php if ($userInfor['province'] == "South") { ?>
                                                    <option selected>South</option>
                                                    <option>West</option>
                                                    <option>North</option>
                                                    <option>East</option>
                                                    <option>Kigali</option>
                                                <?php } ?>
                                                <?php if ($userInfor['province'] == "West") { ?>
                                                    <option>South</option>
                                                    <option selected>West</option>
                                                    <option>North</option>
                                                    <option>East</option>
                                                    <option>Kigali</option>
                                                <?php } ?>
                                                <?php if ($userInfor['province'] == "North") { ?>
                                                    <option>South</option>
                                                    <option>West</option>
                                                    <option selected>North</option>
                                                    <option>East</option>
                                                    <option>Kigali</option>
                                                <?php } ?>
                                                <?php if ($userInfor['province'] == "East") { ?>
                                                    <option>South</option>
                                                    <option>West</option>
                                                    <option>North</option>
                                                    <option selected>East</option>
                                                    <option>Kigali</option>
                                                <?php } ?>
                                                <?php if ($userInfor['province'] == "Kigali") { ?>
                                                    <option>South</option>
                                                    <option>West</option>
                                                    <option>North</option>
                                                    <option>East</option>
                                                    <option selected>Kigali</option>
                                                <?php }
                                                if ($userInfor['province'] == "") { ?>
                                                    <option>South</option>
                                                    <option>West</option>
                                                    <option>North</option>
                                                    <option>East</option>
                                                    <option>Kigali</option>
                                                <?php } ?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>district</label>
                                            <select class="form-control" name="district" id="district" onchange="getSector(district.value)" required>
                                                <option value="..."></option>
                                                <?php if ($userInfor['district'] != "") { ?>
                                                    <option value="<?php echo $userInfor['district'] ?>" selected><?php echo $userInfor['district'] ?></option>
                                                <?php } ?>
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label>sector</label>
                                            <select class="form-control" name="sector" id="sector" placeholder="sector" required>
                                                <option value="..."></option>
                                                <?php if ($userInfor['sector'] != "") { ?>
                                                    <option value="<?php echo $userInfor['sector'] ?>" selected><?php echo $userInfor['sector'] ?></option>
                                                <?php } ?>
                                            </select>

                                        </div>



                                        <button type="submit" class="btn btn-outline btn-primary" name="done">Save Change</button>
                                        <a href="index.php"><button type="button" class="btn btn-outline btn-warning">Cancle</button></a>
                                    </form>
                                </div>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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

    <script src="js/main.js"></script>
    <script>
        const getDistrict = (item) => {
            $.ajax({
                url: "getDistrictLocation.php",
                type: "POST",
                data: {
                    item
                },
                success: function(data) {

                    $("#district").html(data);
                    console.log(data);
                }
            })
        }

        const getSector = (item) => {
            $.ajax({
                url: "getSectorLocation.php",
                type: "POST",
                data: {
                    item
                },
                success: function(data) {

                    $("#sector").html(data);
                    console.log(data);
                }
            })
        }
        // const getUser = (item) => {
        //     $.ajax({
        //         url: "getUser.php",
        //         type: "POST",
        //         data: {
        //             item
        //         },
        //         success: function(data) {

        //             $("#developer").html(data);
        //             console.log(data);
        //         }
        //     })
        // }
    </script>

</body>

</html>