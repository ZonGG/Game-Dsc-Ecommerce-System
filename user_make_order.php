<?php
    $query = mysqli_query($con, "SELECT * FROM customer WHERE Email = '$login_session1'");
    $data = mysqli_fetch_array($query);

    $gtotal = 0;
    $quantity=0;
    $cusID = $data['CustomerID'];
    $date = date('Y-m-d');
    $address = $_POST["Address"];

    $query ="INSERT INTO orders (OrderID, CustomerID, Date,Address)
                VALUES ('','$cusID','$date','$address')";
            
    $success1 = mysqli_query($con, $query);

    $last_id = mysqli_insert_id($con);

    foreach($_SESSION["cart"] as $key => $value)
    {
        $id=$value["pid"];
        $item_name=$value["item_name"];
        $item_quantity=$value["item_quantity"];
        $item_price=$value["product_price"];
        $total = ($value["item_quantity"] * $value["product_price"]);
        $date = date('Y-m-d');

        $gtotal = $gtotal + $total;
        $quantity = $quantity + $item_quantity;

        $query2 = "INSERT INTO order_item (ProductID, OrderID, Total, Quantity, Date)
                VALUES ('".$id."','$last_id','".$total."','".$item_quantity."','$date')";
        
        $success = mysqli_query($con, $query2);
    }

    $query3 ="UPDATE orders SET Amount='$gtotal' WHERE OrderID='$last_id'";

    $success2 = mysqli_query($con, $query3);

    $query4 = "INSERT INTO payment (PaymentID, OrderID, CustomerID, Amount)
                VALUES ('','$last_id','$cusID','$gtotal')";
    
    $success3 = mysqli_query($con, $query4);

    unset($_SESSION['cart']);

    if($success3)
        {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Your Order is Placed Successfully!');\n";
        echo "window.location='print_receipt.php'";
        echo "</script>";
            mysqli_close($con);
            exit;
        }
        else
        {
            echo mysqli_connect_error();
        }

    exit;
?>