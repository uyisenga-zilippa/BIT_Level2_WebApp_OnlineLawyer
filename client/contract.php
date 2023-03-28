<?php
session_start();
if (!isset($_SESSION['clientId'])) {
    header("location:../login.php");
}
include "../connection.php";
$id = $_SESSION['clientId'];
$clientName = $_SESSION['clientName'];

$caseInfor = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `cases` WHERE `id`={$_GET['id']}"));


$query = "SELECT clients.names,clients.id_number,clients.phone,clients.province,clients.district,clients.sector, lawyers.names,lawyers.district,lawyers.province,clients.dob,clients.id_number,clients.phone,cases.day,cases.month,cases.year, cases.time,cases.case_title FROM `clients`,lawyers,cases WHERE clients.id=cases.client_id AND lawyers.id= cases.lawyer_id AND cases.id='{$_GET['id']}'";

$contractInfor = mysqli_fetch_array(mysqli_query($connect, "$query"));

$sql = "SELECT * FROM `clients` WHERE `id`='$id'";
$userInfor = mysqli_fetch_array(mysqli_query($connect, "$sql"));
$day = date("d");
$month = date("m");
$year = date("Y");

$query3 = "SELECT DISTINCT province FROM `lawyers` WHERE status='active'";
$data = mysqli_query($connect, "$query3");
// $query_stutus = "SELECT cases.case_title,lawyers.names,lawyers.phone,cases.price,lawyers.bank_name,lawyers.bank_account,lawyers.id,cases.id FROM cases,lawyers WHERE cases.lawyer_id=lawyers.id AND cases.client_id='$id' AND cases.status='signed'";
// $caseInfor = mysqli_fetch_array(mysqli_query($connect, "$query_stutus"));

if (isset($_POST['change'])) {
    $update = "UPDATE cases SET status='pending',lawyer_id='{$_POST['lawyerId']}' where id='{$_GET['id']}'";
    $done = mysqli_query($connect, "$update");
    if ($done) {
?>
        <script>
            alert("Your case lawyer changed well done");
            window.open("index.php", "_self");
        </script>
<?php
    }
}

?>
<?php
if (isset($_POST['delete'])) {
    $delete = "DELETE FROM cases WHERE id='{$_GET['id']}'";
    $done = mysqli_query($connect, "$delete");
    if ($done) {
?>
        <script>
            alert("Your case Deleted well done");
            window.open("index.php", "_self");
        </script>
    <?php
    }
}


