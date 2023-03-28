<?php
include "connection.php";
$userId = $_POST['userId'];
if (isset($_FILES['idcopy'])) {
    $file = "files/lawyerDocuments/" . $_FILES['idcopy']['name'];
    $fileName = $_FILES['idcopy']['name'];
    $target_dir = "../files/lawyerDocuments/";
    $target_file = $target_dir . basename($_FILES['idcopy']["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("pdf");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        if (mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `lawyer_documents` WHERE `lawyer_id`='$userId'"))) {
            $query = "UPDATE `lawyer_documents` SET `id_copy`='$file' WHERE `lawyer_id` = $userId;";
        } else {
            $query = "INSERT INTO `lawyer_documents` (`id`, `lawyer_id`, `id_copy`) VALUES ('', '$userId', '$file');";
        }
        $done = mysqli_query($connect, "$query");

        if ($done) {
            move_uploaded_file($_FILES['idcopy']['tmp_name'], $target_dir . $fileName);
            echo "<script>alert('Document updated');window.open('profile.php','_self');</script>";
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    }
}
if (isset($_FILES['qcopy'])) {
    $file = "files/lawyerDocuments/" . $_FILES['qcopy']['name'];
    $fileName = $_FILES['qcopy']['name'];
    $target_dir = "../files/lawyerDocuments/";
    $target_file = $target_dir . basename($_FILES['qcopy']["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("pdf");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        if (mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `lawyer_documents` WHERE `lawyer_id`='$userId'"))) {
            $query = "UPDATE `lawyer_documents` SET `qualification_copy`='$file' WHERE `lawyer_id` = $userId;";
        } else {
            $query = "INSERT INTO `lawyer_documents` (`id`, `lawyer_id`, `qualification_copy`) VALUES ('', '$userId', '$file');";
        }
        $done = mysqli_query($connect, "$query");

        if ($done) {
            move_uploaded_file($_FILES['qcopy']['tmp_name'], $target_dir . $fileName);
            echo "<script>alert('Document updated');window.open('profile.php','_self');</script>";
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    }
}
if (isset($_FILES['lcopy'])) {
    $file = "files/lawyerDocuments/" . $_FILES['lcopy']['name'];
    $fileName = $_FILES['lcopy']['name'];
    $target_dir = "../files/lawyerDocuments/";
    $target_file = $target_dir . basename($_FILES['lcopy']["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("pdf");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        if (mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `lawyer_documents` WHERE `lawyer_id`='$userId'"))) {
            $query = "UPDATE `lawyer_documents` SET `licence_copy`='$file' WHERE `lawyer_id` = $userId;";
        } else {
            $query = "INSERT INTO `lawyer_documents` (`id`, `lawyer_id`, `licence_copy`) VALUES ('', '$userId', '$file');";
        }
        $done = mysqli_query($connect, "$query");

        if ($done) {
            move_uploaded_file($_FILES['lcopy']['tmp_name'], $target_dir . $fileName);
            echo "<script>alert('Document updated');window.open('profile.php','_self');</script>";
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    }
}
if (isset($_FILES['jcopy'])) {
    $file = "files/lawyerDocuments/" . $_FILES['jcopy']['name'];
    $fileName = $_FILES['jcopy']['name'];
    $target_dir = "../files/lawyerDocuments/";
    $target_file = $target_dir . basename($_FILES['jcopy']["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("pdf");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        if (mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `lawyer_documents` WHERE `lawyer_id`='$userId'"))) {
            $query = "UPDATE `lawyer_documents` SET `justification_copy`='$file' WHERE `lawyer_id` = $userId;";
        } else {
            $query = "INSERT INTO `lawyer_documents` (`id`, `lawyer_id`, `justification_copy`) VALUES ('', '$userId', '$file');";
        }
        $done = mysqli_query($connect, "$query");

        if ($done) {
            move_uploaded_file($_FILES['jcopy']['tmp_name'], $target_dir . $fileName);
            echo "<script>alert('Document updated');window.open('profile.php','_self');</script>";
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    }
}
