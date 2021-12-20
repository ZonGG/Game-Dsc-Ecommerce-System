<?php
include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html'); 
}

$CustomerID= $_GET['CustomerID'];

$del = mysqli_query($con,"delete from customer where CustomerID = '$CustomerID'");

if($del)
{

  echo "<script language=\"JavaScript\">\n";
  echo "alert('User Deleted Successfully!');\n";
  echo "window.location='userlist.php'";
  echo "</script>";
  mysqli_close($con);
    exit;

}
else
{
    echo "Error deleting record";
}
?>
