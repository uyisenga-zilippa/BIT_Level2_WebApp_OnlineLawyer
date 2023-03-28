<?php
session_start();
if (!isset($_SESSION['schoolId'])) {
    header("location:../schools.php");
}
include "../connection.php";
$id = $_SESSION['schoolId'];
if (isset($_POST['month'])) {
    $query = "SELECT payments.day,payments.month,payments.year,fname,lname,applications.facility,applications.compuse,schools.reg_fee FROM payments,applications,student,schools WHERE payments.student_id=applications.student_id AND applications.student_id=student.id AND applications.school_id=schools.id AND schools.id='$id' AND payments.month='{$_POST['month']}' AND payments.year='{$_POST['year']}'";
} else {
    $query  = "SELECT payments.day,payments.month,payments.year,fname,lname,applications.facility,applications.compuse,schools.reg_fee FROM payments,applications,student,schools WHERE payments.student_id=applications.student_id AND applications.student_id=student.id AND applications.school_id=schools.id AND schools.id='$id' AND payments.year='{$_POST['year']}'";
}
$data = mysqli_query($connect, "$query");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style>
        @page {
            size: letter landscape;
            margin: 2cm;
        }

        table {
            border: 1px solid black;
            border-collapse: collapse;
            margin: 0;

        }

        tr {
            padding: 10px;
            border: 1px solid #109d58;
        }

        td {
            padding: 4px;
            border: 1px solid #109d58;
        }

        th {
            padding: 4px;
            border: 1px solid #109d58;
        }

        .logo {
            font-family: Arial;
        }

        .logo .logo-img {
            margin-left: -40px;
        }

        .logo label {
            font-weight: bold;
        }

        .right-footer {
            margin-right: 50px;
            margin-top: 30px;
            font-family: Arial, sans-serif;
        }

        .right-footer p {
            font-size: 12px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        th .no {
            width: 10%;
        }

        td .em {
            width: 130%;
        }

        body {
            background-color: white;
        }
    </style>
</head>

<body>
    <center><br><br>
    <div class="container">
        <div class="logo">
           
            <?php if (isset($_POST['month'])) { ?>
                <strong style="font-size:14px;">Payments Monthly Report of <?php echo "{$_POST['month']}/{$_POST['year']}" ?></strong>
            <?php } else { ?>
                <strong style="font-size:14px;">Payments Annually Report of <?php echo "{$_POST['year']}" ?></strong>
            <?php } ?>
        </div>
        <table border="1" style="border-collapse: collapse;margin-top:20px;" class="text-center">
            <thead>
                <tr>
                    <th class="no">No</th>
                    <th>Date</th>
                    <th>Student Name</th>
                    <th>Option</th>
                    <th>Category</th>
                    <th>Amount</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_array($data)) {
                    @$i = $i + 1;
                    @$total = $total + $row[7] ?>
                    <tr>
                        <td style="width:30px;"><?php echo $i ?></td>
                        <td><?php echo "$row[0]/$row[1]/$row[2]"; ?></td>
                        <td><?php echo "$row[3] $row[4]" ?></td>
                        <td><?php echo $row[5] ?></td>
                        <td><?php echo $row[6] ?></td>
                        <td><?php echo  $row[7] . " Frw" ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td style="width:140px;font-weight:bold;">Total Amount</td>
                    <td colspan="5" style="font-weight:bold;"><?php echo $total . " Frw" ?></td>

                </tr>

            </tbody>
        </table>
        <div class="right-footer" style="margin-left:10%;">
            <p>Done at ................ on ..../..../20....</p>
            <p>Done by:</p>
            <p>Signature & stamp</p>
        </div>
    </div></center>
</body>

</html>