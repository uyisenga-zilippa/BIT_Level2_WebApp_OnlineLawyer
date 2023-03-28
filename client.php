<?php
include "connection.php";

if (isset($_POST['done'])) {
    $names = $_POST['names'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];


    $query = "INSERT INTO `clients` (`id`, `names`, `gender`, `dob`, `email`, `password`, `phone`, `id_number`, `province`, `district`, `sector`)
     VALUES (NULL, '$names', '', '', '$email', '$password', '$phone', '', '', '', '');";
    $isDone = mysqli_query($connect, "$query");
    if ($isDone) {
        $selectId = mysqli_query($connect, "SELECT * FROM `clients` WHERE `email`='$email' AND `password`='$password';");
        $data = mysqli_fetch_array($selectId);
        session_start();
        $_SESSION['clientId'] = $data[0];
        $_SESSION['clientName'] = $data[1];
        header("Location:client/index.php");
    } else {
        echo "error";
        echo  mysqli_error();
    }
}
