<?php
session_start();
if (!isset($_SESSION['clientId'])) {
    header("location:../index.php");
}
include "../connection.php";


if (isset($_POST["done"])) {
    $id = $_SESSION['clientId'];
    $name = $_POST['names'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $sector = $_POST['sector'];
    $nid = $_POST['nid'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];



    $query = "UPDATE `clients` SET `names` = '$name', `gender` = '$gender',`dob` = '$dob',`father_name` = '$father',`mother_name` = '$mother',
     `email` = '$email ', `phone` = '$phone', `province` = '$province', `district` = '$district', `sector` = '$sector',`id_number`='$nid' WHERE `clients`.`id` = $id";

    $done = mysqli_query($connect, "$query");

    if ($done) {
        $_SESSION['clientName'] = $name;
?>
        <script>
            alert('Profile updated');
            <?php if (isset($_POST['id'])) { ?>
                window.open('new_application.php?id=<?php echo $_POST['id'] ?>', '_self');
            <?php } else { ?>
                window.open('index.php', '_self');
            <?php } ?>
        </script>
<?php
    } else {
        echo "Error:" . mysqli_error($connect);
    }
}
