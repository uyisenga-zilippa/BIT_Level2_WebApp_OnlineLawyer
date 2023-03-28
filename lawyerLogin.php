<?php
include "connection.php";

if (isset($_POST['done'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $selectId = mysqli_query($connect, "SELECT * FROM `lawyers` WHERE `email`='$email' AND `password`='$password'");


    if (mysqli_num_rows($selectId)) {
        $data = mysqli_fetch_array($selectId);
        session_start();
        $_SESSION['lawyerId'] = $data[0];
        $_SESSION['lawyerName'] = $data[2];

        header("Location:lawyerAdmin/index.php");
    } else {
        // echo $email;

        echo "<script>alert('wrong password or username');history.go(-1)</script>";
    }
}
