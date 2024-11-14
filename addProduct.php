
<?php
   include "./config/dbconnect.php";
    if(isset($_POST['upload']))
    {
        $ProductName = $_POST['p_name'];
        $price = $_POST['p_price'];
        $category = $_POST['category'];   
        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $location="uploads/";
        $image=$name;
        $target_dir="uploads/";
        $finalImage=$target_dir.$name;
        move_uploaded_file($temp,$finalImage);
         $insert = mysqli_query($conn,"INSERT INTO product
         (product_name,product_image,price,category_id) 
         VALUES ('$ProductName','$image',$price,'$category')");
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {
          $message[]='Product Added Successfully';
            
         }
    }
        
?>
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

<div class="modal-header">
        <h1 style="padding-top:90px; padding-left:30px;">New Product Items</h1>
        <?php
if(isset($message)){
    foreach($message as $message){
        echo'<div class="message" onclick="this.remove();">'.$message.'</div>';
    };
};

?>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' method="POST">
          <div class="productForm">
            <div class="form-group">
        
              <label for="name"><b>Product Name:</b></label>
              <input type="text" class="form-control" name="p_name" required>
            </div>
            <div class="form-group">
              <label for="price"><b>Price:</b></label>
              <input type="number" class="form-control" name="p_price" required>
            </div>
           
            <div class="form-group">
              <label><b>Category:</b></label>
              <select name="category" >
                <option disabled selected>Select category</option>
                <?php
                
                  $sql="SELECT * from category";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['category_id']."'>".$row['category_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
                <label for="file"><b>Choose Image:</b></label>
                <input type="file" name="file">
            </div>
            <div class="btn-container">
              <button type="submit"  name="upload" style="height:40px">Add Item</button>
            </div>
                </div>
          </form>

        </div>
        <div class="btn-container">
          <button type="button"  style="height:40px "><a href="viewAllProducts.php">Close</a></button>
        </div>
      </div>