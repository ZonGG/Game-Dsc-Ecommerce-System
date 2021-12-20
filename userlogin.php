<?php
require 'db.php';
session_start();
$error='';

if (isset($_POST['submit'])) {
if (empty($_POST['Email']) || empty($_POST['Password'])) {
$error = "Email or Password is invalid";
}
else
{
// Define $username and $password
$Email=$_POST['Email'];
$Password=$_POST['Password'];



// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT Email, Password FROM customer WHERE Email=? AND Password=? LIMIT 1";

$stmt = $con->prepare($query);
$stmt -> bind_param("ss", $Email, $Password);
$stmt -> execute();
$stmt -> bind_result($Email, $Password);
$stmt -> store_result();

if ($stmt->fetch())
{
	$_SESSION['userlogin']=$Email; // Initializing Session
	header("location: itemPage.php"); // Redirecting To Other Page
} else {
header("location:index.html");
echo '<script language="javascript">';
echo 'alert("Wrong Email or Password! Please try again!")';
echo '</script>';
}
mysqli_close($con); // Closing Connection
}
}

if(isset($_SESSION['userlogin'])){
header("location: itemPage.php"); 
}
?>
