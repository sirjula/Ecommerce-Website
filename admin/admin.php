<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body{
            min-height: 100vh;
        }
    
        </style>
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
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                    <h1 >
                    <?php
           
            include "./config/dbconnect.php";
        ?>
                    <?php
                    
                        $sql="SELECT * from register ";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?></h1>
                        <h3>Customer</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/customer.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                    <h1>
                    <?php
                       
                       $sql="SELECT * from product";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h1>
                        <h3>Products</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/package.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                    <h1>
                    <?php
                       
                       $sql="SELECT * from orders";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h1>
                        <h3>Orders</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/list.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>