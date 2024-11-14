<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        .display-order{
    margin:10px 300px;
    padding:10px 5px;
   text-align:center;
    color:black;
    font-size:20px;
    background-color:#add8e0;
}
.btn-field button{
    width:100%;
    border-radius: 50px;
    height:40px;
    
}
    </style>
   
</head>
<body>
<section class="sub-header">
        <nav>
            <ul>
            <li><a href="afterhomes.php" style="font-size:30px;"><b>A&R Store</b></a></li>
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
                <li><a href="order.php">My Orders</a></li>
            </ul>
        <ul>
        <li><a href="search.php"><i class='bx bx-search-alt-2'></i></a></li>
           <li><a href="cart.php"><i class='bx bxs-cart'></i></a></li>
            <li><a href="homepage.php"><ion-icon name="log-out-outline"></ion-icon></a></li>
        </ul>
    </nav>
    <script type="text/javascript">
        window.addEventListener("scroll",function(){
            var navbar=document.querySelector('nav');
            navbar.classList.toggle("sticky",window.scrollY>0);
        })
    </script>
    <div class="text-box">
    <h1 class="heading" style="color:white;"> Check Out</h1>
</div>
</section>
<div class="display-order" >
<?php
include 'conn.php';
session_start();
$iiid=$_SESSION["myid"];
$select= mysqli_query($connect,"select * from cart where costumer='$iiid' ");
$grand_total=0;
if(mysqli_num_rows($select)>0){
    while($fetch=mysqli_fetch_assoc($select)){ 
        $sub_total=number_format($fetch['price']*$fetch['quantity']);    
        $grand_total=$grand_total+($fetch['price']*$fetch['quantity']);
?>
<span><?=$fetch['product_name'] ;?>(<?=$fetch['quantity']; ?>)</span>
<?php
    }
    }else{
        echo"<div class='display-order'><span>Your Cart is Empty!</span></div>";
    }
?><span class="grand-total">Grand Total=<?=$grand_total;?></span>
</div>
<div class="modal-body"style="background:#f1f1f1;">
        <form action="checkout.php" method="post">
            <div class="productForm">
                <div class="form-group">
                    <span> Your Name</span>
                    <input type="text" placeholder="enter name" name="name" required>
                </div>
                <div class="form-group">
                    <span> Your Number</span>
                    <input type="number" placeholder="enter your number" name="number" required>
                </div>
                <div class="form-group">
                    <span> Your Email</span>
                    <input type="email" placeholder="enter your email" name="email"required>
                </div>
                <div class="form-group">
                    <span> Payment Method</span>
                    <select name="method">
                        <option value="cash on delivery" selected>Cash On Delivery</option>
                        <option value="Khalti">Khalti</option>
                    </select>
                    <div class="form-group">
                    <span> Address</span>
                    <input type="text" placeholder="enter your address" name="address"required>
                </div>    
               
               
     

            <div class="btn-field">
            <button type="submit" name="submit" value="submit">Order Now</button>

            <button type="submit" name="Khalti" value="khalti">Pay with khalti</button>
</div>
    </from>
  
</div>

<?php

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $address=$_POST['address'];
    $pm=$_POST['method'];

    $sel=mysqli_query($connect,"select * from cart where costumer='$email'");
    $total_price=0;

while( $fetch=mysqli_fetch_array($sel)){
   $pro= $fetch['product_name'];
   $price = $fetch['price'];
    $quantity = $fetch['quantity'];
   $total_price = $price * $quantity;
   
 
    $ins=mysqli_query($connect,"INSERT INTO `orderss` (`name`, `email`, `phone`, `order_status`, `order`, `address`, `payment`, `quantity`, `price`, `total`) VALUES ('$name','$email','$number','0','$pro','$address','$pm','$quantity','$price','$total_price')");



//$ins=mysqli_query($connect,"insert into order ('name','email','phone','order_status','order','address') values('$name','$email','$number','0','k','$address')");
try{


if($ins){
    mysqli_query($connect,"delete from cart where costumer='$email'");
    echo "<script>
        alert('Thank you for your purchase!');
        window.location= 'afterhomes.php';
        </script>";
}

}catch(Exception $e){

    echo "no item in cart";
}
}}
if(isset($_POST['Khalti'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $address=$_POST['address'];
    $pm=$_POST['method'];
  

    $sel=mysqli_query($connect,"select * from cart where costumer='$email'");
    $total_price=0;


while( $fetch=mysqli_fetch_array($sel)){
   $pro= $fetch['product_name'];
   $price = $fetch['price'];
    $quantity = $fetch['quantity'];
   $total_price = $price * $quantity;
 
 
    $ins=mysqli_query($connect,"INSERT INTO `orderss` (`name`, `email`, `phone`, `order_status`, `order`, `address`, `payment`, `quantity`, `price`, `total`) VALUES ('$name','$email','$number','0','$pro','$address','$pm','$quantity','$price','$total_price')");



//$ins=mysqli_query($connect,"insert into order ('name','email','phone','order_status','order','address') values('$name','$email','$number','0','k','$address')");
try{


if($ins){
    mysqli_query($connect,"delete from cart where costumer='$email'");

       
}

}catch(Exception $e){

    echo "no item in cart";
}
}}

   

