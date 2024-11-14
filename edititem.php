
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
  <link rel="stylesheet" href="style.css">
  <style>
  .message{
    margin:10px 300px;
    padding:10px 5px;
   text-align:center;
    color:black;
    font-size:20px;
    background-color:#add8e0;
  }
    </style>
 
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
<?php
    include "./config/dbconnect.php";
   $pn=$_GET['pn'];
   $qry=mysqli_query($conn, "SELECT * FROM product WHERE product_name='$pn'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
      $catID=$row1["category_id"];
  ?>
  <div class="modal-header">
        <h1 style="padding-top:90px; padding-left:30px;">Edit Product </h1>
        <?php
if(isset($message)){
    foreach($message as $message){
        echo'<div class="message" onclick="this.remove();">'.$message.'</div>';
    };
};

?>
        </div>
        <div class="modal-body">
        <form action="updateiteam.php?pn=<?php echo $pn?>" method="post" enctype='multipart/form-data'>
          <div class="productForm">
    <div class="form-group">
      <input type="text" class="form-control" id="product_id" name='product_id' value="<?= $row['product_id'];?>" hidden>
    </div>
    <div class="form-group">
      <label for="name"><b>Product Name:</b></label>
      <input type="text" class="form-control" id="p_name" name='p_name' value="<?=$row1['product_name'];?>">
    </div>
    
    <div class="form-group">
      <label for="price"><b>Price:</b></label>
      <input type="number" class="form-control" id="p_price"  name='p_price' value="<?=$row1['price'];?>">
    </div>
    <div class="form-group">
      <label><b>Category:</b></label>
      <select name="category">
        <?php
        
          $sql="SELECT * from category WHERE category_id='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['category_id'] ."'>" .$row['category_name'] ."</option>";
            }
          }
        ?>
        <?php
          $sql="SELECT * from category WHERE category_id!='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['category_id'] ."'>" .$row['category_name'] ."</option>";
            }
          }
        ?>
      </select>
    </div>
      <div class="form-group">
         
         <div>
            <label for="file" name="new"><b>Choose Image:</b></label>
            <input type="text" name="existingImage" class="form-control" value="<?= $row1['product_image'];?>" hidden>
            <input type="file" name="file" value="">
         </div>
    </div>
    <div class="form-group">
      <button type="submit" name="update" style="height:40px" class="btn btn-primary">Update Item</button>
    </div>
    <?php
    		}
    	}
    ?>
   </div>
  </form>
  </div>
        <div class="btn-container">
          <button type="button"  style="height:40px "><a href="viewAllProducts.php">Close</a></button>
        </div>
      </div>

    