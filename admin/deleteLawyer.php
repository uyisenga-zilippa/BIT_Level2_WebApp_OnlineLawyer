<?php
include "connection.php";

$done = mysqli_query($connect, "DELETE FROM `lawyers` WHERE `id`='{$_GET['id']}'");

if ($done) {
    mysqli_query($connect, "DELETE FROM document where lawyer_id='{$_GET['id']}'");
    mysqli_query($connect, "DELETE FROM cases where lawyer_id='{$_GET['id']}'");
?>
    <script>
        window.open('allowed_lawyers.php', '_self');
    </script>
<?php
} else echo "ERROR: " . mysqli_error($connect);
