<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>User List</title>
  <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >
  <link rel="stylesheet" href="css/userlist.css?v=<?php echo time(); ?>">
  <script type="text/javascript" src="js/admindeleteuser.js"></script>

</head>


<body>

    <h1> User List </h1>
    <ul class="top">
        <li>  <a class="back" href="admin.php"> Back </a></li>
        <li style="float: right;">  <a class="add" href=adminadduser.php> Add new user </a></li>
    </ul>


  <br><br>
<table>
<tr>
<th>Customer ID</th>
<th>FirstName</th>
<th>LastName</th>
<th>Phone Number</th>
<th>Email</th>
<th>Password</th>
<th>Gender</th>
<th>Address</th>
<th>Action</th>
</tr>

<?php
include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}

$records = mysqli_query($con,"select * from customer");

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['CustomerID']; ?></td>
    <td><?php echo $data['FirstName']; ?></td>
    <td><?php echo $data['LastName']; ?></td>
    <td><?php echo $data['PhoneNum']; ?></td>
    <td><?php echo $data['Email']; ?></td>
    <td><?php echo $data['Password']; ?></td>
    <td><?php echo $data['Gender']; ?></td>
    <td><?php echo $data['Address']; ?></td>
    <td><a  href="adminedituser.php?CustomerID=<?php echo $data['CustomerID']; ?>">Edit</a>
    <a class="delete" onclick="return confirm('Are you sure you want to delete this user? Data cannot be recovered once delete.');" href="admindeleteuser.php?CustomerID=<?php echo $data['CustomerID']; ?>">Delete</a></td>
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
