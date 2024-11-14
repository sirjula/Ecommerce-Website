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

        <th>Customer</th>
        <th>Contact</th>
        <th>Order</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
        <th>Address</th>
        <th>Payment</th>
        <th>Action</th>
        
     </tr>
    </thead>
     <?php
       include "conn.php";
      $sql="SELECT * from orderss";
      $result=mysqli_query($connect,$sql);
      $count=1;

        while ($row=mysqli_fetch_array($result)) {
    ?>
       <tr>
   
          <td><?=$row["name"]?></td>
          <td><?=$row["phone"]?></td>
          <td><?=$row["order"]?></td>
          <td><?=$row["quantity"]?></td>
          <td><?=$row["price"]?></td>
          <td><?=$row["total"]?></td>
          
          <td><?=$row["address"]?></td>
          <td><?=$row["payment"]?></td>
        
           <?php 
                if($row["order_status"]==0){
                            
            ?>
                <td><button class="btn btn-danger"  id="<?php echo $row['name'];?>" onclick="action('<?=$row['id']?>','<?=$row['order']?>')">Pending </button></td>
            <?php
                        
                }else{
            ?>
                <td><button class="btn btn-success" id="<?php echo $row['name'];?>" onclick="action('<?=$row['id']?>')">Delivered</button></td>
        
            <?php
            }
            ?>
        
        </tr>
    <?php
          
        
      }
    ?>
     
  </table>
  <script>

    const action=(data,beta)=>{

        const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    // document.getElementById("demo").innerHTML = this.responseText;
    alert(this.responseText)
    window.location.href="viewAllOrders.php";
  }
  xhttp.open("POST", "action.php");
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id="+data+"&order="+beta);
    }

    </script>
  
   

