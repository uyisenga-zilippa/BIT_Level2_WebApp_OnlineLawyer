<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("location:../login.php");
}
include "../connection.php";
$id = $_SESSION['userId'];
$sel=mysqli_query($connect,"SELECT * FROM applications WHERE student_id='$id'");
if(mysqli_num_rows($sel)>0){
      echo "<script>alert('You already submit your form wait to be aproved');history.go(-1);</script>";
}else{
if (isset($_POST['done'])) {
    $gender = $_POST['gender'];
    $bd = $_POST['bd'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $idNber = $_POST['idNber'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $fac1 = $_POST['fac'];
    $compuse = $_POST['compuse'];
    $choolId = $_POST['school'];
    $day = date("d");
    $month = date("m");
    $year = date("Y");
    $photo = "../img/" . $_FILES['photo']['name'];
    $imgName = $_FILES['photo']['name'];
    $target_dir1 = "../img/";
    $target_photo = $target_dir1 . basename($_FILES["photo"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_photo, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        $ID = "files/" . $_FILES['ID']['name'];
        $idName = $_FILES['ID']['name'];
        $target_dir2 = "../files/";
        $target_id = $target_dir2 . basename($_FILES["ID"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_id, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("pdf");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {

            $diplome = "files/" . $_FILES['diplome']['name'];
            $diplomeName = $_FILES['diplome']['name'];
            $target_dir3 = "../files/";
            $target_diplome = $target_dir3 . basename($_FILES["diplome"]["name"]);

            // Select file type
            $imageFileType = strtolower(pathinfo($target_diplome, PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("pdf");

            // Check extension
            if (in_array($imageFileType, $extensions_arr)) {
                //
                $query = "INSERT INTO `applications` (`id`, `student_id`, `gender`, `birth_date`, `father`, `mother`, `ID_nber`, `email`, `phone`, `school_id`, `facility`, `compuse`, `photo`, `ID_copy`, `diploma`, `isPayed`, `status`,`reg_day`,`reg_month`,`reg_year`) VALUES (NULL, '$id', '$gender', '$bd', '$father', '$mother', '$idNber', '$email', '$phone', '$choolId', '$fac1', '$compuse', '$photo', '$ID', '$diplome', 'no', 'pending','$day','$month','$year');";
                $isDone = mysqli_query($connect, "$query");
                $isUploaded = move_uploaded_file($_FILES['photo']['tmp_name'], $target_dir1 . $imgName);
                $isUploaded2 = move_uploaded_file($_FILES['ID']['tmp_name'], $target_dir2 . $idName);
                $isUploaded3 = move_uploaded_file($_FILES['diplome']['tmp_name'], $target_dir3 . $diplomeName);
                if ($isDone) {
                    header("location:my_applications.php");
                } else echo "nooo" . mysqli_error($connect);
            } else {
                echo "<script>alert('Please select Valid format(pdf) for Diplome');history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('Please select Valid format(pdf) for ID');history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('Please select Valid format for Photo passport');history.go(-1);</script>";
    }
}}
