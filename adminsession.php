<?php
require 'db.php';


session_start();

$user_check=$_SESSION['adminlogin'];


$query = "SELECT FirstName FROM admin WHERE AdminID = '$user_check'";
$ses_sql = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['FirstName'];
