<?php 
include '../connection.php';
require_once('../stripe/config.php'); 
$id=$_GET['id'];
$sel="SELECT `school_id` FROM `applications` WHERE `student_id`='$id'";
$query=mysqli_query($connect,$sel);
$result=mysqli_fetch_array($query);
$sel1="SELECT fname,lname FROM `student` WHERE `id`='$id'";
$query3=mysqli_query($connect,$sel1);
$result3=mysqli_fetch_array($query3);
//echo $result[0];
$id1=$result[0];
$query1=mysqli_query($connect,"SELECT reg_fee,name FROM schools WHERE id='$id1'");
$result2=mysqli_fetch_array($query1);
//echo $result2[0];
//echo $result2[1];
//$id1=$result[0];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div class="container">
		<center>
		<div class="row"><br><br>
			<div class="col-lg-3 col-md-6 col-sm-6"></div>
			<div class="col-lg-4 col-md-6 col-sm-6" style="background: lightgrey;border: 2px solid white">
				<h2>Names:<?php echo "<b>".$result3[0]." ".$result3[1]."</b>"; ?></h2>
				<h2>payed fees:<?php echo "<b>".$result2[0]."</b>"; ?></h2>
				<h3>School Name: <?php echo "<i><b>".$result2[1]."</b></i>"; ?></h3>
				<h2>..........................................</h2>
				<h2>Date:<?php echo "<b>".$result2[0]."</b>"; ?></h2>
				<h2>Date:<?php echo "<b>".$result2[0]."</b>"; ?></h2>
				<h2>Date:<?php echo "<b>".$result2[0]."</b>"; ?></h2>
				<h2>Date:<?php echo "<b>".$result2[0]."</b>"; ?></h2>
			</div>
			
		</div>
<h2><button>print</button></h2></center>
	</div>

</body>
</html>
