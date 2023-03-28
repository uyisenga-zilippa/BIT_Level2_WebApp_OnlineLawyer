<?php
session_start();
if (!isset($_SESSION['lawyerId'])) {
    header("location:../index.php");
}
include "../connection.php";

$id = $_SESSION['lawyerId'];
$lawyerName = $_SESSION['lawyerName'];

$caseInfor = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `cases` WHERE `id`={$_GET['id']}"));


$query = "SELECT clients.names,clients.id_number,clients.phone,clients.province,clients.district,clients.sector, lawyers.names,lawyers.district,lawyers.province,clients.dob,clients.id_number,clients.phone,cases.day,cases.month,cases.year, cases.time,cases.case_title FROM `clients`,lawyers,cases WHERE clients.id=cases.client_id AND lawyers.id= cases.lawyer_id AND cases.id='{$_GET['id']}'";

$contractInfor = mysqli_fetch_array(mysqli_query($connect, "$query"));

$sql = "SELECT * FROM `clients` WHERE `id`='$id'";
$userInfor = mysqli_fetch_array(mysqli_query($connect, "$sql"));

$contract = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `contract` WHERE case_id='{$_GET['id']}'"));

if (isset($_POST['send'])) {
    mysqli_query($connect, "UPDATE `contract` SET `status`='signed' WHERE `case_id`='{$_GET['id']}'");
    $done = mysqli_query($connect, "UPDATE `cases` SET `status`='signed' WHERE `id`='{$_GET['id']}'");
    if ($done) {
?>
        <script>
            window.open("index.php", "_self");
        </script>

    <?php
    } else echo "ERROR: " . mysqli_error($connect);
}

