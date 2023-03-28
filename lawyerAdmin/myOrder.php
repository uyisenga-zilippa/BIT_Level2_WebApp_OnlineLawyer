<?php
$connect = mysqli_connect('localhost', 'root', '', 'agrmangement');
if (isset($_POST["userId"])) {

    $query = "SELECT * FROM `orders` WHERE `cust_id`='{$_POST["userId"]}'";

    $data = mysqli_query($connect, "$query");

    if (mysqli_num_rows($data)) {
        $result = array();
        while ($row = mysqli_fetch_array($data)) {
            $tem = array();
            $tem['id'] = $row[0];
            $tem['t_price'] = $row[5];
            $tem['u_price'] = $row[4];
            // $tem['proName'] = $row[4];
            // $tem['proPrice'] = $row[5];
            // $tem['proQty'] = $row[6];
            // $tem['inStock'] = $row[7];
            array_push($result, $tem);
        }
        echo json_encode($result);
    } else echo "Your Order is empty";
} else echo "user id is required!";
