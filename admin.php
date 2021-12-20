<?php
include('adminsession.php');
if(!isset($login_session)){
header('Location: adminlogin.html');
}   ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Admin Page</title>
  <link rel="icon" href="pic/icon.png" type="image" sizes="16x16">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >
  <link rel="stylesheet" href="css/admin.css?v=<?php echo time(); ?>">
</head>


</script>

<body>

    <div class="header">
      <img src="pic/logo.png" alt="Logo" style="width: 70px; height:48px; background-color:rgb(300, 300, 300);"> </img>
      <h1 style="display:inline-block">Game Disc Shop <h1 style="color: #247BA0">Admin System </h1></h1>
      <h3 style="color: #B0F2B4; float:right;"><?php echo $login_session; ?>&nbsp;</h3><h3 style="float:right; color:white;">Welcome, &nbsp;</h3></div>

    <div id="side" class="side">

          <a href="#" id="Dashboard" >Dashboard <i class="fa fa-bar-chart" style="font-size:24px; color:white;float:right;"></i></a>
      		<a href="userlist.php" id="UsersAccount" >User List <i class="fa fa-address-book" style="font-size:24px; color:white;float:right;"></i></a>
      		<a href="product_list.php" id="Products" >Products <i class="fa fa-barcode" style="font-size:24px; color:white;float:right;"></i></a>
         <a href="adminlogout.php" id="Logout" >Logout <i class="fa fa-sign-out" style="font-size:24px; color:white;float:right;"></i></a>
    </div>


        <!-- Pie Chart !-->
           <?php
              $query = "SELECT Gender, count(*) as number FROM customer GROUP BY Gender";
              $result = mysqli_query($con, $query);
              ?>
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
              <div id="piechart" style="width:50%; height: 480px;float:left;"></div>
              <script type="text/javascript">
              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart()
              {
                   var data = google.visualization.arrayToDataTable([
                             ['Gender', 'Number'],
                             <?php
                             while($row = mysqli_fetch_array($result))
                             {
                                  echo "['".$row["Gender"]."', ".$row["number"]."],";
                             }
                             ?>
                        ]);
                   var options = {
                         title: 'Percentage of Male and Female Customers',
                         fontSize: 20,
                         backgroundColor: '#F4F4F4',
                         pieHole: 0.4
                        };

                   var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                   chart.draw(data, options);
              }
              </script>




 <!-- Line Chart !-->
    <?php
    $chartQuery = "SELECT * FROM orders";
    $chartQueryRecords = mysqli_query($con,$chartQuery);
    ?>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <div id="regions_div" style="width: 50%; height: 480px;float:right;"></div>

        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart'],
            'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
          });
          google.charts.setOnLoadCallback(drawRegionsMap);

          function drawRegionsMap() {
            var data = google.visualization.arrayToDataTable([
                 ['Date', 'Amount'],
                <?php
                    while($row = mysqli_fetch_assoc($chartQueryRecords)){
                        echo "['".$row['Date']."',".$row['Amount']."],";
                    }
                ?>
            ]);

            var options = {
              title: 'Sales Per Orders',
              fontSize: 15,
              backgroundColor: '#F4F4F4',
            };

            var chart = new google.visualization.LineChart(document.getElementById('regions_div'));

            chart.draw(data, options);
          }
        </script>






<!-- Reviews !-->
<div>
<table>
<tr> <h1 style="text-align:center;"> Users Recent Reviews </h1> <tr>
<tr>
<th>ReviewID</th>
<th>CustomerID</th>
<th>Rating</th>
<th>Comment</th>
<th>ReviewDate</th>
</tr>

<?php

$records = mysqli_query($con,"select * from review");

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['ReviewID']; ?></td>
    <td><?php echo $data['CustomerID']; ?></td>
    <td><?php echo $data['Rating']; ?></td>
    <td><?php echo $data['Comment']; ?></td>
    <td><?php echo $data['ReviewDate']; ?></td>
  </tr>
<?php
}
?>
</table>
</div>


</body>

</html>
