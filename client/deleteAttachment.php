<?php
include "../connection.php";

$done = mysqli_query($connect, "DELETE FROM `attachment` WHERE  `attachment_id`='{$_GET['id']}'");

if ($done) {
        ?>
    <script>
        alert('case deleted successfull');window.open('index.php','_self');
    </script>
<?php
} else echo "ERROR: " . mysqli_error($connect);
