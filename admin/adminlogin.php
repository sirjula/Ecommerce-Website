<?php

include "conn.php";

$user=$_POST["uname"];
$pass=$_POST["pass"];

$sel=mysqli_query($connect,"select * from admin where username='$user'");

$check=mysqli_num_rows($sel);

if($check==1){

$fetch=mysqli_fetch_array($sel);
if($pass==$fetch["password"]){
echo "Successfully Logined";
header ("location:homes.php");
}else{
echo "Incorrect password";
}

}else{
    echo "invalid username";
}


?>