if (isset($_POST['sent'])) {
    $option = $_POST['option'];
    if ($_POST['paying_date'] != "") {
        $remaining = ($caseInfor['price'] * $option) / 100;
        $sql1 = "INSERT INTO `contract` (`id`, `case_id`, `payment_option`, `remain_amount`, `remain_paying_data`, `status`) VALUES (NULL, '{$_GET['id']}', '$option', '$remaining', '{$_POST['paying_date']}', 'sent');";
    } else {
        $sql1 = "INSERT INTO `contract` (`id`, `case_id`, `payment_option`, `remain_amount`, `remain_paying_data`, `status`) VALUES (NULL, '{$_GET['id']}', '$option', '0', null, 'sent');";
    }
    $done2 = mysqli_query($connect, "$sql1");
    if ($done2) {
        mysqli_query($connect, "UPDATE cases SET status='client_sign' WHERE id='{$_GET['id']}'");
    ?>
        <script>
            alert("Your contract sent successfuly to your lawyer")
            window.open("index.php", "_self")
        </script>
<?php
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

    <title>Client Page</title>

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

        <?php include 'includes/navTop.php'; ?>

        <?php include 'includes/menu.php'; ?>


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
                                    Uwahawe servise <b> <?php echo $contractInfor[0] ?></b> mwene <b> <?php echo $userInfor['father_name'] ?></b> na <b> <?php echo $userInfor['mother_name'] ?></b>, wavutse <b> <?php echo $contractInfor[9] ?></b> utuye mumurenge wa <b> <?php echo $contractInfor[5] ?></b> akarere ka <b> <?php echo $contractInfor[4] ?></b> intara ya <b> <?php echo $contractInfor[3] ?></b> iranga muntu No <b> <?php echo $contractInfor[10] ?></b> tel <b> <?php echo $contractInfor[11] ?></b>
                                    <br>
                                    <h3>INGINGO YA 2 IMPAMVU YA AMASEZERANO</h3>
                                    <p>Kuburanirwa munkiko,n’ibindi kugirwa inama mu byerekeye amategeko n’ibindi………….. <br>

                                        Aya masezerano arebana n’urubanza rwikirego cyatanzwe na <b> <?php echo $contractInfor[0] ?> </b>ku itariki <b><?php echo $contractInfor[12] ?>/<?php echo $contractInfor[13] ?>/<?php echo $contractInfor[14] ?></b> at <b><?php echo $contractInfor[15] ?></b> gifite umutwe ugira uti <b><?php echo $contractInfor[16] ?></b><br> iki kirego kikaba kigiye gukurikiranwa na <b> <?php echo $contractInfor[6] ?></b><br>
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
                                    </p>
                                    <div>
                                        <input type="checkbox" name="" id=""> Kwemera ko bamukorera serivisi
                                        <br>
                                        <input type="checkbox" name="" id=""> Kwishyura abakoze serivisi
                                        <br>
                                        <input type="checkbox" name="" id=""> Kwakira raporo y'ibyakozwe
                                        <br>
                                        <input type="checkbox" name="" id=""> Gutunga ibyo bumvikanyeho kugirango serivise ikorwe
                                        <br>
                                        <!-- <input type="checkbox" name="" id="" onchange="showBtn()"> Gusubiza ibyo bakoresheje mu gukora serivise iyo byari mu nshingano ze -->

                                        <br><br><br><br>
                                    </div>

                                </div>


                                <!-- /.container-fluid -->
                                <input type="radio" name="contract" id="agree" onchange="showPayment()"> BY checking here, you have to read well and agreed above contract
                                <br><br>
                                <input type="radio" name="contract" id="deny" onchange="deny()">Deny
                                <br><br><br><br>
                                <div>
                                    <center>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal1" id="payment" style="display: none;">Continue</button>
                                    </center>
                                </div>
                                <center>
                                    <div id="denyId" style="display: none;">
                                        <table>
                                            <tr>
                                                <td>
                                                    <form action="#" method="post">
                                                        <button class="btn btn-danger" name="delete">Delete Case</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Change Lawyer</button>
                                                </td>
                                            </tr>

                                        </table>
                                </center>
                            </div>
                        </div>
                        <!-- /#page-wrapper -->
                        <div id="myModal1" class="modal" style="margin-top: 1cm;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p align='right'><button class="btn btn-danger text-center" data-dismiss="modal">X</button></p>
                                        <h3 class="modal-title">Payment</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <p style="color: blue;">Choose Payment Option</p>

                                            <form role="form" method="POST" action="#">
                                                <!-- <p style="color: blue;">Payment Process</p> -->
                                                <!-- Replace the value with your transaction amount -->
                                                <input type="radio" name="option" id="full" onchange="fullPay(full.value)" value="Full">Full Payment,<b> <?php echo $caseInfor['price'] ?> RWF</b>
                                                <br><br>
                                                <input type="radio" name="option" id="part" onchange="partsPay(part.value)" value="">Pay in two parts </b><br><br>
                                                <div id="remain" style="display: none;">
                                                    <div class="form-group">
                                                        <label>% that will be paid on first time</label>
                                                        <input type="number" id="nber" class="form-control" onchange="getAmount(nber.value,'<?php echo $caseInfor['price'] ?>')" required>
                                                        <br>
                                                        <p id="amount"></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Remain Amount will be payed on</label>
                                                        <input type="date" class="form-control" name="paying_date" required>
                                                    </div>
                                                </div>

                                                <button class="btn btn-primary" id="sendBtn" style="display: none;" name="sent">Send To Lawyer</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- <div class="modal-footer">by director of 13or Ltd</div> -->
                                </div>
                            </div>
                        </div>
                        <div id="myModal" class="modal" style="margin-top: 1cm;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p align='right'><button class="btn btn-danger text-center" data-dismiss="modal">X</button></p>
                                        <h3 class="modal-title">Change Case Lawyer</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <p style="color: blue;">Choose Lawyer by location</p>
                                            <form action="#" method="post">
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
                                                <center>
                                                    <button class="btn btn-primary" id='btn' style="display: none;" name="change">Change</button>
                                                </center>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- <div class="modal-footer">by director of 13or Ltd</div> -->
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
                        let clicked = 1;
                        let den = 1;
                        const showPayment = () => {
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
                            // console.log('well')
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
                                    $("#btn").show();



                                }
                            })
                        }
                        const fullPay = (amount) => {

                            $("#btn-of-destiny").show();
                            $("#remain").hide()
                            $("#sendBtn").show();

                        }
                        const partsPay = (amount) => {

                            $("#btn-of-destiny").show();
                            $("#remain").show();
                            $("#sendBtn").show();

                        }

                        const getAmount = (nber, price) => {
                            let amountToShow = (price * nber) / 100;
                            amount.innerHTML = "Amount to pay is <b>" + amountToShow +
                                " FRW </b>";
                            part.value = nber;
                        }
                    </script>

</body>

</html>