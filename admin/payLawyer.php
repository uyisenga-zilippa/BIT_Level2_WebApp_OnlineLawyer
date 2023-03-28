<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:loginAdmin.html");
}
include "connection.php";
$id = $_GET['id'];
$query = "UPDATE `payment` SET `status`='sent' WHERE `id`='$id'";
$done = mysqli_query($connect, "$query");
if ($done) {
?>
    <script>
        window.open("view_payments.php", "_self");
    </script>

<?php
} else echo "ERROR: " . mysqli_error($connect);
