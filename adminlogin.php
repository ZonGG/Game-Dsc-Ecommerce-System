<?php
session_start();
$error='';

if (isset($_POST['submit'])) {
if (empty($_POST['AdminID']) || empty($_POST['Password'])) {
	echo '<script language="javascript">';
	echo 'alert("Wrong ID or Password! Please try again!")';
	echo '</script>';
	header("location:adminlogin.html");

}
else
{

$AdminID=$_POST['AdminID'];
$Password=$_POST['Password'];
require 'db.php';



$query = "SELECT AdminID, Password FROM admin WHERE AdminID=? AND Password=? LIMIT 1";

$stmt = $con->prepare($query);
$stmt -> bind_param("ss", $AdminID, $Password);
$stmt -> execute();
$stmt -> bind_result($AdminID, $Password);
$stmt -> store_result();

if ($stmt->fetch())
{
	$_SESSION['adminlogin']=$AdminID;
	header("location: admin.php");
} else {
header("location:adminlogin.html");
echo '<script language="javascript">';
echo 'alert("Wrong ID or Password! Please try again!")';
echo '</script>';
}
mysqli_close($con);
}
}

if(isset($_SESSION['adminlogin'])){
header("location: admin.php");
}

?>
