<?php
include "../connection.php";
$id = $_POST['item'];
$quert = "SELECT `options` FROM `schools` WHERE `id`='$id'";
$data = mysqli_query($connect, "$quert");
$row = mysqli_fetch_array($data);

$results = explode(",", $row[0]);
$index = 0;
while ($index < count($results)) {
    echo "<option>$results[$index]</option>";
    $index++;
}
