<?php
session_start();
include "connection.php";
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = "SELECT * FROM `clients` WHERE `email`='$email' AND `password`='$password';";
  $data = mysqli_query($connect, "$query");
  if (mysqli_num_rows($data)) {
    $row = mysqli_fetch_array($data);

    $_SESSION['clientId'] = $row[0];
    $_SESSION['clientName'] = "$row[1]";
    header("location:client/index.php");
  } else {
    echo "<script>alert('Wrong email or password')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login as Client</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" rel="stylesheet">
  <link href="assets/css/font-awesome.css" rel="stylesheet">
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
  <div class="container ">
    <div class="row">
      <!--<div class="col-md-12 col-sm-12 col-xs-12 center" style="padding:12px"> -->



      <div class="col-md-3 col-sm-3 col-xs-3 "></div>
      <div class="col-md-6 col-sm-6 col-xs-6 ">
        <br>
        <center>
          <h3>Client Login </h3>
        </center>
        <br>
        <form class="jumbotron" id="login" method="post" action="#">
          <p class="text-center" style="background: #008ae6;color: white">Access Client panel</p>
          <div class="form-group">
            <label for="username">Email:</label>
            <input type="email" class="form-control" placeholder="Enter username" required='' name="email">
          </div>
          <div class="form-group">
            <label for="password">password:</label>
            <input type="password" class="form-control" required='' placeholder="Enter password" name="password">
          </div>
          <div class="form-group">
            <input type="submit" style="background: #008ae6;color: white" class="btn " value="Login" name="login">
            Not Register?, <a href="signUp.php">Register here</a><br><br>
          </div>
          <p><a href="index.php">Back Home</a></p>
          <p align="right" style="color: red;"><a href="student_resetPwd.php"> Forget your password?</a></p>
        </form>
      </div>
      <div class="col-md-3 col-sm-3 col-xs-3 "></div>
    </div>
  </div>
</body>

</html>