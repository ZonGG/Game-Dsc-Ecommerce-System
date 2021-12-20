<?php
    include('usersession.php');
    if(!isset($login_session1)){
    header('Location: index.html'); // Redirecting To Home Page
    }

    $query = mysqli_query($con, "SELECT * FROM customer WHERE Email = '$login_session1'");
    $data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">
        <title>Payment</title>
        <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
        <script type="text/javascript" src="js/payment_val.js"> </script> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
        <link rel="stylesheet" href="css/profile.css?v=<?php echo time();?>">
    </head>

    <body>
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

            <div class="special">
            <h2>Shipping Detail</h2></div>

            <form method="POST" name="myForm" enctype="multipart/form-data">

            <table class="container" style="width:900px;">
                <tr>
                    <th width="30%"></th>
                    <th width="30%"></th>
                    <th width="15%"></th>
                    <th width="25%"></th>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">First Name</td>
                    <td colspan="3" style="border-bottom: none;"><input type="text" name="FirstName" value="<?php echo $data['FirstName'];?>"></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Last Name</td>
                    <td colspan="3" style="border-bottom: none;" ><input type="text" name="LastName" value="<?php echo $data['LastName'];?>"></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Phone Number</td>
                    <td colspan="3" style="border-bottom: none;"><input type="text" name="PhoneNum" value="<?php echo $data['PhoneNum'];?>"></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Email</td>
                    <td colspan="3" style="border-bottom: none;"><input type="text" name="Email" value="<?php echo $data['Email'];?>"></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Address</td>
                    <td colspan="3" style="border-bottom: none;"><input type="text" name="Address" value="<?php echo $data['Address'];?>"></td>
                </tr>
                <tr>
                    <td colspan="4" style="border-bottom: none;" align="center"><h2>Payment Detail<h2></td>
                </tr>
                <tr>
                    <td colspan="4" class="special" style="border-bottom: none;" align="center">Card accepted<br><br>
                    <div class="icon-container">
				<i class="fa fa-cc-visa" style="color:navy; font-size:30px"></i>
				<i class="fa fa-cc-amex" style="color:blue; font-size:30px"></i>
				<i class="fa fa-cc-mastercard" style="color:red; font-size:30px"></i>
				<i class="fa fa-cc-discover" style="color:orange; font-size:30px"></i>
			</div></td></tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Card Number</td>
                    <td colspan="3" style="border-bottom: none;"><input type="text" name="CardNum" placeholder="1111222233334444"></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Exp date</td>
                    <td style="border-bottom: none;"><input type="text" name="ExpDate" placeholder="MM/YY"></td>
                    <td style="border-bottom: none;" align="center">CVV</td>
                    <td style="border-bottom: none;"><input type="text" name="cvv" placeholder="XXX"></td>
                </tr>
                <tr>
                    <td colspan="4" style="border-bottom: none;" align="center"><div class="special"></div>
                    <input type="checkbox" checked="checked" name="con"> I agree the terms and conditions.</td>
                </tr>
            </table>
            <div class="box"><div class="center">
            <button class="button buttonSub" onclick="return(validate())" type="submit" name="update" value="update">Confirm
            </button></div></div>
        </form>
        <div class="special"></div>
        <footer id="footer" class="footer">
            <p>Made by G1-Chrome. All rights not reserved. </p>
        </footer>
    </body>
</html>

<?php
    if(isset($_POST['update'])){
        include('user_make_order.php');
    }
?>
