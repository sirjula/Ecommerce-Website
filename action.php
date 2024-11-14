<?php
include 'conn.php';

$email=$_POST['id'];



$update=mysqli_query($connect,"update orderss set order_status=1 where id='$email'");
if($update){
    echo "delivered";
}else{
    echo 'not delivered';
}
?>