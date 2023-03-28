<?php
include "../connection.php";


$id = $_POST['caseId'];
$price = $_POST['price'];


$query = "UPDATE `cases` SET `status`='accepted',`price`='$price' WHERE `id`='$id'";
$done = mysqli_query($connect, "$query");

if ($done) {

    echo "<script>alert('Case Price setted successfuly');window.open('index.php','_self');</script>";
} else {
    echo "Error: " . mysqli_error($connect);
}
