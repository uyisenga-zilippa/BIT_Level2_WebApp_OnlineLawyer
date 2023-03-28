<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("location:loginAdmin.html");
}
include 'connection.php';
//$month=$_POST['month'];
$year = $_GET['year'];
$month = $_GET['month'];
$query = "SELECT lawyers.names,payment.day,payment.month,payment.year, payment.amount,clients.names,payment.reason FROM lawyers,payment,clients WHERE lawyers.id=payment.receiver_id AND payment.payer_id=clients.id AND payment.status='sent' AND payment.month='$month' AND payment.year='$year'";

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

    <title>Report</title>
</head>

<body>
    <center>
        <h2>Monthly Report <?php echo "$month/$year" ?></h2>
        <br>
        <div>
            <table border="1" style="border-collapse: collapse;margin-top:20px;">
                <thead>
                    <tr>
                        <th class="no">No</th>
                        <th>Date</th>
                        <th>Lawyer</th>
                        <th>Client</th>
                        <th>Case</th>
                        <th> Amount Paid </th>
                        <th>Revenue Recieved(5%)</th>
                        <th>Amount sent to lawyer</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    // echo mysqli_num_rows($data);
                    $count = 0;
                    $paid = 0;
                    $revenue = 0;
                    $sent = 0;
                    while ($row = mysqli_fetch_array($data)) {
                        // echo $row[0];
                        $count++;
                        $paid = $paid + $row[4];
                        $revenue = $revenue + ($row[4] * 5 / 100);
                        $sent = $sent + ($row[4] - ($row[4] * 5 / 100));

                    ?>


                        <tr>
                            <td><?php echo $count ?></td>

                            <td><?php echo $row[1] . "/" . $row[2] . "/" . $row[3]; ?></td>
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[5]; ?></td>
                            <td><?php echo $row[6]; ?></td>
                            <td><?php echo $row[4]; ?></td>
                            <td><?php echo ($row[4] * 5 / 100); ?></td>
                            <td><?php echo $row[4] - ($row[4] * 5 / 100); ?></td>


                        </tr>
                    <?php }
                    ?>
                    <tr>

                        <td><b>Total Amount Paid</b></td>
                        <td><b><?php echo $paid;  ?></b></td>
                        <td><b>Total Revenue Recieved</b></td>
                        <td><b><?php echo $revenue;  ?></b></td>
                        <td colspan="2"><b>Total Amount Sent to lawyers</b></td>
                        <td colspan="2"><b><?php echo $sent;  ?></b></td>

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
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        window.onload(print());
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>

</body>

</html>