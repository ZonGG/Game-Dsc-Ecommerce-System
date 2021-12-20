<?php
    include('usersession.php');
    if(!isset($login_session1)){
    header('Location: index.html'); // Redirecting To Home Page
    }

    $sql = "SELECT * FROM customer WHERE Email = '$login_session1'";
    $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){
                $id = $row["CustomerID"];
                $fname = $row["FirstName"];
                $lname = $row["LastName"];
                $num = $row["PhoneNum"];
                $email = $row["Email"];
                $gender = $row["Gender"];
                $address = $row["Address"];
                
            }
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>View Profile</title>
        <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
        <link rel="stylesheet" href="css/profile.css?v=<?php echo time();?>">
    </head>

    <div class = "header">
        <img src="pic/logo.png" alt="Logo" style="width: 70px; height:48px; background-color:rgb(300, 300, 300);"> 
            <h1>Game Disc Shop</h1></img>
            </div>
            <div class="navbar">
                <a href="itemPage.php">PRODUCT</a>
                <a style="float: right" href="userlogout.php">Logout</a>
                <div class="dropdown">
                    <button class="dropbtn"><?php echo $login_session1;?><i class="fa fa=caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="user_view_profile.php">User Profile</a>
                        <a href="user_view_order.php">View Order</a>
                        <a href="feedback.php">Feedback</a>
                    </div>
                </div>
                <a style="float: right" href="cart.php"><i class="bx bx-shopping-bag" style="font-size: 18px;"></i></a>
            </div>
            <div class="special"><h2>Profile</h2></div>
        
            <table class="container">
                <tr>
                    <td align="center">Customer ID</td>
                    <td><?php echo $id; ?></td>
                </tr>
                <tr>
                    <td align="center">First Name</td>
                    <td><?php echo $fname; ?></td>
                </tr>
                <tr>
                    <td align="center">Last Name</td>
                    <td><?php echo $lname; ?></td>
                </tr>
                <tr>
                    <td align="center">Phone Number</td>
                    <td><?php echo $num; ?></td>
                </tr>
                <tr>
                    <td align="center">Email</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td align="center">Gender</td>
                    <td><?php echo $gender; ?></td>
                </tr>
                <tr>
                    <td align="center">Address</td>
                    <td><?php echo $address; ?></td>
                </tr>
            </table>
            <div class="box"><div class="center">
            <button class="button buttonSub"><a href="user_edit_profile.php?CustomerID=<?php echo $id; ?>" style="text-decoration:none; color:white;">Edit</a>
            </button>
            </div></div>
            <div class="special"></div>
            <footer id="footer" class="footer">
                <p>Made by G1-Chrome. All rights not reserved. </p>
        </footer>
</html>