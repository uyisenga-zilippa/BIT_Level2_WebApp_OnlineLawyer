<?php
include "../connection.php";
$text = $_POST['text'];
$cid = $_POST['cid'];
if (isset($_FILES['attach'])) {
    $file = "files/attachments/" . $_FILES['attach']['name'];
    $fileName = $_FILES['attach']['name'];
    $target_dir = "../files/attachments/";
    $target_file = $target_dir . basename($_FILES['attach']["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("pdf");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

            $query = "INSERT INTO `attachment` (`attachment_id`, `case_id`, `description`, `file`) VALUES ('','$cid', '$text', '$file');";

        $done = mysqli_query($connect, "$query");

        if ($done) {
            move_uploaded_file($_FILES['attach']['tmp_name'], $target_dir . $fileName);
            echo "<script>alert('file attached sucessfull');window.open('my_applications.php','_self');</script>";
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    }
    else
{
    ?>
    <script>alert('Please Select PDF file');history.go(-1)</script>
    <?php
}
}
