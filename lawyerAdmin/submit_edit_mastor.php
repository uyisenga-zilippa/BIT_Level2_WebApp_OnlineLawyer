<?php
session_start();
if (!isset($_SESSION['schoolId'])) {
    header("location:../index.php.php");
}
include "../connection.php";

if (isset($_POST['done'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $tel = $_POST['phone'];
    $startAt = $_POST['startAt'];
    $query = "UPDATE `head_teacher` SET `fname`='$fname', `lname`='$lname', `email`='$email', `tel`='$tel',`startAt`='$startAt' WHERE `id`='$id';";
    $done = mysqli_query($connect, "$query");
    if ($done) {
        echo "<script>alert('data updated well');window.open('head_mastor.php','_self');</script>";
    } else echo "Error:" . mysqli_error($connect);
}
