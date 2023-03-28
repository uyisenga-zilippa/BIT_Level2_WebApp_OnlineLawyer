<?php
session_start();
if (!isset($_SESSION['clientId'])) {
    header("location:../index.php");
}
include "../connection.php";


if (isset($_POST["done"])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $idd = $_POST['id'];
    $lawyerId = $_POST['lawyerId'];


    if (isset($_FILES['file'])) {
        $file = "files/cases/" . $_FILES['file']['name'];
        $fileName = $_FILES['file']['name'];
        $target_dir = "../files/cases/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("pdf");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {

            $query = "UPDATE `cases` SET `case_title` = '$title', `case_description` = '$description',`lawyer_id`='$lawyerId',`document`='$file' WHERE `id` = $idd";

            $done = mysqli_query($connect, "$query");

            if ($done) {
                move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $fileName);

                echo "<script>alert('case updated');window.open('index.php','_self');</script>";
            } else {
                echo "Error:" . mysqli_error($connect);
            }
        } else {
?>
            <script>
                alert("please select PDF file")
                history.go(-1)
            </script>
<?php
        }
    } else {

        $query = "UPDATE `cases` SET `case_title` = '$title', `case_description` = '$description',`lawyer_id`='$lawyerId' WHERE `id` = $idd";

        $done = mysqli_query($connect, "$query");

        if ($done) {


            echo "<script>alert('case updated');window.open('index.php','_self');</script>";
        } else {
            echo "Error:" . mysqli_error($connect);
        }
    }
}
