<?php
    include('usersession.php');
    if(!isset($login_session1)){
    header('Location: index.html'); // Redirecting To Home Page
    }

    $query = mysqli_query($con, "SELECT * FROM customer WHERE Email = '$login_session1'");
    $data = mysqli_fetch_array($query);

    $cusID = $data["CustomerID"];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>View Order</title>
        <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
        <link rel="stylesheet" href="css/profile.css?v=<?php echo time(); ?>">
    </head>

    <div class = "header">
        <img src="pic/logo.png" alt="Logo" style="width: 70px; height:48px; background-color:rgb(300, 300, 300);">
            <h1>Game Disc Shop</h1></img>
            </div>
            <div class="navbar">
                <a href="itemPage.php">PRODUCT</a>
                <a style="float: right" href="userlogout.php">Logout</a>
                <div class="dropdown">
                    <button class="dropbtn"><?php echo $login_session1; ?><i class="fa fa=caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="user_view_profile.php">User Profile</a>
                        <a href="user_view_order.php">View Order</a>
                        <a href="feedback.php">Feedback</a>
                    </div>
                </div>
                <a style="float: right" href="cart.php"><i class="bx bx-shopping-bag" style="font-size: 18px;"></i></a>
            </div>
        <div class="special"><h2>Order List</h2></div>

        <table class="container">
            <tr>
                <th style="text-align: center;">Order</td>
                <th style="text-align: center;">Amount</td>
                <th style="text-align: center;">Date</td>
                <th style="text-align: center;">Address</td>
            </tr>
            <?php
               $sql = "SELECT * FROM orders WHERE CustomerID = '$cusID'";
               $result = mysqli_query($con, $sql);
                       while($row = mysqli_fetch_array($result)){
                           $oid=$row["OrderID"];
                           $amount=$row["Amount"];
                           $date=$row["Date"];
                           $address=$row["Address"];
                           ?>
                           <tr>
                            <td> <?php echo $oid ?> </td>
                            <td>RM <?php echo number_format($amount, 2) ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $address ?></td>
                           </tr>
                     <?php  }?>
        </table>
        <div class="special"> </div>
        <footer id="footer" class="footer">
                <p>Made by G1-Chrome. All rights not reserved. </p>
        </footer>
</html>
