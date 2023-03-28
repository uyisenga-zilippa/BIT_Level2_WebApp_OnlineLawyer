<?php
include "../connection.php";
$district = $_POST['item'];
$quert = "SELECT `id`,`names` FROM `lawyers` WHERE `district`='$district'";

$data = mysqli_query($connect, "$quert");
while ($row = mysqli_fetch_array($data)) {
    echo "<option>.....</option>
    <option value='$row[0]'>$row[1]</option>";
}
