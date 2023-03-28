<?php
session_start();
if (!isset($_SESSION['lawyerId'])) {
    header("location:../index.php");
}
include "../connection.php";

if (isset($_POST["done"])) {
    $id = $_SESSION['lawyerId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sex = $_POST['gender'];
    $bank = $_POST['bank'];
    $qualification = $_POST['qualification'];
    $id_number = $_POST['id_number'];

    $langauge = '';
    // laguage issues

    //  $fre = $_POST['fre'];
    //  $engl= $_POST['engl'];

    if (isset($_POST['kiny'])) {
        $kiny = $_POST['kiny'];
        $langauge = "$kiny";
    }
    if (isset($_POST['engl'])) {
        $engl = $_POST['engl'];
        if (isset($_POST['kiny'])) {
            $langauge = "$langauge,$engl";
        } else {
            $langauge = "$engl";
        }
    }
    if (isset($_POST['fre'])) {
        $fre = $_POST['fre'];
        $langauge = "$langauge,$fre";
    }






    $province = $_POST['province'];
    $district = $_POST['district'];

    $account = $_POST['account'];
    // $langauge = $_POST['lange'];

    $bio = $_POST['message'];



    if (isset($_FILES['image'])) {
        $img = "img/upload" . $_FILES['image']['name'];
        $imgName = $_FILES['image']['name'];
        $target_dir = "../img/upload";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {

            $query2 = "UPDATE `lawyers` SET `picture`='$img', `names` = '$name', `email` = '$email', `qualification` = '$qualification', `phone` = '$phone',`id_number` = '$id_number',`gender` = '$sex',`province` = '$province', `district` = '$district', `langauges` = '$langauge', `bio`='$bio', `bank_name`='$bank', `bank_account`='$account' WHERE `lawyers`.`id` = '$id';";
            $done = mysqli_query($connect, "$query2");

            if ($done) {
                move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $imgName);
                echo "<script>alert('Profile updated');window.open('index.php','_self');</script>";
            } else {
                echo "Error: " . mysqli_error($connect);
            }
        }
    } else {
        $query2 = "UPDATE `lawyers` SET `names` = '$name', `email` = '$email', `qualification` = '$qualification', `phone` = '$phone',`id_number` = '$id_number',`gender` = '$sex',
        `province` = '$province', `district` = '$district', `langauges` = '$langauge', `bio`='$bio', `bank_name`='$bank', `bank_account`='$account' WHERE `lawyers`.`id` = '$id';";
        $done = mysqli_query($connect, "$query2");
        if ($done) {

            echo "<script>alert('Profile updated');window.open('index.php','_self');</script>";
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    }
} else {
    echo "it can not work";
}

    
     
//         $done2 = mysqli_query($connect, "$query2");

  
//     // $message = $_POST['message'];
//     // $fac = $_POST['fac'];
//     $compuse = $_POST['compuse'];
//     $loc = $_POST['location'];
//     $type = $_POST['type'];
//     $level = $_POST['level'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $fee = $_POST['fee'];
//     $bank = $_POST['bank'];
//     $account = $_POST['account'];

//     //get featured images
//     $caption1 = $_POST['caption1'];
//     $caption2 = $_POST['caption2'];
//     $caption3 = $_POST['caption3'];
//     $caption4 = $_POST['caption4'];

//     $img1 = "img/featured/" . $_FILES['image1']['name'];
//     $imgName1 = $_FILES['image1']['name'];
//     $target_dir1 = "../img/featured/";
//     $target_file1 = $target_dir1 . basename($_FILES["image1"]["name"]);

//     $img2 = "img/featured/" . $_FILES['image2']['name'];
//     $imgName2 = $_FILES['image2']['name'];
//     $target_dir2 = "../img/featured/";
//     $target_file2 = $target_dir2 . basename($_FILES["image2"]["name"]);

//     $img3 = "img/featured/" . $_FILES['image3']['name'];
//     $imgName3 = $_FILES['image3']['name'];
//     $target_dir3 = "../img/featured/";
//     $target_file3 = $target_dir3 . basename($_FILES["image3"]["name"]);

//     $img4 = "img/featured/" . $_FILES['image4']['name'];
//     $imgName4 = $_FILES['image4']['name'];
//     $target_dir4 = "../img/featured/";
//     $target_file4 = $target_dir4 . basename($_FILES["image4"]["name"]);

//     // getting babyeyi 
//     $img5 = "files/babyeyi/" . $_FILES['babyeyi']['name'];
//     $imgName5 = $_FILES['babyeyi']['name'];
//     $target_dir5 = "../files/babyeyi/";
//     $target_file5 = $target_dir5 . basename($_FILES["babyeyi"]["name"]);

//     if (isset($_FILES['file'])) {
//         $img = "img/" . $_FILES['file']['name'];
//         $imgName = $_FILES['file']['name'];
//         $target_dir = "../img/";
//         $target_file = $target_dir . basename($_FILES["file"]["name"]);

//         // Select file type
//         $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//         // Valid file extensions
//         $extensions_arr = array("jpg", "jpeg", "png", "gif");

//         // Check extension
//         if (in_array($imageFileType, $extensions_arr)) {

//             $query = "UPDATE `schools` SET `name`='$name',`school_type`='$type',`school_location`='$loc',`school_level`='$level',`welcome_msg`='$message',`email`='$email',`options`='$fac',`category`='$compuse',`logo`='$img',`phone` = '$phone',`reg_fee`='$fee',`bank`='$bank',`account_number`='$account',`babyeyi`='$img5' WHERE `schools`.`id` = '$id';";
//             $done = mysqli_query($connect, "$query");

//             $query2 = "INSERT INTO `featured_images` (`id`, `school_id`, `image1`, `caption1`, `image2`, `caption2`, `image3`, `caption3`, `image4`, `caption4`) VALUES (NULL, '$id', '$img1', '$caption1', '$img2', '$caption2', '$img3', '$caption3', '$img4', '$caption4');";
//             $done2 = mysqli_query($connect, "$query2");


//             if ($done && $done2) {
//                 move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $imgName);

//                 move_uploaded_file($_FILES['image1']['tmp_name'], $target_dir1 . $imgName1);

//                 move_uploaded_file($_FILES['image2']['tmp_name'], $target_dir2 . $imgName2);

//                 move_uploaded_file($_FILES['image3']['tmp_name'], $target_dir3 . $imgName3);

//                 move_uploaded_file($_FILES['image4']['tmp_name'], $target_dir4 . $imgName4);

//                 move_uploaded_file($_FILES['babyeyi']['tmp_name'], $target_dir5 . $imgName5);

//                 echo "<script>alert('Profile updated');window.open('index.php','_self');</script>";
//             } else {
//                 echo "Error:" . mysqli_error($connect);
//             }
//         } else {

//             echo "Error:" . mysqli_error($connect);
//         }
//     } else {


//         $query = "UPDATE `schools` SET `name`='$name',`school_type`='$type',`school_location`='$loc',`school_level`='$level',`welcome_msg`='$message',`options`='$fac',`category`='$compuse',`phone` = '$phone',`reg_fee`='$fee',`bank`='$bank',`account_number`='$account',`babyeyi`='$img5' WHERE `id`='$id'";

//         $done = mysqli_query($connect, "$query");

//         $query2 = "INSERT INTO `featured_images` (`id`, `school_id`, `image1`, `caption1`, `image2`, `caption2`, `image3`, `caption3`, `image4`, `caption4`) VALUES (NULL, '$id', '$img1', '$caption1', '$img2', '$caption2', '$img3', '$caption3', '$img4', '$caption4');";
//         $done2 = mysqli_query($connect, "$query2");


//         if ($done && $done2) {
//             move_uploaded_file($_FILES['image1']['tmp_name'], $target_dir1 . $imgName1);

//             move_uploaded_file($_FILES['image2']['tmp_name'], $target_dir2 . $imgName2);

//             move_uploaded_file($_FILES['image3']['tmp_name'], $target_dir3 . $imgName3);

//             move_uploaded_file($_FILES['image4']['tmp_name'], $target_dir4 . $imgName4);

//             move_uploaded_file($_FILES['babyeyi']['tmp_name'], $target_dir5 . $imgName5);
//             echo "<script>alert('Profile updated');window.open('index.php','_self');</script>";
//         } else {
//             echo "Error:" . mysqli_error($connect);
//         }
//     }
// }
