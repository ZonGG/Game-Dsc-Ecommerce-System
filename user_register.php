<?php
    include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
  <script type="text/javascript" src="js/validate_register.js"> </script> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >
  <link rel="stylesheet" href="css/userlogin.css">
</head>


<body>
  <div class="header">
    <img src="pic/logo.png" alt="Logo" style="width: 70px; height:48px; background-color:rgb(300, 300, 300);">
    <h1>Game Disc Shop</h1></img> </div>
  <br>
  	<div><h1 class="title">USER</h1></div>

  		<center><h2>REGISTER</h2></center>

	<form name="myForm" action="" method="POST">
      <div class="container">
        <label>First Name</label> <br><br>
  			<input type="text" placeholder="Enter First Name" name="FirstName" class="text" id="FirstName"><br><br><br>
        <label> Last Name</label> <br><br>
  			<input type="text" placeholder="Enter Last Name" name="LastName" class="text" id="LastName"><br>
        <br><br>
        <label>Phone Number</label> <br><br>
              <input type="text" placeholder="Enter Phone Number" name="PhoneNum" class="text" id="PhoneNum"><br><br><br>
        <label>Email</label> <br><br>
              <input type="text" placeholder="Enter Email" name="Email" class="text" id="Email"><br><br><br>
        <label>Password</label> <br><br>
              <input type="password" placeholder="Enter Password" name="Password" class="text" id="Password"><br><br><br>
        <label>Confirm Password</label> <br><br>
              <input type="password" placeholder="Enter Confirm Password" name="conpass" class="text" id="conpass"><br><br><br>
        <label>Gender</label> <br><br>
            <input type="radio" name="Gender" value="male" id="Gender"> Male </input>
            <input type="radio" name="Gender" value="female" id="Gender"> Female </input>
            <br><br><br>
  			<div class="submit"> <input name="submit" onclick="return(validate())" type="submit" value="Register"></button> </div>
          <br> <br> <br>
            <p>Switch to <a href="adminlogin.html" >ADMIN</a></p>
            <p>Already Have Account? <a href="index.html"> Login!</a></p>
        </div>
  		</form>
  <footer class="footer">
    <p> Made by G1- Chrome. All rights not reserved. </p>
  </footer>
</body>
</html>

<?php
    if(isset($_POST["submit"]))
    {
        $upload=mysqli_query($con, "INSERT INTO customer VALUES ('','$_POST[FirstName]','$_POST[LastName]','$_POST[PhoneNum]','$_POST[Email]','$_POST[Password]','$_POST[Gender]',' ')");

        if($upload)
        {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('You are register successfully! Please continue with Login');\n";
            echo "window.location='index.html'";
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