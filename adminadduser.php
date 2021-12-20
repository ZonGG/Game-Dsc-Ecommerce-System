<?php
include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

if(isset($_POST['add']))
{
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $PhoneNum = $_POST['PhoneNum'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Gender = $_POST['Gender'];
    $Address = $_POST['Address'];

    $edit = mysqli_query($con,"INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `PhoneNum`, `Email`, `Password`, `Gender`, `Address`)
                            VALUES ('', '$FirstName', '$LastName', '$PhoneNum', '$Email', '$Password', '$Gender', '$Address');");

    if($edit)
    {
      echo "<script language=\"JavaScript\">\n";
      echo "window.location='userlist.php'";
      echo "</script>";
        mysqli_close($con);
        exit;
    }
    else
    {
        echo mysqli_connect_error();
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Add New User</title>
  <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >
  <link rel="stylesheet" href="css/admin_product.css?v=<?php echo time();?>">
  <script type="text/javascript" src="js/validate_add_user.js"> </script>

</head>
<body>
  <div class="header">
    <img src="pic/logo.png" alt="Logo" style="width: 70px; height:48px; background-color:rgb(300, 300, 300);"> </img>
    <h1 style="display:inline-block">Game Disc Shop <h1 style="color: #247BA0">Admin System </h1></h1></div>

  <div id="side" class="side">

        <a href="admin.php" id="Dashboard" >Dashboard <i class="fa fa-bar-chart" style="font-size:24px; color:white;float:right;"></i></a>
        <a href="userlist.php" id="UsersAccount" >User List <i class="fa fa-address-book" style="font-size:24px; color:white;float:right;"></i></a>
        <a href="product_list.php" id="Products" >Products <i class="fa fa-barcode" style="font-size:24px; color:white;float:right;"></i></a>
       <a href="adminlogout.php" id="Logout" >Logout <i class="fa fa-sign-out" style="font-size:24px; color:white;float:right;"></i></a>

  </div>

<div class="special"><h2>Add New User</h2></div>
    <div class="container">
    <form name="myForm" action="" method="post" enctype="multipart/form-data">
    <table>
    <tr>
    <td>First Name</td>
    <td><div class="class1"><input type="text" name="FirstName"  placeholder="Enter FirstName"></div></td>
    </tr>
    <tr>
    <td>Last Name</td>
    <td><div class="class1"><input type="text" name="LastName"  placeholder="Enter LastName"></div></td>
    </tr>
    <tr>
    <td>Phone Number</td>
    <td><div class="class1"><input type="text" name="PhoneNum"  placeholder="Enter PhoneNum"></div></td>
    </tr>
    <tr>
    <td>Email</td>
    <td><div class="class1"><input type="text" name="Email"  placeholder="Enter Email"></div></td>
    </tr>
    <tr>
    <td>Password</td>
    <td><div class="class1"><input type="text" name="Password"  placeholder="Enter Password"></div></td>
    </tr>
    <tr>
    <td>Gender</td>
    <td><div class="class1"><input type="text" name="Gender"  placeholder="Enter Gender" ></div></td>
    </tr>
    <tr>
    <td>Address</td>
    <td><div class="class1"><input type="text" name="Address"  placeholder="Enter Address"></div></td>
    </tr></table>
    <div class="box"><div class="center">
    <button class="button buttonSub" type="submit" onclick="return(validate())" name="add" value="upload">Upload
    </button>
    <button class="button buttonSub" type="button" onclick="location.href='userlist.php';" value="Back">Back
    </button></div></div>
    </form></div>
</body>

<footer id="footer" class="footer">
            <p>Made by G1-Chrome. All rights not reserved. </p>
        </footer>
</html>
