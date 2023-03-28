<?php
include "connection.php";

if (isset($_POST['done'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $selectId = mysqli_query($connect, "SELECT * FROM `admin` WHERE `username`='$email' AND `password`='$password';");
    if (mysqli_num_rows($selectId)) {
        $data = mysqli_fetch_array($selectId);
        session_start();
        $_SESSION['username'] = $email;
        header("Location:index.php");
    } else {
        echo "<script>alert('wrong password or username');history.go(-1)</script>";
    }
}
