<?php
session_start();
if (!isset($_SESSION['schoolId'])) {
    header("location:../index.php.php");
}
include "../connection.php";
$schoolId = $_SESSION['schoolId'];
$id = $_POST['id'];
if (isset($_POST['done'])) {
    $end = $_POST["end"];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $tel = $_POST['phone'];
    $startAt = $_POST['startAt'];
    $query = "INSERT INTO `head_teacher` (`id`, `school_id`, `fname`, `lname`, `email`, `tel`,`startAt`) VALUES (NULL, '$schoolId', '$fname', '$lname', '$email', '$tel','$startAt');";
    $query2 = "UPDATE `head_teacher` SET `finishAt`='$end' WHERE `id`='$id'";
    $updated = mysqli_query($connect, "$query2");
    $done = mysqli_query($connect, "$query");
    if ($done && $updated) {
        echo "<script>alert('Well done');window.open('head_mastor.php','_self');</script>";
    } else echo "Error:" . mysqli_error($connect);
}
