<?php
include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

    $ProductID = $_GET['ProductID'];
    $query = mysqli_query($con, "SELECT * FROM product WHERE ProductId=$ProductID");
    $data = mysqli_fetch_array($query);

    if(isset($_POST['update']))
    {

        $ProductName = $_POST['ProductName'];
        $ProductDesc = $_POST['ProductDesc'];
        $ProductAmount = $_POST['ProductAmount'];
        $Supplier = $_POST['Supplier'];

        $edit = mysqli_query($con, "UPDATE product SET ProductName='$ProductName',ProductDesc='$ProductDesc', ProductAmount='$ProductAmount', Supplier='$Supplier' WHERE ProductID='$ProductID'");

        if($edit)
        {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Product Update Successfully!');\n";
        echo "window.location='product_list.php'";
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
        <meta charset = "utf-8">
        <title>Edit Product</title>
        <script type="text/javascript" src="js/validate_edit_product.js"> </script> 
        <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
        <link rel="stylesheet" href="css/admin_product.css?v=<?php echo time();?>">
    </head>

    <body>
    <div class="header">
      <img src="pic/logo.png" alt="Logo" style="width: 70px; height:48px; background-color:rgb(300, 300, 300);"> </img>
      <h1 style="display:inline-block">Game Disc Shop <h1 style="color: #247BA0">Admin System </h1></h1></div>

    <div id="side" class="side">

          <a href="admin.php" id="Dashboard" >Dashboard <i class="fa fa-bar-chart" style="font-size:24px; color:white;float:right;"></i></a>
      		<a href="userlist.php" id="UsersAccount" >User List <i class="fa fa-address-book" style="font-size:24px; color:white;float:right;"></i></a>
      		<a href="#" id="Products" >Products <i class="fa fa-barcode" style="font-size:24px; color:white;float:right;"></i></a>
         <a href="adminlogout.php" id="Logout" >Logout <i class="fa fa-sign-out" style="font-size:24px; color:white;float:right;"></i></a>

    </div>
    <div class="special"><h2>Edit Product</h2></div>

    <form name="myform" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
        <td>Product Name</td>
        <td><div class="class1"><input type="text" name="ProductName" value="<?php echo $data['ProductName'];?>"></div></td>
        </tr>
        <tr>
        <td>Product Description</td>
        <td><div class="class1"><textarea type="text" name="ProductDesc"><?php echo $data['ProductDesc'];?></textarea></div></td>
        </tr>
        <tr>
        <td>Product Price</td>
        <td><div class="class1"><input type="text" name="ProductAmount" value="<?php echo $data['ProductAmount'];?>"></div></td>
        </tr>
        <tr>
        <td>Supplier</td>
        <td><div class="class1"><input type="text" name="Supplier" value="<?php echo $data['Supplier'];?>"></div></td>
        </tr></table>
        <div class="box"><div class="center">
        <button class="button buttonSub" type="submit" onclick="return(validate())" name="update" value="update">Upload
        </button>
        <button class="button buttonSub" type="button" onclick="location.href='product_list.php';" value="Back">Back
        </button></div></div>
    </form>
    <footer id="footer" class="footer">
    <p>Made by G1-Chrome. All rights not reserved. </p>
    </footer>
    </body>
</html>
