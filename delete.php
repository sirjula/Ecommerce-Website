<?php

include "./config/dbconnect.php";
    
    $pn=$_GET['pn'];
    $query="DELETE FROM product where product_name='$pn'";

    $data=mysqli_query($conn,$query);

    if($data){
        header('location:viewAllProducts.php');
    }
    else{
        echo"Not able to delete";
    }
    
?>