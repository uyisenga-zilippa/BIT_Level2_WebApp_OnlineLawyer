<?php
include "connection.php";
$id = $_GET['id'];
$done = mysqli_query($connect, "DELETE FROM `contact` WHERE `id`='$id'");

if ($done) {
?>
    <script>
        window.open("index.php", "_self");
    </script>
<?php
} else {
    echo "Error:", mysqli_error($connect);
}
