<?php
require 'db.php';

session_start();

$user_check1=$_SESSION['userlogin'];

// SQL Query To Fetch Complete Information Of User
$query = "SELECT Email FROM customer WHERE Email = '$user_check1'";
$ses_sql = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session1 =$row['Email'];

?>