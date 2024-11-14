<?php
/*include 'conn.php';
session_start();
    if(isset($_POST['add_to_cart'])){
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_image=$_POST['product_image'];
    $product_quantity=$_POST['product_quantity'];
$id=$_SESSION["myid"];
    $select_cart=mysqli_query($connect,"select * from cart where product_name='$product_name' && costumer='$id'");
    if(mysqli_num_rows($select_cart)>0){
        $message[]='Product Already Added To Cart';
    }else{
        $insert=mysqli_query($connect,"Insert into cart (product_name,price,quantity,image,costumer)
         values('$product_name','$product_price','$product_quantity','$product_image','$id')");
         
        if( $insert){
            $message[]='Product Added To Cart';
    }
    }
}*/
session_start();
    if(isset($_POST['add_to_cart'])){
    $product_name=$_POST['product_name'];
    $product_price=$_POST['product_price'];
    $product_quantity=$_POST['product_quantity'];
    
    $product=array($product_name,$product_price,$product_quantity);

    $_SESSION[$product_name]=$product;
    if($_SESSION[$product_name]){
        $message[]='Product Added To Cart';
    }
    } 
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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
</head>
<body>
<section class="sub-header" style="background-image:linear-gradient(rgba(88, 94, 112, 0.7),rgba(111, 115, 136, 0.7)) ,url(img/search.gif);
">
        <nav>
        <ul>
            <li><a href="#home" style="font-size:30px;"><b>A&R Store</b></a></li>
</ul>
<ul>
                <li><a href="afterhomes.php">Home</a></li>
                <li><a href="afterhomes.php#features">Features</a></li>
                <li><a href="product.php">Products</a></li>
                <li><a href="#">Category</a>
                <div  class="sub-menu">
                    <ul>
                    <li><a href="filter.php?cid=1" style="color:black;">Biscuits</a></li>
                        <li><a href="filter.php?cid=2"style="color:black;">Instant Noodles</a></li>
                        <li><a href="filter.php?cid=3"style="color:black;">Soft Drinks</a></li>
                    </ul>
                 </div>
                </li>
            </ul>
        <ul>
        <li><a href="search.php"><i class='bx bx-search-alt-2'></i></a></li>
           <li><a href="viewCart.php"><i class='bx bxs-cart'></i></a></li>
           <li> <a href="login.html">Login</a></li>
        </ul>
    </nav>
    <script type="text/javascript">
        window.addEventListener("scroll",function(){
            var navbar=document.querySelector('nav');
            navbar.classList.toggle("sticky",window.scrollY>0);
        })
    </script>
    
</section>
<div class="text-box">
    <div class="search-bar">
    <form action="search.php" method="post" >
        <input type="text" placeholder="Search Products" name="search">
        <button type="submit" name="submit"><i class='bx bx-search-alt-2'></i></button>
    </form>
        </div>
</div>
<?php
if(isset($message)){
    foreach($message as $message){
        echo'<div class="message" onclick="this.remove();">'.$message.'</div>';
    };
};

?>
<div  class="allphoto">
<?php
include "conn.php";
if(isset($_POST['submit'])){
    $search=$_POST['search'];
    $sql = "SELECT * FROM product WHERE product_name LIKE '%$search%'";
    $result=$connect-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {

?>
<div id="pho" nam="jasmine" class="pho">


        <form method="post" class="box" action="">
        <img  src='<?='uploads/'.$row["product_image"]?>' class="imgg" alt="">
        <div class="name"><?=$row["product_name"]?></div>
        <div class="price">NRS <?=$row["price"]?>/-</div><br>
        <input type="number" min="1" name="product_quantity" value="1">
        <input type="hidden"  name="product_image" value='<?=$row["product_image"]?>'>
        <input type="hidden"  name="product_name" value=<?=$row["product_name"]?>>
        <input type="hidden"  name="product_price" value='<?=$row["price"]?>'><br><br>
        <input type="submit" value="Add to Cart" name="add_to_cart"class="btn">
    </form>
    </div>
    <?php

};

    } else {
        echo "<div class='error'>Product not found.</div>";
    }
}

    ?>