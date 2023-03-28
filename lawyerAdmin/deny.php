<?php
include "../connection.php";
$id = $_GET['id'];
$query = "UPDATE `cases` SET `status`='rejected' WHERE `id`='$id'";
$done = mysqli_query($connect, "$query");
if ($done) {
    echo "<script>alert('case Denied!');window.open('new_cases.php','_self')</script>";
} else {
    echo "Error";
}
