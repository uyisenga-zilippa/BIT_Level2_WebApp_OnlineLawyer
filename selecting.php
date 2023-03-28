<?php
include "connection.php";

$lawyerId = $_GET['id'];
session_start();
$_SESSION['selectedLawyer'] = $lawyerId;
header("location:login.php");
