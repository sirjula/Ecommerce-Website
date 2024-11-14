<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image:linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)) ,url(img/front.jpg);
            background-size: cover;
            background-position: center;
        }
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
<?php
if(isset($message)){
    foreach($message as $message){
        echo'<div class="message" onclick="this.remove();">'.$message.'</div>';
    };
};

?>
    <div class="wrapper">

        <form method="post" action="login.php">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="uname" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                  <input type="password" placeholder="Password" name="pass" required>
                  <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" name="submit" class="btn">Login</button>
            <div class="register-link">
                <p><br>Don't have an account? <a href="signup.html">Register</a></p>
            </div>
        </form>
    </div>
 
</body>
</html>
<?php

include "conn.php";
session_start();
if(isset($_POST['submit'])){
$user=$_POST["uname"];
$pass=$_POST["pass"];

$sel=mysqli_query($connect,"select * from customer where username='$user'");

$check=mysqli_num_rows($sel);

if($check==1){

$fetch=mysqli_fetch_array($sel);
if($pass==$fetch["password"]){
echo "Successfully Login";
$_SESSION["myid"]=$fetch["email"];
$id=$_SESSION["myid"];
foreach($_SESSION as $products){
$p=0;
$q=0;
foreach($products as $key => $value){
    if($key == 0){
        $value;
        $n=$value;
    }else if($key == 1){
        $value;
        $p=$value;
    }else if($key == 2){
        $value;
        $q=$value;
    }
}
$insert=mysqli_query($connect,"Insert into cart (product_name,price,quantity,costumer)
values('$n','$p','$q','$id')");
$query="DELETE FROM cart where price= 0";

    $data=mysqli_query($connect,$query);

}
header ("location:checkout.php");
}else{
echo "<h3>Incorrect Username and Password</h3>";
}

}else{
    echo "<h3>Incorrect Username and Password</h3>";
}
}

?>