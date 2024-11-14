<?php 
    $hostname="localhost";
    $username="root";
    $password="";
    $conn=mysqli_connect($hostname,$username,$password);
    if(!$conn){
        die("Connection was not successful due to :".mysqli_connect_error());
    }
    echo"Connection was successful.";
    echo"<br>";
    $sql="CREATE DATABASE shop";
    $result =mysqli_query($conn,$sql);
    If($result){
        echo"Database is created";
        $conns=mysqli_connect($hostname,$username,$password,"shop");
        $table=mysqli_query($conns,"create table register(id int auto_increment primary key,username varchar(111),email varchar(111),password varchar(111))");
    }
    else{
        echo"Database is not created due to :".mysqli_error($conn);
    }
    ?>