<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['lawyerId'])) {
    header("location:../lawyerLogin.html");
}
include "../connection.php";
$id = $_SESSION['lawyerId'];
$lawyerName = $_SESSION['lawyerName'];
$month = $_GET['month'];
$year = $_GET['year'];
$query = "SELECT lawyers.names,payment.day,payment.month,payment.year, payment.amount,clients.names,payment.reason FROM lawyers,payment,clients WHERE lawyers.id=payment.receiver_id AND payment.payer_id=clients.id AND payment.status='sent' AND payment.year='$year' AND lawyers.id=$id";
$data = mysqli_query($connect, "$query");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Annual Report <?php echo $year ?></title>
</head>

<body>
    <center>
        <h2>Annual Report <?php echo $year ?></h2>

        <table border="1" style="border-collapse: collapse;margin-top:20px;">
            <thead>
                <tr>
                    <th class="no">No</th>
                    <th>Date</th>
                    <th>Client</th>
                    <th>Case</th>
                    <th>Amount Paid</th>
                    <th>Amount Earned</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                $paid = 0;
                $revenue = 0;
                $sent = 0;
                while ($row = mysqli_fetch_array($data)) {
                    $count++;
                    $paid = $paid + $row[4];
                    $revenue = $revenue + ($row[4] * 5 / 100);
                    $sent = $sent + ($row[4] - ($row[4] * 5 / 100));

                ?>


                    <tr>
                        <td><?php echo $count
                            ?></td>

                        <td><?php echo $row[1] . "/" . $row[2] . "/" . $row[3];
                            ?></td>
                        <td><?php echo $row[5];
                            ?></td>
                        <td><?php echo $row[6];
                            ?></td>
                        <td><?php echo $row[4];
                            ?></td>
                        <td><?php echo $row[4] - ($row[4] * 5 / 100);
                            ?></td>


                    </tr>
                <?php }
                ?>
                <tr>

                    <td colspan="2"><b>Total Amount Paid</b></td>
                    <td><b><?php echo $paid;  ?></b></td>
                    <td colspan="2"><b>Total Amount Earned</b></td>
                    <td><b><?php echo $sent;  ?></b></td>

                </tr>

            </tbody>

        </table>
        </div>
        <div class="col-lg-12">
            <p>Done at ................ on ..../..../20....</p>
            <p>Done by:</p>
            <p>Signature & stamp</p>
        </div>

        </div>
    </center>
    <script>
        window.onload(print());
    </script>
    <?php //} 
    ?>
</body>

</html>