<?php
    session_start();
?>
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
    flex-basis: 48%;
    background: rgb(238, 255, 249);
    color:black;
    height:40px;
    border-radius: 20px;
    border:1px solid black;
    outline:0;
    cursor:pointer;
    width:200px;
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
            <li><a href="#home" style="font-size:30px;"><b>A&R Store</b></a></li>
</ul>
<ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="homepage.php#features">Features</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="#">Category</a>
                <div  class="sub-menu">
                    <ul>
                    <li><a href="filter.php?cid=1" style="color:black;">Biscuits</a></li>
                        <li><a href="filter.php?cid=2"style="color:black;">Instant Noodles</a></li>
                        <li><a href="filter.php?cid=3"style="color:black;">Soft Drinks</a></li>
                    </ul>
                 </div>
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
    <div class="text-box">
    <h1 class="heading" style="color:white;"> My cart</h1>
</div>
</section>
<table class="table ">
    <thead>
      <tr>
      <th class="text-center">S.N</th>
        <th class="text-center">Product Name</th>
        
        <th class="text-center">Product Price</th>
        <th class="text-center">Quantity</th>
        <th class="text-center">Total Price</th>
        <th class="text-center" >Update</th>
        <th class="text-center" >Delete</th>
      </tr>
    </thead>
    <?php
    $sno=1;
    $grand_total=0;
    foreach($_SESSION as $products){
        $p=0;
        $q=0;
        
        echo"<tr>";
            echo"<td><b>".($sno++)."</b></td>";
            echo"<form action='editCart.php' method='post'>";
            foreach($products as $key => $value){
                if($key == 2){
                    echo"<td><input type='text'name='name$key' class='form-control' value='".$value."'></td>";
                    $q=$value;
                }else if($key == 1){
                    echo"<input type='hidden'name='name$key' value='".$value."'>";
                    echo"<td><b>NRS ".$value."</b></td>";
                    $p=$value;
                }else if($key == 0){
                    echo"<input type='hidden'name='name$key' value='".$value."'>";
                    echo"<td><b>".$value."</b></td>";
                }
            }
            $grand_total=$grand_total+($p*$q);
            $total=$q*$p;
            echo"<td><b>".$total."</b></td>";
            echo"<td><button type='submit' name='event' value='update' class='btn-danger'>UPDATE</button></td>";
            echo"<td><button type='submit' name='event' value='delete' class='btn-danger'>DELETE</button></td>";
            echo"</form>";
        echo"</tr>";
    }
    ?>
    </table>
    <h3 style="padding-left:650px;">Grand Total= NRS <?php echo $grand_total?> /-</h3>
    <div class="btn-field">
  <form action="login.html" method="post">
  <div class="btn-field">
            <button type="submit" name="submit" value="submit">Order Now</button>

           
</div>
    </form>
</div>
    </body>
</html>