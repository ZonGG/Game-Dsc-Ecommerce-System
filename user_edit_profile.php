<?php
    include('usersession.php');
    if(!isset($login_session1)){
    header('Location: index.html'); // Redirecting To Home Page
    }
    $id = $_GET['CustomerID'];
    $query = mysqli_query($con,"SELECT * FROM customer WHERE CustomerID=$id");
    $data = mysqli_fetch_array($query);

    if(isset($_POST['update']))
    {
        $fname = $_POST["FirstName"];
        $lname = $_POST["LastName"];
        $num = $_POST["PhoneNum"];
        $email = $_POST["Email"];
        $gender = $_POST["Gender"];
        $address = $_POST["Address"];

        $edit = mysqli_query($con, "UPDATE customer SET FirstName='$fname', LastName='$lname', PhoneNum='$num', Email='$email', Gender='$gender', Address='$address' WHERE CustomerID='$id'");

        if($edit)
        {
            header('Location: user_view_profile.php');
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
        <title>Edit Profile</title>
        <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
        <script type="text/javascript" src="js/validate_edit_profile.js"> </script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
        <link rel="stylesheet" href="css/profile.css?v=<?php echo time(); ?>">
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

            <div class="special"><h2>Edit Profile</h2></div>

        <form method="POST" name="myForm" enctype="multipart/form-data">
            <table class="container" style="width:900px;">
                <tr>
                    <th width="30%"></th>
                    <th width="70%"></th>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">First Name</td>
                    <td style="border-bottom: none;"><input type="text" name="FirstName" value="<?php echo $data['FirstName'];?>"></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Last Name</td>
                    <td style="border-bottom: none;" ><input type="text" name="LastName" value="<?php echo $data['LastName'];?>"></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Phone Number</td>
                    <td style="border-bottom: none;"><input type="text" name="PhoneNum" value="<?php echo $data['PhoneNum'];?>"></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Email</td>
                    <td style="border-bottom: none;"><input type="text" name="Email" value="<?php echo $data['Email'];?>"></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Gender</td>
                    <td style="border-bottom: none;">
                        <input type="radio" name="Gender" <?php if($data['Gender']=="male") {echo "checked";}?> value="male" id="Gender"> Male </input>
                        <input type="radio" name="Gender" <?php if($data['Gender']=="female") {echo "checked";}?> value="female" id="Gender"> Female </input></td>
                </tr>
                <tr>
                    <td style="border-bottom: none;" align="center">Address</td>
                    <td style="border-bottom: none;"><input type="text" name="Address" value="<?php echo $data['Address'];?>"></td>
                </tr>
            </table>
            <div class="box"><div class="center">
            <button class="button buttonSub" onclick="return(validate())" type="submit" name="update" value="update">Edit
            </button></div></div>
        </form>
        <footer id="footer" class="footer">
            <p>Made by G1-Chrome. All rights not reserved. </p>
        </footer>
    </body>
</html>
