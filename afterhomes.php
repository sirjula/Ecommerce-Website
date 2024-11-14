<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
        <nav>
        <ul>
            <li><a href="#home" style="font-size:30px;"><b>A&R Store</b></a></li>
</ul>
<ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#features">Features</a></li>
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
    <div id="home"class="header">
        <h1 style="color: #fff;">A&R Store </h1>
        <h2 style="color: #fff;padding-right:490px;">We'll never be out of stock </h2><br>
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
        <h1 class="heading"> Our Features<img src="img/features.png" alt=""></h1>
        <div class="box-container">
            <div class="box">
                <img src="img/food.jpg" alt="">
                <h3> Different packed Foods</h3>
                <p> We provide different packed foods such as noodles, biscuits and other soft drinks.</p>
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