if (isset($_POST['deny'])) {

    $done = mysqli_query($connect, "UPDATE `cases` SET `status`='contract_rejected' WHERE `id`='{$_GET['id']}'");
    if ($done) {
    ?>
        <script>
            window.open("index.php", "_self");
        </script>

<?php
    } else echo "ERROR: " . mysqli_error($connect);
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

    <title>Lawyer Cpanel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style>
        p {
            font-size: 16px;
        }
    </style>
</head>

<body>

    <div id="wrapper">

        <?php include 'include/nav.php'; ?>


        <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><b>CONTRACT</b></h1>
                        <div class="col-lg-12">

                            <div class="col-lg-12">
                                <img src="image/icon2.png" alt="" width="180"><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<b class='lawyer'><u>ONLINE LAWYERS</u> </b>
                                &nbsp;&nbsp;&nbsp;&nbsp;<i>
                                    <p style="margin-left: 0.3cm;"> @only with us !</p>
                                </i>
                                <div class="col-lg-12">

                                    <h2>AMASEZERANO Y’AKAZI(CONTRACT DE SERVICES)</h2>
                                    <hr>
                                    <p>
                                        Akozwe hagati ya Me <b> <?php echo $contractInfor[6] ?></b> utanze servise na <b> <?php echo $contractInfor[0] ?></b> Ukorerwa servisi.
                                    <p>
                                        Uwatanze servise: Me <b> <?php echo $contractInfor[6] ?></b>,cabinet d’avocat”la fraternite “AKARERE KA <b> <?php echo $contractInfor[7] ?></b> Intara ya <b> <?php echo $contractInfor[8] ?></b> </p>
                                    Uwahawe servise <b> <?php echo $contractInfor[0] ?></b>mwene <b> <?php echo $userInfor['father_name'] ?></b> na <b> <?php echo $userInfor['mother_name'] ?></b>, wavutse <b> <?php echo $contractInfor[9] ?></b> utuye mumurenge wa <b> <?php echo $contractInfor[5] ?></b> akarere ka <b> <?php echo $contractInfor[4] ?></b> intara ya <b> <?php echo $contractInfor[3] ?></b> iranga muntu No <b> <?php echo $contractInfor[10] ?></b> tel <b> <?php echo $contractInfor[11] ?></b>
                                    <br>
                                    <h3>INGINGO YA 2 IMPAMVU YA AMASEZERANO</h3>
                                    <p>Kuburanirwa munkiko,n’ibindi kugirwa inama mu byerekeye amategeko n’ibindi………….. <br>

                                        Aya masezerano arebana n’urubanza rwikirego cyatanzwe na <b> <?php echo $contractInfor[0] ?> </b>ku itariki <b><?php echo $contractInfor[12] ?>/<?php echo $contractInfor[13] ?>/<?php echo $contractInfor[14] ?></b> at <b><?php echo $contractInfor[15] ?></b> gifite umutwe ugira uti <b><?php echo $contractInfor[16] ?></b><br> iki kirego kikaba kigiye gukurikiranwa na <b> <?php echo $contractInfor[6] ?></b><br>


                                    <h3> INGINGO YA 4: IGICIRO NUBURYO BWO KWISHYURWA</h3>
                                    <p>
                                        <?php if ($contract[2] == "full") { ?>
                                            Twumvikanye amafaranga yose hamwe angama na <b> <?php echo $caseInfor['price'] ?> Frw</b> akaba yishuwe yose
                                        <?php } else {
                                        ?>
                                            Twumvikanye amafaranga yose hamwe angana na <b> <?php echo $caseInfor['price'] ?> Frw</b> hakaba hishyuweho <b> <?php echo $contract[2] ?>%</b>
                                            angana na <b> <?php echo ($caseInfor['price'] * $contract[2]) / 100 ?> </b> kwishyurwa<b> <?php echo (100 - $contract[2]) ?>%</b> angana na <b> <?php echo $caseInfor['price'] - (($caseInfor['price'] * $contract[2]) / 100) ?> Frw</b> <br>
                                            akazishyurwa <b> <?php echo $contract['remain_paying_data']  ?></b>.<br>
                                        <?php } ?>
                                    </p>

                                    <h3> INGINGO YA 5: INGINGO RUSANGE ZIGIZE AMASEZERANO</h3>
                                    <p>
                                    <ul style="font-size: 16px;">
                                        <li>Ni ngombwa kubahiriza igihe</li>
                                        <li>Amategeko namabwiriza birakurikizwa</li>
                                        <li>Uwahawe serivise yishyura nyuma yuko yemeye amasezerano</li>
                                        <li>Amasezerano ari hagati y’ uwatanze n’ umwahawe serivise gusa (ajya hanze mugihe biri ngombwa)</li>
                                    </ul>
                                    </p>
                                    <h3>
                                        INGINGO YA6: INGINGO ZIHARIYA ZAMASEZERANO</h3>
                                    <p>
                                        Abatanga servise bagomba kuyikora munyungu y’uyikorerwa kandi akayikora muburyo bumvikanye n’uyikorerwa cyangwa umuhagarariye,bitagenze gutyo bakumvikana bo ubwabo uburyo bakemura impaka.kdi burimuntu agomba gutunga copy yumwimerere.fotocipi yonyine ntiyemewe. <br>
                                        Ukorewe servise agomb kurangiza inshingano ze zo kwishyura nkuko babyumvikanye.</p>
                                    <h3>
                                        INGINGO YA 7: AMAZINA YABAGIRANYE AMASEZERANO</h3>
                                    <p> Me <b> <?php echo $contractInfor[6] ?></b> umu client <b> <?php echo $contractInfor[0] ?></b> <br>

                                    <div>

                                        <input type="radio" name="choose" id="" onchange="showBtn()"> BY Check here you will be agree above contract
                                        <br>
                                        <input type="radio" name="choose" id="" onchange="deny()"> BY Check here you will be deny above contract
                                        <br><br><br><br>
                                    </div>
                                    </p>

                                </div>


                                <!-- /.container-fluid -->
                                <form method="post" action="#">
                                    <center>
                                        <button class="btn btn-primary" id="payment" style="display: none;" name="send">Send Back to Client</button>

                                        <button class="btn btn-warning" id="denyId" style="display: none;" name="deny">Send Back to Client</button>
                                    </center>
                                </form>
                                <br><br>
                            </div>
                        </div>
                    </div>
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
            <script>
                let clicked = 1;
                let den = 1;
                const showBtn = () => {
                    if (clicked) {
                        payment.style.display = 'block';
                        denyId.style.display = "none";
                        clicked = 0;
                        den = 1;
                    } else {
                        payment.style.display = 'none';
                        clicked = 1;
                    }
                }
                const deny = () => {
                    if (den) {
                        denyId.style.display = "block";
                        payment.style.display = 'none';
                        den = 0;
                        clicked = 1;
                    } else {
                        denyId.style.display = "none";
                        den = 1;
                    }

                }
            </script>

</body>

</html>