<?php
include "connection.php";

if (isset($_POST['done'])) {
    $names = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $query = "INSERT INTO `lawyers` (`id`, `names`, `email`, `password`, `phone`) VALUES (NULL, '$names', '$email', '$password', '$phone');";
    $isDone = mysqli_query($connect, "$query");
    if ($isDone) {
        $selectId = mysqli_query($connect, "SELECT * FROM `lawyers` WHERE `email`='$email' AND `password`='$password';");
        $data = mysqli_fetch_array($selectId);
        session_start();
        $_SESSION['lawyerId'] = $data[0];
        $_SESSION['lawyerName'] = $data[2];
        header("Location:lawyerAdmin/index.php");
    } else {
        echo "error";
    }




    // $date = date("d/m/Y");
    // $query1 = "SELECT `school_code` FROM `mineduc` WHERE `school_name`='$schoolName'";
    // $done1 = mysqli_query($connect, "$query1");
    // $done2 = mysqli_query($connect, "SELECT * FROM `schools` WHERE `name`='$schoolName'");
    // if (mysqli_num_rows($done2) == 0) {

    //     if (mysqli_num_rows($done1) != 0) {
    //         while ($result = mysqli_fetch_array($done1)) {
    //             $school_code = $result[0];
    //         }

    //         echo $tee;
    //         $query = "INSERT INTO `schools` (`id`, `name`,`school_code`, `email`, `password`, `status`,`reg_date`) VALUES (NULL, '$schoolName','$school_code', '$email','$password', 'inactive','$date');";
    //         $isDone = mysqli_query($connect, "$query");
    //         if ($isDone) {
    //             $selectId = mysqli_query($connect, "SELECT * FROM `schools` WHERE `email`='$email' AND `password`='$password';");
    //             $data = mysqli_fetch_array($selectId);
    //             session_start();
    //             $_SESSION['schoolId'] = $data[0];
    //             $_SESSION['schoolname'] = $data[2];
    //             header("Location:schoolAdmin/index.php");
    //         } else {
    //             echo "error";
    //         }
    //     } else {
    //         echo "valid schoool";
    //     }
    // } else {
    //     echo "this school already exist in system please contact administrator to help you";
    // }
}
