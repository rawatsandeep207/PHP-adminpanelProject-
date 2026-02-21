<?php
session_start();
include '../dp.php';
if(isset($_GET['product_id'])){
    $product_id=$_GET['product_id'];
    $sql="delete from products where Id='$product_id'";
    $result =mysqli_query($conn,$sql);
    if(!$result){
        echo "Error!:{$conn->error}";
    }
    else{
    header("location:vieworder.php");
    }
}
?>