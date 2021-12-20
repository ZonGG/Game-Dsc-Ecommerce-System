<?php
include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}   ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Add Product</title>
        <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
        <script type="text/javascript" src="js/validate_add_product.js"> </script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
        <link rel="stylesheet" href="css/admin_product.css?v=<?php echo time(); ?>">
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


    <div class="special"><h2>Add New Product</h2></div>
        <div class="container">
        <form name="myform" action="" method="post" enctype="multipart/form-data">
        <table>
        <tr>
        <td>Product Name</td>
        <td><div class="class1"><input type="text" name="pname"></div></td>
        </tr>
        <tr>
        <td>Product Image</td>
        <td><div class="class1"><input type="file" name="pimage"></div></td>
        </tr>
        <tr>
        <td>Product Description</td>
        <td><div class="class1"><textarea type="text" name="pdes"></textarea></div></td>
        </tr>
        <tr>
        <td>Product Price</td>
        <td><div class="class1"><input type="text" name="pprice"></div></td>
        </tr>
        <tr>
        <td>Supplier</td>
        <td><div class="class1"><input type="text" name="psupp"></div></td>
        </tr></table>
        <div class="box"><div class="center">
        <button class="button buttonSub" type="submit" onclick="return(validate())" name="product1" value="upload">Upload
        </button>
        <button class="button buttonSub" type="button" onclick="location.href='product_list.php';" value="Back">Back
        </button></div></div>
        </form></div>
<?php
    if(isset($_POST["product1"]))
    {
        $v1=rand(1111,9999);
        $v2=rand(1111,9999);

        $v3=$v1.$v2;

        $v3=md5($v3);

        $fnm=$_FILES["pimage"]["name"];
        $dst="./image/".$v3.$fnm;
        $dst1="image/".$v3.$fnm;
        move_uploaded_file($_FILES["pimage"]["tmp_name"], $dst);

        $upload=mysqli_query($con, "INSERT INTO product VALUES ('','$_POST[pname]','$dst1','$_POST[pdes]','$_POST[pprice]','$_POST[psupp]')");

        if($upload)
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Product Upload Successfully!');\n";
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
        <footer id="footer" class="footer">
                <p>Made by G1-Chrome. All rights not reserved. </p>
        </footer>
    </body>
</html>
