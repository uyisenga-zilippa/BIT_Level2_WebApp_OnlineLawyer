<?php
include "../connection.php";
$id = $_GET['id'];
$query = "UPDATE `cases` SET `status`='won' WHERE `id`='$id'";
$done = mysqli_query($connect, "$query");
if ($done) {
    echo "<script>alert('case closed!');window.open('index.php','_self')</script>";
} else {
    echo "Error";
}
