<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
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
            <li><a href="viewAllOrders.php"><i class='bx bx-list-ul'></i> Orders</a></li>
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
<h1 style="padding-top:90px; padding-left:30px;">Product Items</h1>

  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Product Image</th>
        <th class="text-center">Product Name</th>
        
        <th class="text-center">Category Name</th>
        <th class="text-center">Unit Price</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include "./config/dbconnect.php";
      $sql="SELECT * from product, category WHERE product.category_id=category.category_id";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><img height='100px' src='<?php echo 'uploads/'.$row["product_image"]?>'></td>
      <td><?=$row["product_name"]?></td>
           
      <td><?=$row["category_name"]?></td> 
      <td><?=$row["price"]?></td>     
      <td><button type="submit" name="submit"><a href="edititem.php?pn=<?php echo $row['product_name'];?>">Edit</a></button></td>
      <td><button type="submit" name="submit"><a href="delete.php?pn=<?php echo $row['product_name'];?>" >Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>
  <button type="button"  style="height:40px; margin-bottom:20px;"><a href="addProduct.php">
    Add Product</a>
  </button>

  