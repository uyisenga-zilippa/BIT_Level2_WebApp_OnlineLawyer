<?php
session_start();
if (!isset($_SESSION['clientId'])) {
    header("location:../lawyers.php");
}
include "../connection.php";
$id = $_SESSION['clientId'];
$clientName = $_SESSION['clientName'];

// echo $idd = $_GET['id'];

// checking is there is selected school 




$query = "SELECT  case_title,case_description,day,month,year,cases.time,cases.document,lawyer_id FROM
 cases WHERE  id='{$_GET['id']}' ";
$data1 = mysqli_query($connect, $query);
$info = mysqli_fetch_array($data1);

$lawyerQuery = "SELECT * FROM `lawyers` WHERE `id`='$info[7]'";
$lawyer = mysqli_fetch_array(mysqli_query($connect, "$lawyerQuery"));

$query = "SELECT DISTINCT province FROM `lawyers` WHERE status='active'";
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

    <title>client page</title>

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

        <?php include 'includes/navTop.php'; ?>
        <?php include 'includes/menu.php'; ?>


        <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Make Case</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Make New Case Form
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST" action="submit_update.php" enctype='multipart/form-data'>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p style="color: blue;">Case Informations</p>

                                            <div class="form-group">
                                                <label>Case Title</label>
                                                <input class="form-control" name="title" placeholder="Write Your case title" value='<?php echo $info[0] ?>' required>

                                            </div>
                                            <input type="hidden" value="<?php echo $_GET['id'] ?> " name='id'>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" placeholder="Write some short note about your case" required>
                                                <?php echo $info[1] ?>
                                                </textarea>
                                            </div>

                                            <div class="row" id="upload" style="display: none;">
                                                <div class="col-lg-6">
                                                    <input id="file" type="text" name="file" value="<?php echo $info[6] ?>">
                                                </div>
                                                <div class="col-lg-6"> <button type="button" onclick="skip()">skip</button></div>
                                            </div>
                                            <div class="form-group" id="img">
                                                <a href="<?php echo "../$info[6]" ?>">View Case File </a><br><br>
                                                <button type="button" onclick="changeImage()">Change Case File</button>
                                            </div>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        <div class="col-lg-6">
                                            <div id="selected">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <p style="color: blue;">Lawyer</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p align="right">
                                                            <button type="button" class="btn btn-primary" onclick="changeLawyerFun()">Change</button>
                                                        </p>
                                                    </div>
                                                </div>
                                                <center><img src="../<?php echo $lawyer['picture'] ?>" width="150" alt=""><br><br>
                                                    <b><?php echo $lawyer['names'] ?></b>
                                                </center>
                                                <hr>
                                                <table align="center" style="font-size: 16px;width: 9cm;">
                                                    <input type="hidden" name="lawyerId" value="<?php echo $lawyer[0] ?>">
                                                    <tr>
                                                        <td><b>Email:</b></td>
                                                        <td><?php echo $lawyer['email'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Phone: &nbsp;&nbsp;</b></td>
                                                        <td><?php echo $lawyer['phone'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b> Province: &nbsp;&nbsp;</b></td>
                                                        <td><?php echo $lawyer['province'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>District: &nbsp;&nbsp;</b></td>
                                                        <td><?php echo $lawyer['district'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Languages: &nbsp;&nbsp;</b></td>
                                                        <td><?php echo $lawyer['langauges'] ?></td>
                                                    </tr>


                                                </table>
                                            </div>
                                            <div id="changeLawyer" style="display: none;">
                                                <p style="color: blue;">Choose Lawyer By Location</p>
                                                <div class="form-group">
                                                    <label>province</label>
                                                    <select name="province" class="form-control" id="province" onchange="getDistricts()">
                                                        <option value="">....</option>
                                                        <?php
                                                        while ($row = mysqli_fetch_array($data)) {
                                                            echo "<option value='$row[0]'>$row[0]<?/option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>District</label>
                                                    <select name="district" class="form-control" id="district" onchange=" getLawyers()">
                                                        <option value="">....</option>

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Lawyer</label>
                                                    <select name="lawyerId" class="form-control" id="lawyer" onchange="showLawyerInfor(lawyer.value)">
                                                        <option value="">....</option>
                                                    </select>
                                                </div>

                                                <div id="infor">

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-outline btn-primary" name="done">update</button>
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

    <script>
        //get districta for spicific province
        const getDistricts = () => {
            let item = $("#province").val();
            $.ajax({
                url: "getDistrict.php",
                method: "POST",
                data: {
                    item
                },
                success: function(data) {

                    $("#district").html(data);

                }
            })

        }
        // get all lawyers in seleted district
        const getLawyers = () => {
            let item = $("#district").val();
            console.log('well')
            $.ajax({
                url: "getLawyer.php",
                method: "POST",
                data: {
                    item
                },
                success: function(data) {

                    $("#lawyer").html(data);

                }
            })

        }
        const changeLawyerFun = () => {
            $("#changeLawyer").show()
            $("#selected").hide()
        }
        const showLawyerInfor = (item) => {
            // console.log(item)
            $.ajax({
                url: "getLawyerInfor.php",
                method: "POST",
                data: {
                    item
                },
                success: function(data) {

                    $("#infor").html(data);



                }
            })
        }

        function changeImage() {
            img.style.display = 'none';
            upload.style.display = 'block';
            file.type = 'file';

            file.required = '';

        }

        function skip() {
            img.style.display = 'block'
            upload.style.display = 'none';

            file.type = '';
        }
    </script>

</body>

</html>