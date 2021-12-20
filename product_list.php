<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Product List</title>
  <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >
  <link rel="stylesheet" href="css/userlist.css?v=<?php echo time(); ?>">
  <script type="text/javascript" src="js/admindeleteuser.js"></script>

</head>


<body>

    <h1> Product List </h1>
    <ul class="top">
        <li>  <a class="back" href="admin.php"> Back </a></li>
        <li style="float: right;">  <a class="add" href=admin_add_product.php> Add new product </a></li>
    </ul>


  <br><br>
<table>
<tr>
<th width="15%">Product ID</th>
<th width="15%">Product Name</th>
<th width="40%">Product Description</th>
<th width="5%">Product Price</th>
<th width="10%">Supplier</th>
<th width="15%">Action</th>
</tr>

<?php
include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

$records = mysqli_query($con,"select * from product");

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['ProductID']; ?></td>
    <td><?php echo $data['ProductName']; ?></td>
    <td><?php echo $data['ProductDesc']; ?></td>
    <td><?php echo $data['ProductAmount']; ?></td>
    <td><?php echo $data['Supplier']; ?></td>
    <td><a  href="admin_edit_product.php?ProductID=<?php echo $data['ProductID']; ?>">Edit</a>
    <a class="delete" onclick="return confirm('Are you sure you want to delete this user? Data cannot be recovered once delete.');" href="admin_delete_product.php?ProductID=<?php echo $data['ProductID']; ?>">Delete</a></td>
  </tr>
<?php
}
?>
</table>
<footer id="footer" class="footer">
            <p>Made by G1-Chrome. All rights not reserved. </p>
        </footer>

</body>
</html>
