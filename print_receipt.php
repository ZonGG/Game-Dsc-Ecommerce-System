<?php
include('usersession.php');
    if(!isset($login_session1)){
    header('Location: index.html'); // Redirecting To Home Page
    }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Print Receipt </title>
  <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="css/productStyle.css?v=<?php echo time(); ?>">
</head>
<body>

<div class = "header">
        <img src="pic/logo.png" alt="Logo" style="width: 70px; height:48px; background-color:rgb(300, 300, 300);">
            <h1>Game Disc Shop</h1></img>
            </div>

<div class="container">
  <div class="row">
      <h2>Receipt</h2>
      <table class="table table-bordered print">
        <thead>
          <tr>
            <th>Payment ID</th>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Amount</th>

          </tr>
        </thead>
        <tbody>
          <?php
          $sn=1;
          $user_qry="SELECT * from payment ORDER BY PaymentID DESC LIMIT 1";
          $user_res=mysqli_query($con,$user_qry);
          while($user_data=mysqli_fetch_assoc($user_res))
          {
          ?>
          <tr>
            <td><?php echo $user_data['PaymentID']; ?></td>
            <td><?php echo $user_data['OrderID']; ?></td>
            <td><?php echo $user_data['CustomerID']; ?></td>
            <td>RM <?php echo number_format($user_data['Amount'],2); ?></td>
          </tr>
          <?php
          $sn++;
          }
          ?>
        </tbody>
      </table>

      <div class="text-center">

      <button style="float:right;" onclick="window.print();">Print</button>
      <button style="float:right;"><a href="itemPage.php">Back</a></button>
      </div>
  </div>
</div>
</body>
</html>
