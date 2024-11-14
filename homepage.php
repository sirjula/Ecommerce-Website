<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
        <nav>
            <ul>
            <li><a href="#home" style="font-size:30px;"><b>A&R Store</b></a></li>
</ul>
<ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#features">Features</a></li>
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
    <div id="home"class="header">
        <h1 style="color: #fff;">A&R Store </h1>
        <h2 style="color: #fff; padding-right:490px;">We'll never be out of stock </h2><br>
        <div class="btn-container">
            <button> <a href="login.html" >Place Order</a> <img src="img/order.png" alt=""></button>
            
        </div>
    </div>
    <script type="text/javascript">
        window.addEventListener("scroll",function(){
            var navbar=document.querySelector('nav');
            navbar.classList.toggle("sticky",window.scrollY>0);
        })
    </script>
    <div class="bg">
    <section class="features reveal" id="features">
        <h1 class="heading"> Our Features</h1>
        <div class="box-container">
            <div class="box">
                <img src="img/food.jpg" alt="">
                <h3> Different packed Foods</h3>
                <p> We provide different packed foods such as noodles, biscuits, chocolates and other soft drinks.</p>
            </div>
            <div class="box">
                <img src="img/fast.png" alt="">
                <h3> Fast Delivery</h3>
                <p> We provide a fast delivery for our customers.</p>
            </div>
            <div class="box">
                <img src="img/order.png" alt="">
                <h3> Payment Method</h3>
                <p> We provide different payment method for our customers.</p>
            </div>
        </div>
    </section>
    <section class="features reveal" id="product">
        <h1 class="heading"> Our Products</h1>
    <div  class="allphoto">
    
<div id="pho" nam="jasmine" class="pho">

    <img  src="img/current.jpg" class="imgg">
<div class="info">
    <h2>Current Noodle</h2>
    <h3>NRS 290/-</h3>
    <form method="post" action="login.html">
    <button type="submit" name="submit" id="add"><b>Add to Cart</b></button>
</form>
</div>
</div>
<div id="pho" nam="jasmine" class="pho">

    <img  src="img/good-day.jpg" class="imgg">
<div class="info">
    <h2>Good Day</h2>
    <h3>NRS 500/-</h3>
    <form method="post" action="login.html">
    <button type="submit" name="submit" id="add"><b>Add to Cart</b></button>
</form>
</div>
</div>
<div id="pho" nam="jasmine" class="pho">
<img  src="img/orange real juice.jpg" class="imgg">
<div class="info">
    <h2>Orange Real Juice</h2>
    <h3>NRS 550/-</h3>
    <form method="post" action="login.html">
    <button type="submit" name="submit" id="add"><b>Add to Cart</b></button>
</form>
</div>
</div>
<div id="pho" nam="jasmine" class="pho">
<img  src="img/litchi drink.jpg" class="imgg">
<div class="info">
    <h2>Litchi Drink</h2>
    <h3>NRS 700/-</h3>
    <form method="post" action="login.html">
    <button type="submit" name="submit" id="add"><b>Add to Cart</b></button>
</form>
</div>
</div>
<div id="pho" nam="jasmine" class="pho">
<img  src="img/Wai wai.jpg" class="imgg">
<div class="info">
    <h2>Wai Wai Instant Noodle</h2>
    <h3>NRS 250/-</h3>
    <form method="post" action="login.html">
    <button type="submit" name="submit" id="add"><b>Add to Cart</b></button>
</form>
</div>
</div>
<div id="pho" nam="jasmine" class="pho">
<img  src="img/tasty.png" class="imgg">
<div class="info">
    <h2>Tasty-Tasty</h2>
    <h3>NRS 600/-</h3>
    <form method="post" action="login.html">
    <button type="submit" name="submit" id="add"><b>Add to Cart</b></button>
</form>
</div>
</div>
</div>
<div class="btn-field">
<form action="products.php" method="post">
    <button type="submit" name="submit" id="add"><b>SHOW MORE</b></button>
</form>
</div>
    </section>

    <section class="footer reveal">
        <div class="box-containers">
            <div class="boxes">
                <h3>A&R Store</h3>
                <p>We'll never be out of stock</p>
            </div>
                <div class="boxes">
                    <h3>Contact Info</h3>
                    <a href="#" class="links"><i class='bx bxs-phone'></i> +977 8367723</a>
                    <a href="#" class="links"><i class='bx bxs-phone'></i> +977 8367723</a>
                    <a href="#" class="links"><i class='bx bxs-envelope'></i> a&rstore@gmail.com</a>
                    <a href="#" class="links"><i class='bx bxs-map'></i> Nardevi,Kathmandu</a>
                </div>
                    <div class="boxes">
                        <h3>Quick Links</h3>
                        <a href="#home" class="links"><i class='bx bxs-right-arrow-alt'></i>Home</a>
                        <a href="#features" class="links"><i class='bx bxs-right-arrow-alt'></i>Features</a>
                        <a href="#produts" class="links"><i class='bx bxs-right-arrow-alt'></i>Products</a>
                        
                    </div>
        </div>
    </section>
    <script type="text/javascript">
        window.addEventListener('scroll',reveal);
        function reveal(){
            var reveals= document.querySelectorAll('.reveal');
            for (var i=0; i<reveals.length; i++){
                var windowheight =window.innerHeight;
                var revealtop=reveals[i].getBoundingClientRect().top;
                var revealpoint=150;
                if(revealtop < windowheight - revealpoint){
                    reveals[i].classList.add('active');
                } 
                else{
                    reveals[i].classList.remove('active');
                }
            }
        }
    </script>
    </div>
</body>
</html>