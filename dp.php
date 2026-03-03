<?php
$conn=new mysqli("localhost","root","Sandeep@123","onlineshoping");
if($conn->connect_error){
    die("connection failed:". $conn->connect_error);
}
?>