<?php
session_start();
if (!isset($_SESSION['schoolId'])) {
    header("location:../index.php.php");
}
include "../connection.php";
$id = $_SESSION['schoolId'];
if (isset($_POST['done'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $tel = $_POST['phone'];
    $startAt = $_POST['startAt'];
    $query = "INSERT INTO `head_teacher` (`id`, `school_id`, `fname`, `lname`, `email`, `tel`,`startAt`) VALUES (NULL, '$id', '$fname', '$lname', '$email', '$tel','$startAt');";
    $done = mysqli_query($connect, "$query");
    if ($done) {
        echo "<script>alert('Well done');window.open('head_mastor.php','_self');</script>";
    } else echo "Error:" . mysqli_error($connect);
}
