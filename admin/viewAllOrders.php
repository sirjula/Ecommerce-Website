<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customers</title>
  <link rel="stylesheet" href="style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  
</head>
<body>
<div class="side-menu">
        <div class="brand-name">
        <h1>A&R Store</h1>
        </div>
        <ul>
        <li><a href="admin.php"><i class='bx bxs-home'></i> Dashboard</a></li>
            <li><a href="viewCustomers.php" ><i class='bx bxs-user-account'></i> Customers</a></li>
            <li><a href="viewAllProducts.php" ><i class='bx bxs-package'></i> Products</a></li>
            <li><a href="viewAllOrders.php" onclick="showOrders()"><i class='bx bx-list-ul'></i> Orders</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="headers">
            <div class="navs">
                <div class="user">
                    <ul>
                    <li><a href="admin.php"><img src="img/user.png"></a></li>
                   <li> <a href="logout.php"><img src="img/logout.png"></a></li>
                </ul>
                </div>
            </div>
        </div>
 <div >
  
  <div id="ordersBtn" >
  <h1 style="padding-top:90px; padding-left:30px;">Order Details</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>O.N.</th>
        <th>Customer</th>
        <th>Contact</th>
        <th>OrderDate</th>
        <th>Payment Method</th>
        <th>Order Status</th>
        <th>Payment Status</th>
        
     </tr>
    </thead>
     <?php
       include "./config/dbconnect.php";
      $sql="SELECT * from orders";
      $result=$conn-> query($sql);
      $count=1;
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["order_id"]?></td>
          <td><?=$row["delivered_to"]?></td>
          <td><?=$row["phone_no"]?></td>
          <td><?=$row["order_date"]?></td>
          <td><?=$row["pay_method"]?></td>
           <?php 
                if($row["order_status"]==0){
                            
            ?>
                <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Pending </button></td>
            <?php
                        
                }else{
            ?>
                <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?=$row['order_id']?>')">Delivered</button></td>
        
            <?php
            }
                if($row["pay_status"]==0){
            ?>
                <td><button class="btn btn-danger"  onclick="ChangePay('<?=$row['order_id']?>')">Unpaid</button></td>
            <?php
                        
            }else if($row["pay_status"]==1){
            ?>
                <td><button class="btn btn-success" onclick="ChangePay('<?=$row['order_id']?>')">Paid </button></td>
            <?php
                }
            ?>
              
        
        </tr>
    <?php
          
        
      }
    ?>
     
  </table>
  
   

