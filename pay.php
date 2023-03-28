<?php 
include "connection.php";
require_once('./stripe/config.php'); 
$id=$_GET['id'];
$sel="SELECT `school_id` FROM `applications` WHERE `student_id`='$id'";
$query=mysqli_query($connect,$sel);
$result=mysqli_fetch_array($query);
echo $result;
?>
 <form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $stripe['publishable_key']; ?>" data-description="Access for a year" data-amount="5000" data-locale="auto"></script>
</form> 