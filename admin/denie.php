<html>
<script>
    // const sendEmail = (from, name, subject, sendTo, msg) => {
    //     window.open(`https://emailaip.000webhostapp.com/sendMail2.php?from=${from}&name=${name}&subject=${subject}&sendTo=${sendTo}&msg=${msg}`, '_self');
    // }
</script>

</html>
<?php
include "../connection.php";
$id = $_GET['id'];
$query = "UPDATE `lawyers` SET `status`='rejected' WHERE `id`='$id'";
$done = mysqli_query($connect, "$query");

if($done)
{
   echo" <script>
   alert('Lawyer Rejected well done');window.open('rejected_lawyers.php','_self');
    </script>";
}
else
{
    echo "error".mysqli_error($connect);
}
// $schoolInfo = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `schools` WHERE `id`='$id'"));

// $sendFrom = "schoolsystems@gmail.com";
// $schoolName = "school system";
// $subject = " Access payment for one year not approved";
// $sendTo = $schoolInfo[9];
// $msg = "Hello $schoolInfo[2] Administer<br> This email is for inform you that your access payment for one is fair, for more information feel free to contact us,<br>Thank You";
// if ($done) {
//     echo " <script>
//     sendEmail('$sendFrom', '$schoolName', '$subject', '$sendTo', '$msg');
// </script>";
// } else {
//     echo "Error";
// }
