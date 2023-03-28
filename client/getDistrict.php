<?php
include "../connection.php";
$province = $_POST['item'];
$quert = "SELECT DISTINCT district FROM `lawyers` WHERE province='$province'";
$data = mysqli_query($connect, "$quert");
// $row = mysqli_fetch_array($data);

// $results = explode(",", $row[0]);
// $index = 0;
echo '<option value="">.....</option>';
while ($row = mysqli_fetch_array($data)) {
    echo "<option>$row[0]</option>";
    // $index++;
}
