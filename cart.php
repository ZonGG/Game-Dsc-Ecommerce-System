<?php
include('usersession.php');
if(!isset($login_session1)){
header('Location: index.html'); // Redirecting To Home Page
}

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"pid");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'pid' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="cart.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }
        else{
            $item_array = array(
                'pid' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }
    
    

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["pid"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="cart.php"</script>';
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Shopping Cart</title>
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
                <h2>Shopping Cart</h2>
            </div>

            <div class="container">
                <table class="center">
                    <tr>
                        <th width="30%">Product</th>
                        <th width="20%">Quantity</th>
                        <th width="13%">Price Details</th>
                        <th width="20%">Total Price</th>
                        <th width="17%">Remove Item</th>
                    </tr>
                    <?php
                        $total = 0;
                        $total_quantity = 0;
                        if(!empty($_SESSION["cart"])){
                            foreach($_SESSION["cart"] as $key => $value){
                                $id=$value["pid"];
                                $item_name=$value["item_name"];
                                $item_quantity=$value["item_quantity"];
                                $item_price=$value["product_price"];
                                ?>
                                <tr>
                                    <td><?php echo $item_name ?></td>
                                    <td><?php echo $item_quantity ?></td>
                                    <td> RM <?php echo number_format($item_price,2); ?></td>
                                    <td> RM <?php echo number_format($item_quantity * $item_price, 2); ?></td>
                                    <td><a href="cart.php?action=delete&id=<?php echo $id; ?>">
                                <span class="text-danger">Remove Item</span></a></td>
                                </tr>
                                <?php
                                $total_quantity += $value["item_quantity"];
                                $total = $total + ($value["item_quantity"] * $value["product_price"]);
                            }
                            ?>
                            <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">RM <?php echo number_format($total, 2); ?></th>
                            <td></td>
                            </tr>
                            <?php
                        }
                        else{
                            ?>
                            <tr>
                            <td colspan="5" style="text-align: center;">Empty cart</td></tr>
                            <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">RM <?php echo number_format($total, 2); ?></th>
                            <td></td>
                            </tr>
                        <?php
                        }
                        ?>
                </table>
            </div>
        </div>
                <form>
                <div class="checkout container2">
                <?php 
                    if(empty($_SESSION["cart"])){
                        $payment="cart.php";
                    }
                    else{
                        $add = "user_make_payment.php?email=";
                        $payment=$add.$login_session1;
                    }
                    ?>
                <button type="submit" name="pay" class="button"><a style="text-decoration: none; font-weight: bold; color: white;" 
                href="<?php echo $payment ?>">Checkout</a></button>
                </div>
        <footer id="footer" class="footer">
            <p>Made by G1-Chrome. All rights not reserved. </p>
        </footer>
    </body>
</html>
