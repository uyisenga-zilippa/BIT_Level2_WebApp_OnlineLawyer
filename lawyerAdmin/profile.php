<?php
session_start();
if (!isset($_SESSION['lawyerId'])) {
    header("location:../lowyer.php");
}
include "../connection.php";
$id = $_SESSION['lawyerId'];
$lawyerName = $_SESSION['lawyerName'];
$query = "SELECT * FROM `lawyers` WHERE `id`='$id'";
$data = mysqli_query($connect, "$query");
$lawyerInfor = mysqli_fetch_array($data);

// get lawyer documents
$query3 = "SELECT * FROM `lawyer_documents` WHERE `lawyer_id`='$id'";
$data3 = mysqli_query($connect, "$query3");
$documents = mysqli_fetch_array($data3);
$hasDocument = mysqli_num_rows($data3);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lowyer profiles</title>

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

        <!-- Navigation -->
        <?php include('include/nav.php') ?>

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
                                Lawyer Informations
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" method="POST" action="profileHanlder.php" enctype='multipart/form-data'>
                                            <p><b>Picture</b></p>
                                            <div class="row" id="upload" style="display: none;">
                                                <div class="col-lg-6">
                                                    <input id="file" type="text" name="image" value="<?php echo $lawyerInfor[1] ?>">
                                                </div>
                                                <div class="col-lg-6"> <button type="button" onclick="skip()">skip</button></div>
                                            </div>
                                            <div class="form-group" id="img">
                                                <img width="100" src="<?php echo "../$lawyerInfor[1]" ?>"><br><br>
                                                <button type="button" onclick="changeImage()">change</button>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="username">Names</label>
                                                <input type="text" class="form-control" value="<?php echo  $lawyerInfor[2] ?>" placeholder="Enter your Name" required='' name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="username">Email</label>
                                                <input type="text" class="form-control" value="<?php echo  $lawyerInfor[3] ?>" placeholder="Enter your password" required='' name="email">
                                            </div>

                                            <div class="form-group">
                                                <label>N ID</label>
                                                <input type="number" maxlength="16" minlength="16" class="form-control" name="id_number" value="<?php echo $lawyerInfor['id_number'] ?>" required>

                                            </div>

                                            <div class="form-group">
                                                <label for="password"> Phone:</label>
                                                <input type="text" class="form-control" value="<?php echo  $lawyerInfor['phone'] ?>" placeholder="Enter Phone" required='' name="phone">
                                            </div>

                                            <div class="form-group">
                                                <label>Gender:</label>&nbsp;&nbsp;
                                                <?php
                                                if ($lawyerInfor['gender'] == 'M') {
                                                ?>
                                                    <input type="radio" name="gender" id="" value="M" checked>Male
                                                    &nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="gender" id="" value="F">Female
                                                <?php
                                                } else if ($lawyerInfor['gender'] == 'F') { ?>
                                                    <input type="radio" name="gender" id="" value="M">Male
                                                    &nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="gender" id="" value="F" checked>Female
                                                <?php
                                                } else if ($lawyerInfor['gender'] == '') {
                                                ?>
                                                    <input type="radio" name="gender" id="" value="M">Male
                                                    &nbsp;&nbsp;&nbsp;
                                                    <input type="radio" name="gender" id="" value="F">Female
                                                <?php
                                                }
                                                ?>

                                            </div>

                                            <div class="form-group">
                                                <label>Qualification</label>
                                                <select name="qualification" class="form-control">
                                                    <option value="">....</option>
                                                    <?php if ($lawyerInfor['qualification'] == "") { ?>
                                                        <option>PHD</option>
                                                        <option>Masters</option>
                                                        <option>A0</option>
                                                        <option>A1</option>
                                                    <?php } ?>
                                                    <?php if ($lawyerInfor['qualification'] == "PHD") { ?>
                                                        <option selected>PHD</option>
                                                        <option>Masters</option>
                                                        <option>A0</option>
                                                        <option>A1</option>
                                                    <?php } ?>
                                                    <?php if ($lawyerInfor['qualification'] == "Masters") { ?>
                                                        <option>PHD</option>
                                                        <option selected>Masters</option>
                                                        <option>A0</option>
                                                        <option>A1</option>
                                                    <?php } ?>
                                                    <?php if ($lawyerInfor['qualification'] == "A0") { ?>
                                                        <option>PHD</option>
                                                        <option>Masters</option>
                                                        <option selected>A0</option>
                                                        <option>A1</option>
                                                    <?php } ?>
                                                    <?php if ($lawyerInfor['qualification'] == "A1") { ?>
                                                        <option>PHD</option>
                                                        <option>Masters</option>
                                                        <option>A0</option>
                                                        <option selected>A1</option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Province</label>
                                                <select class="form-control" name="province" id='province1' onchange="getDistrict(province1.value)">
                                                    <option>......</option>
                                                    <?php if ($lawyerInfor['province'] == "South") { ?>
                                                        <option selected>South</option>
                                                        <option>West</option>
                                                        <option>North</option>
                                                        <option>East</option>
                                                        <option>Kigali</option>
                                                    <?php } ?>
                                                    <?php if ($lawyerInfor['province'] == "West") { ?>
                                                        <option>South</option>
                                                        <option selected>West</option>
                                                        <option>North</option>
                                                        <option>East</option>
                                                        <option>Kigali</option>
                                                    <?php } ?>
                                                    <?php if ($lawyerInfor['province'] == "North") { ?>
                                                        <option>South</option>
                                                        <option>West</option>
                                                        <option selected>North</option>
                                                        <option>East</option>
                                                        <option>Kigali</option>
                                                    <?php } ?>
                                                    <?php if ($lawyerInfor['province'] == "East") { ?>
                                                        <option>South</option>
                                                        <option>West</option>
                                                        <option>North</option>
                                                        <option selected>East</option>
                                                        <option>Kigali</option>
                                                    <?php } ?>
                                                    <?php if ($lawyerInfor['province'] == "Kigali") { ?>
                                                        <option>South</option>
                                                        <option>West</option>
                                                        <option>North</option>
                                                        <option>East</option>
                                                        <option selected>Kigali</option>
                                                    <?php }
                                                    if ($lawyerInfor['province'] == "") { ?>
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
                                                <select class="form-control" name="district" id="district" required>
                                                    <option value="..."></option>
                                                    <?php if ($lawyerInfor['district'] != "") { ?>
                                                        <option selected><?php echo $lawyerInfor['district'] ?></option>
                                                    <?php } ?>

                                                </select>

                                            </div>



                                            <div class="form-group">
                                                <label>Language</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <?php
                                                $isEnglish = 0;
                                                $isFrensh = 0;
                                                $isKiny = 0;
                                                $data = explode(',', $lawyerInfor['langauges']);
                                                foreach ($data as $lang) {
                                                    if ($lang == "ENGLISH") {
                                                        $isEnglish = 1;
                                                    }
                                                    if ($lang == "KINYARWANDA") {
                                                        $isKiny = 1;
                                                    }
                                                    if ($lang == "FRENSH") {
                                                        $isFrensh = 1;
                                                    }
                                                }
                                                ?>
                                                <input class="" type='checkbox' <?php if ($isEnglish) {
                                                                                    echo "checked=''";
                                                                                } ?> name="engl" value="ENGLISH">ENGLISH &nbsp;&nbsp;
                                                <input class="" type='checkbox' <?php if ($isKiny) {
                                                                                    echo "checked=''";
                                                                                } ?> name="kiny" value="KINYARWANDA">KINYARWANDA &nbsp;&nbsp;
                                                <input class="" type='checkbox' <?php if ($isFrensh) {
                                                                                    echo "checked=''";
                                                                                } ?> name="fre" value="FRENSH">FRENCH &nbsp;&nbsp;


                                            </div>

                                            <div class="form-group">
                                                <label>BANK NAME</label>
                                                <select name="bank" class="form-control">
                                                    <option value="">....</option>
                                                    <?php if ($lawyerInfor['bank_name'] == "EQUIT BANK") { ?>
                                                        <option selected>EQUIT BANK</option>
                                                        <option>BK</option>
                                                        <option>BPR</option>
                                                        <option>COGEBANK</option>
                                                        <option>GTBANK</option>
                                                    <?php } ?>
                                                    <?php if ($lawyerInfor['bank_name'] == "BK") { ?>
                                                        <option>EQUIT BANK</option>
                                                        <option selected>BK</option>
                                                        <option>BPR</option>
                                                        <option>COGEBANK</option>
                                                        <option>GTBANK</option>
                                                    <?php } ?>
                                                    <?php if ($lawyerInfor['bank_name'] == "BPR") { ?>
                                                        <option>EQUIT BANK</option>
                                                        <option>BK</option>
                                                        <option selected>BPR</option>
                                                        <option>COGEBANK</option>
                                                        <option>GTBANK</option>
                                                    <?php } ?>
                                                    <?php if ($lawyerInfor['bank_name'] == "COGEBANK") { ?>
                                                        <option>EQUIT BANK</option>
                                                        <option>BK</option>
                                                        <option>BPR</option>
                                                        <option selected>COGEBANK</option>
                                                        <option>GTBANK</option>
                                                    <?php } ?>
                                                    <?php if ($lawyerInfor['bank_name'] == "GTBANK") { ?>
                                                        <option>EQUIT BANK</option>
                                                        <option>BK</option>
                                                        <option>BPR</option>
                                                        <option>COGEBANK</option>
                                                        <option selected>GTBANK</option>
                                                    <?php } ?>
                                                    <?php if ($lawyerInfor['bank_name'] == "") { ?>
                                                        <option>EQUIT BANK</option>
                                                        <option>BK</option>
                                                        <option>BPR</option>
                                                        <option>COGEBANK</option>
                                                        <option>GTBANK</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Bank Account</label>
                                                <input class="form-control" name="account" value="<?php echo  $lawyerInfor['bank_account'] ?>" placeholder="Enter your bank account number" required=''>

                                            </div>

                                            <div class="form-group">
                                                <label>Bio</label>
                                                <textarea class="form-control" name="message" rows="3"><?php echo  $lawyerInfor['bio'] ?> </textarea>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-outline btn-primary" name="done">Save Change</button>
                                                <a href="index.php"><button type="button" class="btn btn-outline btn-warning">Cancle</button></a>
                                            </div><br><br><br>

                                            <b>
                                                <p>Lawyer Document</p>
                                            </b>
                                            <hr>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <p><b>ID Copy</b></p>
                                                    <div class="form-group">
                                                        <?php if ($hasDocument) {
                                                            if (!$documents[2] == "") { ?>
                                                                <a href="<?php echo "../" . $documents[2]
                                                                            ?>">View Document</a><br>
                                                                <button type="button" data-toggle="modal" data-target="#myModal">change</button>
                                                            <?php } else { ?>
                                                                <button type="button" data-toggle="modal" data-target="#myModal">Upload</button> <?php  }
                                                                                                                                            } else { ?>
                                                            <button type="button" data-toggle="modal" data-target="#myModal">Upload</button>
                                                        <?php
                                                                                                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p><b>Qualification Copy</b></p>
                                                    <div class="form-group">
                                                        <?php if ($hasDocument) {
                                                            if (!$documents[3] == "") { ?>
                                                                <a href="<?php echo "../" . $documents[3]
                                                                            ?>">View Document</a><br>
                                                                <button type="button" data-toggle="modal" data-target="#myModal2">change</button>
                                                            <?php } else { ?>
                                                                <button type="button" data-toggle="modal" data-target="#myModal2">Upload</button> <?php  }
                                                                                                                                            } else { ?>
                                                            <button type="button" data-toggle="modal" data-target="#myModal2">Upload</button>
                                                        <?php
                                                                                                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p><b>Licence Copy</b></p>
                                                    <div class="form-group">
                                                        <?php if ($hasDocument) {
                                                            if (!$documents[4] == "") { ?>
                                                                <a href="<?php echo "../" . $documents[4]
                                                                            ?>">View Document</a><br>
                                                                <button type="button" data-toggle="modal" data-target="#myModal3">change</button>
                                                            <?php } else { ?>
                                                                <button type="button" data-toggle="modal" data-target="#myModal3">Upload</button> <?php }
                                                                                                                                            } else { ?>
                                                            <button type="button" data-toggle="modal" data-target="#myModal3">Upload</button>
                                                        <?php
                                                                                                                                            }
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <p><b>Justince Copy</b></p>
                                                    <div class="form-group">

                                                        <?php if ($hasDocument) {
                                                            if (!$documents[5] == "") { ?>
                                                                <a href="<?php echo "../" . $documents[5]
                                                                            ?>">View Document</a><br>
                                                                <button type="button" data-toggle="modal" data-target="#myModal4">change</button>
                                                            <?php } else { ?>
                                                                <button type="button" data-toggle="modal" data-target="#myModal4">Upload</button> <?php  }
                                                                                                                                            } else { ?>
                                                            <button type="button" data-toggle="modal" data-target="#myModal4">Upload</button>
                                                        <?php
                                                                                                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>



                                    </form>
                                </div>

                                <div id="myModal" class="modal" style="margin-top: 1cm;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p align='right'><button class="btn btn-danger text-center" data-dismiss="modal">X</button></p>
                                                <h3 class="modal-title">Upload ID Copy</h3>
                                            </div>
                                            <div class="modal-body">
                                                <form action="uploadDocuments.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="userId" value="<?php echo $id ?>">
                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <div class="form-group">

                                                                <input type="file" class="form-control" required='' name="idcopy">
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
                                <div id="myModal2" class="modal" style="margin-top: 1cm;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p align='right'><button class="btn btn-danger text-center" data-dismiss="modal">X</button></p>
                                                <h3 class="modal-title">Upload Qualification Copy</h3>
                                            </div>
                                            <div class="modal-body">
                                                <form action="uploadDocuments.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="userId" value="<?php echo $id ?>">
                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <div class="form-group">

                                                                <input type="file" class="form-control" name="qcopy">
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
                                <div id="myModal3" class="modal" style="margin-top: 1cm;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p align='right'><button class="btn btn-danger text-center" data-dismiss="modal">X</button></p>
                                                <h3 class="modal-title">Upload Licence Copy</h3>
                                            </div>
                                            <div class="modal-body">
                                                <form action="uploadDocuments.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="userId" value="<?php echo $id ?>">
                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <div class="form-group">

                                                                <input type="file" class="form-control" name="lcopy">
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
                                <div id="myModal4" class="modal" style="margin-top: 1cm;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p align='right'><button class="btn btn-danger text-center" data-dismiss="modal">X</button></p>
                                                <h3 class="modal-title">Upload Justince Copy</h3>
                                            </div>
                                            <div class="modal-body">
                                                <form action="uploadDocuments.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="userId" value="<?php echo $id ?>">
                                                    <div class="row">
                                                        <div class="col-lg-10">
                                                            <div class="form-group">

                                                                <input type="file" class="form-control" name="jcopy">
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
    <script>
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
    </script>

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