<?php
include('usersession.php');
if(!isset($login_session1)){
header('Location: index.html'); // Redirecting To Home Page
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Product</title>
        <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
        <link rel="stylesheet" href="css/productStyle.css?v=<?php echo time();?>">
    </head>

    <body>
        <div class="main">
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
                <h2>Specials</h2>
                <h2>For Nintendo Switch</h2>
            </div>

            <div class="product-center container">
                <?php
                        $query = "SELECT * FROM product ORDER BY ProductID ASC";
                        $result = mysqli_query($con, $query);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_array($result)){
                                    $id = $row["ProductID"];
                                    $name = $row["ProductName"];
                                    $image = $row["Image"];
                                    $describe = $row["ProductDesc"];
                                    $price = $row["ProductAmount"];
                                    $supp = $row["Supplier"];
                                    ?>
                                    <form method="POST" action="cart.php?action=add&id=<?php echo $id; ?>">
                                    <div class="product">
                                        <div class="product-header">

                                        <img src="<?php echo $image; ?>" alt="Zelda">

                                        <ul class="icons">
                                            <input type="hidden" name="id" value="<?php echo $id;?>">
                                            <input type="hidden" name="hidden_name" value="<?php echo $name;?>">
                                            <input type="hidden" name="hidden_price" value="<?php echo $price;?>">
                                            <input type="hidden" name="quantity" value="1" size="2">
                                            <button type="submit" name="add" style="padding:0; border: none; background: none; margin-bottom:16px;"><span><i class="bx bx-shopping-bag"></i></span></a></button>
                                            <a href="Products.php?pid=<?php echo $id ?>"><span><i class="bx bx-search"></i></span></a>
                                        </ul>
                                        </div>
                                        <div class="product-footer">
                                            <a href="Products.php?pid=<?php echo $id ?>"><?php echo $name;?></a>
                                            <h3>RM<?php echo number_format($price, 2); ?></h3>

                                        </div>
                                    </div>
                                </form>
                                 <?php
                                }
                            }
                        ?>
                </div>
        </div>
        <div class="special"><h3>Ends</h3></div>
        <footer id="footer" class="footer">
                <p>Made by G1-Chrome. All rights not reserved. </p>
        </footer>
    </body>
</html>
