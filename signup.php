<?php

include "conn.php";

$user=$_POST["uname"];
$email=$_POST["email"];
$pass1=$_POST["pass"];
$pass2=$_POST["repass"];

if($pass1==$pass2){

    $insert=mysqli_query($connect,"insert into register (username,email,password) values('$user','$email','$pass1')");
    if($insert){
        echo "Successfully Registered";
        header("location:login.html");

    }else{
        echo "Failed to register";
    }

}else{
    echo "Password does not match!";
}


?>