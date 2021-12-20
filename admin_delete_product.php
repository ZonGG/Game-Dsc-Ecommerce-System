<?php


include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

$ProductID= $_GET['ProductID'];

$del = mysqli_query($con,"delete from product where ProductID = '$ProductID'");

if($del)
{

  echo "<script language=\"JavaScript\">\n";
  echo "alert('Product Deleted Successfully!');\n";
  echo "window.location='product_list.php'";
  echo "</script>";
  mysqli_close($con);
    exit;

}
else
{
    echo "Error deleting record";
}
?>
