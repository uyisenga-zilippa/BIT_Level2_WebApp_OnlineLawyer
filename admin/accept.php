<!-- <html>
<script>
    const sendEmail = (from, name, subject, sendTo, msg) => {
        window.open(`https://emailaip.000webhostapp.com/sendMail2.php?from=${from}&name=${name}&subject=${subject}&sendTo=${sendTo}&msg=${msg}`, '_self');
    }
</script>

</html> -->
<?php
include "../connection.php";
$id = $_GET['id'];
$query = "UPDATE `lawyers` SET `status`='active' WHERE `id`='$id'";
// $query2 = "UPDATE `access` SET `status`='yes' WHERE `school_id`='$id'";

$done = mysqli_query($connect, "$query");

if ($done) {
    echo " <script>
   alert('Lawyer Accepted well done');window.open('allowed_lawyers.php','_self');
    </script>";
} else {
    echo "error" . mysqli_error($connect);
}
// $done2 = mysqli_query($connect, "$query2");

//getting school info
// $schoolInfo = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `schools` WHERE `id`='$id'"));

// $sendFrom = "schoolsystems@gmail.com";
// $schoolName = "school system";
// $subject = "Acepting Access payment for one year";
// $sendTo = $schoolInfo[9];
// $msg = "Hello $schoolInfo[2] Administer<br> This email is for confirming that your access payment for one, it has been approved now you have access to use our system.<br> It is hone to have you";
// if ($done) {
//     echo " <script>
//     sendEmail('$sendFrom', '$schoolName', '$subject', '$sendTo', '$msg');
// </script>";
// } else {
//     echo "Error";
// }
