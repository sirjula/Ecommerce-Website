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
  <h1 style="padding-top:90px; padding-left:30px;">All Customers</h1>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
      
      </tr>
    </thead>
    <?php  
      include "./config/dbconnect.php";
 
      $sql="SELECT * from register";
      $result=$conn-> query($sql);
      $count=1;
      
        while ($row=mysqli_fetch_array($result)) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["username"]?></td>
      <td><?=$row["email"]?></td>
      
    </tr>
    <?php
            $count=$count+1;
           
        
    }
    ?>
  </table>
    
</body>
</html>