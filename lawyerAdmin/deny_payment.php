<?php
session_start();
if (!isset($_SESSION['schoolId'])) {
    header("location:../index.php.php");
}
include "../connection.php";
$id = $_GET['id'];

$query = "UPDATE `applications` SET `isPayed`='no' WHERE `id`='$id'";
$done = mysqli_query($connect, "$query");
if ($done) {
    echo "<script>window.open('view_payments.php','_self')</script>";
}
