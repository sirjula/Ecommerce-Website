<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
    .btn-field{
    width:100%;
    display: flex;
    justify-content: center;
  }
  .btn-field button{
    flex-basis: 10%;
    background: rgb(238, 255, 249);
    color:#000;
    height:40px;
    border-radius: 20px;
    border:1px solid black;
    outline:0;
    cursor:pointer;
  }
  .btn-danger{
    width:100px;
    flex-basis: 48%;
    background: rgb(238, 255, 249);
    color:#000;
    height:40px;
    border-radius: 20px;
    border:1px solid black;
    outline:0;
    cursor:pointer;
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
            <li><a href="logout.php"><ion-icon name="log-out-outline"></ion-icon></a></li>
        </ul>
    </nav>
    <script type="text/javascript">
        window.addEventListener("scroll",function(){
            var navbar=document.querySelector('nav');
            navbar.classList.toggle("sticky",window.scrollY>0);
        })
    </script>
    <div class="text-box">
    <h1 class="heading" style="color:white;"> My cart</h1>
</div>
</section>
<table class="table ">
    <thead>
      <tr>
        <th class="text-center">Product Image</th>
        <th class="text-center">Product Name</th>
        
        <th class="text-center">Product Price</th>
        <th class="text-center">Quantity</th>
        <th class="text-center">Total Price</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
                include 'conn.php';
                session_start();
                $iiid=$_SESSION["myid"];
                $cart_query=mysqli_query($connect,"select * from cart where costumer='$iiid' ");
                $grand_total=0;
                if(mysqli_num_rows($cart_query)>0){
                    while($fetch=mysqli_fetch_assoc($cart_query)){      
            ?>
            <tr>
               
                <td><img  src="uploads/<?php echo $fetch['image'];?>"height="100" alt="" ></td>
                <td><b><?php echo $fetch['product_name'];?></b></td>
                <td><b>NRS <?php echo number_format($fetch['price']);?></b> /-</td>
                <td><b><?php echo $fetch['quantity'];?></b></td>
                <td><b>NRS <?php echo $sub_total=number_format($fetch['price']*$fetch['quantity']);?> /-</td>
                <td>
                <form method="post" action="cart.php">
                <input type="hidden"  name="delete" value="<?php echo $fetch['product_name']; ?>">
                    <button type="submit" name="deletebtn" class="btn-danger">DELETE</button>

                </td>
            </tr>
            <?php
            $grand_total=$grand_total+($fetch['price']*$fetch['quantity']);
            };
        }else{
            echo "<br/><span><b>No Product Added</b></span>";
        }
        ?>
  </table>
  <h3 style="padding-left:650px;">Grand Total= NRS <?php echo $grand_total?> /-</h3>
  <div class="btn-field">
  <form action="" method="post">
     <button type="submit" name="submit" value="submit"><a href="checkout.php" style="text-decoration:none;">CHECK OUT</a></button>
    </form>
</div>
<?php
   include 'conn.php';
   
   if(isset($_POST['deletebtn'])){
    $product_name=$_POST['delete'];
    $iid=$_SESSION["myid"];
    $query="Delete  from cart where product_name='$product_name' && costumer='$iid'";
    $query_run=mysqli_query($connect,$query);
    if($query_run){
        
        ?>
        <script>
window.location.href='cart.php';
        </script>
<?php
    }
    else{
        header('location:cart.php');
        
    }
   }
?>
</body>
</html>
