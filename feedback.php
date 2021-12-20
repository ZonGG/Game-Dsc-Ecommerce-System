<?php
    include('usersession.php');
    if(!isset($login_session1)){
    header('Location: index.html');
    }

    $query = mysqli_query($con, "SELECT * FROM customer WHERE Email = '$login_session1'");
    $data = mysqli_fetch_array($query);


    if(isset($_POST['submit']))
    {

        $CustomerID = $data['CustomerID'];
        $Rating = $_POST["Rating"];
        $Comment = $_POST["Comment"];
        $date = date('Y-m-d H:i:s');

        $edit = mysqli_query($con, "INSERT INTO `review` (`ReviewID`, `CustomerID`, `Rating`, `Comment`, `ReviewDate`)
                                VALUES ('', '$CustomerID', '$Rating', '$Comment', '$date');");

        if($edit)
        {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Thank you for your suggestions! Have a good day!');\n";
        echo "window.location='user_view_profile.php'";
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

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Feedback</title>
  <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >
  <link rel="stylesheet" href="css/feedback_style.css?v=<?php echo time();?>">
  <script type="text/javascript" src="js/feedback.js"></script>
</head>

<body>

    <div class="header">
      <img src="pic/logo.png" alt="Logo" style="width: 70px; height:48px; background-color:rgb(300, 300, 300);">
      <h1>Game Disc Shop</h1></img> </div>
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

<form action="feedback.php" name="feedback" method="POST" onsubmit="return( validate());">
<div>
  <h2>REVIEW</h2>
  <h2> How was our services? </h2>
</div>

<div class="star">
    <input type="radio" name="Rating" id="star1" value="5"><label for="star1"></label>
    <input type="radio" name="Rating" id="star2" value="4"><label for="star2"></label>
    <input type="radio" name="Rating" id="star3" value="3"><label for="star3"></label>
    <input type="radio" name="Rating" id="star4" value="2"><label for="star4"></label>
    <input type="radio" name="Rating" id="star5" value="1"><label for="star5"></label>
</div>
<br>
<br>
<div>
  <textarea name="Comment" type="text" cols="100" rows="10" id="review" placeholder="Write your comment here" ></textarea>
</div>
<br>
<div class="submit">
<a href="index.html"> Cancel </a>
<input type="submit" value="SUBMIT" name="submit">  </input>
</div>
</form>


<footer class="footer">
  <p> Made by G1- Chrome. All rights not reserved. </p>
</footer>

</body>

</html>
