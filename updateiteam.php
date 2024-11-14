<?php
   include "./config/dbconnect.php";
   $pn=$_GET['pn'];
   $sel=mysqli_query($conn,"select * from product where product_name='$pn'");
   $fetch=mysqli_fetch_array($sel);
    if(isset($_POST['update']))
    {
        $ProductName = $_POST['p_name'];
        $price = $_POST['p_price'];
        $category = $_POST['category'];
        if($_FILES['file']['name']=='' ||$_FILES['file']['name']==null){  
            $image=$fetch['image'];
        }else{
         

            $name = $_FILES['file']['name'];
            $temp = $_FILES['file']['tmp_name'];
            $location="uploads/";
            $image=$name;
            $target_dir="uploads/";
            $finalImage=$target_dir.$name;
            move_uploaded_file($temp,$finalImage);
        }
         $update = mysqli_query($conn,"UPDATE product SET
         product_name='$ProductName',product_image='$image',price='$price',category_id='$category'
         WHERE product_name='$pn'");
         if(!$update)
         {
             echo mysqli_error($conn);
         }
         else
         {
          header('location:viewAllProducts.php?name='.$name);
            
         }
    }
        
?>