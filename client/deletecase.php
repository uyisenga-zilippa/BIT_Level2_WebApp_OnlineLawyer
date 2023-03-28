<?php
include "../connection.php";

$done = mysqli_query($connect, "DELETE FROM `cases` WHERE `id`='{$_GET['id']}'");

if ($done) {
    $done = mysqli_query($connect, "DELETE FROM `attachment` WHERE `case_id`='{$_GET['id']}'");


    ?>
    <script>
        alert('case deleted successfull');window.open('index.php','_self');
    </script>
<?php
} else echo "ERROR: " . mysqli_error($connect);
