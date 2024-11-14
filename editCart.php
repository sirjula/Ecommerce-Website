<?php
    session_start();
    $product_name=$_POST['name0'];
    $product_price=$_POST['name1'];
    $product_quantity=$_POST['name2'];
    $event= $_POST['event'];
    
    $product=array($product_name,$product_price,$product_quantity);
    if($event =='update'){
        $_SESSION[$product_name]=$product;
    }
    else if($event =='delete'){
        unset($_SESSION[$product_name]);
    }

    header('location:viewCart.php');
?>